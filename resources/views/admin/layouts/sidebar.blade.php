@section('sidebar')
	<div class="col-md-2 col-md-offset-0">
		<h2 class="h2 page-header animated bounce"><span class="glyphicon glyphicon-th-large"></span>&nbsp;メニュー</h2>

        <div class="panel panel-default">
			<div class="panel-heading"><h3>会員管理</h3></div>
			<div class="panel-body">
				<ul class="" role="menu">
					<li><a href="{{ route('admin.member') }}"><span class="glyphicon glyphicon-euro"></span>会員リスト</a></li>

				</ul>
			</div>
		</div>


	</div><!-- .col -->
@endsection
