<!DOCTYPE html>
<html>
<head>
	
	@include('user.layouts.userDashboard.head')	

	
</head>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

		@include('user.layouts.userDashboard.header')
		@include('user.layouts.userDashboard.sidebar')

		@section('main-content')

		@show
	
		@include('user.layouts.userDashboard.footer')

</div>

</body>
</html>