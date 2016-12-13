@extends('layouts.home')

@section('dashboard_title' , 'User Management')

@section('home_content')

	<div class="row">
		<div class="col-lg-12">
			<a href="{{ route('route.user.addview') }}" class="btn btn-default">Add User</a>
		</div>
	</div>
	<br />
	@if (Session::has('message'))
       <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif


	<div class="row">
		<div class="col-lg-12">
					<div class="panel panel-default">
                        <div class="panel-heading">
                            User Lists
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Number</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($users) > 0)
                                        	@php
												$i = 1
											@endphp
                                        	@foreach($users as $user)
                                        		<tr>
                                        			<td>{{ $i++ }}</td>
                                        			<td>{{ $user->first_name }}</td>
                                        			<td>{{ $user->last_name }}</td>
                                        			<td>{{ $user->email }}</td>
                                        			<td>{{ $user->phonenumber }}</td>
                                        			<td><a href="{{ route('route.user.delete' , ['id' => $user->id]) }}">Delete</a> | <a href="{{ route('route.user.update' , ['id' => $user->id]) }}">Update</a></td>
                                        		</tr>
                                        	@endforeach
                                        @else
                                        	<tr>
                                        		<td colspan="5">
                                        			No Users
                                        		</td>
                                        	</tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
		</div>
	</div>

@stop

