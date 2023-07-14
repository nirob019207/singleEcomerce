@extends('admin.layouts.template')
@section('page_title')
Edit product img
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Edit product img</h4>

    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Edit product img</h5>
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
            <form action="{{ route('update.productimg') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $productinfo->id }}" name="id">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Privious Image</label>
                    <div class="col-sm-10">
                   <img style="height:100px" src="{{ asset($productinfo->product_img) }}" alt="">
                    </div>
                  </div>


              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Upload Product new Image</label>
                <div class="col-sm-10">
                    <input class="form-control"name="product_img" type="file" id="formFile" />
                </div>
              </div>

              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Update Product Image</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

</div>



@endsection
