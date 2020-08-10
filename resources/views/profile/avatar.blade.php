@extends('master')

@section('content')
<!-- Dropdown Card Example -->
{{--<div class="shadow mb-4 container col-md-10 col-md-offset-1">--}}
    <!-- Card Header - Dropdown -->
{{--    <div class="card-header py-5 d-flex flex-row align-items-center justify-content-between">--}}
{{--        <h6 class="m-0 font-weight-bold text-primary">Profile Photo</h6>--}}
{{--    </div>--}}
{{--    <!-- Card Body -->--}}
{{--    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">--}}
{{--        <form method="post" action="#" class="uploader" enctype="multipart/form-data">--}}
{{--            @csrf--}}
{{--            <p>Custom file:</p>--}}
{{--            <div class="custom-file mb-3">--}}
{{--                <input type="file" class="custom-file-input" id="img" name="img">--}}
{{--                <label class="custom-file-label" for="img">Choose file</label>--}}
{{--            </div>--}}
{{--            <div class="mt-3">--}}
{{--                <button type="submit" class="btn btn-primary">Submit</button>--}}
{{--            </div>--}}
{{--            @error('name')--}}
{{--            <div class="alert alert-danger">{{ $message }}</div>--}}
{{--            @enderror--}}
{{--            <input type="hidden" name="id" value="{{Auth::user()->id}}">--}}
{{--        </form>--}}
{{--        <div class="card-body d-flex flex-row-reverse">--}}
{{--            <div class="pr-5">--}}
{{--                <img src="#"  class="rounded mx-auto d-block" style="width: 200px; height: 266px">--}}
{{--                <img src="<?php $url = Storage::url($user->img); echo asset("$url")?>" class="rounded mx-auto d-block" style="width: 200px; height: 266px">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


@endsection
