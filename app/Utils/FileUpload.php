<?php

namespace App\Utils;
use App\Repositories\Movie\MovieContract;



class FileUpload  {

    public function upload($file)
    {
        $imageName = $file->getClientOriginalName();
        $file->storeAs('public/image', $imageName);

        $imageurl = asset('storage/image/'.$imageName);

        return $imageurl;
    }


}








