<?php

namespace Component;


class Controller
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

}