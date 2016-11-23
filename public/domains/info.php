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
        foreach ($data as $domain) {
            $html .= '<li><a href="/domains/?name=' . $domain->name . '">' . $domain->name . '</a></li>';
        }
    }

    $html .= '</ul>';

    echo $html;