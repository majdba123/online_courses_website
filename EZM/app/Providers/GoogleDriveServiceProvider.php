<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class GoogleDriveServiceProvider extends ServiceProvider
{
    public function register()
    {
        if (! class_exists(\Google\Service\Drive::class)) {
            return;
        }

        $client = new \Google\Client();
        $client->setClientId(env('GOOGLE_DRIVE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_DRIVE_CLIENT_SECRET'));
        $client->setRedirectUri(env('GOOGLE_DRIVE_CLIENT_REDIRECT_URI'));
        $client->addScope(\Google\Service\Drive::DRIVE_READONLY);

        $this->app->instance(\Google\Client::class, $client);
        $this->app->instance(\Google\Service\Drive::class, new \Google\Service\Drive($client));
    }
}
