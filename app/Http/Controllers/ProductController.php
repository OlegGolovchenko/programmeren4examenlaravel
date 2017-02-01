<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = \App\Product::all();
        return view('product.editing',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = \App\Product::all();
        $category = \App\Category::pluck('Name','Id');
        return view('product.insertingone',['products'=>$products,'feedback'=>"",'categories'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'Name'=>'required|min:1|max:255',
            'Description'=>'min:1|max:1024',
            'Price'=>'numeric|regex:/^\d*(\.\d{2})?$/',
            'ShippingCost'=>'numeric|regex:/^\d*(\.\d{2})?$/',
            'TotalRating'=>'numeric',
            'Thumbnail'=>'min:1|max:255',
            'Image'=>'min:1|max:255',
            'Supplier'=>'min:1|max:255',
            'IdCategory'=>'exists:category,Id',
            'DiscountPercentage'=>'numeric|regex:/^\d*(\.\d{2})?$/',
            'Votes'=>'numeric',
            ]);
        $prod = new \App\Product();
        $prod->Description = empty($request->input('Description'))?null:$request->input('Description');
        $prod->Name = $request->input('Name');
        $prod->Price = empty($request->input('Price'))?null:$request->input('Price');
        $prod->ShippingCost = empty($request->input('ShippingCost'))?null:$request->input('ShippingCost');
        $prod->TotalRating = empty($request->input('TotalRating'))?null:$request->input('TotalRating');
        $prod->Thumbnail = empty($request->input('Thumbnail'))?null:$request->input('Thumbnail');
        $prod->Image = empty($request->input('Image'))?null:$request->input('Image');
        $prod->Supplier = $request->input('Supplier');
        $prod->IdCategory = \App\Category::find($request->get('Category'))->Id;
        \App\Category::find($request->get('Category'))->products->add($prod);
        $prod->DiscountPercentage = empty($request->input('DiscountPercentage'))?null:$request->input('DiscountPercentage');
        $prod->Votes = empty($request->input('Votes'))?null:$request->input('Votes');
        if(!$prod->save()){
            $products = \App\Product::all();
            $categories = \App\Category::pluck('Name','Id');
            return view('product.insertingone',['products'=>$products,'feedback'=>"",'categories'=>$categories]);
        }else{
            $products = \App\Product::all();
            $categories = \App\Category::pluck('Name','Id');
            return view('product.insertingone',['products'=>$products,'feedback'=>"opgeslagen",'categories'=>$categories]);
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
        $product = \App\Product::find($id);
        $products = \App\Product::all();
        $categories = \App\Category::pluck('Name','Id');
        return view('product.readingone',['products'=>$products,'feedback'=>"",'prod'=>$product,'categories'=>$categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = \App\Product::find($id);
        $products = \App\Product::all();
        $categories = \App\Category::pluck('Name','Id');
        return view('product.updatingone',['products'=>$products,'feedback'=>"",'prod'=>$product,'categories'=>$categories]);
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
        $this->validate($request,[
            'Name'=>'required|min:1|max:255',
            'Description'=>'min:1|max:1024',
            'Price'=>'numeric|regex:/^\d*(\.\d{2})?$/',
            'ShippingCost'=>'numeric|regex:/^\d*(\.\d{2})?$/',
            'TotalRating'=>'numeric',
            'Thumbnail'=>'min:1|max:255',
            'Image'=>'min:1|max:255',
            'Supplier'=>'min:1|max:255',
            'IdCategory'=>'exists:category,Id',
            'DiscountPercentage'=>'numeric|regex:/^\d*(\.\d{2})?$/',
            'Votes'=>'numeric',
            ]);
        $prod = \App\Product::find($id);
        $prod->Description = empty($request->input('Description'))?null:$request->input('Description');
        $prod->Name = $request->input('Name');
        $prod->Price = empty($request->input('Price'))?null:$request->input('Price');
        $prod->ShippingCost = empty($request->input('ShippingCost'))?null:$request->input('ShippingCost');
        $prod->TotalRating = empty($request->input('TotalRating'))?null:$request->input('TotalRating');
        $prod->Thumbnail = empty($request->input('Thumbnail'))?null:$request->input('Thumbnail');
        $prod->Image = empty($request->input('Image'))?null:$request->input('Image');
        $prod->Supplier = $request->input('Supplier');
        $prod->IdCategory = \App\Category::find($request->get('Category'))->Id;
        \App\Category::find($request->get('Category'))->products->add($prod);
        $prod->DiscountPercentage = empty($request->input('DiscountPercentage'))?null:$request->input('DiscountPercentage');
        $prod->Votes = empty($request->input('Votes'))?null:$request->input('Votes');
        if(!$prod->save()){
            $products = \App\Product::all();
            $categories = \App\Category::pluck('Name','Id');
            return view('product.updatingone',['products'=>$products,'feedback'=>"mislukt",'prod'=>$prod,'categories'=>$categories]);
        }else{
            $products = \App\Product::all();
            $categories = \App\Category::pluck('Name','Id');
            return view('product.updatingone',['products'=>$products,'feedback'=>"opgeslagen",'prod'=>$prod,'categories'=>$categories]);
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
        $prod = \App\Product::find($id);
        if(!$prod->delete()){
            $product = \App\Product::find($id);
            $products = \App\Product::all();
            $categories = \App\Category::pluck('Name','Id');
            return view('Product.readingone',['products'=>$products,'feedback'=>"bleeft staan",'prod'=>$prod,'categories'=>$categories]);
        }else{
            $product = \App\Product::find($id);
            $products = \App\Product::all();
            return view('product.editing',['products'=>$products]);
        }
    }
}
