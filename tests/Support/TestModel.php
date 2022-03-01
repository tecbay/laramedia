<?php

namespace Tecbay\Laramedia\Tests\Support;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Tecbay\Laramedia\Traits\InteractsWithMedia;

class TestModel extends Model implements HasMedia
{
    use InteractsWithMedia;

    public $timestamps = false;
    protected $guarded = [];
}
