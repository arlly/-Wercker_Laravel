@section('footer')
	<footer class="footer text-center">
		<div class="container">
			<small>&copy;&nbsp;<?= date('Y', time()) ?>&nbsp;<a href="{{ route('admin.home') }}">AdminHOME</a>&nbsp;All&nbsp;Rights&nbsp;Reserved.</small>
		</div>
	</footer>
@endsection
