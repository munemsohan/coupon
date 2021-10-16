@include('admin.partials.header')
<div id="content">
	<div class="row">
		<div class="col-md-9">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Serial</th>
						<th>Coupon Codes</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($coupons as $coupon)
					<tr>
						<td>{{$coupon->coupon_serial}}</td>
						<td>{{$coupon->coupon_code}}</td>
						<td>
							<a class="btn btn-success" href="coupons_edit/{{$coupon->id}}">Edit</a>
							<a class="btn btn-danger" href="coupons_delete/{{$coupon->id}}">Delete</a>
						</td>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<span>{{$coupons->links('vendor.pagination.custom')}}</span>
	</div>

