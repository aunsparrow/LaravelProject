<?php

namespace App\Http\Controllers\API;

use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductApiController extends Controller
{
    function all()
    {
        $products = Product::select('id','productName','image','color','quantity','price')->get();
        $fetch = ["data" => []];
        foreach ($products as $product){
            array_push($fetch["data"],[
                $product->id,
                "<img src='".asset($product->image)."' width='150px'>",
                $product->productName,
                $product->color,
                $product->quantity,
                $product->price,
                '<div class="row">
                    <div class="col-lg-6 col-12">
                        <a href="'. route('products.edit',['id' => $product->id]).'" class="btn btn-primary w-100">
                            <i class="fa fa-edit"></i>
                        </a>
                    </div>
                    <div class="col-lg-6 col-12">
                        <form method="post" action="'. route('products.destroy',['id' => $product->id]) .'">
                            @csrf
                            @method(\'DELETE\')
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>'
                

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
