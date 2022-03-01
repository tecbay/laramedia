<?php

namespace Tecbay\Laramedia;

use Spatie\MediaLibrary\MediaCollections\Models\Media;

class FileAdder extends \Spatie\MediaLibrary\MediaCollections\FileAdder
{
    public function toMediaCollection(string $collectionName = 'default', string $diskName = ''): Media
    {
        $media = parent::toMediaCollection(...func_get_args());
        $this->subject->temporaryMedia->delete();
        return $media;
    }
}
