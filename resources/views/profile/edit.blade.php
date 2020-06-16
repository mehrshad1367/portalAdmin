@extends('master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800 text-capitalize">{{$user->name}}'s page</h1>
            </div>

            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    <form action="{{route('profile.update',['id'=>$user->id])}}" method="post">
                        @csrf
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="" name="name" id="name" class="form-control" required value="{{$user->name}}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="family">Lastname:</label>
                            <input type="text" name="family" id="family" class="form-control" required
                                   value="{{$user->family}}">
                            @error('family')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" name="email" id="email" class="form-control" required value="{{$user->email}}">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

        {{--                @if(!empty($roles))--}}
        {{--                    <div class="form-check form-check-inline">--}}
        {{--                        @foreach($roles as $role)--}}
        {{--                            <div class="form-group p-2 m-3">--}}
        {{--                                <input type="radio" id="role{{$role->id}}" name="role" value="{{$role->id}}">--}}
        {{--                                <label for="role{{$role->id}}"> {{$role->role}}</label>--}}
        {{--                            </div>--}}
        {{--                        @endforeach--}}
        {{--                        @endif--}}
{{--                            </div></br>--}}
                            <input type="hidden" name="id" value="{{$user->name}}">
                            <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>


@endsection

