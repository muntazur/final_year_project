@extends('layout.main')

@section('navigation')
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">

		       <!Navbar Brand>
		<a class="navbar-brand" href="/main">Home</a>

			  <!links>
		<ul class="navbar-nav">

			<li class="nav-item active"><a class="nav-link" href="/logout">Logout</a></li>
			

		</ul>	

</nav>
@endsection

@section('content')
	
	<div id="manage" class="container" style="margin-top: 60px">

		<div class="row">

			<div class ="col-sm-6">

				<div class="card">

					<div class="card-header">
						<h5>Brand</h5>
					</div>

					<div class="card-body" align="center">

                        <p id="msgB"></p>
						<input type="text" name="brand" placeholder="Enter brand name" class="form-control" style="width:80%">
						
					</div>

					<div class="card-footer" align="center">

						<button id="submitBrand" type="submit" class="btn btn-primary btn-sm">Add</button>
						<button id="manageBrand" type="button" class="btn btn-primary btn-sm">Manage</button>

					</div>

				</div>

			</div>

			<div class ="col-sm-6">
				
				<div class="card">

					<div class="card-header">
						<h5>Category</h5>
					</div>

					<div class="card-body" align="center">

						<p id="msgC"></p>
						<input type="text" name="category" placeholder="Enter category name" class="form-control" style="width:80%">
						<select name="parent" class="form-control" style="width:80%">
							<option value="">none</option>

							<?php 
								use App\Http\Controllers\InventoryController;
								$table = InventoryController::getCategoryList();
							?>
							@foreach($table as $row)

							   <option value="{{$row->name}}">{{$row->name}}</option>

							@endforeach


						</select>

					</div>

					<div class="card-footer" align="center">

						<button id="submitCategory" type="submit" class="btn btn-primary btn-sm">Add</button>
						<button id="manageCategory" class="btn btn-primary btn-sm">Manage</button>

					</div>
					
				</div>

			</div>

		</div>


		<div class="row">
			
			<div class ="col-sm-6">
				
				<div class="card">

					<div class="card-header">
						<h5>Product</h5>
					</div>

					<div class="card-body" align="center">
						<p id="msgP"></p>
						<input type="text" name="product" placeholder="Enter product name" class="form-control" style="width:80%">

						<select name="selectProductCategory" class="form-control" style="width:80%">


							@foreach($table as $row)

							   <option value="{{$row->name}}">{{$row->name}}</option>

							@endforeach

						</select>

						<select name="selectProductBrand" class="form-control" style="width:80%">

							<?php 
								//use App\Http\Controllers\InventoryController;
								$table = InventoryController::getBrandList();
							?>

							@foreach($table as $row)

							   <option value="{{$row->name}}">{{$row->name}}</option>

							@endforeach
							
						</select>

						<input type="text" name="price" placeholder="Enter price" class="form-control" style="width:80%">

						<input type="text" name="quantity" placeholder="Enter quantity" class="form-control" style="width:80%">	

					</div>

					<div class="card-footer">

						<button id="submitProduct"type="submit" class="btn btn-primary btn-sm">Add</button>
						<button id="manageProduct" type="button" class="btn btn-primary btn-sm">Manage</button>

					</div>
					
				</div>

			</div>
			
			<div class ="col-sm-6">
				
				<div class="card">

					<div class="card-header">
						<h5>Make an order</h5>
					</div>

					<div class="card-body">
						
						

					</div>

					<div class="card-footer">
						<button type="button" class="btn btn-primary btn-sm">Order</button>
					</div>
					
				</div>

			</div>

		</div>
	</div>

@endsection



@section('jquery_ajax')

<script type="text/javascript">
	$("document").ready(function(){

	    $.ajaxSetup({

	        headers: {

	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

	        }

	    });

	    $("#submitBrand").click(function()
	    {
	    	var name = $("input[name=brand]").val();

	    	$.ajax({
	    		type:'POST',
	    		url:'/save_brand',
	    		data:{name:name},
	    		success:function(result)
	    		{
	    			if(result.msg=='have')
	    			{
	    				$("#msgB").html('Already Exists !');
	    			}
	    			else
	    			{
	    				$("#msgB").html(result.msg);
	    			}
	    		},
	    		error:function()
	    		{
	    			alert('error');
	    		}
	    	});
	    });

	    $("#manageBrand").click(function()
	    {
	    	$.ajax({

	    		type:'GET',
	    		url:'/get_brands',
	    		success:function(result)
	    		{
	    			$("#manage").html(result.table);
	    		},
	    		error:function()
	    		{
	    			alert('error');
	    		}
	    	});
	    });

	    //Category
	    $("#submitCategory").click(function()
	    {
	    	var name = $("input[name=category]").val();
	    	var parent = $("select[name=parent]").val();

	    	$.ajax({
	    		type:'POST',
	    		url:'/save_category',
	    		data:{name:name,parent:parent},
	    		success:function(result)
	    		{
	    			if(result.msg=='have')
	    			{
	    				$("#msgC").html('Already Exists !');
	    		
	    			}
	    			else
	    			{
	    				$("#msgC").html(result.msg);
	    				/*
	    				$.each(result.table,function(){
	    					
	    					$.each(this,function(index,value)
	    					{
	    					   //$("#select_parent").html(value);
	    					   console.log(value);
	    					});
	    				});*/
	    				setTimeout(function(){
	    					window.location.reload();
	    				},1000);
	    			}
	    		},
	    		error:function()
	    		{
	    			alert('error');
	    		}
	    	});
	    });

	    //manage category

	    $("#manageCategory").click(function()
	    {
	    	$.ajax({

	    		type:'GET',
	    		url:'/get_categories',
	    		success:function(result)
	    		{
	    			$("#manage").html(result.table);
	    		},
	    		error:function()
	    		{
	    			alert('error');
	    		}
	    	});
	    });

	    //save product

	    $("#submitProduct").click(function()
	    {
	    	var name = $("input[name=product]").val();
	    	var category = $("select[name=selectProductCategory]").val();
	    	var brand = $("select[name=selectProductBrand]").val();
	    	var price = $("input[name=price]").val();
	    	var quantity = $("input[name=quantity]").val();


	    	$.ajax({
	    		type:'POST',
	    		url:'/save_product',
	    		data:{name:name,category:category,brand:brand,price:price,quantity:quantity},
	    		success:function(result)
	    		{
	    			if(result.msg=='have')
	    			{
	    				$("#msgP").html('Already Exists !');
	    		
	    			}
	    			else
	    			{
	    				$("#msgP").html(result.msg);
	    				/*
	    				$.each(result.table,fuvar name = $("input[name=product]").val();nction(){
	    					
	    					$.each(this,function(index,value)
	    					{
	    					   //$("#select_parent").html(value);
	    					   console.log(value);
	    					});
	    				});*/
	    				setTimeout(function(){
	    					window.location.reload();
	    				},1000);
	    			}
	    		},
	    		error:function()
	    		{
	    			alert('error');
	    		}
	    	});
	    });
	    // manage product
        
		$("#manageProduct").click(function()
	    {
	    	$.ajax({

	    		type:'GET',
	    		url:'/get_products',
	    		success:function(result)
	    		{
	    			$("#manage").html(result.table);
	    		},
	    		error:function()
	    		{
	    			alert('error');
	    		}
	    	});
	    });


});
</script>


@endsection