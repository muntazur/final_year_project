<div class="card" style="width:90%">
	        
 
	<div class="card-header">
		<h5>Create a new Account</h5>
	</div>

	<div class="card-body">

		<p id="msg"></p>

		<div>

			<input type="text" name="name" class="form-control-sm" placeholder="name..">
			<input type="email" name="email" class="form-control-sm" placeholder="email..">
			<input type="password" name="password" class="form-control-sm" placeholder="password..">
			<input type="password" name="repeat_password" class="form-control-sm"placeholder="Repeat-password..">

		</div>

		
	</div>


	<div class="card-footer">
		<button id="signupSubmit" type="submit" class="btn btn-primary btn-sm">submit</button>
	</div>

			
</div>


<script type="text/javascript">

  // Request for storing information of a user
 $("document").ready(function(){


    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });
    
    $("#signupSubmit").click(function(e)
    {   
    	e.preventDefault();
    	var name = $("input[name=name]").val();
    	var email = $("input[name=email]").val();
    	var password = $("input[name=password]").val();
    	var repeat_password = $("input[name=repeat_password]").val();

    	$.ajax({

    		type:'POST',
    		url:'/store_user',
    		data: {name:name,email:email,password:password,repeat_password:repeat_password},
    		success:function(result){

    			if(result.msg == 'have')
                {
                    $("#msg").html('Already have an account !');
                }
                else if(result.msg == 'mismatch')
                {
                    $("#msg").html('Password mismatched !');
                }
                else
                {
                    $("#msg").html('Successfuly Created !');
                }
    		},
    		error:function()
    		{
    			alert('sorry');
    		}
    	});
    });

});
</script>