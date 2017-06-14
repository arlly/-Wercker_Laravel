{{-- common.form.bill --}}

<div class="table-responsive">
	<table class="table table-bordered table-hover table-striped table-condensed">
		<colgroup>
			<col width="15%">
			<col width="35%">
			<col width="15%">
			<col width="35%">
		</colgroup>
		
		<tr>
			<th class="text-center">名称<span class="attention">*</span></th>
			<td class="text-center">
				<div class="{{ $errors->has('name') ? 'has-error' : '' }}">
					{!! Form::text('name', !empty($row->name) ? $row->name : null, ['required', 'class' => 'form-control', 'maxlength' => '11']) !!}
					
					@if ($errors->has('name'))
						<span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
					@endif
				</div>
			</td>
			<th class="text-center">価値<span class="attention">*</span></th>
			<td class="text-center">
				<div class="{{ $errors->has('value') ? 'has-error' : '' }}">
					{!! Form::tel('value', !empty($row->value) ? $row->value : null, ['required', 'class' => 'form-control', 'maxlength' => '11']) !!}
					
					@if ($errors->has('value'))
						<span class="help-block"><strong>{{ $errors->first('value') }}</strong></span>
					@endif
				</div>
			</td>
		</tr>
	</table>
</div>