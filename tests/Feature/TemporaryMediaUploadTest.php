<?php

namespace Tecbay\Laramedia\Tests\Feature;

use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;
use Tecbay\Laramedia\Models\TemporaryMedia;
use Tecbay\Laramedia\Tests\Support\TestModel;
use Tecbay\Laramedia\Tests\TestCase;

use Illuminate\Http\UploadedFile;


class TemporaryMediaUploadTest extends TestCase
{
    public function testAuthorizedUserCanUploadTemporaryMedia()
    {

        $this->withoutExceptionHandling();
        /** @var TestModel $testModel */
        $testModel = TestModel::create();
        Storage::delete(Storage::allFiles());
        $file = UploadedFile::fake()->image('file.png', 600, 600);

        $response = $this->postJson('/api/temporary-media', ['file' => $file]);

        /** @var TemporaryMedia $temporaryMedia */
        $temporaryMedia = TemporaryMedia::where('uuid', $response->json('uuid'))->first();


        Storage::assertExists('1/'.$temporaryMedia->getFirstMedia()->file_name);

        $testModelMedia = $testModel
            ->fromTemporaryMedia($response->json('uuid'))
            ->toMediaCollection();

        $this->assertNotNull($testModelMedia->getUrl());
        Storage::assertMissing('1/'.$temporaryMedia->getFirstMedia()->file_name);
        $this->assertEquals(0, TemporaryMedia::count());


    }
}
