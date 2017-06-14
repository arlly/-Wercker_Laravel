<div class="col-md-10 col-md-offset-2">
	<ul class="breadcrumb">
		<?php $i = 1; ?>
		@foreach($breadcrumb as $key => $val)
			@unless($i === count($breadcrumb))
				<li><a href="{{ $val }}">{{ $key }}</a></li>
			@else
				<li class="active">{{ $key }}</li>
			@endunless
			<?php $i++; ?>
		@endforeach
	</ul>
</div>