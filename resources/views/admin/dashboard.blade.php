@include('admin.partials.header')
<div id="content">
	<div class="row">
		<div class="col-md-9">

			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Image</th>
						<th>Seller</th>
						<th>Referral Code</th>
						<th>Coupon Count</th>
						<th>Total Amount</th>
						<th>Total Commission</th>
						<th></th>
					</tr>
				</thead>
				<tbody>

					@foreach($sellers as $seller)
					<tr>
						<td>@if($seller->image)<img src="{{asset('public/'.$seller->image)}}" width="100px"> @endif</td>
						<td>{{$seller->name}}</td>
						<td>{{$seller->referral_code}}</td>
						<td>{{$seller->coupon_count}}</td>
						<td>{{$seller->total_amount}}</td>
						<td style="color:red"><b>{{$seller->total_commission}}<b></td>
							<td>@if ($seller->total_commission > 0) <button id="{{$seller->id}}" class="delete_btn btn btn-success">Withdraw</button> @endif</td>

						<td>
							<a class="btn btn-success" href="seller_edit/{{$seller->id}}">Edit</a>
							<a class="btn btn-danger" href="seller_delete/{{$seller->id}}">Delete</a>
						</td>

						</tr>
						@endforeach
					</tbody>
				</table>

			</div>

		</div>

		<span>{{$sellers->links('vendor.pagination.custom')}}</span>
	</div>

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
