@extends('admin.layouts.template')
@section('page_title')
addSubcategory
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Add Sub Category</h4>

    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Add New SubCategory</h5>

          </div>
          <div class="card-body">
            <form action="{{ route('store.subcat') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Sub Category Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="subcategory_name" id="subcategory_name" placeholder="add category" />
                    </div>
                  </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Select Category</label>
                <div class="col-sm-10">
                    <select name="category_id" id="category_id" class="form-select"aria-label="default select example">
                        <option value="">open the select menu</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>

                        @endforeach
                    </select>

                </div>
              </div>

              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Add sub Category</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

</div>


@endsection
