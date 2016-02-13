@extends('layouts.master')

@section('content')

<script src="http://maps.googleapis.com/maps/api/js"></script>

{{HTML::script('js/re.js')}}

<div class="container">
	<div class="col-md-5 col-md-offset-2">
		@if(Session::has('message'))
			<p class="alert alert-success">{{Session::get('message')}}</p>
		@endif
	</div>
</div>

<div class="container">
	   <div class="col-md-5 col-md-offset-2">
			<div class="well">
				<legend>Enquire</legend>
				{{Form::open(array('url'=>'/contacts/sendmsg'))}}
					@if(Session::has('error'))
						<ul style="color:red">
							@foreach($errors->all() as $error)
								<li >{{ $error }}</li>
							@endforeach
						</ul>
					@endif
					<br>
				{{Form::text('email_id','',array('placeholder'=>'Email-id','class'=>'form-control'))}} <br>
				{{Form::text('subject','',array('placeholder'=>'Subject','class'=>'form-control'))}} <br>

				{{Form::textarea('enquiry_msg','',array('placeholder'=>'Type in message','class'=>'form-control'))}} <br>
				{{Form::submit('Send',array('class'=>'btn btn-success'))}}
				{{Form::close()}}
			</div>
		</div>

		<div class="col-md-3 ">
			<p>
				<h5><strong>Address:</strong></h5>
				<p>
					<i>
					404/339, Begur Road, 9, Bommanahalli, Bommanahalli, Bengaluru, Karnataka 
					PinCode:560068 <br>
					Phone  :080 2573 0948
					</i>
				</p>
			</p>
		</div>

		<!--maps-->
		<div class="col-md-3">
			<div id="googleMap" style="height:370px"></div>
		</div>
	
</div>




@endsection