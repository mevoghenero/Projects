<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<input type="text" class="form-control" name="first_name" value="{{ old('first_name') ?? $admins->first_name }}" placeholder="First Name" required>
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group">
			<input type="text" class="form-control" name="last_name" value="{{ old('last_name') ?? $admins->last_name }}" placeholder="Last Name" required>
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group">
			<input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"  name="email" value="{{ old('email') ?? $admins->email }}" placeholder="E-mail Address" required>

			@if ($errors->has('email'))
			<span class="invalid-feedback" role="alert">
				<strong>{{ $errors->first('email') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group">
			<input type="text" class="form-control" name="phone_no" value="{{ old('phone_no') ?? $admins->phone_no}}" placeholder="Phone Number" required>
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group">
			<input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" pattern=".{6,}"   title="6 characters minimum">

			@if ($errors->has('password'))
			<span class="invalid-feedback" role="alert">
				<strong>{{ $errors->first('password') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group">
			<input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group">
			<select name="role[]" class="form-control " required>
				<option value="" selected disabled>Assign Role</option>
				@foreach($roles as $role)
				<option value="{{ $role->id }}"
					@foreach($admins->roles as $user)
					{{ $user->id == $role->id ? 'selected' : '' }}
					@endforeach
					>{{ $role->name }}</option>
					@endforeach
					
				</select>
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<select name="organisation_id" class="form-control " required>
				<option value="" selected disabled>Select Organisation</option>
				@foreach($orgs as $org)
				<option value="{{ $org->id }}" {{ $admins->_id == $org->_id ? 'selected' : '' }}>{{ $org->name }}</option>
				@endforeach
			</select>
			</div>
		</div>
	{{-- @foreach($viewAdmin->role as $admin)
	{{ $admin->id == $role->id ? 'checked' : '' }}
	@endforeach --}}

</div>
<button class="float-right btn btn-primary">{{ $usersUpdate ?? 'Save' }}</button>
