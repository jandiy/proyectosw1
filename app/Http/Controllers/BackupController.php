<?php

namespace App\Http\Controllers;

use Alert;
use App\Http\Requests;
use Artisan;
use Log;
use Storage;
use Carbon\Carbon;

class BackupController extends Controller
{
    public function index()
    {
        $disk = Storage::disk(config('laravel-backup.backup.destination.disks')[0]);
        $files = $disk->files(config('laravel-backup.backup.name'));
        $backups = [];
        // make an array of backup files, with their filesize and creation date
        foreach ($files as $k => $f) {
            // only take the zip files into account
            if (substr($f, -4) == '.zip' && $disk->exists($f)) {
                $backups[] = [
                    'file_path' => $f,
                    'file_name' => str_replace(config('laravel-backup.backup.name') . '/', '', $f),
                    'file_size' => $this->ConvertSize($disk->size($f)) ,
                    'last_modified' => $this->getDate($disk->lastModified($f)),
                ];
                //s$backups = (array($f,str_replace(config('laravel-backup.backup.name') . '/', '', $f),$disk->size($f),$disk->lastModified($f))) ;
            }
        }
        // reverse the backups, so the newest one would be on top
        $backups = array_reverse($backups);
        // dd($backups[0]['file_path']);
        //dump($backups);
        //dd($backups);
        return view('backup.index', compact('backups'));
    }

    public function create()
    {

        try {
            Artisan::call('backup:run',['--only-db'=>true]);
            $output = Artisan::output();
            Log::info("Backpack\BackupManager -- new backup started from admin interface \r\n" . $output);
            return redirect()->back();
        }   catch (Exception $e) {
            Flash::error($e->getMessage());
            return redirect()->back();
        }
    }


    public function download($file_name)
    {
        ob_end_clean();
        $file = config('laravel-backup.backup.name') . '/' . $file_name;
        $disk = Storage::disk(config('laravel-backup.backup.destination.disks')[0]);
        if ($disk->exists($file)) {
            $fs = Storage::disk(config('laravel-backup.backup.destination.disks')[0])->getDriver();
            $stream = $fs->readStream($file);
            return \Response::stream(function () use ($stream) {
                fpassthru($stream);
            }, 200, [
                "Content-Type" => $fs->getMimetype($file),
                "Content-Length" => $fs->getSize($file),
                "Content-disposition" => "attachment; filename=\"" . basename($file) . "\"",
            ]);
        } else {
            abort(404, "The backup file doesn't exist.");
        }
    }

    public function delete($file_name)
    {
        $disk = Storage::disk(config('laravel-backup.backup.destination.disks')[0]);
        if ($disk->exists(config('laravel-backup.backup.name') . '/' . $file_name)) {
            $disk->delete(config('laravel-backup.backup.name') . '/' . $file_name);
            return redirect()->back();
        } else {
            abort(404, "The backup file doesn't exist.");
        }
    }

//fecha
    public function getDate($date_modify){
        return Carbon::createFromTimeStamp($date_modify)->formatLocalized('%d %B %Y --- %H:%M');

    }

    //size
    public function ConvertSize($bytes,$decimal=2){

        if($bytes<1024){
            return $bytes.'B';
        }
        $factor=floor(log($bytes,1024));
        return sprintf("%.{$decimal}f",$bytes/pow(1024,$factor)).['B','KB','MB','GB','TB','PB'][$factor];
    }

}
