@extends('admin.layouts.template')
@section('page_title')
allcategory
@endsection
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Category</h4>
<div class="card">
    <h5 class="card-header">All Category</h5>
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
            <th>Category Name</th>
            <th>Sub Category</th>
            <th>Product</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach($categories as $category)
               <tr>
                <td> {{ $category->id }}</td>
               <td>{{ $category->category_name }}</td>
               <td>{{ $category->subcategory_count }}</td>
               <td>{{ $category->product_count }}</td>
               <td>
                <a href="{{ route('editcategory',$category->id) }}"class="btn btn-warning">Edit</a>
                <a href="{{ route('deletecategory',$category->id) }}"class="btn btn-info">Delete</a>
               </td>
               </tr>
               @endforeach

    </div>
  </div>
</div>


@endsection
