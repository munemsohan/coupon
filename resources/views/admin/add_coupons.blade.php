@include('admin.partials.header')
<div id="content">
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Add Coupon</h3>
				</div>
				<div class="panel-body">
					<form action="{{url('admin/add_coupons')}}" method="POST" enctype="multipart/form-data">
						@csrf

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Coupon Serial</span>
								<input class="form-control" type="text" name="coupon_serial" placeholder="Coupon Serial" required>
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Coupon Codes</span>
								<input class="form-control" type="text" name="coupon_code" placeholder="Coupon Codes" required>
							</div>
						</div>

						<div class="form-group">
							<input class="btn btn-success pull-right" type="submit" name="submit" value="Add">
						</div>

					</div>
				</form>
			</div>
		</div>
	</div>
