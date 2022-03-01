<?php

namespace Tecbay\Laramedia\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;
use Tecbay\Laramedia\Models\TemporaryMedia;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Tecbay\Laramedia\Models\TemporaryMedia>
 */
class TemporaryMediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'uuid' => Uuid::uuid4(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (TemporaryMedia $temporaryMedia) {
            $file = UploadedFile::fake()->image('temporary-file.png');
            $temporaryMedia->addMedia($file)
                ->toMediaCollection();
        });
    }
}
