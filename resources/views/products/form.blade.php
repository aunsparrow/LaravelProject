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
                        <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>ชื่อ</label>
                                <input class="form-control" placeholder="ชื่อสินค้า" name="name" type="text" required>
                            </div>
                            <div class="form-group">
                                <label>รายละเอียด</label>
                                <input class="form-control" placeholder="รายละเอียด" name="detail" type="text" required>
                            </div>
                            <div class="form-group">
                                <label>ราคา</label>
                                <input class="form-control" placeholder="ราคา" name="price" type="number" required>
                            </div>
                            <div class="form-group">
                                <label>จำนวน</label>
                                <input class="form-control" placeholder="จำนวน" name="quantity" type="number" required>
                            </div>
                            <div class="form-group">
                                <label>สี</label>
                                <select class="form-control" name="color">
                                    <option value="ดำ">ดำ</option>
                                    <option value="แดง">แดง</option>
                                    <option value="น้ำเงิน">น้ำเงิน</option>
                                    <option value="ขาว">ขาว</option>
                                    <option value="เขียว">เขียว</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>ประเภท</label>
                                <input class="form-control" placeholder="ประเภท" name="productType" type="text" required>
                            </div>
                            <div class="form-group">
                                <p>รูปภาพ</p>
                                <input placeholder="รูปภาพ" name="image" type="file">
                            </div>
                            
                            <div class="form-group float-right">
                                <a href="{{ route('products.index') }}" class="btn btn-danger">ยกเลิก</a>
                                <button class="btn btn-success" type="submit">ยืนยัน</button>
                            </div>
                            <input class="form-control" type="hidden" name="created_by" value="{{ isset(auth()->user()->id) ? auth()->user()->id : 0 }}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
