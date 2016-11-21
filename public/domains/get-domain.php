<?php
    $domain = $digitalocean->domain();
    $domain = $domain->getByName($_GET['name']);

    $html = '';
    $html .= '<ul>';

    foreach ($domain as $key => $value) {
        $html .= '<li>' . $key . ': ';
        $html .= '<pre>';
        $html .= var_export($value, true);
        $html .= '</pre>';
        $html .= '</li>';
    }

    $html .= '</ul>';

    echo $html;