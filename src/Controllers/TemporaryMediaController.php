<?php

namespace Tecbay\Laramedia\Controllers;

use Illuminate\Routing\Controller;
use Ramsey\Uuid\Uuid;
use Tecbay\Laramedia\Models\TemporaryMedia;

class TemporaryMediaController extends Controller
{
    public function store()
    {
        request()->validate(['file' => ['required', 'file']]);

        /** @var TemporaryMedia $temporaryMedia */
        $temporaryMedia = TemporaryMedia::create([
            'uuid' => Uuid::uuid4(),
        ]);

        $temporaryMedia
            ->addMediaFromRequest('file')
            ->toMediaCollection(diskName: config('laramedia.temporary_media_disk'));

        //        dd(\Composer\InstalledVersions::getPrettyVersion('spatie/laravel-event-sourcing'));

        return response()->json(['uuid' => $temporaryMedia->uuid]);
    }
}
