<?= header('X-Frame-Options: SAMEORIGIN')// クリックジャッキング対策(同一生成元のみ許可) ?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<!-- Meta Data -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	@yield('meta')

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

	<!-- Styles -->
	<link type="text/css" href="{{ url('bootstrap/css/bootstrap-rin.min.css') }}" rel="stylesheet">
	<link type="text/css" href="{{ elixir('css/admin/style.css') }}" rel="stylesheet" media="screen">

	<!--[if lt IE 9]>
		<script src="//oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
</head>
<body>
	
	<div class="container">
		<!-- Global Navigation in Header -->
		@yield('header')
	</div>
	
	<div class="animated fadeIn">
		<div class="container">
			<!-- Breadcrumb -->
			@yield('breadcrumb')
		</div>
		
		<div class="container">
			<!-- Contents -->
			@yield('content')
			
			<!-- Sidebar -->
			@yield('sidebar')
		</div>
		
		<div class="container">
			<!-- Footer -->
			@yield('footer')
		</div>
	</div>
	@include('common.modal')

	<!-- Scripts -->
	<script type="text/javascript" src="{{ url('js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ url('js/datepicker.js') }}"></script>
	<script type="text/javascript" src="{{ url('bootstrap/js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ url('bootstrap/js/bootstrap-confirmation.min.js') }}"></script>
	<script type="text/javascript" src="{{ url('js/common.js') }}"></script>
	<script type="text/javascript" src="{{ elixir('js/admin/main.js') }}"></script>
	
	@yield('script')
	
</body>
</html>