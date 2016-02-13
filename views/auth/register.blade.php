@extends('layouts.master',['title'=>$title])
	
@section('content')
	{{HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js')}}
	{{HTML::script('js/pass.js')}}
  	
	<div class="container">
		<div class="row">
			
			<div class="col-md-6 col-md-offset-3">
					<div class="well">
						<legend>REGISTRATION</legend>
						{{ Form::open(array('url'=>'users/create', 'class'=>'form-signup'))}}

						<ul>
							@foreach($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
										
						{{ Form::text('firstname','',array('placeholder'=>'First Name','class'=>'form-control',Input::old('firstname')))}} <br>
						{{ Form::text('lastname','',array('placeholder'=>'Last Name','class'=>'form-control',Input::old('lastname')))}} <br>
						{{ Form::text('email_id','',array('placeholder'=>'Email-Id','class'=>'form-control',Input::old('email_id')))}} <br>
						{{ Form::password('password',array('placeholder'=>'Password','class'=>'form-control','id'=>'password'))}} <br>
						{{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Confirm Password')) }} <br>
						<div class="row-fluid">
							<p>Password Strength :<b><i>
								<span id="result"></span></i></b> </p>
									<span id="captcha">
										<img src="Captcha.php"  width="100px" height="50px">&nbsp;<span>
										<input type="text" name="captcha" id="captcha" />&nbsp;<a class=" glyphicon glyphicon-refresh"></a>
									</span>
								</span>
						</div><br>
						{{ Form::submit('Sign-Up',array('class'=>'btn btn-success'))}}
						&nbsp;&nbsp;{{ HTML::link('/welcome','Cancel',array('class'=>'btn btn-danger')) }}
						{{ Form::close() }}

					</div>			
			</div>
		</div>

	</div>

@endsection