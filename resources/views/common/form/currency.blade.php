{{-- common.form.currency --}}

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
				<th class="text-center">通貨名<span class="attention">*</span></th>
				<td class="text-center">
					<div class="{{ $errors->has('name') ? 'has-error' : '' }}">
						{!! Form::text('name', !empty($currency->name) ? $currency->name : null, ['required', 'class' => 'form-control', 'maxlength' => '11']) !!}
						
						@if ($errors->has('name'))
							<span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
						@endif
					</div>
				</td>
				<th class="text-center">ステータス<span class="attention">*</span></th>
				<td class="text-center">
					<div class="{{ $errors->has('status') || $errors->has('status_off') ? 'has-error' : '' }}">
						<label>{!! Form::radio('status', 1, true, ['required', 'maxlength' => '1']) !!}&nbsp;<span class="text-success">有効&nbsp;&nbsp;&nbsp;</span></label>
						<label>{!! Form::radio('status', 0, (isset($currency->status) && $currency->status === false) ? true : false, ['required', 'maxlength' => '1']) !!}&nbsp;<span class="text-danger">無効</span></label>
						
						@if ($errors->has('status'))
							<span class="help-block"><strong>{{ $errors->first('status') }}</strong></span>
						@endif
					</div>
				</td>
			</tr>
			<tr>
				<th class="text-center">単位<span class="attention">*</span></th>
				<td class="text-center">
					<div class="{{ $errors->has('unit') ? 'has-error' : '' }}">
						{!! Form::tel('unit', !empty($currency->unit) ? $currency->unit : null, ['required', 'class' => 'form-control', 'maxlength' => '11']) !!}
						
						@if ($errors->has('unit'))
							<span class="help-block"><strong>{{ $errors->first('unit') }}</strong></span>
						@endif
					</div>
				</td>
				<th class="text-center">記号<span class="attention">*</span></th>
				<td class="text-center">
					<div class="{{ $errors->has('symbol') ? 'has-error' : '' }}">
						{!! Form::tel('symbol', !empty($currency->symbol) ? $currency->symbol : null, ['required', 'class' => 'form-control', 'maxlength' => '11']) !!}
						
						@if ($errors->has('symbol'))
							<span class="help-block"><strong>{{ $errors->first('symbol') }}</strong></span>
						@endif
					</div>
				</td>
			</tr>
		</tbody>
	</table>
</div>