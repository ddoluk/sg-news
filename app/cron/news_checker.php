<?php

require_once __DIR__.'/../utils/NewsFeed.php';

$unianFeed = new NewsFeed('https://rss.unian.net/site/news_ukr.rss');

$unianFeed->setInitFeed()->setWriteToDB();
