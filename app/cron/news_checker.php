<?php

require_once __DIR__.'/../utils/NewsFeed.php';

//$unianFeed = new NewsFeed('https://rss.unian.net/site/news_ukr.rss');
$unianFeed = new NewsFeed('http://www.pravda.com.ua/rss/view_news/');

$unianFeed->setInitFeed()->setWriteToDB();
