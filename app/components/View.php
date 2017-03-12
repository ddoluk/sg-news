<?php

namespace Component;


class View
{
    public function render($content, $layout, $data = array(), $pagination = null)
    {
        require_once __DIR__.'/../views/' . $layout . '.php';
    }

}