@include('admin.partials.header')
<div id="content">
	<div class="col-md-6">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Seller Registration</h3>
				</div>
				<div class="panel-body">
					<form action="{{url('admin/seller_edit')}}" method="POST" enctype="multipart/form-data">
						@csrf
						<input type="hidden" name="id" value="{{$seller->id}}">
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Seller Name</span>
								<input class="form-control" type="text" name="name" placeholder="Name" required value="{{$seller->name}}">
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Referral Code</span>
								<input class="form-control" type="text" name="referral_code" placeholder="Ref. Code" required value="{{$seller->referral_code}}">
							</div>
						</div>

						<div class="form-group">
							<input class="btn btn-success pull-right" type="submit" name="submit" value="Update">
						</div>

					</div>
				</form>
			</div>

	</div>