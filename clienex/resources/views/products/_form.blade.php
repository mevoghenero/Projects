<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<input type="text" class="form-control" name="name" value="{{ old('name') ?? $products->name }}" placeholder="Product's Name" required>
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group">
			<input type="manufacturer" class="form-control{{ $errors->has('manufacturer') ? ' is-invalid' : '' }}" name="manufacturer" value="{{ old('manufacturer') ?? $products->manufacturer }}" placeholder="Manufacturer" required>

			@if ($errors->has('manufacturer'))
			<span class="invalid-feedback" role="alert">
				<strong>{{ $errors->first('manufacturer') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group">
			<select name="type_id" class="form-control" id="exampleFormControlSelect1" required>
				<option value="" selected disabled hidden>Select Product Type</option>
				@foreach($types as $type)
				<option value="{{ $type->_id }}"
					{{ $products->type_id == $type->_id ? 'selected'  : ''}}
					>
					{{ $type->name }}
				</option>
				@endforeach
			</select>
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group">
			<select name="category[]" class="form-control" id="exampleFormControlSelect1" required>
				@foreach($categories as $category)
				<option value="" selected disabled hidden>Select Product Category</option>
				<option value="{{ $category->id }}"
					@foreach($products->category as $product)
					{{ $product->id == $category->id ? 'selected' : '' }}
					@endforeach
					>{{ $category->cat_name }}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
				<input type="number" class="form-control"  name="qty" value="{{ old('qty') ?? $products->qty }}" placeholder="Quantity" required>
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
				<input type="number" class="form-control" name="unit_cp" value="{{ old('unit_cp') ?? $products->unit_cp}}" placeholder="Unit Cost Price">
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
				<input type="number" class="form-control" name="unit_sp" value="{{ old('unit_sp') ?? $products->unit_sp}}" placeholder="Unit Sale Price" required="">
			</div>
		</div>

		<div class="col-md-12">
			<div class="form-group">
				<input type="text" class="form-control" name="ref_no" value="{{ old('ref_no') ?? $products->ref_no}}" placeholder="Ref. Number" required="">
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<input type="text" class="form-control" name="manu_date" id="d_today" value="{{ old('manu_date') ?? $products->manu_date}}" placeholder="Manu. Date" required="">
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<input type="text" class="form-control" name="expire_date" id="d_auto" value="{{ old('expire_date') ?? $products->expire_date}}" placeholder="Expiring Date" required="">
			</div>
		</div>
	</div>
	<button class="float-right btn btn-primary">{{ $prodUpdate ?? 'Save' }}</button>
