<?php

namespace Tecbay\Laramedia;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class FileAdderFactory extends \Spatie\MediaLibrary\MediaCollections\FileAdderFactory
{
    public static function create(Model $subject, string|UploadedFile $file): FileAdder
    {
        /** @var FileAdder $fileAdder */
        $fileAdder = app(FileAdder::class);

        return $fileAdder
            ->setSubject($subject)
            ->setFile($file);
    }
}
