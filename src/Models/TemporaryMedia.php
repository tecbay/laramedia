<?php

namespace Tecbay\Laramedia\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Ramsey\Uuid\Uuid;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @property string uuid
 */
class TemporaryMedia extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;

    protected $guarded = [];

    public static function new(string|\Symfony\Component\HttpFoundation\File\UploadedFile $file = null): self
    {
        $temporaryMedia = self::create(['uuid' => Uuid::uuid4()->toString()]);
        $file = $file ?? UploadedFile::fake()->image('temporary-file.png');
        $temporaryMedia->addMedia($file)->toMediaCollection();
        return $temporaryMedia;
    }

    public function getPath()
    {
        return $this->getFirstMedia()->getPath();
    }

    public function getUrl()
    {
        return $this->getFirstMedia()->getUrl();
    }

    public function getKeyName()
    {
        return 'uuid';
    }

    public function getKeyType()
    {
        return 'string';
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
