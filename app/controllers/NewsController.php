<?php

use Model\NewsModel;

class NewsController
{
    public function indexAction()
    {
        echo "i am NewsController";
        return true;

    }

    public function viewAction($category, $id)
    {

        return true;
    }

}