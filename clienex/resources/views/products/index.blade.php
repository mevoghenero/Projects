@extends('layouts.app')

@section('header_css')
<!-- animation css -->
<link rel="stylesheet" href="{{ URL::to('assets/plugins/animation/css/animate.min.css') }}">
@stop
@section('content')
<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
	<div class="pcoded-wrapper">
		<div class="pcoded-content">
			<div class="pcoded-inner-content">
				<!-- [ breadcrumb ] start -->
				<div class="page-header">
					<div class="page-block">
						<div class="row align-items-center">
							<div class="col-md-12">
								<div class="page-header-title">
								</div>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="/"><i class="feather icon-home"></i></a></li>
									<li class="breadcrumb-item"><a href="#!">outlets</a></li>
									<li class="breadcrumb-item"><a href="#!">list</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- [ breadcrumb ] end -->

				<div class="main-body">
					<div class="page-wrapper">
						<!-- [ Main Content ] start -->
						<div class="row">
							<!-- [ task-board ] start -->
							<div class="col-xl-3 col-lg-12">
								<div class="card task-board-left">
									<div class="card-header">
										<h5>Products</h5>
									</div>
									<div class="card-block">
										<div class="task-right">
											<div class="task-right-header-status">
												<span class="f-w-400" data-toggle="collapse">Oultlet Details</span>	
											</div>
											<div class="taskboard-right-progress">
												<h6 class="m-t-10">Name: {{ $outlets->branch_name }}</h6>
												<div class="progress">
													<div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
												<h6 class="m-t-15">Outlet ID.: {{ $outlets->account_no }}</h6>
												<div class="progress">
													<div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
												<h6 class="m-t-15">Office No.: {{ $outlets->phone }}</h6>
												<div class="progress">
													<div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
												<h6 class="m-t-15">Address: {{ $outlets->address }}</h6>
												<div class="progress">
													<div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
												<h6 class="m-t-15">City: {{ $outlets->city }}</h6>
												<div class="progress">
													<div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
												<h6 class="m-t-15">State: {{ $outlets->state }}</h6>
												<div class="progress">
													<div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div  class="col-xl-9 col-lg-12 filter-bar">
								<nav class="navbar m-b-30 p-10">
									<ul class="nav">
										{{-- <li class="nav-item">
											<a class="nav-link text-secondary" href="{{ route('cat.index') }}"><i class="fas fa-user-cog"></i> Product Category</a>
										</li>

										<li class="nav-item">
											<a class="nav-link text-secondary" href="{{ route('type.index') }}"><i class="fas fa-user-cog"></i> Product Type</a>
										</li> --}}
									</ul>
									<div class="nav-item nav-grid f-view">
										<button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#productCenter">Add New +</button>
									</div>
								</nav>

								{{-- Flash Message --}}
								@include('messages.flash')

								<div class="row">
									<!-- [ Responsive table ] start -->
									<div class="col-sm-12">
										<div class="card">
											<div class="card-block">
												<div class="table-responsive">
													<table id="responsive-table" class="Legendary display table dt-responsive nowrap" style="width:100%">
														<thead>
															<tr>
																<th>N/S</th>
																<th>Name</th>
																<th>Type</th>
																<th>Category</th>
																<th>Qty</th>
																<th>Unit SP</th>
																<th>Unit CP</th>
																<th>Total CP</th>
																<th>Manufacturer</th>
																<th>Ref No.</th>
																<th>Manu Date</th>
																<th>Expire Date</th>
																<th>Created</th>
																<th>Update</th>
																<th>Delete</th>
															</tr>
														</thead>
														<tbody>
															{{-- Table included here --}}
															@include('products._table')
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
									<!-- [ Responsive table ] end -->
								</div>
							</div>
							<!-- [ task-board ] end -->
						</div>
						<!-- [ Main Content ] end -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


{{-- ADD NEW PRODUCT --}}
<div class="card-body">
	<div class="card">
		<div id="productCenter" class="modal fade" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="card-header">
						<h5 class="modal-title " id="exampleModalCenterTitle">Create Product</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="card-body">
						<form id="validation-form123" method="post" action="{{ route('product.store') }}">
							{{ csrf_field() }}
							@include('products.create')
							<br>
							<div class="modal-footer">
								<div class="form-group">
									<button style="margin-bottom: -6%" type="submit" class="btn btn-primary">Save</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


{{-- UPDATE PRODUCT --}}
<div class="col-md-12">
	<div class="card-body">
		<div class="card">
			<div id="productUpdate" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="card-header">
							<h5 class="modal-title " id="exampleModalCenterTitle">Update Product</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="card-body">
							<form id="validation-form123" method="post" action="{{ route('product.update', 'outlet') }}">
								{{ csrf_field() }}
								{{ method_field('put') }}
								@include('products.update')
								<br>
								<div class="modal-footer">
									<button style="margin-bottom: -6%" type="submit" class="btn btn-primary">Save changes</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<div class="md-overlay"></div>
@stop
@section('footer_js')
<script>
	$('#exampleModal').on('show.bs.modal', function(event) {
		console.log(event.target);

	});
</script>
<script>
	function checkTime(i) {
		if (i < 10) {
			i = "0" + i;
		}
		return i;
	}

	function startTime() {
		var today = new Date();
		var h = today.getHours();
		var m = today.getMinutes();
		var s = today.getSeconds();
  // add a zero in front of numbers<10
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('time').innerHTML = h + ":" + m + ":" + s;
  t = setTimeout(function() {
  	startTime()
  }, 500);
}
startTime();
console.log(time)
</script>
<!-- jquery-validation Js -->
<script src="{{ URL::to('assets/plugins/jquery-validation/js/jquery.validate.min.js') }}"></script>
<!-- form-picker-custom Js -->
<script src="{{ URL::to('assets/js/pages/form-validation.js') }}"></script>
@stop