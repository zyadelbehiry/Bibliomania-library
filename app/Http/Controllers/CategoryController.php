<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories=category::get();
        return view('categories.index',compact('categories'));
    }
    public function show ($id){
       $category= category::findOrFail($id);
       return view('categories.show',compact('category'));
    }
    public function create (){
       return view('categories.create');
    }
    public function store (Request $request){
       //validation
        $request->validate([
            'categoryName'=>'required | string | max:100',
        ]);

       $categoryName=$request->categoryName;
       category::Create([
        'categoryName'=>$categoryName,
       ]) ;
       return redirect(route('categories.index'));
    }
    public function edit($id){
       $category = category::findOrFail($id);
       return view('categories.edit',compact('category'));
     }
     public function update(Request $request , $id){
         //validation
         $request->validate([
            'categoryName'=>'required | string | max:100',

        ]);

        $category=category::findOrFail($id);

        $category->update([
            'categoryName'=>$request->categoryName,

        ]);
        return redirect(route('categories.edit',$id));
     }
     public function delete($id){
       $category = category::findOrFail($id);
       $category->delete();
       return redirect(route('categories.index'));
     }
}
