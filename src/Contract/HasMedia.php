<?php

namespace Tecbay\Laramedia\Contract;

use Tecbay\Laramedia\FileAdder;
use Tecbay\Laramedia\Models\TemporaryMedia;

interface HasMedia extends \Spatie\MediaLibrary\HasMedia
{
    public function addMediaFromTemporaryMedia(TemporaryMedia|string $temporaryMedia): FileAdder;
}
