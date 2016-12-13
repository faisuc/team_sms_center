@extends('layouts.home')

@section('title' , 'Update User: ' . $user->first_name . ' ' . $user->last_name)

@section('dashboard_title' , 'User Management')

@section('home_content')
    
    @if (Session::has('message'))
       <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

	<div class="row">
		<div class="col-lg-12">
            {{ Form::open(array('method' => 'get' , 'url' => route('route.user.update' , ['id' => $user->id]) )) }}
    			<div class="form-group">
                    <label>Email</label>
                    <input class="form-control" name="email" value="{{ $user->email }}" placeholder="Email">
                </div>
                <div class="form-group">
                    <label>First Name</label>
                    <input class="form-control" name="first_name" value="{{ $user->first_name }}" placeholder="First Name">
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input class="form-control" name="last_name" value="{{ $user->last_name }}" placeholder="Last Name">
                </div>
              
                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" type="password" value="" name="password" placeholder="Password">
                </div>
             
                <div class="form-group">
                    <label>Phonenumber</label>
                    <input class="form-control" type="text" value="{{ $user->phonenumber }}" name="phonenumber" placeholder="Phonenumber">
                </div>

                <button type="submit" name="update_user" class="btn btn-default">Update User</button>
		  {{ Form::close() }}
        </div>
	</div>

@stop

