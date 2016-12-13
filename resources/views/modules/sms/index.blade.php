@extends('layouts.home')

@section('title' , 'SMS')

@section('dashboard_title' , 'SMS')

@section('home_content')

	@if (Session::has('message'))
       <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif


	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
                        <div class="panel-heading">
                            Phonebook
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
                                        			<td><a href="#">Message</a></td>
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

