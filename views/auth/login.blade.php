@extends('layouts.master')

@section('content')
		<div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog modal-sm">
            <div class="modal-body">
                @if(Session::has('message'))
                  <p class="alert">{{ Session::get('message') }}</p>
                @endif
              </div>
            </div>
    </div>
	<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
		   <div class="well">
			
				<legend>Login</legend>
				
				{{ Form::open(array('url'=>'users/login','class'=>'form-signin')) }}
				
									
					{{ Form::text('email_id','',array('placeholder'=>'Email','class'=>'form-control'),Input::old('email_id')) }} <br />
					{{ Form::password('password',array('placeholder'=>'password','class'=>'form-control')) }} <br />
					
					{{ Form::submit('LOGIN',array('class'=>'btn btn-success' )) }}
					
				{{ Form::close() }}		
			
			</div>	
	   
	    </div>
	  </div>
	</div>
@endsection