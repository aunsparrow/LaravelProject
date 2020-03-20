@extends('layouts.main')
@section('heading','สั่งซื้อสินค้า')
@section('content')
<div class="row">
<form method="post" action="{{ route('UserProducts.store') }}" enctype="multipart/form-data">
@csrf
@method('PUT')
<h1>{{ isset($products->productName) ? $products->productName: '' }}</h1>
<h1>{{ isset($products->price) ? $products->price: '' }}</h1>
<h1>{{ isset($products->quantity) ? $products->quantity: '' }}</h1>
<h1>{{ isset($products->prodectDetail) ? $products->prodectDetail: '' }}</h1>
<input class="form-control"name="productId" value="isset($products->id) ? $products->id: '' }}" type="hidden">
<!--<input class="form-control"name="quantity" value="isset($products->quantity) ? $products->quantity: 0 }}" type="hidden">-->
<input type="number" id="quantity" name="quantity" min="0" max="{{ isset($products->quantity) ? $products->quantity: '' }}"required>
<input class="form-control"name="totalPrice" value="{{isset($products->price) ? $products->price: '' }}" type="hidden">
<br>
<label>อีเมล</label>
<input class="form-control"name="email" value type="text" required>
<button class="btn btn-success" type="submit">ยืนยัน</button>
</form>
</div>
@endsection

