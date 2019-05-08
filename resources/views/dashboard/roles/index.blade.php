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
                        <h2 class="pageheader-title">Roles</h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('roles') }}" class="breadcrumb-link">Roles</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">All Roles</li>
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
                        <h5 class="card-header">Roles</h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered first">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Role</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($roles as $role)
                                        <tr>
                                            <td>{{$role->id}}</td>
                                            <td>{{$role->role}}</td>
                                            <td>
                                                <a href="{{route('edit_role', ['id' => $role->id])}}" class="btn btn-outline-primary btn-sm" name="edit">Edit</a>
                                                <form action="{{route('delete_role', [$role->id])}}" method="POST" style="display: inline-block">
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
                @if(isset($role_edit))
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Edit Role</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form action="{{route('update_role', ['id' => $role_edit->id])}}" method="post">
                                        <input type="hidden" name="_method" value="PUT">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="role" class="col-form-label">Role</label>
                                            <input id="role" type="text" value="{{$role_edit->role}}" class="form-control" name="role">
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
                            <h5 class="card-header">Add Role</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form action="{{route('create_role')}}" method="post">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label for="role" class="col-form-label">Role</label>
                                            <input id="role" type="text" class="form-control" name="role">
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