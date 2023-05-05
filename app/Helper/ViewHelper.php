<?php

namespace App\Helper;

use App\Models\Bill;
use App\Models\SiteProfile;
use App\Models\Test;
use Illuminate\Support\Facades\Session;

class ViewHelper{

    public function formatDate($date, $format= 'jS M, Y H:i:s')
    {
        return date($format, strtotime($date));
    }

    public function getImagePath($folder = null, $image_name = null, $dimension = '')
    {
        if (!$folder || !$image_name)
            return asset('images/no-image.png');

//        if (!file_exists(storage_path('storage/images' . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR . $image_name)))
//            return asset('storage/images/'.$folder.'/no-image.png');

        return asset('storage/' .$dimension.$image_name);
    }
}
