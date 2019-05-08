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
                        <h2 class="pageheader-title">Sub Categories</h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('categories') }}" class="breadcrumb-link">Categories</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">All Sub Categories</li>
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
                        <h5 class="card-header">Sub Categories</h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="{{route('select_sub_category')}}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <select class="form-control" id="input-select" name="main" style="width: 80%; display: inline-block;">
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn btn-success" style="border-radius: 15px;">Select</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered first">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Main Category</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(!$sub_categories->isEmpty())
                                        @foreach($sub_categories as $category)
                                            <tr>
                                                <td>{{$category->id}}</td>
                                                <td>{{$category->name}}</td>
                                                <td>{{$category->category->name}}</td>
                                                <td>
                                                    <a href="{{route('edit_sub_category', ['id' => $category->id])}}" class="btn btn-outline-primary btn-sm" name="edit">Edit</a>
                                                    <form action="{{route('delete_sub_category', [$category->id])}}" method="POST" style="display: inline-block">
                                                        {{method_field('DELETE')}}
                                                        {{csrf_field()}}
                                                        <input type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');" value="Delete"/>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4"><p>There is no Items.</p></td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @if(isset($category_edit))
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Edit Sub Category</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form action="{{route('update_sub_category', ['id' => $category_edit->id])}}" method="post">
                                        <input type="hidden" name="_method" value="PUT">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="category" class="col-form-label">Name</label>
                                            <input id="category" type="text" value="{{$category_edit->name}}" class="form-control" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="category" class="col-form-label">Main Category</label>
                                            <select class="form-control" id="input-select" name="main">
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}"
                                                        @if($category->id === $category_edit->id)
                                                            selected
                                                        @endif
                                                    >{{$category->name}}</option>
                                                @endforeach
                                            </select>
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
                                    <form action="{{route('create_sub_category')}}" method="post">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label for="category" class="col-form-label">Category</label>
                                            <input id="category" type="text" class="form-control" name="sub">
                                        </div>
                                        <div class="form-group">
                                            <label for="category" class="col-form-label">Main Category</label>
                                            <select class="form-control" id="input-select" name="main">
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
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