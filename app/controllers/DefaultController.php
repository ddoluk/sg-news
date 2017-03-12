<?php

use Component\Controller;
use Component\Pagination;
use Model\NewsModel;

class DefaultController extends Controller
{
    public function indexAction($page = 1)
    {
        $model = new NewsModel();

        $total = $model->getAllNews();

        $data = $model->getListForPagination($page);

        $pagination = new Pagination($total, $page, NewsModel::SHOW_BY_DEFAULT, 'page-');

        $this->view->render('news/index', 'layout', $data, $pagination);

        return true;
    }
}