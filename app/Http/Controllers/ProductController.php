<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function index(Request $request)
    {
        // dd($request->all());
        $products= Product::all();
        if($request->all()){
           
            if($request->all()['query'])
            {
                $query=$request->all()['query'];
                $products = Product::where('name',$query)->get();
                
            }
            if(@$request->all()['category_id'])
            {
                $category_id=$request->all()['category_id'];
                $products =Product::where('category_id',$category_id)->get();
            }
            if(@$request->all()['price'])
            {
                $price_id=$request->all()['price'];
                if($price_id == 1){
                    $products =Product::query()->orderBy('price', 'DESC')
                    ->get();
                }
                if($price_id == 2){
                    $products =Product::query()->orderBy('price', 'ASC')
                    ->get();
                }
               
            }
        }
           
        foreach($products as $product){
            $name = Category::where('id',$product->category_id)->value('name');
            $product->category_name=$name;
        }
        $categories = Category::all();
        // $price_options=
        return view('product.index', compact('products','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'image' => 'required',
            'price' => 'required|numeric',
            // 'category_id'=>'required',
            
        ]);
        if (isset($request->image)) {
            $photo = $request->image;
            $name = time().'.'.$photo->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            $photo->move($destinationPath, $name);
            $filename = 'uploads/'.$name;
        }
        $product = new Product();
        $product->name = $request->name;
        $product->description = @$request->description;
        $product->price = $request->price;
        $product->category_id = @$request->category_id;
        $product->image = $filename;
        $product->save();

        return redirect('/products')->with('success', 'Product is successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('product.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            // 'image' => 'required',
//            'description' => 'required',
            'price' => 'required|numeric',
            // 'category_id'=>'required',
            
        ]);
        $filename = $product->image;
        if (isset($request->image)) {
            $photo = $request->image;
            $name = time().'.'.$photo->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            $photo->move($destinationPath, $name);
            $filename = 'uploads/'.$name;
        }
        
        $product->name = $request->name;
        $product->description = @$request->description;
        $product->price = $request->price;
        $product->category_id = @$request->category_id;
        $product->image = $filename;
        $product->save();
        Product::whereId($product->id)->update($validatedData);
        return redirect('/products')->with('success', 'Product is successfully updated.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $coronacase = Product::findOrFail($product->id);
        $coronacase->delete();
        return redirect('/products')->with('success', 'Product is successfully deleted.');
    }
}
