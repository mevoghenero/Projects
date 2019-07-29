<div class="col-sm-12">
	<div class="card">
		<div class="card-block">
			<div class="table-responsive">
				<table id="scrolling-table" class="display table nowrap table-striped table-hover" style="width:100%">
					<thead>
						<tr>
							<th>Name</th>
							<th>Qty</th>
							<th>Price</th>
							<th>Stock</th>
							<th>Order</th>
						</tr>
					</thead>
					<tbody>
						@foreach($products as $product)
						@if($product->outlet_id == request()->segment(2))
						<tr>
							<td>{{ $product->name }}</td>
							<td><input class="text-center qty" type="text" name="qty" size="3" value="2"></td>
							<td>{{ $product->unit_sp }}</td>
							<td>{{ $product->qty }}</td>
							<td><a href="{{ route('inventory.cart', $product->id) }}" class="btn btn-primary additems" >add</a></td>
						</tr>
						@endif
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>Name</th>
							<th>Qty</th>
							<th>Price</th>
							<th>Stock</th>
							<th>Order</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>
