<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Admin Login</h3>
				</div>
				<div class="panel-body">
					<form action="{{route('login')}}" method="POST">
						@csrf
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
								<input class="form-control" type="text" name="email">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock"></i></span>
								<input class="form-control" type="password" name="password" placeholder="Password">
							</div>
						</div>
						<div class="form-group">

								<input class="btn btn-success pull-right" type="submit" name="submit" value="Login">

						</div>

					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>