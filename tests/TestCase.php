<?php

namespace Tecbay\Laramedia\Tests;

use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Artisan;
use  Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->setUpDatabase($this->app);
    }

    /**
     * @param  Application  $app
     * @return void
     */
    private function setUpDatabase($app)
    {
        Artisan::call('migrate');

        /** @var DatabaseManager $db */
        $db = $app['db'];

        $db->connection()
            ->getSchemaBuilder()
            ->create('test_models', function (Blueprint $table) {
                $table->id();
            });

    }

    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            \Tecbay\Laramedia\LaramediaServiceProvider::class,
            \Spatie\MediaLibrary\MediaLibraryServiceProvider::class
        ];
    }
}
