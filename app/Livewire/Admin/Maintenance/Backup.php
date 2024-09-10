<?php

namespace App\Livewire\Admin\Maintenance;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class Backup extends Component
{

    public $restore, $delete;

    public $password;
    public function mount()
    {

        // $this->listFiles();
    }
    // public function listFiles()
    // {
    //     try {
    //         // Access the Google Drive disk
    //         $googleDisk = Storage::disk('google');

    //         // List files in the specified folder
    //         $files = $googleDisk->allFiles();

    //         $this->files = collect($files)->map(function ($file) use ($googleDisk) {
    //             return [
    //                 'name' => basename($file),
    //                 'path' => $file,
    //                 'date' => \Carbon\Carbon::createFromTimestamp($googleDisk->lastModified($file))->toDateTimeString(),
    //             ];
    //         })->sortByDesc('date'); // Optionally sort by date, newest first
    //     } catch (\Exception $e) {
    //         // \Log::error('Failed to list files from Google Drive: ' . $e->getMessage());
    //         $this->files = []; // Clear files on error
    //     }
    // }

    // public function restoreDatabase($filePath)
    // {
    //     try {
    //         $googleDisk = Storage::disk('google');

    //         $fileContent = $googleDisk->get($filePath);

    //         // Ensure the temp directory exists
    //         $tempDir = storage_path('app/PESO/');
    //         if (!File::exists($tempDir)) {
    //             File::makeDirectory($tempDir, 0755, true); // Create the directory with proper permissions
    //         }

    //         $backupDisk = Storage::disk('local');
    //         $backupDisk->put('PESO/' . basename($filePath), $fileContent);

    //         // Run the restore command with Artisan
    //         $exitCode = Artisan::call('backup:restore', [
    //             '--disk' => 'local', // Use 'local' since the file is saved locally
    //             '--backup' => 'PESO/' . basename($filePath), // Path within the local disk
    //             '--connection' => 'mysql', // Database connection
    //             '--password' => env('BACKUP_ENCRYPTION_PASSWORD', ''), // Encryption password if needed
    //             '--no-interaction' => true,
    //         ]);

    //         if ($exitCode !== 0) {
    //             throw new \Exception('Restore command failed with exit code: ' . $exitCode);
    //         }

    //         // Capture the output for debugging
    //         $commandOutput = Artisan::output();
    //         Log::info('Backup restore command output: ' . $commandOutput);

    //         toastr()->success('Database restored successfully.');

    //     } catch (\Exception $e) {
    //         // Log the error
    //         Log::error('Failed to restore database: ' . $e->getMessage());

    //         toastr()->error('Failed to restore database: ' . $e->getMessage());
    //     }
    // }

    public function restoreDatabase()
    {
        try {
            // Initialize Google disk and get file content
            $googleDisk = Storage::disk('google');
            if (!$googleDisk->exists($this->restore)) {
                throw new \Exception('Backup file does not exist on Google Disk.');
            }

            $fileContent = $googleDisk->get($this->restore);

            // Ensure the temp directory exists
            $tempDir = storage_path('app/PESO/');
            if (!File::exists($tempDir)) {
                File::makeDirectory($tempDir, 0755, true); // Create the directory with proper permissions
            }

            // Save file locally
            $localFilePath = 'PESO/' . basename($this->restore);
            $backupDisk = Storage::disk('local');
            if (!$backupDisk->put($localFilePath, $fileContent)) {
                throw new \Exception('Failed to save backup file locally.');
            }

            // Verify if the file was successfully saved
            if (!$backupDisk->exists($localFilePath)) {
                throw new \Exception('Backup file not found locally after transfer.');
            }

            // Run the restore command with Artisan
            $exitCode = Artisan::call('backup:restore', [
                '--disk' => 'local', // Use 'local' since the file is saved locally
                '--backup' => $localFilePath, // Path within the local disk
                '--connection' => 'mysql', // Database connection
                '--password' => env('BACKUP_ENCRYPTION_PASSWORD', ''), // Encryption password if needed
                '--no-interaction' => true,
            ]);

            // Check for restore command success
            if ($exitCode !== 0) {
                $commandOutput = Artisan::output();
                throw new \Exception('Restore command failed with exit code: ' . $exitCode . ' and output: ' . $commandOutput);
            }

            // Success message
            toastr()->success('Database restored successfully.');

        } catch (\Exception $e) {
            // Log the error with detailed message
            Log::error('Failed to restore database: ' . $e->getMessage());

            toastr()->error('Failed to restore database: ' . $e->getMessage());
        }
    }

    public function startBackup()
    {
        try {
            // Call the Artisan command to start the backup
            Artisan::call('backup:run', [
                '--only-db' => true, // To backup only the database
                '--only-disk' => 'google', // Specify the disk where the backup should be stored
            ]);
            // Set success message
            // $this->status = 'Backup started successfully.';

            toastr()->success('Backup started successfully');

            // Optional: You can use session or flash messages for real-time feedback

        } catch (\Exception $e) {
            // Log the error
            Log::error('Failed to start backup: ' . $e->getMessage());

            toastr()->error('Failed to start backup: ' . $e->getMessage());

        }
    }

    public function listFiles()
    {
        try {
            // Access the Google Drive disk
            $googleDisk = Storage::disk('google');

            // List files in the specified folder
            $files = $googleDisk->allFiles();

            return collect($files)->map(function ($file) use ($googleDisk) {
                return [
                    'name' => basename($file),
                    'path' => $file,
                    'date' => \Carbon\Carbon::createFromTimestamp($googleDisk->lastModified($file))->toDateTimeString(),
                ];
            })->sortByDesc('date'); // Optionally sort by date, newest first
        } catch (\Exception $e) {
            // Log the error if needed
            Log::error('Failed to list files from Google Drive: ' . $e->getMessage());
            return collect(); // Return an empty collection
        }
    }

    public function removeBackup()
    {
        try {
            $disk = Storage::disk('google'); // Adjust if needed
            if ($disk->exists($this->delete)) {
                $disk->delete($this->delete);
                Log::info("Deleted backup file: {$this->delete}");
                toastr()->success('Backup removed successfully.');
            } else {
                toastr()->error('Backup file not found.');
            }
        } catch (\Exception $e) {
            Log::error("Failed to delete backup file {$this->delete}: " . $e->getMessage());
            toastr()->error('error', 'Failed to remove backup.');
        }
    }

    public function confirmResponse($type)
    {
        $rules = [
            'password' => 'required|string|min:6',
        ];

        $messages = [
            'password.required' => 'The password field is required.',
            'password.string' => 'The password must be a string.',
            'password.min' => 'The password must be at least 6 characters.',
        ];

        $this->validate($rules, $messages);

        if (!Hash::check($this->password, Auth::user()->password)) {
            // Use Laravel's validation system to return error messages
            $this->reset('password');
            return $this->addError('password', 'The provided password is incorrect.');

        } else {
            if ($type == 1) {
                $this->restoreDatabase();
                $this->closeModal("database-restore");

            } elseif ($type == 2) {
                $this->removeBackup();
                $this->closeModal("database-deletion");

            } elseif ($type == 3) {
                $this->startBackup();
                $this->closeModal("database-backup");

            } else {

                toastr()->error('There was an unexpected error. Please try again later.');
            }
        }

    }

    public function closeModal($modal)
    {
        $this->reset('password');
        $this->reset('restore', 'delete');
        $this->dispatch('close-modal', $modal);

    }

    public function confirmAction($type, $data = null)
    {
        $this->reset('restore', 'delete');
        if ($type == 1) {
            $this->restore = $data;
            $this->dispatch('open-modal', 'database-restore');

        } elseif ($type == 2) {
            $this->delete = $data;
            $this->dispatch('open-modal', 'database-deletion');

        } elseif ($type == 3) {
            $this->dispatch('open-modal', 'database-backup');

        }
    }
    public function render()
    {

        $files = $this->listFiles();
        return view('livewire.admin.maintenance.backup', compact('files'));
    }
}
