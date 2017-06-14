{{-- common.form.user --}}

<div class="form-group">
	<label class="col-md-3 control-label">メールアドレス</label>
	<div class="col-md-8 form-control-static">
		@if( $mode === 'auth.register')
			{{ $email or null }}
		@elseif( $mode === 'user.edit')
			{{ $row->email or null }}
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('last_name') || $errors->has('first_name') ? ' has-error' : '' }}">
	<label class="col-md-3 control-label">氏名<span class="attention">*</span></label>
	<div class="col-md-4">
		{!! Form::text('last_name', (!empty($row->last_name) ? $row->last_name : null), ['required', 'class' => 'form-control', 'maxlength' => '255', 'placeholder' => '姓']) !!}

		@if ($errors->has('last_name'))
			<span class="help-block"><strong>{{ $errors->first('last_name') }}</strong></span>
		@endif
	</div>
	<div class="col-md-4">
		{!! Form::text('first_name', (!empty($row->first_name) ? $row->first_name : null), ['required', 'class' => 'form-control', 'maxlength' => '255', 'placeholder' => '名']) !!}

		@if ($errors->has('first_name'))
			<span class="help-block"><strong>{{ $errors->first('first_name') }}</strong></span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('last_name_kana') || $errors->has('first_name_kana') ? ' has-error' : '' }}">
	<label class="col-md-3 control-label">フリガナ<span class="attention">*</span></label>
	<div class="col-md-4">
		{!! Form::text('last_name_kana', (!empty($row->last_name_kana) ? $row->last_name_kana : null), ['required', 'class' => 'form-control', 'maxlength' => '255', 'placeholder' => 'セイ']) !!}

		@if ($errors->has('last_name_kana'))
			<span class="help-block"><strong>{{ $errors->first('last_name_kana') }}</strong></span>
		@endif
	</div>
	<div class="col-md-4">
		{!! Form::text('first_name_kana', (!empty($row->first_name_kana) ? $row->first_name_kana : null), ['required', 'class' => 'form-control', 'maxlength' => '255', 'placeholder' => 'メイ']) !!}

		@if ($errors->has('first_name_kana'))
			<span class="help-block"><strong>{{ $errors->first('first_name_kana') }}</strong></span>
		@endif
	</div>
</div>

@if( $mode === 'admin.user.add' || $mode === 'admin.user.edit')
	<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
		<label class="col-md-3 control-label">Eメールアドレス<span class="attention">*</span></label>
		<div class="col-md-8">
			{!! Form::email('email', (!empty($row->email) ? $row->email : null), ['required', 'class' => 'form-control', 'maxlength' => '255', 'placeholder' => '']) !!}

			@if ($errors->has('email'))
				<span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
			@endif
		</div>
	</div>
@endif

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
	<label class="col-md-3 control-label">パスワード<?php if($mode !== 'user.edit' && $mode !== 'admin.user.edit'):?> <span class="attention">*</span><?php endif;?></label>
	<div class="col-md-8">
		<input type="password" class="form-control" name="password" <?php if($mode !== 'user.edit' && $mode !== 'admin.user.edit'):?> required="required"<?php endif;?> maxlength="16" />
		@if(false)<span class="text-info">8文字以上16文字以内で入力してください。</span>@endif
		@if ($errors->has('password'))
			<span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
	<label class="col-md-3 control-label">パスワード(確認用)<?php if($mode !== 'user.edit' && $mode !== 'admin.user.edit'):?> <span class="attention">*</span><?php endif;?></label>
	<div class="col-md-8">
		<input type="password" class="form-control" name="password_confirmation" <?php if($mode !== 'user.edit' && $mode !== 'admin.user.edit'):?> required="required"<?php endif;?> maxlength="16" />
	</div>
</div>

<div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}">
	<label class="col-md-3 control-label">電話番号<br>(ハイフンなし)</label>
	<div class="col-md-6">
		{!! Form::tel('tel', (!empty($row->tel) ? $row->tel : null), ['class' => 'form-control', 'maxlength' => '20', 'placeholder' => '']) !!}

		@if ($errors->has('tel'))
			<span class="help-block"><strong>{{ $errors->first('tel') }}</strong></span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('fax') ? ' has-error' : '' }}">
	<label class="col-md-3 control-label">FAX番号<br>(ハイフンなし)</label>
	<div class="col-md-6">
		{!! Form::tel('fax', (!empty($row->fax) ? $row->fax : null), ['class' => 'form-control', 'maxlength' => '20', 'placeholder' => '']) !!}

		@if ($errors->has('fax'))
			<span class="help-block"><strong>{{ $errors->first('fax') }}</strong></span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('zip_code') ? ' has-error' : '' }}">
	<label class="col-md-3 control-label">郵便番号 (7桁)</label>
	<div class="col-md-4">
		{!! Form::tel('zip_code', (!empty($row->zip_code) ? $row->zip_code : null), ['class' => 'form-control', 'maxlength' => '7', 'placeholder' => '']) !!}

		@if ($errors->has('zip_code'))
			<span class="help-block"><strong>{{ $errors->first('zip_code') }}</strong></span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('pref_code') ? ' has-error' : '' }}">
	<label class="col-md-3 control-label">都道府県</label>
	<div class="col-md-4 form-control-static">
		<?php array_unshift($Fixed['pref'], '選択してください'); ?>
		{!! Form::select('pref_code', $Fixed['pref'], (!empty($row->pref_code) ? $row->pref_code : null), ['class' => 'form-control']) !!}

		@if ($errors->has('pref_code'))
			<span class="help-block"><strong>{{ $errors->first('pref_code') }}</strong></span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('address1') ? ' has-error' : '' }}">
	<label class="col-md-3 control-label">市区町村名・番地</label>
	<div class="col-md-8">
		{!! Form::textarea('address1', (!empty($row->address1) ? $row->address1 : null), ['class' => 'form-control', 'maxlength' => '1000', 'rows' => '2']) !!}

		@if ($errors->has('address1'))
			<span class="help-block"><strong>{{ $errors->first('address1') }}</strong></span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('address2') ? ' has-error' : '' }}">
	<label class="col-md-3 control-label">マンション<br>建物名・部屋番号</label>
	<div class="col-md-8">
		{!! Form::textarea('address2', (!empty($row->address2) ? $row->address2 : null), ['class' => 'form-control', 'maxlength' => '1000', 'rows' => '2']) !!}

		@if ($errors->has('address2'))
			<span class="help-block"><strong>{{ $errors->first('address2') }}</strong></span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('birth_y') || $errors->has('birth_m') || $errors->has('birth_d') ? ' has-error' : '' }}">
	<label class="col-md-3 control-label">生年月日</label>
	<div class="input-group col-md-8">
		<div class="col-md-4">
			<?php array_unshift($years, '選択'); ?>
			{!! Form::select('birth_y', $years, (!empty($row->birth_y) ? $row->birth_y : null), ['class' => 'form-control']) !!}

			@if ($errors->has('birth_y'))
				<span class="help-block"><strong>{{ $errors->first('birth_y') }}</strong></span>
			@endif
		</div>
		<div class="col-md-4">
			<?php array_unshift($Fixed['month'], '選択'); ?>
			{!! Form::select('birth_m', $Fixed['month'], (!empty($row->birth_m) ? $row->birth_m : null), ['class' => 'form-control']) !!}

			@if ($errors->has('birth_m'))
				<span class="help-block"><strong>{{ $errors->first('birth_m') }}</strong></span>
			@endif
		</div>
		<div class="col-md-4">
			<?php array_unshift($Fixed['day'], '選択'); ?>
			{!! Form::select('birth_d', $Fixed['day'], (!empty($row->birth_d) ? $row->birth_d : null), ['class' => 'form-control']) !!}

			@if ($errors->has('birth_d'))
				<span class="help-block"><strong>{{ $errors->first('birth_d') }}</strong></span>
			@endif
		</div>
	</div>
</div>

<div class="form-group has-feedback {{ $errors->has('sub_email1') ? 'has-error' : '' }}">
	<label class="col-md-3 control-label">転送用メール1</label>
	<div class="col-md-8">
		{!! Form::email('sub_email1', (!empty($row->sub_email1) ? $row->sub_email1 : null), ['class' => 'form-control', 'maxlength' => '255', 'placeholder' => '']) !!}

		@if ($errors->has('sub_email1'))
			<span class="help-block"><strong>{{ $errors->first('sub_email1') }}</strong></span>
		@endif
	</div>
</div>

<div class="form-group has-feedback {{ $errors->has('sub_email2') ? 'has-error' : '' }}">
	<label class="col-md-3 control-label">転送用メール2</label>
	<div class="col-md-8">
		{!! Form::email('sub_email2', (!empty($row->sub_email2) ? $row->sub_email2 : null), ['class' => 'form-control', 'maxlength' => '255', 'placeholder' => '']) !!}

		@if ($errors->has('sub_email2'))
			<span class="help-block"><strong>{{ $errors->first('sub_email2') }}</strong></span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('remarks') ? ' has-error' : '' }}">
	<label class="col-md-3 control-label">備考</label>
	<div class="col-md-8">
		{!! Form::textarea('remarks', (!empty($row->remarks) ? $row->remarks : null), ['class' => 'form-control', 'maxlength' => '1000', 'rows' => '2']) !!}

		@if ($errors->has('remarks'))
			<span class="help-block"><strong>{{ $errors->first('remarks') }}</strong></span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('account_type') ? ' has-error' : '' }}">
	<label class="col-md-3 control-label">振込先</label>
	<div class="col-md-6 form-control-static">
		@foreach($Fixed['account'] as $key => $val)
			<label>{!! Form::radio('account_type', $key, ($key == 1), ['id' => 'account_type_'.$key, 'maxlength' => '11']) !!}&nbsp;{{ $val }}</label>&nbsp;&nbsp;&nbsp;
		@endforeach

		@if ($errors->has('account_type'))
			<span class="help-block"><strong>{{ $errors->first('account_type') }}</strong></span>
		@endif
	</div>
</div>

{{-- ゆうちょエリア --}}
<div id="yucho_area">
	<div class="form-group{{ $errors->has('yucho_symbol') ? ' has-error' : '' }}">
		<label class="col-md-3 control-label">記号</label>
		<div class="col-md-7">
			{!! Form::tel('yucho_symbol', (!empty($row->yucho_symbol) ? $row->yucho_symbol : null), ['class' => 'form-control', 'maxlength' => '7', 'placeholder' => '']) !!}

			@if ($errors->has('yucho_symbol'))
				<span class="help-block"><strong>{{ $errors->first('yucho_symbol') }}</strong></span>
			@endif
		</div>
	</div>

	<div class="form-group{{ $errors->has('yucho_number') ? ' has-error' : '' }}">
		<label class="col-md-3 control-label">番号</label>
		<div class="col-md-7">
			{!! Form::tel('yucho_number', (!empty($row->yucho_number) ? $row->yucho_number : null), ['class' => 'form-control', 'maxlength' => '7', 'placeholder' => '']) !!}

			@if ($errors->has('yucho_number'))
				<span class="help-block"><strong>{{ $errors->first('yucho_number') }}</strong></span>
			@endif
		</div>
	</div>

	<div class="form-group{{ $errors->has('yucho_name') ? ' has-error' : '' }}">
		<label class="col-md-3 control-label">名義 (全角カナ)</label>
		<div class="col-md-7">
			{!! Form::text('yucho_name', (!empty($row->yucho_name) ? $row->yucho_name : null), ['class' => 'form-control', 'maxlength' => '60', 'placeholder' => 'ドル　タロウ']) !!}

			@if ($errors->has('yucho_name'))
				<span class="help-block"><strong>{{ $errors->first('yucho_name') }}</strong></span>
			@endif
		</div>
	</div>
</div>

{{-- その他金融機関エリア --}}
<div id="bank_area">
	<div class="form-group{{ $errors->has('bank_name') ? ' has-error' : '' }}">
		<label class="col-md-3 control-label">金融機関名</label>
		<div class="col-md-7">
			{!! Form::text('bank_name', (!empty($row->bank_name) ? $row->bank_name : null), ['class' => 'form-control', 'maxlength' => '60', 'placeholder' => '']) !!}

			@if ($errors->has('bank_name'))
				<span class="help-block"><strong>{{ $errors->first('bank_name') }}</strong></span>
			@endif
		</div>
	</div>

	<div class="form-group{{ $errors->has('bank_branch_name') ? ' has-error' : '' }}">
		<label class="col-md-3 control-label">支店名</label>
		<div class="col-md-7">
			{!! Form::text('bank_branch_name', (!empty($row->bank_branch_name) ? $row->bank_branch_name : null), ['class' => 'form-control', 'maxlength' => '60', 'placeholder' => '']) !!}

			@if ($errors->has('bank_branch_name'))
				<span class="help-block"><strong>{{ $errors->first('bank_branch_name') }}</strong></span>
			@endif
		</div>
	</div>

	<div class="form-group{{ $errors->has('bank_account_type') ? ' has-error' : '' }}">
		<label class="col-md-3 control-label">預金区分</label>
		<div class="col-md-3">
			{!! Form::select('bank_account_type', $Fixed['account_type'], (isset($row->bank_account_type) ? $row->bank_account_type : null), ['class' => 'form-control', 'maxlength' => '1']) !!}

			@if ($errors->has('bank_account_type'))
				<span class="help-block"><strong>{{ $errors->first('bank_account_type') }}</strong></span>
			@endif
		</div>
	</div>

	<div class="form-group{{ $errors->has('bank_account_number') ? ' has-error' : '' }}">
		<label class="col-md-3 control-label">口座番号</label>
		<div class="col-md-7">
			{!! Form::tel('bank_account_number', (!empty($row->bank_account_number) ? $row->bank_account_number : null), ['class' => 'form-control', 'maxlength' => '7', 'placeholder' => '']) !!}

			@if ($errors->has('bank_account_number'))
				<span class="help-block"><strong>{{ $errors->first('bank_account_number') }}</strong></span>
			@endif
			<span class="text-info">(半角数字7桁)</span>
		</div>
	</div>

	<div class="form-group{{ $errors->has('bank_account_name') ? ' has-error' : '' }}">
		<label class="col-md-3 control-label">名義（全角カナ）</label>
		<div class="col-md-7">
			{!! Form::text('bank_account_name', (!empty($row->bank_account_name) ? $row->bank_account_name : null), ['class' => 'form-control', 'maxlength' => '60', 'placeholder' => 'ドル　タロウ']) !!}

			@if ($errors->has('bank_account_name'))
				<span class="help-block"><strong>{{ $errors->first('bank_account_name') }}</strong></span>
			@endif
		</div>
	</div>
</div>

@if( $mode === 'admin.user.add' || $mode === 'admin.user.edit')
	<div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
		<label class="col-md-3 control-label">ランク<span class="attention">*</span></label>
		<div class="col-md-8 form-control-static">
			<label>{!! Form::radio('role', 'CURRENT', ( isset($row->role) && $row->role === 'CURRENT' ) ? true : null, ['required', 'maxlength' => '11']) !!}&nbsp;<span class="text-warning">{{ $Fixed['user_role']['CURRENT'] }}</span>&nbsp;&nbsp;&nbsp;</label>
			<label>{!! Form::radio('role', 'WHITE', ( isset($row->role) && $row->role === 'WHITE' ) ? true : null, ['required', 'maxlength' => '11']) !!}&nbsp;<span class="text-success">{{ $Fixed['user_role']['WHITE'] }}</span>&nbsp;&nbsp;&nbsp;</label>

			@if ($errors->has('role'))
				<span class="help-block"><strong>{{ $errors->first('role') }}</strong></span>
			@endif
		</div>
	</div>

	<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
		<label class="col-md-3 control-label">ステータス<span class="attention">*</span></label>
		<div class="col-md-8 form-control-static">
			<label>{!! Form::radio('status', 1, (isset($row->status) && $row->status === true) ? true : false, ['required', 'maxlength' => '1']) !!}&nbsp;<span class="text-success">有効&nbsp;&nbsp;&nbsp;</span></label>
			<label>{!! Form::radio('status', 0, (isset($row->status) && $row->status === false) ? true : false, ['required', 'maxlength' => '1']) !!}&nbsp;<span class="text-danger">無効</span></label>

			@if ($errors->has('status'))
				<span class="help-block"><strong>{{ $errors->first('status') }}</strong></span>
			@endif
		</div>
	</div>

	<div class="form-group{{ $errors->has('favor') ? ' has-error' : '' }}">
		<label class="col-md-3 control-label">贔屓<span class="attention">*</span></label>
		<div class="col-md-8 form-control-static">
			<label>{!! Form::select('favor', $Fixed['user_favor'], (!empty($row->favor) ? $row->favor : 5), ['class' => 'form-control']) !!}</label>

			@if ($errors->has('favor'))
				<span class="help-block"><strong>{{ $errors->first('favor') }}</strong></span>
			@endif
		</div>
	</div>





@endif

@if( $mode === 'auth.register')
	<div class="form-group{{ $errors->has('agreement') ? ' has-error' : '' }}">
		<label class="col-md-3 control-label">利用規約<span class="attention">*</span></label>
		<div class="col-md-6 form-control-static">
			<label>{!! Form::checkbox('agreement', '1', null, ['required', 'maxlength' => '1']) !!}&nbsp;<a href="http://yahoo.co.jp/" target="_brank">利用規約</a>に同意します。</label>&nbsp;&nbsp;&nbsp;

			@if ($errors->has('agreement'))
				<span class="help-block"><strong>{{ $errors->first('agreement') }}</strong></span>
			@endif
		</div>
	</div>
@endif