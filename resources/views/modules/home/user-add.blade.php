@extends('layouts.home')

@section('title' , 'Add User')

@section('dashboard_title' , 'User Management')

@section('home_content')
    
    @if (Session::has('message'))
       <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

	<div class="row">
		<div class="col-lg-12">
            {{ Form::open(array('method' => 'post' , 'route' => 'route.user.add')) }}
    			<div class="form-group">
                    <label>Email</label>
                    <input class="form-control" name="email" value="" placeholder="Email">
                </div>
                <div class="form-group">
                    <label>First Name</label>
                    <input class="form-control" name="first_name" value="" placeholder="First Name">
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input class="form-control" name="last_name" value="" placeholder="Last Name">
                </div>
              
                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" type="password" value="" name="password" placeholder="Password">
                </div>
             
                <div class="form-group">
                    <label>Phonenumber</label>
                    <input class="form-control" type="text" value="" name="phonenumber" placeholder="Phonenumber">
                </div>

                <button type="submit" name="add_user" class="btn btn-default">Add User</button>
		  {{ Form::close() }}
        </div>
	</div>

@stop

