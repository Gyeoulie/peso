<?php

namespace App\Livewire\Admin\Maintenance;

use Illuminate\Support\Facades\Artisan;
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

        // Save it locally in the temp directory
        $localPath = storage_path('app/temp/' . basename($filePath));
        file_put_contents($localPath, $fileContent);

        // Verify the file is saved
        if (!file_exists($localPath)) {
            toastr()->error('Failed to save the backup file locally.');
            return;
        }

        // Call the Artisan command to restore the database
        Artisan::call('backup:restore', [
            '--disk' => 'local', // Use 'local' since the file is saved locally
            '--backup' => 'temp/' . basename($filePath), // Path within the local disk
            '--connection' => 'mysql', // Database connection
            '--password' => env('BACKUP_ENCRYPTION_PASSWORD', ''), // Encryption password if needed
            '--reset' => true,
        ]);

        toastr()->success('Database restored successfully.');
    } catch (\Exception $e) {
        // \Log::error('Failed to restore database: ' . $e->getMessage());
        toastr()->error('Failed to restore database: ' . $e->getMessage());
    }
}

    public function render()
    {
        return view('livewire.admin.maintenance.backup');
    }
}
