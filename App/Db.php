<?php

namespace App;

class Db
{
    protected $dbh;

    public function __construct()
    {
        $config = (include __DIR__ . '/config.php')['db'];
        $this->dbh = new \PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'].';charset=utf8', $config['user'], $config['pass']);
        if (!$this->dbh) {
            throw new \App\DbExeception('Ошибка подключения');
        }
    }

    public function query($sql, $data = [], $class)
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($data);
        if (!$res) {
            throw new DbExeception('Запрос не может быть выполнен');
        }
        return  $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    public function execute($sql, $data = [])
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($data);
    }

    public function getLastId()
    {
        return $this->dbh->lastInsertId();
    }
}