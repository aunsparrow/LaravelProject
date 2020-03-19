@extends('layouts.main')
@section('heading','หน้าแรก')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card animated fadeInUp">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-10 col-12">
                            <b>สินค้าทั้งหมด</b>
                        </div>
                        <div class="col-lg-2 col-12" align="right">
                            <a href="{{ route('products.create') }}" class="btn btn-success"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table w-100" id="dataTable1">
                        <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>รูป</th>
                            <th>ชื่อ</th>
                            <th>สี</th>
                            <th>ราคา</th>
                            <th>การจัดการ</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $index=>$product)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>
                                    <img src="{{ asset($product->image) }}" width="200px">
                                </td>
                                <td>{{ $product->productName }}</td>
                                <td>{{ $product->color }}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <a href="{{ route('products.edit',['id' => $product->id]) }}" class="btn btn-primary w-100">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <form method="post" action="{{ route('products.destroy',['id' => $product->id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger w-100">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
