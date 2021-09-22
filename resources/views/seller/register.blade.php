<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">User Registration</h3>
				</div>
				<div class="panel-body">
					<form action="{{route('seller_register')}}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Seller Name</span>
								<input class="form-control" type="text" name="name" placeholder="Name" required>
							</div>
						</div>


						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Referral Code</span>
								<input class="form-control" type="text" name="referral_code" placeholder="Ref. Code" required>
							</div>
						</div>

						<div class="form-group">
								<input class="btn btn-success pull-right" type="submit" name="submit" value="Register">
						</div>

					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>