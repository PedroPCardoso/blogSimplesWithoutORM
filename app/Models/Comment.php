<?php

namespace App\Models;

class Comment extends ModelBase
{
    // $fillable = ['father_comment_id', 'message', 'name'];
    protected $id;
    protected $father_comment_id;
    protected $name;
    CONST TABLE = 'comments';

    public function __construct($id, $father_comment_id, $message,$name)
    {
        $this->table = self::TABLE;
        $this->id= $id;
        $this->father_comment_id = $father_comment_id;
        $this->message = $message;
        $this->name= $name;
    }
    public static function getAllComments(){
         return  SELF::getItem(SELF::TABLE);
    }
    public static function getComment()
    {
        $comment = SELF::getItem(SELF::TABLE);

        return new Comment($comment->id, $comment->father_comment_id, $comment->message, $comment->name);
    }
    public function getFilterComment($id, $father_comment_id, $message,$name){
        $conditions="";
        if($id){
            $conditions += " id = $id";
        }
        if($name){
            $conditions += " name = $name";
        }
        if($father_comment_id){
            $conditions += " father_comment_id = $father_comment_id";
        }
        if($message){
            $conditions += " message = $message";
        }

        return SELF::getItem($conditions);
    }
    public function getChilds()
    {

        $itens = SELF::getItem("father_comment_id = $this->id");
  
        foreach($itens as $item){
            $item->getChilds();
        }

    } 

}
