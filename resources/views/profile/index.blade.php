@extends('master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10">
                    <h1 class="h3 mb-0 text-gray-800 text-capitalize">Welcome {{$user->name}}</h1>
                </div>
                <div>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4 ml-5">
                        <a href="{{url('profile/edit',['id'=> $user->id])}}" class = "btn btn-primary p-2 m-2">Edit Profile</a>
                    </div>
                </div>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if ($message = Session::get('attention'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if ($message = Session::get('Event'))
                <div class="alert alert-primary alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
        </div><!-- /.container-fluid -->
    </section>



    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">

                    <!-- Default Card Example -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h6 class="m-0 font-weight-bold text-primary">
                                FullName:
                            </h6>
                        </div>
                        <div class="card-body text-capitalize" >
                            id: {{$user->id}} <br>
                            Name: {{$user->name}}<br>
                            Family: {{$user->family}}<br>
                            Email: {{$user->email}}
                        </div>
                    </div>

                    <!-- Basic Card Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Contact Info</h6>
                        </div>
                        <div class="card-body text-capitalize">
                            Email: {{$user->email}}<br>
                            MobilePhone: {{$user->phone}}<br>
                            office Phone: {{$user->office_tel}}<br>
                        </div>
                    </div>

                    <!-- Collapsable Card Example -->
                    <div class="card shadow mb-4 ">
                        <!-- Card Header - Accordion -->
                        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">
                            <h6 class="m-0 font-weight-bold text-primary">Task Calender</h6>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse show" id="collapseCardExample">
                            <div class="card card-body">
                                <form method="post" action="#" id="Events">
                                    @csrf
                                    <input type="datetime-local" name="date" required>
                                    <label for="title" >Title</label>
                                    <input type="text" id="title" name="title" required>
                                    <label for="event">Event</label>
                                </form>
                                <textarea rows="4" cols="50" name="comment" form="Events"></textarea>
                                <input class="w-25 btn btn-primary p-2 m-2" type="submit" form="Events" required>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="card shadow mb-4 col-lg-3" style="height: 368px">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Profile Photo</h6>
                        <div class="dropdown no-arrow ml-5">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Photo Setting:</div>
                                <a class="dropdown-item" href="#">Change your photo</a>
                                <a class="dropdown-item" href="#">Delete</a>

                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <img src="{{asset("portal/dist/img/avatar3.png")}}" alt="profil image" class="rounded mx-auto d-block" style="width: 200px; height: 266px">
                        {{--                                    <img src="<?php $url = Storage::url(\Illuminate\Support\Facades\Auth::user()->img); echo asset("$url")?>" class="rounded mx-auto d-block" style="width: 200px; height: 266px">--}}
                    </div>
                </div>
                <!-- /.col -->
            </div>
        </div></section>
</div>
@endsection
