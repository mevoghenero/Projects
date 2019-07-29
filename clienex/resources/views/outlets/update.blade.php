<div class="outlet row">
	<input type="hidden" name="id" id="outlet_id" value="{{ $orgs->_id }}">
	<div class="col-md-6">
		<div class="form-group">
			<input type="text" class="form-control" id="outlet_name" name="name" value="{{ old('name')  }}" placeholder="Outlet Name" required>
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group">
			<input type="text" id="outlet_phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" placeholder="Phone Number" required>

			@if ($errors->has('phone'))
			<span class="invalid-feedback" role="alert">
				<strong>{{ $errors->first('phone') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group">
			<input type="text" class="form-control" id="outlet_city" name="city" value="{{ old('city')}}" placeholder="Outlet City" required>
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group">
			<input type="text" class="form-control" id="outlet_state" name="state" value="{{ old('state')}}" placeholder="Outlet State" required>
		</div>
	</div>

	<div class="col-md-12">
		<div class="form-group">
			<input type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"  name="address" id="outlet_address" value="{{ old('address')  }}" placeholder="Outlet Address" required>

			@if ($errors->has('address'))
			<span class="invalid-feedback" role="alert">
				<strong>{{ $errors->first('address') }}</strong>
			</span>
			@endif
		</div>
	</div>
</div>


@section('footer_js')
<!-- multi-select Js -->
<script src="{{ URL::to('assets/plugins/multi-select/js/jquery.quicksearch.js') }}"></script>
<script src="{{ URL::to('assets/plugins/multi-select/js/jquery.multi-select.js') }}"></script>

<!-- form-select-custom Js -->
<script src="{{ URL::to('assets/js/pages/form-select-custom.js') }}"></script>
@stop