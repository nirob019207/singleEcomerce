@extends('admin.layouts.template')
@section('page_title')
Editcategory
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Edit Category</h4>

    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Edit Category</h5>

          </div>
          <div class="card-body">
            <!-- /resources/views/post/create.blade.php -->



@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Create Post Form -->
            <form action="{{ route('update.category') }}" method="POST">
                @csrf
                <input type="hidden"value={{ $category_info->id }} name="category_id">
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Category Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" value="{{ $category_info->category_name }}" name="category_name" id="category_name" placeholder="add category" />
                </div>
              </div>

              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">update</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

</div>
@endsection
