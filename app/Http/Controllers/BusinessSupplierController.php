<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessSupplieModel;
use DB;

class BusinessSupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers_business = DB::table('suppliers_business')
            ->join('users', 'suppliers_business.user_id', '=', 'users.id')
            ->join('cities','suppliers_business.city_id','=','cities.id')
            ->select( 'suppliers_business.*','users.*','cities.*')
            ->get();
        return response()->json( $suppliers_business->all());
        //return response()->json(BusinessSupplieModel::get(),200);
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
        $business_supplier = BusinessSupplieModel::create($request->all());
        return response()->json($business_supplier, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $business_supplier = BusinessSupplieModel::find($id);
        if (is_null($business_supplier)) {
            return response()->json(['message'=>'Record Not Found!'],404);
        }
         return response()->json($business_supplier, 200);
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
        $business_supplier = BusinessSupplieModel::find($id);
        if (is_null($business_supplier)) {
            return response()->json(['message'=>'Record Not Found!'],404);
        }
        $business_supplier->update($request->all());
        return response()->json($business_supplier,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $business_supplier = BusinessSupplieModel::find($id);
        if (is_null($business_supplier)) {
            return response()->json(['message'=>'Record Not Found!'], 404);
        }
        $business_supplier->delete();
      return response()->json(null,204);

    
    }
}
