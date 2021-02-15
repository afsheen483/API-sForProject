<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CouponsModel;
use DB;

class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return response()->json(CouponsModel::get()->all());
        $coupons = DB::table('coupons')
            ->join('discount', 'coupons.discount_id', '=', 'discount.id')
            ->join('suppliers_business','coupons.supplier_business_id','=','suppliers_business.id')
            ->select( 'coupons.*','discount.*','suppliers_business.*')
            ->get();
        return response()->json( $coupons->all());


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
        
        $coupon = CouponsModel::create($request->all());
        return response()->json($coupon, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coupon = CouponsModel::find($id);
        if (is_null($coupon)) {
            return response()->json(['message'=>'Record Not Found!'],404);
        }
         return response()->json($coupon, 200);
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
         $coupon = CouponsModel::find($id);
        if (is_null($coupon)) {
            return response()->json(['message'=>'Record Not Found!'],404);
        }
        $coupon->update($request->all());
        return response()->json($coupon,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon = CouponsModel::find($id);
        if (is_null($coupon)) {
            return response()->json(['message'=>'Record Not Found!'], 404);
        }
        $coupon->delete();
      return response()->json(null,204);
    }
}
