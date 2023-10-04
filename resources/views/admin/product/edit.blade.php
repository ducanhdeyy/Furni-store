@extends('admin.layout.main')
@section('header')
    <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('template/admin/product/add/add.css')}}">
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
@endsection
@section('content')
    <form action="{{route($model.'.update', $product->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row mt-4">
            <div class="col-lg-7">
                <div class="position-relative row form-group">
                    <label for="image" class="col-md-3 text-md-right col-form-label">Image</label>
                    <div class="col-md-9 col-xl-8">
                        <img style="height: 200px; cursor: pointer;" class="thumbnail" data-toggle="tooltip"
                             title="" data-placement="bottom" src="{{asset($product->path_image)}}"
                             alt="Avatar" data-original-title="Click to change the image">
                        <input name="path_image" type="file" onchange="changeImg(this)" class="image form-control-file"
                               style="display: none;" value="">
                        <small class="form-text text-muted">
                            Click on the image to change (required)
                        </small>
                    </div>
                </div>

                <div class="position-relative row form-group">
                    <label for="title" class="col-md-3 text-md-right col-form-label">Title</label>
                    <div class="col-md-9 col-xl-8">
                        <textarea name="title" id="title" class="form-control">{{$product->title}}</textarea>
                    </div>
                </div>

                <div class="position-relative row form-group">
                    <label for="description" class="col-md-3 text-md-right col-form-label">Description</label>
                    <div class="col-md-9 col-xl-8">
                        <textarea name="description" id="description" class="form-control">{{$product->description}}</textarea>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="position-relative row form-group">
                    <label for="name" class="col-md-3 text-md-right col-form-label">Name</label>
                    <div class="col-md-9 col-xl-8">
                        <input required="" name="name" id="name" placeholder="Name" type="text" class="form-control" value="{{$product->name}}">
                    </div>
                </div>
                <div class="position-relative row form-group">
                    <label for="image_detail" class="col-md-3 text-md-right col-form-label">Detail Image</label>
                    <div class="col-md-9 col-xl-8">
                        <input type="file" multiple  name="image_detail[]" class="form-control" id="image_detail" >
                        @foreach($product->productImages as $image)
                            <img src="{{asset($image->path_image) }}" width="100" alt="">
                        @endforeach
                    </div>
                </div>
                <div class="position-relative row form-group">
                    <label for="price" class="col-md-3 text-md-right col-form-label">Price</label>
                    <div class="col-md-9 col-xl-8">
                        <input required="" name="price" id="price" placeholder="Price" type="text" class="form-control"
                               value="{{$product->price}}">
                    </div>
                </div>

                <div class="position-relative row form-group">
                    <label for="sale_price" class="col-md-3 text-md-right col-form-label">Sale Price</label>
                    <div class="col-md-9 col-xl-8">
                        <input name="sale_price" id="sale_price" placeholder="sale price" type="text" class="form-control"
                               value="{{$product->sale_price}}">
                    </div>
                </div>

                <div class="position-relative row form-group">
                    <label for="amount" class="col-md-3 text-md-right col-form-label">Amount</label>
                    <div class="col-md-9 col-xl-8">
                        <input name="amount" id="amount" placeholder="amount"
                               type="text" class="form-control" value="{{$product->amount}}">
                    </div>
                </div>

                <div class="position-relative row form-group">
                    <label for="category_id" class="col-md-3 text-md-right col-form-label">Category</label>
                    <div class="col-md-9 col-xl-8">
                        <select name="category_id" id="category_id" class="form-control">
                            {!! $categories !!}
                        </select>
                    </div>
                </div>
                <div class="position-relative row form-group mb-1">
                    <div class="col-md-9 col-xl-8 offset-md-2">
                        <a href="{{route($model.'.index')}}" class="border-0 btn btn-outline-danger mr-1">
                                                    <span class="btn-icon-wrapper pr-1 opacity-8">
                                                        <i class="fa fa-times fa-w-20"></i>
                                                    </span>
                            <span>Cancel</span>
                        </a>

                        @can($model.'.update')
                            <button type="submit" class="btn-shadow btn-hover-shine btn btn-primary">
                                                    <span class="btn-icon-wrapper pr-2 opacity-8">
                                                        <i class="fa fa-download fa-w-20"></i>
                                                    </span>
                                <span>Save</span>
                            </button>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('footer')
    <script src="{{asset('vendors/select2/select2.min.js')}}"></script>
    <script src="{{asset('template/admin/product/add/add.js')}}"></script>
@endsection
