<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class ModelBase extends Model
{

    protected $table;

    public  static function getItem($table, $conditions = '1=1', $columns = '*' ){
        $sql = "SELECT $columns FROM " . $table . " WHERE " . $conditions;
        $result = DB::select($sql);
        
        return $result;
    }

    public  static function getItems($table, $conditions = '1=1', $columns = '*')
    {
        $sql = "SELECT $columns FROM " . $table . " WHERE " . $conditions;
        $result = DB::select($sql);


        return $result;
    }

    public function update($table, $conditions = '1=1', $columns = '*')
    {
        $sql = "SELECT $columns FROM " . $this->table . " WHERE " . $conditions;
        $result = DB::select($sql);

        return $result;
    }
//     public function update(){
 
//        $this->updated_at = date('Y-m-d H:i:s');
//        parent::update();
//    }
}