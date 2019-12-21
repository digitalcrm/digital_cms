<!DOCTYPE html>
<html>
<head>
	
	@include('admin.layouts.AdminLTE.head')	

	
</head>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

		@include('admin.layouts.AdminLTE.header')
		@include('admin.layouts.AdminLTE.sidebar')

		@section('main-content')

		@show
	
		@include('admin.layouts.AdminLTE.footer')

</div>

</body>
</html>