<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Coupon Verification</h3>
				</div>
				<div class="panel-body">
					<form action="{{route('coupon_verify')}}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Mobile</i></span>
								<input class="form-control" type="text" name="mobile" placeholder="Mobile No." required>
							</div>
						</div>
							<div class="input-group">
								<span class="input-group-addon">Serial No.</i></span>
								<input class="form-control" type="text" name="coupon_serial" placeholder="Coupon Serial" required>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Code</i></span>
								<input class="form-control" type="text" name="coupon_code" placeholder="Coupon Code" required>
							</div>
						</div>
						<div class="form-group">

								<input class="btn btn-success pull-right" type="submit" name="submit" value="Submit">
						</div>

					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>