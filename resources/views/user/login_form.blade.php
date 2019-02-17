
<div class="card" style="width:90%">
	        

	<div class="card-header">
		<h5>Log into your account </h5>
	</div>

	<div class="card-body">

		<p id="msg"></p>

		<div>

			<input type="email" name="email" class="form-control-sm" placeholder="email..">
			<input type="password" name="password" class="form-control-sm" placeholder="password..">

		</div>
		
	</div>


	<div class="card-footer">
		<button id="loginSubmit" type="submit" class="btn btn-primary btn-sm">submit</button>
	</div>

			
</div>

<script type="text/javascript">
		
		$("document").ready(function(){

			
		    $.ajaxSetup({

		        headers: {

		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

		        }

		    });

			$("#loginSubmit").click(function(){

				var email = $("input[name=email]").val();
				var password = $("input[name=password]").val();

				$.ajax({

					type:'POST',
					url: '/check_user',
					data:{email:email,password:password},
					success:function(result)
					{
						if(result.msg == 'incorrect')
						{
							$("#msg").html('Incorrect email or password !');
						}
						else
						{
							//$("body").html(result.html);
							window.location.href=result.href;

						}
					},
					error:function()
					{
						alert('Error Occured during login');
					}
				});
			});
		});

</script>
