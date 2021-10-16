@include('admin.partials.header')
<div id="content">
	<div class="row">
		<div class="col-md-9">

			<table class="table table-striped table-hover table-bordered">
				<thead>
					<tr>
						<th>Coupon Name</th>
						<th>Restaurant</th>
						<th>Mobile</th>
						<th>Description</th>
						<th>Actions</th>
						
					</tr>
				</thead>
				<tbody>

					@foreach($coupon_codes as $coupon_code)
					<tr>
						
						<td>{{$coupon_code->name}}</td>
						<td>{{$coupon_code->res_name}}</td>
						<td>{{$coupon_code->res_mobile}}</td>
						<td>{{$coupon_code->desc}}</td>
						<td>
							<a class="btn btn-success" href="coupon_codes_edit/{{$coupon_code->id}}">Edit</a>
							<a class="btn btn-danger" href="coupon_codes_delete/{{$coupon_code->id}}">Delete</a>
						</td>
							
						</tr>
						@endforeach
					</tbody>
				</table>

			</div>

		</div>

		<span>{{$coupon_codes->links('vendor.pagination.custom')}}</span>
	</div>
