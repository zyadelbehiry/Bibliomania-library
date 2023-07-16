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
       //validation
        $request->validate([
            'title'=>'required | string | max:100',
            'description'=>'required | string ',
            'image'=>'nullable |image '
        ]);

       $title=$request->title;
       $desc=$request->description;

       $image=$request->file('image');
       $extension=$image->getClientOriginalExtension();
        $image_name="book-".uniqid().".$extension";
        $image->move(public_path('uploads/books'),$image_name);
       book::Create([
        'title'=>$title,
        'description'=>$desc,
        'image'=>$image_name
       ]) ;
       return redirect(route('books.index'));
    }
    public function edit($id){
       $book = book::findOrFail($id);
       return view('books.edit',compact('book'));
     }
     public function update(Request $request , $id){
         //validation
         $request->validate([
            'title'=>'required | string | max:100',
            'description'=>'required | string ',
            'image'=>'nullable'
        ]);

        $book=book::findOrFail($id);
        if($request->hasFile('image')){
            if($book->image!==null){
                unlink(public_path('uploads/books/') .$book->image );
            }
            $image=$request->file('image');
            $extension=$image->getClientOriginalExtension();
            $image_name="book-".uniqid().".$extension";
            $image->move(public_path('uploads/books'),$image_name);
        }
        $book->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$image_name
        ]);
        return redirect(route('books.edit',$id));
     }
     public function delete($id){
       $book = book::findOrFail($id);
       if($book->image !== null){
       unlink(public_path('uploads/books/') . $book->image);
       }
       $book->delete();
       return redirect(route('books.index'));
     }
}
