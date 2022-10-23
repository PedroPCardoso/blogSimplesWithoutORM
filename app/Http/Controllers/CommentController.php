<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends AppBaseController
{

    private $commentModel;
    
    function __construct()
    {
        $this->commentModel = new Comment();
    }
    public function index(){

        $comments = $this->commentModel::getAllComments();
        return $this->sendResponse($comments, 'Comments retrieved successfully');

    }
    public function store(Request $request)
    {
        $input = $request->all();
        $comment = $this->commentModel::create($input);
        return $this->sendResponse($comment->toArray(), 'Comment created successfully');
    }
    public function update($id, Request $request)
    {
        $input = $request->all();
        $comment = $this->commentModel::find($id);
        if (empty($comment)) {
            return $this->sendError('Comment not found');
        }
        $comment->update($input);
        return $this->sendResponse($comment->toArray(), 'Comment updated successfully');
    }

}
