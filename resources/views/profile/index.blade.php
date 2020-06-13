@extends('master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10">
                    <h1 class="h3 mb-0 text-gray-800 text-capitalize">Welcome {{Auth::user()->name}}</h1>
                </div>
                <div>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4 ml-5">
                        <a href="{{route('profile.edit')}}" class = "btn btn-primary p-2 m-2">Edit Profile</a>
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
                            id: {{Auth::user()->id}} <br>
                            Name: {{Auth::user()->name}}<br>
                            Family: {{Auth::user()->family}}<br>
                            Email: {{Auth::user()->email}}
                        </div>
                    </div>

                    <!-- Basic Card Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Contact Info</h6>
                        </div>
                        <div class="card-body text-capitalize">
                            Email: {{Auth::user()->email}}<br>
                            MobilePhone: {{Auth::user()->phone}}<br>
                            office Phone: {{Auth::user()->office_tel}}<br>
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
                                <button class = "btn btn-primary" style="cursor: pointer ; color: white" data-id="{{ Auth::user()->id }}" onclick="openImageUpdateModal(this)" id="btn_img">Change your photo</button>
                                <button class="dropdown-item" href="#">Delete</button>

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

<!-- Update Profile Image-->
<div class="modal fade" id="UpdateProfileImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Profile Image</h5>
            </div>
            <p id="up-message" class="text-dark"></p>
            <div class="modal-body">
                <p class="alert-danger" id="blank_UP_message"></p>
                <p class="alert-success" id="done_UP_message"></p>
                <form id="user-update-img">
                    <label class="custom-file-label mt-3 ml-2 mr-2">Profile Image Address</label>
                    <input type="file" class="form-control custom-file-input" placeholder="" id="up_image">
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" type="submit" id="btn_updateImg" onclick="updateImg(this)">Update</button>
            </div>



        </div>
    </div>
</div>
@endsection