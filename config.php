<?php
    require 'vendor/autoload.php';

    use DigitalOceanV2\Adapter\BuzzAdapter;
    use DigitalOceanV2\DigitalOceanV2;

    // create an adapter with your access token which can be
    // generated at https://cloud.digitalocean.com/settings/applications
    $token = file_get_contents(__DIR__ . '/secret.cfg');
    $adapter = new BuzzAdapter($token);

    // create a digital ocean object with the previous adapter
    $digitalocean = new DigitalOceanV2($adapter);

    require_once 'public/_templates/head.php';