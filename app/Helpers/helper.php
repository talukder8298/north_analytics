<?php

namespace App\Helpers;

use App\Models\Slider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class helper
{
    /**
     * @param $subject
     * @param $type
     * @param $item_id
     * @param $all_body
     * @return void
     */
    public static function uploadFile($file, $location, $thumb_location, $size = null, $old = null): string
    {
        //dd($file, $location);
        $path = self::makeDirectory($location);
        if (!$path) throw new Exception('File could not be created.');

        if ($old) {
            self::removeFile($location . '/' . $old);
        }

        $filename = uniqid() . time() . '.' . $file->getClientOriginalExtension();
        //$filename = $file->getClientOriginalName();

        // Store Main Image
        //dd($location);
        $file->move($location, $filename);

        $imageManager = new ImageManager(new Driver());
        $thumbImage = $imageManager->read($location . '/' . $filename);

        if ($size) {
            $size = explode('x', strtolower($size));
            $thumbImage->resize($size[0], $size[1]);
        }

        // Store Image
        $thumbImage->save($thumb_location . '/' . $filename);

        return $filename;
    }

    static function makeDirectory($path)
    {
        if (file_exists($path)) return true;
        return mkdir($path, 0755, true);
    }

    static function removeFile($path)
    {
        return file_exists($path) && is_file($path) ? @unlink($path) : false;
    }

    static function imagePath(): array
    {
        $data['pictures'] = [
            'sliders' => [
                'path' => 'public/pictures/sliders',
                'size' => '1920x800'
            ],
            'blog' => [
                'path' => 'public/pictures/blog',
                'size' => '400x400'
            ],
            'service' => [
                'path' => 'public/pictures/service',
                'size' => '750x500'
            ],
            'member' => [
                'path' => 'public/pictures/member',
                'size' => '350x424'
            ],
            'industries' => [
                'path' => 'public/pictures/industries',
                'size' => '750x500'
            ],
            'client' => [
                'path' => 'public/pictures/client',
                'size' => '350x424'
            ],
            'client_thumb' => [
                'path' => 'public/pictures/client/client_thumb',
                'size' => '100x100'
            ],
            'client_logo' => [
                'path' => 'public/pictures/client/client_logo',
                'size' => '200x120'
            ],
            'about' => [
                'path' => 'public/pictures/about',
                'size' => '400x400'
            ],
            'about_cover' => [
                'path' => 'public/pictures/about/about_cover',
                'size' => '400x400'
            ],
            'thumb' => [
                'path' => 'pictures/thumb',
                'size' => '1920x800'
            ]
        ];

        $data['image'] = [
            'client' => [
                'path' => 'public/image/client',
                'size' => '350x424'
            ],
        ];

        return $data;
    }
}
