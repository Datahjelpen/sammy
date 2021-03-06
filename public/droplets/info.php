<?php
    $html = '';
    $html .= '<ul>';

    if ($single) {
        foreach ($data as $key => $value) {
            $html .= '<li>' . $key . ': ';
            $html .= '<pre>';
            $html .= var_export($value, true);
            $html .= '</pre>';
            $html .= '</li>';
        }
    } else {
        foreach ($data as $droplet) {
            $html .= '<li><a href="/droplets/?id=' . $droplet->id . '">' . $droplet->name . '</a></li>';
        }
    }

    $html .= '</ul>';

    echo $html;