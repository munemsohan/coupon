<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Admin Panel</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.all.min.js"></script>
	<style type="text/css" media="screen">
	body {
		font-family: verdana, sans-serif;
		font-size: 12px;
	}
	li{

		margin: 10px;
		font-size: 15px;
		font-weight: bold;
	}
	#header {
		background: #ccc;
		padding: 20px;
	}

	#sidebar {
		float: left;
		width: 20%;
		height: 100%;
		background: #dfdfdf;
	}

	#content {
		margin-left: 0%;
	}

	#footer {
		clear: right;
		background: #eee;
		padding: 20px;
	}

</style>
</head>
<body>
	<div id="header">
		<p class="pull-right"><strong><a href="{{url('admin/logout')}}">LOG OUT</a></strong><p>
		</div>
		<div id="sidebar">
			<ul>
				<li><a href="{{url('admin/dashboard')}}">All Sellers</a></li>
				<li><a href="{{url('admin/coupons')}}">Coupons</a></li>
				<li><a href="{{url('admin/add_coupons')}}">Add Coupons</a></li>
				<li><a href="{{url('admin/coupon_codes')}}">Coupon Codes</a></li>
				<li><a href="{{url('admin/add_coupon_codes')}}">Add Coupon Codes</a></li>
			</ul>
		</div>