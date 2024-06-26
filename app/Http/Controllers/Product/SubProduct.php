<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\SubProductModel;

class SubProduct extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(SubProductModel::get(), 200);
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
        $sub_product = SubProductModel::create($request->all());
        return response()->json($sub_product, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sub_product = SubProductModel::find($id);
        if (is_null($sub_product)) {
            return response()->json(['message'=>'Record Not Found'], 404);
        }
        return response()->json($sub_product, 200);

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
        $sub_product = SubProductModel::find($id);
        if (is_null($sub_product)) {
            return response()->json(['message'=>'Record Not Found!'], 404);
        }
        $sub_product->update($request->all());
        return response()->json($sub_product, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $sub_product = SubProductModel::find($id);
       if (is_null($sub_product)) {
           return response()->json(['message'=>'Record Not Found!'], 404);
       }
       $sub_product->delete();
       return response()->json(null, 204);
    }
}
