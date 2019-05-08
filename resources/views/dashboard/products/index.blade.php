@extends('dashboard.layouts.app')

@section('wrapper')
    <div class="dashboard-wrapper">
        <div class="container-fluid  dashboard-content">
            <!-- ============================================================== -->
            <!-- pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Products</h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('products') }}" class="breadcrumb-link">Products</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">All Products</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- ============================================================== -->
                <!-- basic table  -->
                <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Products <a href="{{route('add_product')}}" class="btn btn-success float-right" name="delete">Add Product</a></h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered first text-center">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Discount</th>
                                        <th>Availability</th>
                                        <th>Category</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{$product->id}}</td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->quantity}}</td>
                                            <td>{{$product->price}}$</td>
                                            <td>
                                                @if($product->discount > 0)
                                                    {{$product->discount}}%
                                                @else
                                                    No Discount
                                                @endif
                                            </td>
                                            <td>
                                                @if($product->discount != "")
                                                    {{$product->availability}}
                                                @else
                                                    Not Selected
                                                @endif
                                            </td>
                                            <td>{{$product->category->name}}</td>
                                            <td>
                                                <a href="{{route('edit_product', ['id' => $product->id])}}" class="btn btn-outline-primary btn-sm" name="edit">Edit</a>
                                                <form action="{{route('delete_product', [$product->id])}}" method="POST" style="display: inline-block">
                                                    {{method_field('DELETE')}}
                                                    {{csrf_field()}}
                                                    <input type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');" value="Delete"/>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end data table  -->
                <!-- ============================================================== -->
            </div>
        </div>
    </div>
@endsection