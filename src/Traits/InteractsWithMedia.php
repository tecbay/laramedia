<?php

namespace Tecbay\Laramedia\Traits;


use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Tecbay\Laramedia\FileAdder;
use Tecbay\Laramedia\FileAdderFactory;
use Tecbay\Laramedia\Models\TemporaryMedia;

trait InteractsWithMedia
{
    use \Spatie\MediaLibrary\InteractsWithMedia {

    }

    public TemporaryMedia $temporaryMedia;

    public function addMedia(string|\Symfony\Component\HttpFoundation\File\UploadedFile $file): FileAdder
    {
        return app(FileAdderFactory::class)->create($this, $file);
    }

    public function addMediaFromTemporaryMedia(TemporaryMedia|string $temporaryMedia): FileAdder
    {

        if (is_string($temporaryMedia)) {
            $temporaryMedia = TemporaryMedia::whereUuid($temporaryMedia)->firstOrFail();
        }

        $this->temporaryMedia = $temporaryMedia;

        return $this->addMedia($temporaryMedia->getFirstMedia()->getPath());
    }


}
