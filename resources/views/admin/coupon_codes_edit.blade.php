@include('admin.partials.header')
<div id="content">
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Add Coupon</h3>
				</div>
				<div class="panel-body">
					<form action="{{url('admin/coupon_codes_edit')}}" method="POST" enctype="multipart/form-data">
						@csrf

						<input type="hidden" name="id" value="{{$coupon_codes->id}}">

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Name</span>
								<input class="form-control" type="text" name="name" placeholder="Name" required value="{{$coupon_codes->name}}">
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Restaurant Name</span>
								<input class="form-control" type="text" name="res_name" placeholder="Restaurant Name" required value="{{$coupon_codes->res_name}}">
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Restaurant Mobile</span>
								<input class="form-control" type="text" name="res_mobile" placeholder="Restaurant Mobile" required value="{{$coupon_codes->res_mobile}}">
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Description</span>
								<input class="form-control" type="text" name="desc" placeholder="Description" value="{{$coupon_codes->desc}}">
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

