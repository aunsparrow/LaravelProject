<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index')->with(['products' => $products]);
    }

    public function dataTable()
    {
        $products = Product::all();
        return view('products.dataTable')->with(['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        if (!$file->move('images/', $filename)){
            return "อัพโหลดไม่สำเร็จ";
            return redirect(route('products.index'))->with([
                'status' => [
                    'class' => 'danger',
                    'message' => 'อัพโหลดรูปภาพไม่สำเร็จ'
                ]
            ]);
        }
        $creted = Product::create([
            'productName' => $request->name,
            'productDetail' => $request->detail,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'color' => $request->color,
            'type' => $request->type,
            'image' => 'images/'. $filename,
            'createdBy' => $request->created_by
        ]);
        return redirect(route('products.index'))->with([
            'status' => [
                'class' => 'success',
                'message' => 'เพิ่มข้อมูลสำเร็จ'
            ]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('products.form-edit')->with(['product' => Product::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updated = Product::where('id', $id)->update([
            'productName' => $request->name,
            'productDetail' => $request->detail,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'color' => $request->color,
            'type' => $request->type,
            'image' => $request->image ?: null
        ]);
        return redirect(route('products.index'))->with([
            'status' => [
                'class' => 'success',
                'message' => 'แก้ไขข้อมูลสำเร็จ'
            ]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->back()->with([
            'status' => [
                'class' => 'success',
                'message' => 'ลบข้อมูลสำเร็จ'
            ]
        ]);
    }
}
