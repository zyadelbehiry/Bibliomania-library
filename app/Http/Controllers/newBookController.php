<?php

namespace App\Http\Controllers;
use App\Models\category;
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
        $categories=category::select('id','categoryName')->get();
       return view('books.create',compact('categories'));
    }
    public function store (Request $request){
       //validation
        $request->validate([
            'title'=>'required | string | max:100',
            'description'=>'required | string ',
            'image'=>'nullable |image ',
            'category_ids'=>'required',
            'category_ids.*'=>'exists:categories,id',

        ]);

       $title=$request->title;
       $desc=$request->description;

        $image=$request->file('image');
        $extension=$image->getClientOriginalExtension();
        $image_name="book-".uniqid().".$extension";
        $image->move(public_path('uploads/books'),$image_name);
       $book=book::Create([
        'title'=>$title,
        'description'=>$desc,
        'image'=>$image_name
       ]);
        $book->categories()->sync($request->category_ids);
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
        $image_name=$book->image;
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
        return redirect(route('books.index',$id));
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
