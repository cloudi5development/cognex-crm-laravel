<?php

namespace App\Helpers;

use App\Models\MetaTag;

class Helper
{

    public static function uploadImage($photo, $folder = 'photos', $renameFile = 'random')
    {
        if ($photo) {
            if ($renameFile == 'same') {
                $fileName   = Helper::renameSameName($photo->getClientOriginalName());
            } else {
                $fileName   = Helper::renameRandomName($photo->getClientOriginalName());
            }
            /*** Public Folder Upload */
            $folder_path    = 'uploads/' . $folder;
            $path           = $folder_path . '/' . $fileName;
            $photo_stored   = $photo->move($folder_path, $fileName);
            if ($photo_stored) {
                return [
                    'status' => true,
                    'name' => $path,
                ];
            }
        }
        return [
            'status' => false,
            'name' => '',
        ];
    }

    public static function uploadFile($file, $folder = 'files', $renameFile = 'random')
    {
        if ($file) {
            if ($renameFile == 'same') {
                $fileName   = Helper::renameSameName($file->getClientOriginalName());
            } else {
                $fileName   = Helper::renameRandomName($file->getClientOriginalName());
            }

            /*** Public Folder Upload */
            $folder_path    = 'uploads/' . $folder;
            $file_path      = $folder_path . '/' . $fileName;
            $file_stored    = $file->move($folder_path, $fileName);
            if ($file_stored) {
                return [
                    'status' => true,
                    'name' => $file_path,
                ];
            }
        }
        return [
            'status' => false,
            'name' => '',
        ];
    }

    public static function renameRandomName($full_filename = '')
    {
        $random = date('Ymd-His') . '-' . floor(microtime(true) * 10000);
        $filename = $random . ".jpg";
        if ($full_filename) {
            $exploded_name  = explode('.', $full_filename);
            $filename       = $random . "." . end($exploded_name);
        }
        return $filename;
    }

    public static function renameSameName($full_filename = '')
    {
        $filename = date('Ymd-His') . '-' . floor(microtime(true) * 10000);
        if ($full_filename) {
            $exploded_name  = explode('.', $full_filename);
            $filename       = str_replace(' ', '-', strip_tags(current($exploded_name))) . "." . end($exploded_name);
        }
        return $filename;
    }

    public static function unlinkImage($photo_name)
    {
        if (file_exists(public_path($photo_name))) {
            unlink(public_path($photo_name));
            return true;
        }

        return false;
    }

    public static function get_image($image = '')
    {
        if ($image && file_exists(public_path($image))) {
            return asset($image);
        }

        return asset('backend/images/no-image.png');
    }

    public static function checkThumnail($path = null)
    {
        if (!empty($path)) {
            if (file_exists(public_path($path))) {
                return asset($path);
            }
        }
        return asset('backend/images/logo.png');
    }

    public static function metaTags($page)
    {
        $metas = null;
        if ($page) {
            $metas = MetaTag::where('page', $page)->first();
        }
        return $metas;
    }
}
