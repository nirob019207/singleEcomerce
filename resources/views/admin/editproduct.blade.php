@extends('admin.layouts.template')
@section('page_title')
addproduct
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Edit product</h4>

    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Edit Product</h5>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
          </div>
          <div class="card-body">
            <form action="{{ route('update.product') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $productinfo->id }}" name="id">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="product_name" id="product_name"  value="{{ $productinfo->product_name }}"/>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Product Price</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="price" id="price" placeholder="add price"value="{{ $productinfo->price }}" />
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Product Short Description</label>
                    <div class="col-sm-10">
                      <textarea name="product_short_des" id="" cols="60" rows="5"value="">{{ $productinfo->product_short_des }}</textarea>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Product Long Description</label>
                    <div class="col-sm-10">
                      <textarea name="product_long_des" id="" cols="60" rows="5"value="">{{ $productinfo->product_long_des}}</textarea>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Product Quantity</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="product_quantity" id="product_quantity" value="{{ $productinfo->product_quantity }}" />
                    </div>
                  </div>




              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Update Product</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

</div>



@endsection
