<?php

use Component\Controller;
use Model\NewsModel;

class DefaultController extends Controller
{
    public function indexAction()
    {

        $model = new NewsModel();
        $data = $model->getListOfNews();

        $this->view->render('news/index', 'layout', $data);

        return true;
    }

}