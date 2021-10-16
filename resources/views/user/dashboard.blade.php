<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.all.min.js"></script>

<style type="text/css">
	#myDIV2 {

    padding: 10px;
    font-size: 20px;
    background: red;
    animation: mymove2 1s infinite;
}

@keyframes mymove2 {
  from {background-color: yellow; color: black}
  to {background-color: red; color: white}
}
</style>

<br><br><br><br>

<div class="row">

	<div class="col-md-6 col-md-offset-3" align="center">

		<p class="u-text u-text-2"><a href="{{route('verify')}}" id="myDIV2" >Verify Coupon</a>
                    </p>

                    <br><br>

		<a href="{{url('logout')}}" style="font-weight: bold; margin: auto; font-size: 20px;"><u>Log Out</u></a>

		<!-- <table class="table table-striped table-hover text-center">
			<thead>
				<tr>
					<th>ID</th>
					<th>Coupon Count</th>
					<th>Total Amount</th>
					<th>Total Commission</th>
					<th></th>
				</tr>
			</thead>
			<tbody>


				<tr>
					<td>{{Session::get('user_id')}}</td>
					
				</tr>

			</tbody>
		</table> -->
		
	</div>

	
</div>

