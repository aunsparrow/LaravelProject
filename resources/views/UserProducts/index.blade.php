@extends('layouts.main')
@section('heading','รายการสินค้า')
@section('content')
<div class="row">

@foreach($products as $index=>$product)
<div class="col-md-4" style="margin-top:15px">
    <div class="row justify-content-center">
    <div class="col-md-12">
    <div class="card">
    <img class="card-img-top" src="{{ asset($product->image) }}" alt="Card image cap">
    <div class="card-body">
    <h5 class="card-title">{{ $product->productName }}</h5>
    <p class="card-text">{{$product->color}}</p>    
    <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
    </div>
        </div>
    </div>
    <!-- <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div> -->
    </div>
    @endforeach
    </div>
@endsection
