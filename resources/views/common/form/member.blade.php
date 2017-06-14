{{-- common.form.member --}}

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

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	<label class="col-md-3 control-label">Eメールアドレス<span class="attention">*</span></label>
	<div class="col-md-8">
		{!! Form::email('email', (!empty($row->email) ? $row->email : null), ['required', 'class' => 'form-control', 'maxlength' => '255', 'placeholder' => '']) !!}

		@if ($errors->has('email'))
			<span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
	<label class="col-md-3 control-label">パスワード<?php if($mode !== 'admin.member.edit'):?> <span class="attention">*</span><?php endif;?></label>
	<div class="col-md-8">
		<input type="password" class="form-control" name="password" <?php if($mode !== 'admin.member.edit'):?> required="required"<?php endif;?> maxlength="16" />
		@if(false)<span class="text-info">8文字以上16文字以内で入力してください。</span>@endif
		@if ($errors->has('password'))
			<span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
	<label class="col-md-3 control-label">パスワード(確認用)<?php if($mode !== 'admin.member.edit'):?> <span class="attention">*</span><?php endif;?></label>
	<div class="col-md-8">
		<input type="password" class="form-control" name="password_confirmation" <?php if($mode !== 'admin.member.edit'):?> required="required"<?php endif;?> maxlength="16" />
	</div>
</div>

@if( $mode === 'admin.member.add' || auth()->guard('admin')->user()->hasAuthority( $row->id ) )
	<div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
		<label class="col-md-3 control-label">権限<span class="attention">*</span></label>
		<div class="col-md-8 form-control-static">
			<label>{!! Form::radio('role', 'ADMINISTRATOR', ( isset($row->role) && $row->role === 'ADMINISTRATOR' ) ? true : null, ['required', 'maxlength' => '11']) !!}&nbsp;<span class="text-warning">{{ $Fixed['admin_role']['ADMINISTRATOR'] }}</span>&nbsp;&nbsp;&nbsp;</label>
			<label>{!! Form::radio('role', 'OPERATOR', ( isset($row->role) && $row->role === 'OPERATOR' ) ? true : null, ['required', 'maxlength' => '11']) !!}&nbsp;<span class="text-success">{{ $Fixed['admin_role']['OPERATOR'] }}</span>&nbsp;&nbsp;&nbsp;</label>
			<label>{!! Form::radio('role', 'RATEOPERATOR', ( isset($row->role) && $row->role === 'RATEOPERATOR' ) ? true : null, ['required', 'maxlength' => '11']) !!}&nbsp;<span class="text-success">{{ $Fixed['admin_role']['RATEOPERATOR'] }}</span>&nbsp;&nbsp;&nbsp;</label>
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
@endif