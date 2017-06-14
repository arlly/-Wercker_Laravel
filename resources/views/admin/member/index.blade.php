@extends('admin.layouts.base')

@section('meta')
	<title>会員一覧｜{{ Config::get('Fixed.info.AdminSiteName') }}</title>
@endsection

@include('admin.layouts.header')

@include('admin.layouts.breadcrumb')

@section('content')
	<div class="col-md-10 col-md-offset-0">
		<section class="section">
			<h2 class="h2 page-header animated bounce">会員一覧</h2>
			@include('flash::message')
			
			@if( $results->count() > 0 )
				{!! $results->render() !!}
				<div>
					<table class="table table-bordered table-hover table-striped table-condensed">
						<colgroup>
							<col width="10%">
							<col width="40%">
							<col width="10%">
							<col width="20%">
							<col width="10%">
							<col width="10%">
							@if(false)<col width="8%">@endif
						</colgroup>
						
						<tr>
							<th class="text-center">ID</th>
							<th class="text-center">会社名</th>
							<th class="text-center">お名前</th>
							<th class="text-center">メールアドレス</th>
							<th class="text-center">詳細</th>
							<th class="text-center">削除</th>
						</tr>
						@foreach($results as $result)
							<tr>
								<td class="text-center">{{ $result->id }}</td>
								<td class="text-center">{{ $result->company }}</td>
								<td class="text-center">{{ $result->name }}</td>
								<td class="text-center">{{ $result->email }}</td>
								
			
								<td class="text-center">
									<a href="{{ route('admin.member.edit', $result->id) }}" class="btn btn-sm btn-success">
										<span class="glyphicon glyphicon-edit"></span>&nbsp;詳細
									</a>
								</td>
								
								<td class="text-center">
									<a href="{{ route('admin.member.delete', $result->id) }}" class="btn btn-sm btn-danger data-toggle="confirmation" onclick="if(!confirm('本当に削除しますか?')) return false;">
										<span class="glyphicon glyphicon-edit"></span>&nbsp;削除
									</a>
								</td>
			
							</tr>
						@endforeach
					</table>
				</div>
				{!! $results->render() !!}
				
				
			@else
			　会員がいません・・・
			@endif
			
			<div class="text-center">
					<a href="{{ route('admin.member.create') }}" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>&nbsp;会員を追加する</a>
				</div>
		</section>
	</div><!-- .col -->
@endsection

@include('admin.layouts.sidebar')

@include('admin.layouts.footer')

@section('script')
	<script type="text/javascript">
		//
	</script>
@endsection