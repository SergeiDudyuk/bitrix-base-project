<?php declare(strict_types=1);

namespace Local\NS;

use Gregwar\Image\Image;

class Resizer
{
    public static function resize($path, $width, $height, $params = [])
    {
        $path = $path ? $path : '';

        $path = $_SERVER['DOCUMENT_ROOT'] . $path;
        $cacheDir = '/upload/cache-image';

        $image = Image::open($path);
        $image->setFallback($_SERVER['DOCUMENT_ROOT'] . '');

        $image->setCacheDir($cacheDir);
        $image->setActualCacheDir($_SERVER['DOCUMENT_ROOT'] . $cacheDir);

        $image->resize($width, $height);

        if (!empty($params['negate'])) {
            $image->negate();
        }

        return $image->png();
    }
}