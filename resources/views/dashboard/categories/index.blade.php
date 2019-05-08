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
                        <h2 class="pageheader-title">Categories</h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('categories') }}" class="breadcrumb-link">Categories</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">All Main Categories</li>
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
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Categories</h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered first">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category</th>
                                        <th>Sub Categories</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{$category->id}}</td>
                                            <td>{{$category->name}}</td>
                                            <td>{{count($category->sub_categories)}}</td>
                                            <td>
                                                <a href="{{route('edit_category', ['id' => $category->id])}}" class="btn btn-outline-primary btn-sm" name="edit">Edit</a>
                                                <form action="{{route('delete_category', [$category->id])}}" method="POST" style="display: inline-block">
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
                @if(isset($category_edit))
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Edit Category</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form action="{{route('update_category', ['id' => $category_edit->id])}}" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="_method" value="PUT">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="category" class="col-form-label">Category</label>
                                            <input id="category" type="text" value="{{$category_edit->name}}" class="form-control" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="Image" class="col-form-label">Category Image</label>
                                            <input id="Image" type="file" class="form-control" name="image">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-lg">Edit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Add Category</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form action="{{route('create_category')}}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label for="category" class="col-form-label">Category</label>
                                            <input id="category" type="text" class="form-control" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="Image" class="col-form-label">Category Image</label>
                                            <input id="Image" type="file" class="form-control" name="image">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-lg">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            <!-- ============================================================== -->
                <!-- end data table  -->
                <!-- ============================================================== -->
            </div>
        </div>
    </div>
@endsection