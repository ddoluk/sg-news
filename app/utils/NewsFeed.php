<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Model\NewsModel;

class NewsFeed
{
    private $uri;
    private $feed;

    public function __construct($uri)
    {

        if (!is_string($uri)) {
            throw new Exception('URI is not string');
        }

        $this->uri = $uri;
        $this->feed = new SimplePie();
    }

    public function setInitFeed()
    {
        $this->feed->set_feed_url($this->uri);
        $this->feed->enable_cache(false);
        $this->feed->init();

        return $this;
    }

    public function setWriteToDB()
    {
        $model = new NewsModel();
        $items = $this->feed->get_items();

        foreach ($items as $item) {
            $model->insert(array(
                $item->get_title(),
                $item->get_link(),
                $item->get_description(),
                $this->feed->get_link(),
                $item->get_date("Y-m-d H:i:s"),
            ));
        }

        return $this;
    }
}