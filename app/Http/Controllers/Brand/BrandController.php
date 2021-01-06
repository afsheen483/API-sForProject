<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BrandModel;

class BrandController extends Controller
{
    public function brand(){
       return response()->json(BrandModel::get());
    }
    public function brandByID($id)
    {
        $brand=BrandModel::find($id);
        if (is_null($brand)) {
            return response()->json('Record Not Found!',404);
        }
        return response()->json($brand,200);
    }
    public function brandSave(Request $request){
        $brand = BrandModel::create($request->all());
        return response()->json($brand, 201);
    }
    public function brandUpdate(Request $request,/*BrandModel $brand*/ $id)
    {
        
        $brand=BrandModel::find($id);
        if (is_null($brand)) {
            return response()->json('Record Not Found!',404);
        }
        $brand->update($request->all());
        return response()->json($brand,200);
    }
    public function brandDelete(Request $request,/*BrandModel $brand*/$id)
    {
        $brand=BrandModel::find($id);
        if (is_null($brand)) {
            return response()->json('Record Not Found!',404);
        }
        $brand->delete();
        return response()->json(null,204);
    }
}
