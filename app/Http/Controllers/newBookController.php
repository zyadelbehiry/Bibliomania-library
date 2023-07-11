<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\book;
class newBookController extends Controller
{
    public function index(){
        $books=book::get();
        return view('books.index',compact('books'));
    }
    public function show ($id){
       $book= book::findOrFail($id);
       return view('books.show',compact('book'));
    }
    public function create (){
       return view('books.create');
    }
    public function store (Request $request){
       $title=$request->title;
       $desc=$request->description;
       book::Create([
        'title'=>$title,
        'description'=>$desc
       ]) ;
       return redirect(route('books.index'));
    }
    public function edit($id){
       $book = book::findOrFail($id);
       return view('books.edit',compact('book'));
     }
     public function update(Request $request , $id){
        book::findOrFail($id)->update([
            'title'=>$request->title,
            'description'=>$request->description
        ]);
        return redirect(route('books.edit',$id));
     }
     public function delete($id){
        book::findOrFail($id)->delete();
        return redirect(route('books.index'));
     }
}
