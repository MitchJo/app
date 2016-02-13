@extends('layouts.master')

 <style>
    #banner{
       background-image: url("img/banner.jpg");
       min-height: 450px;
       margin-top:-20px;
       background-size: cover;
      
       background-attachment: fixed;
       background-repeat: no-repeat;
    }
    #banner-text{
      padding:50px;
    }
  </style>
@section('content')
      
  <div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron" id="banner">
        <div class="text-center" id="banner-text">
          <a href="/welcome"><img src="img/logo256.png" alt="Logo" href="/"><a><br /> <br/> <br />
          <a href="#" style="border:solid 2px black; padding:15px; color:black;">KNOW MORE</a>
        </div>  
  </div>

</div>
	<div class="container"> 
        <div class="">
        <div class = "col-md-3 ">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3>Basic</h3>
              </div>  
              <div class="panel-body">
                <img src="img/ffd.jpg">
                <p>
                    The basic plan is the most economical plan to get your board assembled.
                </p>    
              </div>
              <div class="panel-footer">
                <a class ="btn btn-primary">Order Now</a>
              </div>
            </div>
        </div> 
    
    
        <div class = "col-md-4 col-md-offset-1">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3>Basic</h3>
              </div>  
              <div class="panel-body">
                <!--add image later-->
                <img src="img/ffd.jpg">
                <p>
                    The basic plan is the most economical plan to get your board assembled.
                </p>    
              </div>
              <div class="panel-footer">
                <a class ="btn btn-primary">Order Now</a>
              </div>
            </div>
        </div>
    
    
        <div class = "col-md-3 col-md-offset-1">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3>Basic</h3>
              </div>  
              <div class="panel-body">
                <!--add image later-->
                <img src="img/ffd.jpg">
                <p>
                    The basic plan is the most economical plan to get your board assembled.
                </p>    
              </div>
              <div class="panel-footer">
                <a class ="btn btn-primary">Order Now</a>
              </div>
            </div>
        </div> 
     </div>
   </div>
@endsection