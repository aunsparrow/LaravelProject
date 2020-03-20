@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <b>ฟอร์มสินค้า</b>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('products.update',['id' => $product->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>ชื่อ</label>
                                <input class="form-control" placeholder="ชื่อสินค้า" name="name" type="text" value="{{ isset($product->productName) ? $product->productName: '' }}" required>
                            </div>
                            <div class="form-group">
                                <label>รายละเอียด</label>
                                <input class="form-control" placeholder="รายละเอียด" name="detail" type="text" value="{{ isset($product->productDetail) ? $product->productDetail: '' }}" required>
                            </div>
                            <div class="form-group">
                                <label>ราคา</label>
                                <input class="form-control" placeholder="ราคา" name="price" type="number" value="{{ isset($product->price) ? $product->price: '' }}" required>
                            </div>
                            <div class="form-group">
                                <label>จำนวน</label>
                                <input class="form-control" placeholder="จำนวน" name="quantity" value="{{ isset($product->quantity) ? $product->quantity: '' }}" type="number" required>
                            </div>
                            <div class="form-group">
                                <label>สี</label>
                                <select class="form-control" name="color">
                                    <option selected value="{{ isset($product->color) ? $product->color: '' }}">{{ isset($product->color) ? $product->color: '' }}</option>
                                    <option value="ดำ">ดำ</option>
                                    <option value="แดง">แดง</option>
                                    <option value="น้ำเงิน">น้ำเงิน</option>
                                    <option value="ขาว">ขาว</option>
                                    <option value="เขียว">เขียว</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>ประเภท</label>
                                <input class="form-control" placeholder="ประเภท" name="type" type="text" value="{{ isset($product->type) ? $product->type: '' }}" required>
                            </div>
                            <div class="form-group">
                                <label>รูปภาพ</label>
                                <input class="form-control" placeholder="รูปภาพ" name="image" value="{{ isset($product->image) ? $product->image: '' }}" type="text">
                            </div>
                            <div class="form-group float-right">
                                <a href="{{ route('products.index') }}" class="btn btn-danger">ยกเลิก</a>
                                <button class="btn btn-success" type="submit">ยืนยัน</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
