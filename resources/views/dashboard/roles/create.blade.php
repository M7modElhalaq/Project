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
                                    <h2 class="pageheader-title">Add Rule </h2>
                                    <p class="pageheader-text">Add new rule.</p>
                                    <div class="page-breadcrumb">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="breadcrumb-link">Dashboard</a></li>
                                                <li class="breadcrumb-item"><a href="{{ route('roles') }}" class="breadcrumb-link">Roles</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Add Role</li>
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
                                <div class="card">
                                    <h5 class="card-header">Add Role</h5>
                                    <div class="card-body">
                                        <form>
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
                        <!-- ============================================================== -->
                        <!-- end basic form  -->
                        <!-- ============================================================== -->
                        <!-- end switch component -->
                        <!-- ============================================================== -->
                    </div>
                </div>
            </div>
        </div>
    @endsection</h1>