<div class="row orgs">
	<input type="hidden" name="orgid" id="orgid">
	<div class="col-md-6">
		<div class="form-group">
			<input type="text" class="form-control" id="orgname" name="name" value="{{ old('name')  }}" placeholder="Organisation's Name" required>
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group">
			<input type="email" id="orgemail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email')  }}" placeholder="E-mail Address" required>

			@if ($errors->has('email'))
			<span class="invalid-feedback" role="alert">
				<strong>{{ $errors->first('email') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group">
			<input type="text" class="form-control" id="orgphone"  name="phone_no" value="{{ old('phone_no')  }}" placeholder="Phone Number" required>
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group">
			<input type="text" class="form-control" id="orgnumber" name="reg_number" value="{{ old('reg_number') }}" placeholder="RC Number">
		</div>
	</div>

	<div class="col-md-12">
		<div class="form-group">
			<div class="input-group mb-3">
				
				<input type="text" name="subdomain" class="form-control" id="orgdomain" disabled>

			</div>
			{{-- <input type="text" class="form-control" name="subdomain" value="{{ old('subdomain') }}" placeholder="Assign Subdomain" required=""> --}}
		</div>
	</div>
</div>
