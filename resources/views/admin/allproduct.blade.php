@extends('admin.layouts.template')
@section('page_title')
Dashboard-allproduct
@endsection
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Product Information</h4>
<div class="card">
    <h5 class="card-header">All Product Information</h5>
    @if(session()->has('message'))
    <div class='alert alert-success'>
        {{ session()->get('message') }}
    </div>
    @endif
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead class="table-light">
          <tr>
            <th>Id</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>IMG</th>

            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach($product as $product)
               <tr>
                <td> {{ $product->id }}</td>
               <td>{{ $product->product_name }}</td>
               <td>{{ $product->price }}</td>
               <td><img style="height:100px"src="{{asset($product->product_img) }}" alt="">
            <br>
            <a href="{{route('editproductimg',$product->id)  }}" class="btn btn-primary">update image</a>
        </td>
               <td>
                <a href="{{ route('editproduct',$product->id) }}"class="btn btn-warning">Edit</a>
                <a href="{{ route('deleteproduct',$product->id) }}"class="btn btn-info">Delete</a>
               </td>
               </tr>
               @endforeach
    </div>
  </div>
</div>







@endsection
