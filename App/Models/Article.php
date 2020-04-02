<?php

namespace App\Models;

use App\Db;
use App\Model;

class Article extends Model
{
    public const TABLE = 'news';

    public $title;
    public $content;
    public $author_id;


    public function findLast($limit)
    {
        $db = new Db();
        $sql = 'SELECT * FROM news ORDER BY id DESC LIMIT 3';
        return $db->query($sql, [], self::class);
    }

    public function __get($name)
    {
        if ($name == 'author') {
            if ($this->author_id){
                return Author::findById($this->author_id) ?: new Author();
            }
            return new Author();
        }
    }

}