<?php
    if (!isset($html_title)) {
        $html_title = 'Sammy - Datahjelpen AS';
    } else {
        $html_title .= ' Sammy - Datahjelpen AS';
    }
?>

<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=2.5, width=device-width, height=device-height">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> -->
    <title><?= $html_title; ?></title>
    <link rel="stylesheet" href="/_resources/css/bearwork.css">
    <link rel="stylesheet" href="/_resources/css/sammy.css">
    <link rel="stylesheet" href="/_resources/fonts/lato/lato.css">
    <link rel="stylesheet" href="/_resources/fonts/lora/lora.css">
    <link rel='stylesheet' href='/_resources/fonts/hack/hack.css'>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#687689">
    <meta name="theme-color" content="#687689">