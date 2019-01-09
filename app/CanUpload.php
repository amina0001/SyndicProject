<?php
/**
 * Created by PhpStorm.
 * User: WIKI
 * Date: 1/7/2019
 * Time: 1:39 PM
 */

namespace App;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait CanUpload
{
    public function uploadImage(UploadedFile $file, string $path, $id = null)
    {
        $path = str_replace('/storage', '', $path);#remove '/storage' from the path or it will create it under storage/app/public
        if(!is_dir($path)) {
            Storage::disk('public')->makeDirectory($path);
        }
        if(is_null($id)) {
            $filename = rand().'.'.$file->getClientOriginalExtension();
        } else {
            $filename = $id.'.'.$file->getClientOriginalExtension();
        }
        Storage::disk('public')->putFileAs($path, $file, $filename);
        return '/storage'.$path.$filename;
    }

}