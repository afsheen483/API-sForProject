<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductModel;
use Validator;

class Product extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       

       // return response()->json( ProductModel::with('products_id')->all());
        $product =DB::table('products')
            ->join('product_categories', 'products.id', '=', 'product_categories.id')
            ->select('products.*', 'product_categories.category_name', 'product_categories.date')
            ->get();
            //dd($product);
        return response()->json( $product->with('products_id')->all());


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'pname'=>'required|min:3',
            'pquantity'=>'required|max:5',
        ];
        $validtor=Validator::make($request->all(),$rules);
        if ($validtor->fails()) {
            return response()->json($validtor->errors(),400);
            
        }
        $product = ProductModel::create($request->all());
        return response()->json($product, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=ProductModel::find($id);
        if (is_null($product)) {
            return response()->json(['message'=>'Record Not Found!'],404);
        }
        return response()->json($product,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       //
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
        $product=ProductModel::find($id);
        if (is_null($product)) {
            return response()->json(['message'=>'Record Not Found!'],404);
        }
        $product->update($request->all());
        return response()->json($product,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=ProductModel::find($id);
        if (is_null($product)) {
            return response()->json(['message'=>'Record Not Found!'],404);
        }
        $product->delete();
        return response()->json(null,204);
    }
}
