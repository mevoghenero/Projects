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
									<li class="breadcrumb-item"><a href="#!">admin</a></li>
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
							@include('messages.flash')
							<!-- [ configuration table ] start -->
							<div class="col-sm-12">
								<div class="card">
									<div class="card-header">
										<h5>Admin List</h5>
										<div class="float-right">
											<a href="{{ route('comapny.view') }}" class="btn btn-md btn-primary hidden-xs Note-add md-trigger" data-modal="modal-6">Add New +</a>
										</div>
									</div>
									<div class="card-block">
										<div class="table-responsive">
											<table id="zero-configuration" class="Legendary display table nowrap table-striped table-hover" style="width:100%">
												<thead>
													<tr>
														<th>N/S</th>
														<th>First Name</th>
														<th>Email</th>
														<th>Role</th>
														<th>Created</th>
														<th>Edit</th>
														<th>Delete</th>
													</tr>
												</thead>
												<tbody>
													@include('manageAdmins._table')
													
												</tbody>
												<tfoot>
													<tr>
														<th>N/S</th>
														<th>First Name</th>
														<th>Email</th>							
														<th>Role</th>
														<th>Created</th>
														<th>Edit</th>
														<th>Delete</th>
													</tr>
												</tfoot>
											</table>
										</div>
									</div>
								</div>
							</div>
							<!-- [ configuration table ] end -->	
							
						</div>
						<!-- [ Main Content ] end -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- [ Main Content ] end -->
@stop

