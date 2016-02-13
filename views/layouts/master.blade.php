<!DOCTYPE html>
<html lang="en">
<head>
  <title>{{ $title }}</title>
    <meta charset="UTF-8">
    
    {{ HTML::script('js/jquery.min.js') }}
    <!--{{ HTML::script('js/bootstrap.min.js')}}-->
    {{ HTML::style('css/bootstrap.min.css') }}

    <style>
        #foot{
            background:#000;
            min-height: 30px;
            max-width: 100%;
        }
    </style>

</head>
<body>

        <nav class="navbar navbar-default">
            <div class="container">
               <div class="navbar-header">
                   <!--collapse hamburger-->
                   <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-toggle">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                   </button>
                   
                  <a class="navbar-brand" href="/welcome"><img src="img/logo.png" style="margin-top:-12px;"></a>
                </div>
               
               <div class="collapse navbar-collapse" id="menu-toggle">
                   <ul class="nav navbar-nav">
                       <li><a href="{{ url('/welcome') }}">HOME</a></li>
                   </ul>
                   <ul class="nav navbar-nav navbar-right">
                        
                        <!-- Authentication -->
                        @if (!Auth::check())
                        <li>
                          <a href="/users/register">Sign-up</a></li>
                  <li>     
                    
                  &nbsp;&nbsp;<button type="button" class="btn btn-default navbar-btn" data-container="body" data-toggle="popover" data-placement="bottom">Sign-in</button>
                    
                  </li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->firstname }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('users/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>

                </div>
               
            </div>
        </nav>
        
        <div class="container-fluid">
            @yield('content')
        </div>
            


       <!--footer-->
     <div class="container-fluid" style="background:#f2f2f2;margin-top:30px;">
              <div class="row footer">
                <div class="col-md-12">
                  <ul>
                    <h3><small>Information</small></h3>
                    <li><a href="/contacts/view">Contact</a></li>     
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">About Us</a></li>
                  </ul>
                </div>
              </div>
      </div>

         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
  <!--popover login-->
    
    <div id="popover_content_wrapper" style="display: none">
        {{ Form::open(array('url'=>'users/login','class'=>'form-signin')) }}
            <br />
            {{ Form::text('email_id','',array('placeholder'=>'email-id','class'=>'form-control'),Input::old('email_id')) }} <br />
            {{ Form::password('password',array('placeholder'=>'password','class'=>'form-control')) }} <br />
            <div class="container">
              <div class="row">
                {{ Form::submit('Sign-in',array('class'=>'btn btn-default' )) }} 
                &nbsp;<a href="#"><small>Forgot password ?</small></a>
              </div>
             </div>
        {{ Form::close() }}
    </div>


    <script>
      $('button[data-toggle=popover]').popover({ 
          html : true,
          //trigger: "click",
          content: function() {
          return $('#popover_content_wrapper').html();
          }
      });
    </script>
        
 </body>
</html>