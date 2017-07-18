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
			
			{!! Form::open(['url' => 'admin/member/search', 'class' => 'form-horizontal']) !!}
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped table-condensed">
						<colgroup>
							<col width="15%">
							<col width="35%">
							<col width="15%">
							<col width="35%">
						</colgroup>
						
						<thead></thead>
						<tbody>
							<tr>
								<th class="text-center">会社名</th>
								<td class="text-center">
									<div class="{{ $errors->has('search_company') ? 'has-error' : '' }}">
										{!! Form::text('search_company', isset($search['search_company']) ? $search['search_company'] : '', ['class' => 'form-control', 'maxlength' => '11']) !!}
										
										@if ($errors->has('search_company'))
											<span class="help-block"><strong>{{ $errors->first('search_company') }}</strong></span>
										@endif
									</div>
								</td>
								<th class="text-center" colspan="1">会員名</th>
								<td class="text-center" colspan="1">
									<div class="{{ $errors->has('search_name') ? 'has-error' : '' }}">
										{!! Form::text('search_name', isset($search['search_name']) ? $search['search_name'] : '', ['class' => 'form-control', 'maxlength' => '255', 'placeholder' => '']) !!}
										
										@if ($errors->has('search_name'))
											<span class="help-block"><strong>{{ $errors->first('search_name') }}</strong></span>
										@endif
									</div>
								</td>
							</tr>
							<tr>
								<th class="text-center" colspan="1">メールアドレス</th>
								<td class="text-center" colspan="1">
									<div class="{{ $errors->has('search_email') ? 'has-error' : '' }}">
										{!! Form::tel('search_email', isset($search['search_email']) ? $search['search_email'] : '', ['class' => 'form-control', 'maxlength' => '255', 'placeholder' => '']) !!}
										
										@if ($errors->has('search_email'))
											<span class="help-block"><strong>{{ $errors->first('search_email') }}</strong></span>
										@endif
									</div>
								</td>
								<th class="text-center" colspan="1">電話番号</th>
								<td class="text-center" colspan="1">
									<div class="{{ $errors->has('search_tel') ? 'has-error' : '' }}">
										{!! Form::tel('search_tel', isset($search['search_tel']) ? $search['search_tel'] : '', ['class' => 'form-control', 'maxlength' => '255', 'placeholder' => '']) !!}
										
										@if ($errors->has('search_tel'))
											<span class="help-block"><strong>{{ $errors->first('search_tel') }}</strong></span>
										@endif
									</div>
								</td>
							</tr>
							
							<tr>
								<th class="text-center" colspan="1">アクティブステータス</th>
								<td class="text-center" colspan="1">
								    {{Form::hidden('search_is_active', 0)}}
									<div class="{{ $errors->has('search_is_active') ? 'has-error' : '' }}">
										{{Form::checkbox('search_is_active', 1, ($search['search_is_active']==1) ? 'true' : '')}} アクティブのアドレスのみ
									</div>
								</td>
								<th class="text-center" colspan="1">配信拒否</th>
								<td class="text-center" colspan="1">
								    {{Form::hidden('search_refuse', 0)}}
									<div class="{{ $errors->has('search_refuse') ? 'has-error' : '' }}">
										{{Form::checkbox('search_refuse', 1, ($search['search_refuse']==1) ? 'true' : '')}} 配信拒否のアドレスも含める
									</div>
								</td>
							</tr>
							
						</tbody>
					</table>
				</div>
				<div class="text-center mb-25">
					<a href="{{ route('admin.member.search.reset') }}" class="btn btn-default"><span class="glyphicon glyphicon-refresh"></span>&nbsp;検索条件クリア</a>
					<button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search"></span>&nbsp;検索する</button>
				</div>
			{!! Form::close() !!}
			
			@if( $results->count() > 0 )
				{!! $results->render() !!}
				<div>
				{!! Form::open(['url' => 'admin/member/search', 'class' => 'form-horizontal']) !!}
					<table class="table table-bordered table-hover table-striped table-condensed">
						<colgroup>
						    <col width="5%">
							<col width="10%">
							<col width="35%">
							<col width="10%">
							<col width="20%">
							<col width="10%">
							<col width="10%">
							@if(false)<col width="8%">@endif
						</colgroup>
						
						<tr>
						    <th class="text-center">　</th>
							<th class="text-center">ID</th>
							<th class="text-center">会社名</th>
							<th class="text-center">お名前</th>
							<th class="text-center">メールアドレス</th>
							<th class="text-center">詳細</th>
							<th class="text-center">削除</th>
						</tr>
						@foreach($results as $result)
							<tr>
							    <td class="text-center">{{Form::checkbox('memberId[]', $result->id, ($search['search_refuse']==1) ? 'true' : '')}}</td>
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
				{!! Form::close() !!}
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