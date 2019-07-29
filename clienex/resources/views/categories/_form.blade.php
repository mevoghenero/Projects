{{-- EDIT PRODUCT CATEGORY --}}
<div class="form-group">
	<input type="hidden" name="outlet_id" value="{{ $outlet->_id }}">
	<input class="form-control"  id="cat_name" name="cat_name" placeholder="Product Category" required>
	<input type="hidden" id="cat_id" name="cat_id" value="">
</div>
<div class="form-group">
	<button type="button" style="display: inline-block;" class="btn btn-secondary md-close">Close me!</button>
	<button type="submit" style="display: inline-block;" class="btn btn-primary">Save</button>
</div>
