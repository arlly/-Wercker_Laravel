@extends('admin.layouts.base')

@section('meta')
	<title>{{ Config::get('Fixed.info.AdminSiteName') }}</title>
@endsection

@include('admin.layouts.header')

@include('admin.layouts.breadcrumb')

@section('content')
	<div class="col-md-10 col-md-offset-0">

		@include('flash::message')

		<h2 class="h2 page-header animated bounce"><span class="glyphicon glyphicon-home"></span>&nbsp;ホーム</h2>

		<div class="row">
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

			<div class="col-md-6">
				<div class="well bootstrap-default text-justify">
					<h3 class="h3">為替予約の実行予定</h3>

					<div class="mt-25">
						<a href="" class="btn btn-warning">
							<span class="glyphicon glyphicon-phone-alt"></span>&nbsp;為替一覧
						</a>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="well text-justify">
					<h3 class="h3">取引速報</h3>
					<p>
						text text text text text text text text text text text text text text text text...
						text text text text text text text text text text text text text text text text...
					</p>
					<div class="mt-25">
						<a href="#" class="btn btn-primary">
							<span class="glyphicon glyphicon-send"></span>&nbsp;詳細
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="well bootstrap-default text-justify">
					<h3>取引速報</h3>
					<p>
						text text text text text text text text text text text text text text text text...
						text text text text text text text text text text text text text text text text...
					</p>
					<div class="mt-25">
						<a href="#" class="btn btn-success">
							<span class="glyphicon glyphicon-question-sign"></span>&nbsp;詳細
						</a>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="well text-justify">
					<h3>取引速報</h3>
					<p>
						text text text text text text text text text text text text text text text text...
						text text text text text text text text text text text text text text text text...
					</p>
					<div class="mt-25">
						<a href="#" class="btn btn-info">
							<span class="glyphicon glyphicon-hand-right"></span>&nbsp;詳細
						</a>
					</div>
				</div>
			</div>
		</div>
	</div><!-- .col -->
@endsection

@include('admin.layouts.sidebar')

@include('admin.layouts.footer')

@section('script')
	<script type="text/javascript">
		//
	</script>
@endsection