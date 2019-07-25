{{-- EDIT PRODUCT --}}

<div class="form-group">
	<input type="hidden" name="outlet_id" value="{{ $outlet->id }}">
	<input class="form-control"  id="name" name="name" placeholder="Product Type" required>
	<input type="hidden" id="typeid" name="typeid" value="">
</div>
<div class="form-group">
	<button type="button" style="display: inline-block;" class="btn btn-secondary md-close">Close me!</button>
	<button type="submit" style="display: inline-block;" class="btn btn-primary">Save</button>
</div>
