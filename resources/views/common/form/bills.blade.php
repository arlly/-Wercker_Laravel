{{-- common.form.bills --}}

<div class="table-responsive">
	<table class="table table-bordered table-hover table-striped table-condensed">
		<colgroup>
			<col width="30%">
			<col width="70%">
		</colgroup>
		
		<tr>
			<th class="text-center">紙幣名称</th>
			<th class="text-center">数量</th>
		</tr>
		
		@foreach($bills as $bill)
			<tr>
				<td class="text-center" colspan="1">{{ $bill->name }}</td>
				<td class="text-center" colspan="1">
					<div class='{{ $errors->has("amount.$bill->id") ? "has-error" : "" }}'>
						{!! Form::tel("amount[$bill->id]", !empty($bill->amount) ? $bill->amount : 0, ['required', 'class' => 'form-control', 'maxlength' => '11']) !!}

						@if ($errors->has("amount.$bill->id"))
							<span class="help-block"><strong>{{ $errors->first("amount.$bill->id") }}</strong></span>
						@endif
					</div>
				</td>
			</tr>
		@endforeach
	</table>
</div>