<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CityModel;


class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(CityModel::get());
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
        $city = CityModel::create($request->all());
        return response()->json($city, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $city = CityModel::find($id);
        if (is_null($city)) {
            return response()->json(['message'=>'Record Not Found!'],404);
        }
         return response()->json($city, 200);
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
        $city = CityModel::find($id);
        if (is_null($city)) {
            return response()->json(['message'=>'Record Not Found!'],404);
        }
        $city->update($request->all());
        return response()->json($city,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = CityModel::find($id);
        if (is_null($city)) {
            return response()->json(['message'=>'Record Not Found!'], 404);
        }
        $city->delete();
      return response()->json(null,204);

    }
}
