<?php

namespace App\Livewire\Admin\Maintenance;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class Backup extends Component
{

    public $files = [];

    public function mount()
    {
        $this->listFiles();

        // dd($this->files);
    }
    public function listFiles()
    {
        try {
            // Access the Google Drive disk
            $googleDisk = Storage::disk('google');

            // List files in the specified folder
            $files = $googleDisk->allFiles();

            $this->files = collect($files)->map(function ($file) use ($googleDisk) {
                return [
                    'name' => basename($file),
                    'path' => $file,
                    'date' => \Carbon\Carbon::createFromTimestamp($googleDisk->lastModified($file))->toDateTimeString(),
                ];
            })->sortByDesc('date'); // Optionally sort by date, newest first
        } catch (\Exception $e) {
            // \Log::error('Failed to list files from Google Drive: ' . $e->getMessage());
            $this->files = []; // Clear files on error
        }
    }

    public function restoreDatabase($filePath)
    {
        try {
            $googleDisk = Storage::disk('google');

            // Download the backup file from Google Drive
            $fileContent = $googleDisk->get($filePath);

            // Ensure the temp directory exists
            $tempDir = storage_path('app/temp/');
            if (!File::exists($tempDir)) {
                File::makeDirectory($tempDir, 0755, true); // Create the directory with proper permissions
            }

            // Save the backup file locally in the temp directory
            $localPath = $tempDir . basename($filePath);
            file_put_contents($localPath, $fileContent);

            // Verify the file is saved
            if (!file_exists($localPath)) {
                toastr()->error('Failed to save the backup file locally.');
                return;
            }

            // Register the backup file
            // Ensure the file is in the correct location expected by spatie/laravel-backup
            $backupDisk = Storage::disk('local');
            $backupDisk->put('backups/' . basename($filePath), $fileContent);

            // Run the restore command with Artisan
            $exitCode = Artisan::call('backup:restore', [
                '--disk' => 'local', // Use 'local' since the file is saved locally
                '--backup' => 'backups/' . basename($filePath), // Path within the local disk
                '--connection' => 'mysql', // Database connection
                '--password' => env('BACKUP_ENCRYPTION_PASSWORD', ''), // Encryption password if needed
                '--reset' => true, // Reset the database
            ]);

            // Check if the restore command was successful
            if ($exitCode !== 0) {
                throw new \Exception('Restore command failed with exit code: ' . $exitCode);
            }

            // Capture the output for debugging
            $commandOutput = Artisan::output();
            Log::info('Backup restore command output: ' . $commandOutput);

            toastr()->success('Database restored successfully.');

        } catch (\Exception $e) {
            // Log the error
            Log::error('Failed to restore database: ' . $e->getMessage());

            toastr()->error('Failed to restore database: ' . $e->getMessage());
        }
    }
    public function restoreDatabaseGoogle($filePath)
    {
        try {
            $googleDisk = Storage::disk('google');

            // Step 1: Download the backup file from Google Drive
            $fileContent = $googleDisk->get($filePath);

            // Step 2: Save the file locally in the temp directory
            $localPath = storage_path('app/temp/' . basename($filePath));

            // Ensure the temp directory exists
            $tempDir = storage_path('app/temp/');
            if (!File::exists($tempDir)) {
                File::makeDirectory($tempDir, 0755, true);
            }

            file_put_contents($localPath, $fileContent);

            // Verify the file is saved locally
            if (!file_exists($localPath)) {
                throw new \Exception('Failed to save the backup file locally.');
            }

            // Step 3: Run the restore command using Artisan
            $exitCode = Artisan::call('backup:restore', [
                '--disk' => 'local', // Now the backup is on the local disk
                '--backup' => 'temp/' . basename($filePath), // Use the file from the temp directory
                '--connection' => 'mysql', // Specify the database connection
                '--password' => env('BACKUP_ENCRYPTION_PASSWORD', ''), // Provide the encryption password if needed
                '--reset' => true, // Reset the database before restoring
            ]);

            // Step 4: Capture the Artisan command output for debugging
            $commandOutput = Artisan::output();

            // Check if the restore command encountered errors
            if (str_contains($commandOutput, 'Error') || $exitCode !== 0) {
                throw new \Exception('Restore command failed: ' . $commandOutput);
            }

            toastr()->success('Database restored successfully.');
        } catch (\Exception $e) {
            toastr()->error('Failed to restore database: ' . $e->getMessage());
        }
    }

    public function startBackup()
    {
        try {
            // Call the Artisan command to start the backup
            Artisan::call('backup:run', [
                '--only-db' => true, // Adjust options as needed
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

    public function render()
    {
        return view('livewire.admin.maintenance.backup');
    }
}
