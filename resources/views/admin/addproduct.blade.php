@extends('admin.layouts.template')
@section('page_title')
addproduct
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Add new product</h4>

    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Add New Product</h5>
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
            <form action="{{ route('store.product') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="product_name" id="product_name" placeholder="add Product" />
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Product Price</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="price" id="price" placeholder="add price" />
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Product Short Description</label>
                    <div class="col-sm-10">
                      <textarea name="product_short_des" id="" cols="60" rows="5"></textarea>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Product Long Description</label>
                    <div class="col-sm-10">
                      <textarea name="product_long_des" id="" cols="60" rows="5"></textarea>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Product Quantity</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="product_quantity" id="product_quantity" placeholder="add Product" />
                    </div>
                  </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Select Category</label>
                <div class="col-sm-10">
                    <select name="product_category_id" id="product_category_id" class="form-select"aria-label="default select example">
                        <option value="">open the select menu</option>
                        @foreach($categories as $category)

                          <option value="{{ $category->id }}">{{ $category->category_name }}</option>

                        @endforeach
                    </select>

                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Select Sub Category</label>
                <div class="col-sm-10">
                    <select name="product_subcategory_id" id="product_subcategory_id" class="form-select"aria-label="default select example">
                        <option value="">open the select menu</option>
                        @foreach($subcategories as $subcategory)

                        <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>

                      @endforeach
                    </select>

                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Upload Product Image</label>
                <div class="col-sm-10">
                    <input class="form-control"name="product_img" type="file" id="formFile" />
                </div>
              </div>

              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Add Product</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

</div>



@endsection
