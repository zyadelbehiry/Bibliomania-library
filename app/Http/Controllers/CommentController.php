<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create($id){
        $book=book::findOrFail($id);
        return view('comments.create',compact('book'));
    }
    public function storeComment(Request $request,$id){

        $request->validate([
            'content'=>'nullable |string'
        ]);
        comment::create([
            'content'=>$request->content,
            'book_id'=>$id
        ]);
        return redirect(route('books.show',$id));
    }
}
