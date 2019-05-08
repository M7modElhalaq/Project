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
                                <h2 class="pageheader-title">Add Member </h2>
                                <p class="pageheader-text">Add new member.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="{{ route('users') }}" class="breadcrumb-link">Members</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Add Member</li>
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
                                <h5 class="card-header">Add User <a href="{{route('users')}}" class="btn btn-dark float-right" name="delete">Back</a></h5>
                                <div class="card-body">
                                    <form action="{{route('create_user')}}" method="post">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label for="username" class="col-form-label">Username</label>
                                            <input id="username" type="text" class="form-control" name="username">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail">Email address</label>
                                            <input id="inputEmail" type="email" placeholder="Your Email" name="email" class="form-control">
                                            <p>We'll never share your email with anyone else.</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword">Password</label>
                                            <input id="inputPassword" type="password" placeholder="Password" name="password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="Gender">Gender</label>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" name="gender" value="male" checked="" class="custom-control-input"><span class="custom-control-label">Male</span>
                                            </label>
                                            <label class="custom-control custom-radio">
                                                <input type="radio" name="gender" value="female" class="custom-control-input"><span class="custom-control-label">Female</span>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="Role">Role</label>
                                            <select class="form-control" id="input-select" name="role">
                                                <option value="1">Admin</option>
                                                <option value="2">Subscriber</option>
                                                <option value="3">User</option>
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