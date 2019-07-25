<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<input type="text" class="form-control" name="name" value="{{ old('name') ?? $outlets->branch_name  }}" placeholder="Outlet Name" required>
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group">
			<select name="org_id" class="form-control" id="exampleFormControlSelect1" required>
				@foreach($orgs as $org)
				<option value="" selected disabled hidden>Select Head Office</option>
				<option value="{{ $org->_id }}"
					{{ $outlets->organisation_id == $org->_id ? 'selected'  : ''}}
					>
					{{ $org->name }}
				</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<input type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') ?? $outlets->phone }}" placeholder="Phone Number" required>

				@if ($errors->has('phone'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('phone') }}</strong>
				</span>
				@endif
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<input type="text" class="form-control" name="city" value="{{ old('city') ?? $outlets->city }}" placeholder="Outlet City" required>
			</div>
		</div>

		<div class="col-md-12">
			<div class="form-group">
				<input type="text" class="form-control" name="state" value="{{ old('state') ?? $outlets->state}}" placeholder="Outlet State" required>
			</div>
		</div>

		<div class="col-md-12">
			<div class="form-group">
				<input type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"  name="address" value="{{ old('address') ?? $outlets->address }}" placeholder="Outlet Address" required>

				@if ($errors->has('address'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('address') }}</strong>
				</span>
				@endif
			</div>
		</div>
	</div>
	<button class="btn btn-primary" style="float:right">Save</button>

	@section('footer_js')
	<!-- multi-select Js -->
	<script src="{{ URL::to('assets/plugins/multi-select/js/jquery.quicksearch.js') }}"></script>
	<script src="{{ URL::to('assets/plugins/multi-select/js/jquery.multi-select.js') }}"></script>

	<!-- form-select-custom Js -->
	<script src="{{ URL::to('assets/js/pages/form-select-custom.js') }}"></script>
	@stop