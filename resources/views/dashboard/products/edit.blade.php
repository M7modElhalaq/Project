@extends('dashboard.layouts.app')

@section('wrapper')
    <div class="dashboard-wrapper">
        <div class="container-fluid dashboard-content">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header" id="top">
                                <h2 class="pageheader-title">Add Product </h2>
                                <p class="pageheader-text">Add new Product.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="{{ route('products') }}" class="breadcrumb-link">Product</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <!-- basic form  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            @include('dashboard.include.messages')
                            <div class="card">
                                <h5 class="card-header">Edit Product <a href="{{route('products')}}" class="btn btn-dark float-right" name="delete">Back</a></h5>
                                <div class="card-body">
                                    <form action="{{route('update_product', ['id' => $product->id])}}" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="_method" value="PUT">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label for="ProductName" class="col-form-label">Product Name</label>
                                            <input id="name" type="text" placeholder="Product Name" value="{{$product->name}}" class="form-control" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Product Image</label>
                                            <input id="image" type="file" name="image" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="ShortDescription">Short Description</label>
                                            <textarea name="short_description" id="short_description" rows="5" class="form-control">{{$product->short_description}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="Availability">Availability</label>
                                            <select class="form-control" id="input-select" name="availability">
                                                <option value="" selected>Select Or Not</option>
                                                <option value="SALE!"
                                                    @if($product->availabillty == 'SALE!')
                                                        selected
                                                    @endif
                                                >SALE!</option>
                                                <option value="Sold Out!"
                                                    @if($product->availabillty == 'Sold Out!')
                                                        selected
                                                    @endif
                                                >Sold Out!</option>
                                                <option value="HOT!"
                                                    @if($product->availabillty == 'HOT!')
                                                        selected
                                                    @endif
                                                >HOT!</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="ProductQuantity" class="col-form-label">Quantity</label>
                                            <input id="ProductQuantity" type="number" placeholder="Product Quantity" value="{{$product->quantity}}" class="form-control" name="quantity">
                                        </div>
                                        <div class="form-group">
                                            <label for="ProductPrice" class="col-form-label">Product Price</label>
                                            <input id="ProductPrice" type="number" placeholder="Product Price" value="{{$product->price}}" class="form-control" name="price">
                                        </div>
                                        <div class="form-group">
                                            <label for="ProductDiscount" class="col-form-label">Product Discount</label>
                                            <input id="ProductDiscount" type="number" placeholder="Product Discount" value="{{$product->discount}}" class="form-control" name="discount">
                                        </div>
                                        <div class="form-group">
                                            <label for="Category">Category</label>
                                            <select class="form-control" id="input-select" name="category">
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}"
                                                        @if($category->id == $product->category_id)
                                                            selected
                                                        @endif
                                                    >{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="SubCategory">Sub Category</label>
                                            <select class="form-control" id="input-select" name="sub_category">
                                                <option value="" selected>Select Or Not</option>
                                                @foreach($sub_categories as $category)
                                                    <option value="{{$category->id}}"
                                                        @if($category->id == $product->sub_category_id)
                                                            selected
                                                        @endif
                                                    >{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="Description">Description</label>
                                            <textarea name="description" id="mytextarea" rows="10" class="form-control">{{$product->description}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-lg">Edit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end basic form  -->
                    <!-- ============================================================== -->
                    <!-- end switch component -->
                    <!-- ============================================================== -->
                </div>
            </div>
        </div>
    </div>
@endsection