@extends('layout.main')

@section('navigation')
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">

		       <!Navbar Brand>
		<a class="navbar-brand" href="">Inventory</a>

			  <!links>
		<ul class="navbar-nav">

			<li class="nav-item active"><a class="nav-link" href="/logout">Logout</a></li>
			

		</ul>	

</nav>
@endsection

@section('content')
	
	<div class="container" style="margin-top: 60px">

		<div class="row">

			<div class ="col-sm-6">

				<div class="card">

					<div class="card-header">
						<h5>Brand</h5>
					</div>

					<div class="card-body" align="center">
                        
						<input type="text" name="brand" placeholder="Enter brand name" class="form-control" style="width:80%">
						<button type="button" class="btn btn-primary btn-sm">Add</button>
					</div>

					<div class="card-footer">
				
						<a href="" class="btn btn-primary btn-sm">Manage</a>

					</div>

				</div>

			</div>

			<div class ="col-sm-6">
				
				<div class="card">

					<div class="card-header">
						<h5>Category</h5>
					</div>

					<div class="card-body" align="center">

						<input type="text" name="category" placeholder="Enter category name" class="form-control" style="width:80%">
						<select type="text" name="parent" class="form-control" style="width:80%">
							<option value="">none</option>

						</select>

						<button type="button" class="btn btn-primary btn-sm">Add</button>

					</div>

					<div class="card-footer">
						
						<a href="" class="btn btn-primary btn-sm">Manage</a>

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
						
						<input type="text" name="product" placeholder="Enter product name" class="form-control" style="width:80%">

						<select name="selectProductCategory" class="form-control" style="width:80%">
							
						</select>

						<select name="selectProductBrand" class="form-control" style="width:80%">
							
						</select>

						<input type="text" name="price" placeholder="Enter price" class="form-control" style="width:80%">

						<input type="text" name="quantity" placeholder="Enter quantity" class="form-control" style="width:80%">

						<button type="button" class="btn btn-primary btn-sm">Add</button>


					</div>

					<div class="card-footer">
						
						<a href="" class="btn btn-primary btn-sm">Manage</a>

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



@endsection