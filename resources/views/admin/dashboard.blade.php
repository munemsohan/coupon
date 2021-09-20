<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>

<div class="row">

	<div class="col-md-6 col-md-offset-3">

		<table class="table table-striped table-hover table-centered">
	<thead>
		<tr>
			<th>Seller</th>
			<th>Coupon Count</th>
			<th>Total Amount</th>
			<th>Total Commission</th>
		</tr>
	</thead>
	<tbody>

		@foreach($sellers as $seller)
		<tr>
			<td>{{$seller->name}}</td>
			<td>{{$seller->coupon_count}}</td>
			<td>{{$seller->total_amount}}</td>
			<td>{{$seller->total_commission}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
		
	</div>
	

</div>


<span>{{$sellers->links('vendor.pagination.custom')}}</span>
