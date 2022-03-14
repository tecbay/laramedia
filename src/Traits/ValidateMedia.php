<?php

namespace Tecbay\Laramedia\Traits;

use Tecbay\Laramedia\Models\TemporaryMedia;

trait ValidateMedia
{
    // TODO : Write unit-test
    public function images()
    {
        return function ($key, $value, $fail) {
            /** @var TemporaryMedia $item */

            foreach (TemporaryMedia::whereIn('uuid', $value)->get() as $item) {
                if ($item->getFirstMedia()->getTypeFromMime() !== 'image') {
                    $fail('Invalid image type');
                };
            }
        };
    }

    // TODO : Write unit-test
    public function image()
    {
        return function ($key, $value, $fail) {
            if (TemporaryMedia::whereIn('uuid', $value)->first()->getFirstMedia()->getTypeFromMime() !== 'image') {
                $fail('Invalid image type');
            };
        };
    }
}
