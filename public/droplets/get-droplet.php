<?php
    $droplet = $digitalocean->droplet();
    $droplet = $droplet->getById($_GET['id']);

    $html = '';
    $html .= '<ul>';

    foreach ($droplet as $key => $value) {
        $html .= '<li>' . $key . ': ';
        $html .= '<pre>';
        $html .= var_export($value, true);
        $html .= '</pre>';
        $html .= '</li>';
    }

    $html .= '</ul>';

    echo $html;