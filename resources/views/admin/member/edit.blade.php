@extends('admin.layouts.base')

@section('meta')
	<title>	会員登録｜{{ Config::get('Fixed.info.AdminSiteName') }}</title>
@endsection

@include('admin.layouts.header')

@include('admin.layouts.breadcrumb')

@section('content')

	<div class="col-md-10 col-md-offset-0">
		<section class="section">
			<h2 class="h2 page-header animated bounce">
			@if (Request::path() == "admin/member/create")
			 会員登録
			@else
			  会員編集（ID:{{ $row->id }}）
			@endif
			</h2>

			@if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
           </div>
           @endif

			@include('flash::message')

			{!! Form::open(['class' => 'form-horizontal']) !!}
			<div class="table-responsive">
			  <table class="table table-bordered table-hover table-striped table-condensed">
			    <tr>
			      <th class="text-center" colspan="2">会員情報</th>
			    </tr>
			    <tr>
			      <th class="text-center">お名前<span class="attention">*</span></th>
			      <td class="text-center">
			        {!! Form::text('name', !empty($row->name) ? $row->name : null, ['required', 'class' => 'form-control', 'maxlength' => '50']) !!}
			      </td>
			    </tr>
			    			    <tr>
			      <th class="text-center">郵便番号<span class="attention">*</span></th>
			      <td class="text-center">
			        {!! Form::text('zip', !empty($row->zip) ? $row->zip : null, ['required', 'class' => 'form-control', 'maxlength' => '50']) !!}
			      </td>
			    </tr>
			    <tr>
			      <th class="text-center">都道府県<span class="attention">*</span></th>
			      <td class="text-center">
			        {{Form::select('pref', Config::get('Fixed.pref'), !empty($row->pref) ? $row->pref : null, ['class' => 'form-control'])}}
			      </td>
			    </tr>
			    <tr>
			      <th class="text-center">住所<span class="attention">*</span></th>
			      <td class="text-center">
			        {!! Form::text('address', !empty($row->address) ? $row->address : null, ['required', 'class' => 'form-control', 'maxlength' => '200']) !!}
			      </td>
			    </tr>
			    <tr>
			      <th class="text-center">電話番号<span class="attention">*</span></th>
			      <td class="text-center">
			        {!! Form::text('tel', !empty($row->tel) ? $row->tel : null, ['required', 'class' => 'form-control', 'maxlength' => '50']) !!}
			      </td>
			    </tr>
			    <tr>
			      <th class="text-center">FAX番号</th>
			      <td class="text-center">
			        {!! Form::text('fax', !empty($row->fax) ? $row->fax : null, ['class' => 'form-control', 'maxlength' => '50']) !!}
			      </td>
			    </tr>
			    
			    <tr>
			      <th class="text-center">会社名<span class="attention">*</span></th>
			      <td class="text-center">
			        {!! Form::text('company', !empty($row->company) ? $row->company : null, ['required', 'class' => 'form-control', 'maxlength' => '50']) !!}			        
			      </td>
			    </tr>
			    <tr>
			      <th class="text-center">部署</th>
			      <td class="text-center">
			        {!! Form::text('division', !empty($row->division) ? $row->division : null, ['class' => 'form-control', 'maxlength' => '50']) !!}			        
			      </td>
			    </tr>
			    <tr>
			      <th class="text-center">役職</th>
			      <td class="text-center">
			        {!! Form::text('post', !empty($row->post) ? $row->post : null, ['class' => 'form-control', 'maxlength' => '50']) !!}			        
			      </td>
			    </tr>
			    <tr>
			      <th class="text-center">メールアドレス<span class="attention">*</span></th>
			      <td class="text-center">
			        {!! Form::text('email', !empty($row->email) ? $row->email : null, ['required', 'class' => 'form-control', 'maxlength' => '50']) !!}			        
			      </td>
			    </tr>
			    
			    <tr>
			      <th class="text-center">アクティブステータス<span class="attention">*</span></th>
			      <td class="text-center">
			    @if (Request::path() == "admin/member/create")
			      
			      {{Form::radio('is_active', 1, true)}} 送信確認済み
			      {{Form::radio('is_active', 0)}} 送信エラー
			      
			    @else
			      @if (!empty($row->is_active) && $row->is_active == 1)
                    {{Form::radio('is_active', 1, true)}} 送信確認済み
			        {{Form::radio('is_active', 0)}} 送信エラー
                  @else
                    {{Form::radio('is_active', 1)}} 送信確認済み
			        {{Form::radio('is_active', 0, true)}} 送信エラー
                  @endif
			    @endif
			      </td>
			    </tr>
			    
			    <tr>
			      <th class="text-center">配信拒否フラグ<span class="attention">*</span></th>
			      <td class="text-center">
			    @if (Request::path() == "admin/member/create")
			      
			      {{Form::checkbox('refuse', 1)}} 配信拒否希望
			      
			    @else
			      @if (!empty($row->refuse) && $row->refuse == 1)
                    {{Form::checkbox('refuse', 1, true)}} 配信拒否希望
                  @else
                    {{Form::checkbox('refuse', 1)}} 配信拒否希望
                  @endif
			    @endif
			      </td>
			    </tr>
			    
			    
			    
			    
			    		
			  </table>


				<div class="text-center mb-25">
					<a href="javascript:history.back();" class="btn btn-success"><span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;戻る</a>
					<button type="submit" class="btn btn-primary">
						<span class="glyphicon glyphicon-ok"></span>&nbsp;登録
					</button>
				</div>
			{!! Form::close() !!}
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