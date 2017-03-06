<?php

namespace Model;

use Component\Model;

class NewsModel extends Model
{
    public function insert($data)
    {
        $insert = $this->db->prepare('INSERT IGNORE INTO news (title, link, description, source, pub_date) VALUES (?, ?, ?, ?, ?)');
        $insert->execute($data);
    }

    public function getListOfNews()
    {
        $listNews = $this->db->prepare('SELECT * FROM news ORDER BY pub_date DESC LIMIT 20');
        $listNews->execute();

        return $listNews->fetchAll();
    }
}