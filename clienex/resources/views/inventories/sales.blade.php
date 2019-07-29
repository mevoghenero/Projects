<div class="container" id="printTable">
	<div class="card-block">
		@if(Session::has('cart'))
		<div class="row">
			<div class="col-sm-12">
				<div class="table-responsive">
					<table class="table  invoice-detail-table">
						<thead>
							<tr class="thead-default">
								<th>Product(s)</th>
								<th>Quantity</th>
								<th>Amount</th>
								<th>Total</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($items as $item)
							<tr>
								
								<td>
									<h6>{{ $item['item']['name'] }}</h6>
								</td>
								<td>{{ $item['qty'] }}</td>
								<td>{{ $item['item']['unit_sp'] }}</td>
								<td>{{ $item['price'] }}</td>
								<td><a class="dropdown-toggle addon-btn" data-toggle="dropdown" aria-expanded="true">
									<i class="feather icon-minus-circle"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item md-trigger" data-modal="modal-7" data-typeid="" data-myname="" href="#!"><i class="icofont icofont-attachment"></i>Reduce</a>
									<a class="dropdown-item legend-delete remove" href="#!" data-id=""><i class="icofont icofont-ui-edit"></i>Remove All</a>
								</div>

							</td>
						</tr>
						@endforeach

					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<table class="table table-responsive invoice-table invoice-total">
				<tbody>
					<tr>
						<th>Sub Total :</th>
						<td>{{ $totalPrice }}</td>
					</tr>

					<tr class="text-info">
						<td>
							<hr />
							<h5 class="text-primary m-r-10">Total:</h5>
						</td>
						<td>
							<hr />
							<h5 class="text-primary">{{ $totalPrice }}</h5>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="row text-center">
		<div class="col-sm-12 invoice-btn-group text-center">
			<button type="button" class="btn btn-primary btn-print-invoice m-b-10">Print</button>
			<button type="button" class="btn btn-secondary m-b-10 ">Confirm</button>
		</div>
	</div>
	@else
	<h5>No Item(s) On Cart</h5>
	@endif
</div>
</div>
