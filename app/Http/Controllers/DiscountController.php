<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiscountModel;


class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(DiscountModel::get()->all());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $discount = DiscountModel::create($request->all());
        return response()->json($discount, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $discount = DiscountModel::find($id);
        if (is_null($discount)) {
            return response()->json(['message'=>'Record Not Found!'],404);
        }
         return response()->json($discount, 200);
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
        $discount = DiscountModel::find($id);
        if (is_null($discount)) {
            return response()->json(['message'=>'Record Not Found!'],404);
        }
        $discount->update($request->all());
        return response()->json($discount,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $discount = DiscountModel::find($id);
        if (is_null($discount)) {
            return response()->json(['message'=>'Record Not Found!'], 404);
        }
        $discount->delete();
      return response()->json(null,204);
    }
}
