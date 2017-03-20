<?php

namespace App;

abstract class Model
{
    const TABLE = '';
    const INDEX = '';
    const ONE = '';

    public $id;

    public static function findAll(){
        $db = new Db();
        $data=$db->query('SELECT * FROM ' . static::TABLE , [], static::class); //static::class='App\Models\User';
        return $data;
    }

    public static function findById($id){
        if (!$id){return [];}
        $db = new Db();
        $args=[':id'=>$id];
        $data=$db->query('SELECT * FROM ' . static::TABLE . ' WHERE id=:id', $args, static::class); //static::class='App\Models\User';
        if ($data){return $data;}
        else {return false;}
    }

    public static function displayAll(){
        $data=static::findAll();
        include __DIR__ . static::INDEX;
    }

    public static function displayOne($id){
        $data=static::findById($id);
        include __DIR__ . static::ONE;
    }

    public function insert(){
        $col=[];
        $val=[];
        foreach($this as $k=>$v){
            if ($k=='id'){continue;}
            $col[]=$k;
            $val[':'.$k]=$v;
        }
        $sql='
            INSERT INTO ' . static::TABLE . '(' . implode(',' , $col) . ')
            VALUES
            (' . implode(',' , array_keys($val)) . ')
            ';
        $db = new Db();
        $db->execute($sql, $val);
    }

    public function update(){
        $col=[];
        $val=[];
        foreach($this as $k=>$v){
            if ($k=='id'){continue;}
            $col[$k . '=:' . $k]=$k;
            $val[':'.$k]=$v;
        }
        $sql='
            UPDATE ' . static::TABLE . ' SET ' . implode(',' , array_keys($col)) . ' WHERE id=' . $this->id;
        $db = new Db();
        $db->execute($sql, $val);
    }

//"UPDATE 'news' SET 'author'=:author. 'body'=:body";
//execute(array(":author"=>$author,":body"=>body));
// UPDATE `news` SET `id`=[value-1],`author`=[value-2],`header`=[value-3],`body`=[value-4],`date`=[value-5] WHERE 1

    public function isNew(){
        return empty($this->id);
    }

    public function save(){
        if($this->IsNew()){
            $this->insert();
        }
        else{$this->update();
        }
    }

    public function delete(){
        $sql='DELETE FROM ' . static::TABLE . ' WHERE id=' . $this->id;
        $db = new Db();
        $db->execute($sql);
    }

    public static function dbElementCount(){
        $db = new Db();
        $data=$db->query('SELECT COUNT(*) as count FROM ' . static::TABLE, []);
        return $data;
    }
}