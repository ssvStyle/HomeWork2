<?php

namespace App;


abstract class Model
{

    public const TABLE = '';

    public $id;

    public static function findAll()
    {
        $db = new Db();
        return $db->query('SELECT * FROM ' . static::TABLE,
            [],
            static::class
        );
    }

    public static function findById($id){
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';
        $result = $db->query($sql, [':id'=>$id],static::class);
        if ($result == null){
            return false;
        }
        return $result[0];
    }

    public function insert()

    {
        $fields = get_object_vars($this);

        $cols = [];
        $data = [];

        foreach ($fields as $name => $value) {
            if ('id' == $name){
                continue;
            }

            $cols[] = $name;
            $data[':' . $name] = $value;

        }

        $sql = 'INSERT INTO ' . static::TABLE . ' 
        ('.implode(',', $cols).') 
        VALUES 
        ('.implode(',', array_keys($data)).')';

        $db = new Db();
        $db->execute($sql, $data);
        $this->id = $db->getLastId();

    }

    public function update()

    {
        $fields = get_object_vars($this);
        $cols = [];
        $data = [];

        foreach ($fields as $name => $value) {
            if ('id' == $name){
                continue;
            }

            $cols[] = $name . '=' . ':'  . $name;
            $data[':' . $name] = $value;

        }

        $sql = 'UPDATE ' . static::TABLE . ' SET  
        '.implode(',', $cols).' WHERE id=' . $fields['id'];

        $db = new Db();
        $db->execute($sql, $data);

    }

    public function save()
    {

        if (self::findById($this->id)){

            self::update();

        } else {

            self::insert();

        }


    }

    public function delete($id)
    {
        $db = new Db();
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id=:id';
        var_dump($db->execute($sql, [':id'=>$id]));
    }

}