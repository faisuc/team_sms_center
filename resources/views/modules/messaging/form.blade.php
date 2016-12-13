@extends('layouts.home')

@section('title' , 'Message User: ' . $user->first_name . ' ' . $user->last_name)

@section('dashboard_title' , 'SMS ' . $user->first_name . ' ' . $user->last_name . ' Phonenumber: ' . $user->phonenumber)

@section('home_content')
    
    @if (Session::has('message'))
       <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

	<div class="row">
		<div class="col-lg-12">
            {{ Form::open(array('method' => 'post' , 'url' => route('route.sms.send') )) }}
    			            
                <div class="form-group" style="display: none;">
                    <label>Phonenumber</label>
                    <input class="form-control" type="hidden" value="{{ $user->phonenumber }}" name="phonenumber" placeholder="Phonenumber">
                </div>

                <div class="form-group">
                    <label>Message</label>
                    <textarea class="form-control" name="message" placeholder="Message"></textarea>
                </div>

                <button type="submit" name="update_user" class="btn btn-default">Send Message</button>
		  {{ Form::close() }}
        </div>
	</div>

@stop

