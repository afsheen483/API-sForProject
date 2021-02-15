<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VariantsModel;
use DB;
use Validator;

class VariantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        $variants =DB::table('variants')
            ->join('sub_products', 'variants.sub_product_id', '=', 'variants.id')
            ->select('variants.*', 'sub_products.*')
            ->get();
            //dd($product);
        return response()->json( $variants->all());
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
            'variant_name'=>'required',
        ];
        $validtor=Validator::make($request->all(),$rules);
        if ($validtor->fails()) {
            return response()->json($validtor->errors(),400);
            
        }
        $variants = VariantsModel::create($request->all());
        return response()->json($variants, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $variants=VariantsModel::find($id);
        if (is_null($variants)) {
            return response()->json(['message'=>'Record Not Found!'],404);
        }
        return response()->json($variants,200);
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
         $variants=VariantsModel::find($id);
        if (is_null($variants)) {
            return response()->json(['message'=>'Record Not Found!'],404);
        }
        $variants->update($request->all());
        return response()->json($variants,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $variants=VariantsModel::find($id);
        if (is_null($variants)) {
            return response()->json(['message'=>'Record Not Found!'],404);
        }
        $variants->delete();
        return response()->json(null,204);
    }
}
