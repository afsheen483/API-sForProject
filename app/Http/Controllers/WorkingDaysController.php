<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkingDaysModel;
use DB;
use Validator;

class WorkingDaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $working_days =DB::table('working_days')
            ->join('suppliers_business', 'working_days.business_id', '=', 'suppliers_business.id')
            ->select('working_days.*', 'suppliers_business.*')
            ->get();
            //dd($product);
        return response()->json( $working_days->all());
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
            'working_day_name'=>'required',
        ];
        $validtor=Validator::make($request->all(),$rules);
        if ($validtor->fails()) {
            return response()->json($validtor->errors(),400);
            
        }
        $working_days = WorkingDaysModel::create($request->all());
        return response()->json($working_days, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $working_days=WorkingDaysModel::find($id);
        if (is_null($working_days)) {
            return response()->json(['message'=>'Record Not Found!'],404);
        }
        return response()->json($working_days,200);
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
         $working_days=WorkingDaysModel::find($id);
        if (is_null($working_days)) {
            return response()->json(['message'=>'Record Not Found!'],404);
        }
        $working_days->update($request->all());
        return response()->json($working_days,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $working_days=WorkingDaysModel::find($id);
        if (is_null($working_days)) {
            return response()->json(['message'=>'Record Not Found!'],404);
        }
        $working_days->delete();
        return response()->json(null,204);
    }
}
