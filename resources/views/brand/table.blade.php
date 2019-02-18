
<table class="table table-striped table-bordered table-condensed table-dark">
	<thead>
		<th>Brand</th>
		<th>Status</th>
		<th>Action</th>
	</thead>
	<tbody>
		@foreach($table as $row)
		    <tr>
			
				<td>{{$row->name}}</td>

				@if($row->status==1)
				  <td>
				  	<ul>
				  		<li>
				  			<button type="button" class="btn btn-success btn-sm">active</button>
				  		</li>
				  	</ul>
				  </td>
				@endif

				<td>
					<ul>
						<li>
							<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit" data-id="{{$row->name}}">Edit</button>
						</li>
												
					</ul>
				</td>
			
		    </tr>
		@endforeach
	</tbody>
</table>


<div class="modal fade" id="edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Update brand</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body" align="center">
				<p id="msg"></p>
				<input type="text" name="brand" value="" class="form-control" style="width:80%;text-align: center;" placeholder="">
				<input type="hidden" name="hidden" value="">
			</div>
			<div class="modal-footer">

				<button id="updateBrand" type="submit" class="btn btn-info btn-sm">update</button>
				<button id="delete" type="submit" class="btn btn-danger btn-sm">Delete</button>

				<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">close</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
    
	    $.ajaxSetup({

	        headers: {

	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

	        }

	    });

	$("#edit").on('show.bs.modal',function(e) {
		var brand = $(e.relatedTarget).data('id');

		var modal=$(this);
		modal.find('.modal-body input[name=brand]').val(brand);
		modal.find('.modal-body input[name=hidden]').val(brand);
	});

	$("#updateBrand").click(function()
	{   
		var current = $("input[name=brand]").val();
		var previous = $("input[name=hidden]").val();

		$.ajax({
			type:'POST',
			url:'/update_brand',
			data:{current:current,previous:previous},
			success:function(result)
			{
				if(result.msg)
				{
					$("#msg").html(result.msg);
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

	$("#delete").click(function()
	{
		var current = $("input[name=brand]").val();

    	$.ajax({
				type:'POST',
				url:'/delete_brand',
				data:{current:current},
				success:function(result)
				{
					if(result.msg)
					{
						$("#msg").html(result.msg);
						setTimeout(function() {
							// body...
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

</script>