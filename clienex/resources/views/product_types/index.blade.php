@extends('layouts.app')

@section('header_css')
<!-- data tables css -->
<link rel="stylesheet" href="{{ URL::to('assets/plugins/data-tables/css/datatables.min.css') }}">
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
									{{--  --}}
								</div>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="/"><i class="feather icon-home"></i></a></li>
									<li class="breadcrumb-item"><a href="#!">type</a></li>
									<li class="breadcrumb-item"><a href="#!">product type</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				@include('messages.flash')
				<!-- [ breadcrumb ] end -->
				<div class="main-body">
					<div class="page-wrapper">
						<!-- [ Main Content ] start -->
						<div class="row">
							<!-- [ task-list ] start -->
							<div class="col-sm-12">
								<div class="card">
									<div class="card-header">
										<h5>Product Type</h5>
										<div class="float-right">
											<a href="#!" class="btn btn-md btn-primary hidden-xs Note-add md-trigger" data-modal="modal-6">Add New +</a>
										</div>
									</div>
									<div class="card-block task-data">
										<div class="table-responsive form-material">
											<table id="simpletable" class="Legendary table dt-responsive task-list-table table-striped table-bordered nowrap">
												<thead>
													<tr>
														<th>#</th>
														<th>Product Type</th>
														<th>Created</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody class="task-page">
													@foreach($types as $type)
													@if($type->outlet_id == $outlet->id)
													@include('product_types._table')
													@endif
													@endforeach
												</tbody>
											</table>
										</div>
									</div>
								</div>

							</div>
							<!-- [ task-list ] end -->
						</div>
						<!-- [ Main Content ] end -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- [ Main Content ] end -->


{{-- MODAL FOR CREATING PRODUCT TYPE --}}
<div class="md-modal md-effect-6" id="modal-6">
	<div class="col-sm-12">
		<div class="md-content card">
			<div class="card-header">
				<h5>New Product Type</h5>
			</div>

			<div>
				<div class="card-block">

					<form id="validation-form123" method="post" action="{{ route('type.store') }}">
						@csrf
						@include('product_types._form')
					</form>
					
				</div>
			</div>
		</div>
	</div>
</div>

{{-- MODAL FOR EDITING PRODUCT TYPE --}}
<div class="md-modal md-effect-6"  id="modal-7">
	<div class="col-sm-12">
		<div class="md-content card">
			<div class="card-header">
				<h5>Edit Product Type</h5>
			</div>
			<div>
				<div class="card-block">
					<form class="modal-body" id="validation-form123" method="post" action="{{ route('type.update', 'type') }}">
						{{ method_field('put') }}
						@csrf
						<div id="modal-body">
							@include('product_types._form')
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="md-overlay"></div>

@stop
@section('footer_js')
<!-- jquery-validation Js -->
<script src="{{ URL::to('assets/plugins/jquery-validation/js/jquery.validate.min.js') }}"></script>
<!-- form-picker-custom Js -->
<script src="{{ URL::to('assets/js/pages/form-validation.js') }}"></script>
<!-- Data tables.js -->
<script src="{{ URL::to('assets/plugins/data-tables/js/datatables.min.js') }}"></script>
@stop

