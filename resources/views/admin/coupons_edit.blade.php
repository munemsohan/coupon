@include('admin.partials.header')
<div id="content">
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Add Coupon</h3>
				</div>
				<div class="panel-body">
					<form action="{{url('admin/coupons_edit')}}" method="POST" enctype="multipart/form-data">
						@csrf

						<input type="hidden" name="id" value="{{$coupons->id}}">

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Coupon Serial</span>
								<input class="form-control" type="text" name="coupon_serial" placeholder="Coupon Serial" value="{{$coupons->coupon_serial}}" required>
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Coupon Codes</span>
								<input class="form-control" type="text" name="coupon_code" placeholder="Coupon Codes" value="{{$coupons->coupon_code}}" required>
							</div>
						</div>

						<div class="form-group">
							<input class="btn btn-success pull-right" type="submit" name="submit" value="Update">
						</div>

					</div>
				</form>
			</div>
		</div>
	</div>


