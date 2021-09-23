<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.all.min.js"></script>

<div class="row">

	<div class="col-md-6 col-md-offset-3">

		<table class="table table-striped table-hover text-center">
			<thead>
				<tr>
					<th>Seller</th>
					<th>Coupon Count</th>
					<th>Total Amount</th>
					<th>Total Commission</th>
					<th></th>
				</tr>
			</thead>
			<tbody>

				@foreach($sellers as $seller)
				<tr>
					<td>{{$seller->name}}</td>
					<td>{{$seller->coupon_count}}</td>
					<td>{{$seller->total_amount}}</td>
					<td style="color:red"><b>{{$seller->total_commission}}<b></td>
					<td>@if ($seller->total_commission > 0) <button id="{{$seller->id}}" class="delete_btn btn btn-success">Withdraw</button> @endif</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		
	</div>
	
</div>

<span>{{$sellers->links('vendor.pagination.custom')}}</span>

<script type="text/javascript">

	$(document).ready(function(){
		$('.delete_btn').click(function(){
			$.ajax({
				type: "GET",
				url: "{{url('/')}}/admin/withdraw/"+this.id,
				success: function(msg){

					Swal.fire(
						'Withdrawn!',
						'Seller Withdraw Successful',
						'success'
						);

					location.reload();
				}
			});
		});
	});
</script>
