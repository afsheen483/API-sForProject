<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\WorkingHoursModel;
use Validator;

class WorkinHoursController extends Controller
{
    
    public function index()
    {
        $working_duration =DB::table('working_duration')
            ->join('working_days', 'working_duration.working_day_id', '=', 'working_days.id')
            ->select('working_duration.*', 'working_days.*')
            ->get();
            //dd($product);
        return response()->json( $working_duration->all());
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
            'opening_time'=>'required',
            'delivery_hours'=>'required',
        ];
        $validtor=Validator::make($request->all(),$rules);
        if ($validtor->fails()) {
            return response()->json($validtor->errors(),400);
            
        }
        $working_duration = WorkingHoursModel::create($request->all());
        return response()->json($working_duration, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $working_duration=WorkingHoursModel::find($id);
        if (is_null($working_duration)) {
            return response()->json(['message'=>'Record Not Found!'],404);
        }
        return response()->json($working_duration,200);
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
        $working_duration=WorkingHoursModel::find($id);
        if (is_null($working_duration)) {
            return response()->json(['message'=>'Record Not Found!'],404);
        }
        $working_duration->update($request->all());
        return response()->json($working_duration,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $working_duration=WorkingHoursModel::find($id);
        if (is_null($working_duration)) {
            return response()->json(['message'=>'Record Not Found!'],404);
        }
        $working_duration->delete();
        return response()->json(null,204);
    }
}
