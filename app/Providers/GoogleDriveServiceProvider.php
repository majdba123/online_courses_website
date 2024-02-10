<?php

namespace App\Providers;

use Google_Client;
use Google_Service_Drive;
use Illuminate\Support\ServiceProvider;

class GoogleDriveServiceProvider extends ServiceProvider
{
    public function register()
    {
        $client = new Google_Client();
        $client->setClientId(env('GOOGLE_DRIVE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_DRIVE_CLIENT_SECRET'));
        $client->setRedirectUri(env('GOOGLE_DRIVE_CLIENT_REDIRECT_URI'));
        $client->addScope(Google_Service_Drive::DRIVE_READONLY);

        $this->app->instance(Google_Client::class, $client);
        $this->app->instance(Google_Service_Drive::class, new Google_Service_Drive($client));
    }
}
