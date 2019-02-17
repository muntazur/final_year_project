@extends('layout.main')

@section('navigation')

	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">

		       <!Navbar Brand>
		<a class="navbar-brand" href="">Inventory</a>

			  <!links>
		<ul class="navbar-nav">

			<li class="nav-item active"><button style="background:none" type="button" id="login" class="nav-link">LogIn</button></li>

			<li class="nav-item active"><button style="background:none" type="button" id="signup" class="nav-link">SignUp</button></li>
			

		</ul>

	</nav>

@endsection



@section('jquery_ajax')
	
<script type="text/javascript">
		
	$(document).ready(function(){
	    
	    //Request for login form
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


		//Request for SignUp forme
		$("#signup").click(function(){

			$.ajax(
			{
					type:'GET',
					url:'/signup_form', 
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
@endsection