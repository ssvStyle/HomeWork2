<?php

include __DIR__ . '/../autoload.php';

use App\Db;

$db = new Db();
$sql = 'INSERT INTO test (test) VALUES (:test)';
$res = $db->execute($sql,[':test' => time()]);

echo $sql . ' - data '.time().'<br>';
var_dump($res);

$sql = 'INSERT INTO test (tet) VALUES (:test)';
$res = $db->execute($sql,[':test' => time()]);

echo '<br>'. $sql . ' - data '.time().'<br>';
var_dump($res);