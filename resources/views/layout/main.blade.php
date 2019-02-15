<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Management</title>
<!--
    <script src="{{asset('assets/jquery-3.3.1.js')}}">
    </script>
    <script src="{{asset('assets/js/bootstrap.bundle.js')}}">
    </script>
    <script src="{{asset('assets/js/bootstrap.bundle.js.map')}}">
    </script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}">
    </script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js.map')}}">
    </script>
    <script src="{{asset('assets/js/bootstrap.js')}}">
    </script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}">
    </script>
    <script src="{{asset('assets/js/bootstrap.min.js.map')}}">
    </script>


    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-grid.css')}}">    
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-grid.css.map')}}">    
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-gird.min.css')}}">    
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-gird.min.css.map')}}">


    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-reboot.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-reboot.css.map')}}">

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-reboot.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-reboot.min.css.map')}}">

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">  
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css.map')}}">

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
     <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css.map')}}">
 -->


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script></head>



<body>

		<!            navigation Bar                >   

	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">

		       <!Navbar Brand>
		<a class="navbar-brand" href="">Inventory</a>

			  <!links>
		<ul class="navbar-nav">

			<li class="nav-item active"><button style="background:none" type="button" id="login" class="nav-link">LogIn</button></li>

			<li class="nav-item active"><button style="background:none" type="button" id="signup" class="nav-link">SignUp</button></li>
			

		</ul>

	</nav>


	<!          Login and signup Form         >

	<div id="user" align = "center" class="container" style="width:50%">



	</div>



</body>


<script type="text/javascript">
	
$(document).ready(function(){

	$("#login").click(function(){

		$.ajax(
		{
				type:'GET',
				url:"/login_form", 
				success: function(result)
		        {  
		           $("#user").html(result.html);
		        },
		        error:function()
		        {
		        	alert('oops!');
		        }

		});
		
    });



	$("#signup").click(function(){

		$.ajax(
		{
				type:'GET',
				url:"/signup_form", 
				success: function(result)
		        {  
		           $("#user").html(result.html);
		        },
		        error:function()
		        {
		        	alert('oops!');
		        }

		});
		
    });


});


	

</script>


</html>