<?php

namespace App\Http\Controllers\API;

use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductApiController extends Controller
{
    function all()
    {
        $products = Product::select('id','productName','image')->get();
        $fetch = ["data" => []];
        foreach ($products as $product){
            array_push($fetch["data"],[
                $product->id,
                $product->productName,
                $product->image
            ]);
        }
        return response()->json($fetch);
    }

    function create(Request $request)
    {
        $created = Product::create([
            'productName' => $request->productName,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'color' => $request->color,
            'type' => $request->type,
            'image' => $request->image,
            'created_by' => $request->created_by
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'สร้างข้อมูลเรียบร้อย',
            'result' => $created
        ]);
    }
}
