<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">User Registration</h3>
				</div>
				<div class="panel-body">
					<form action="{{route('register')}}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								<input class="form-control" type="text" name="name" placeholder="Name" required>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-mobile"></i></span>
								<input class="form-control" type="number" name="mobile" placeholder="Mobile" required>
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
								<input class="form-control" type="email" name="email" placeholder="example@example.com">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-image"></i></span>
								<input class="form-control" type="file" name="image_path" placeholder="Image" accept="image/*" required>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-file"></i></span>
								<input class="form-control" type="text" name="referral" placeholder="Referral Code" required>
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock"></i></span>
								<input class="form-control" type="password" name="password" id="password" placeholder="Password" required="">
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock"></i></span>
								<input class="form-control" type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required="" onfocusout="matchPassword()">
							</div>
						</div>

						<center id="pass_error" style="color: red; display: none;"><b>* Password Doesnt Match</b></center>
						<center id="pass_match" style="color: green; display: none;"><b>* Password Matched</b></center>

						<div class="form-group">

								<input class="btn btn-success pull-right" type="submit" name="submit" value="Register" id="submit" disabled="">
						</div>

					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>

<script>  
function matchPassword() {  
  var pw1 = $("#password").val();  
  var pw2 = $("#confirm_password").val();


  if(pw1 != pw2)  
  {   
  	$("#pass_error").show();
  	$("#pass_match").hide();
  	$(':input[type="submit"]').prop('disabled', true); 
  } 
  else{
  	$("#pass_error").hide();
  	$("#pass_match").show();
  	$(':input[type="submit"]').prop('disabled', false);
  } 
}  
</script>  