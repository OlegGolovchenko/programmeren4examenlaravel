<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = \App\Category::all();
        return view('category.editing',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = \App\Category::all();
        return view('category.insertingone',['categories'=>$categories,'feedback'=>""]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'Name' => 'required|unique:category|min:1|max:255',
        'Description' => 'min:0|max:1024',
        ]);
        $ctg = new \App\Category();
        $ctg->Name = $request->input('Name');
        $ctg->Description = empty($request->input('Description'))?null:$request->input('Description');
        if(!$ctg->save()){
            $categories = \App\Category::all();
            return view('category.insertingone',['categories'=>$categories,'feedback'=>"mislukt"]);
        }else{
            $categories = \App\Category::all();
            return view('category.insertingone',['categories'=>$categories,'feedback'=>"opgeslagen"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = \App\Category::find($id);
        $categories = \App\Category::all();
        return view('category.readingone',['categories'=>$categories,'feedback'=>"",'cat'=>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = \App\Category::find($id);
        $categories = \App\Category::all();
        return view('category.updatingone',['categories'=>$categories,'feedback'=>"",'cat'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
        'Name' => 'required|min:1|max:255',
        'Description' => 'min:0|max:1024',
        ]);
        $ctg = \App\Category::find($id);
        $ctg->Name = $this->catNameExists($request->input('Name'))?$ctg->Name:$request->input('Name');
        $ctg->Description = empty($request->input('Description'))?null:$request->input('Description');
        if(!$ctg->save()){
            $categories = \App\Category::all();
            return view('category.updatingone',['categories'=>$categories,'feedback'=>"mislukt",'cat'=>$ctg]);
        }else{
            $categories = \App\Category::all();
            return view('category.updatingone',['categories'=>$categories,'feedback'=>"opgeslagen",'cat'=>$ctg]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = \App\Category::find($id);
        if(!$cat->delete()){
            $category = \App\Category::find($id);
            $categories = \App\Category::all();
            return view('category.readingone',['categories'=>$categories,'feedback'=>"bleeft staan",'cat'=>$cat]);
        }else{
             $category = \App\Category::find($id);
            $categories = \App\Category::all();
            return view('category.editing',['categories'=>$categories]);
        }
    }
    
    public function catNameExists($name){
        $categories = \App\Category::All();
        $ret = false;
        foreach($categories as $cat){
            if($cat->Name == $name){
                $ret = true;
                break;
            }
        }
        return $ret;
    }
}
