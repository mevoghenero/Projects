@extends('layouts.app')

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
									<li class="breadcrumb-item"><a href="#!">organisation</a></li>
									<li class="breadcrumb-item"><a href="#!">list</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- [ breadcrumb ] end -->
				@include('messages.flash')
				<div class="main-body">
					<div class="page-wrapper">
						<!-- [ Main Content ] start -->
						<div class="row">
							<!-- [ task-board ] start -->

							<div class="col-xl-12 col-lg-12 filter-bar">
								<nav class="card-header navbar m-b-30 p-10">

									<h5>Organisations</h5>
									<div class="float-right">
										<a href="#" id="addorg" class=" btn btn-md btn-primary hidden-xs Note-add md-trigger" data-toggle="modal" data-target="#addoutletCenter">Add New +</a>
									</div>
								</nav>
								<div class="row">
									@foreach($orgs as $org)
									@include('organisations._display')
									@endforeach

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

{{-- ADD NEW OUTLET --}}
<div class="card-body">
	<div class="card">
		<div id="addoutletCenter" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="card-header">
						<h5 class="modal-title " id="exampleModalCenterTitle">Create Organisation</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="card-body">
						<form id="validation-form123" method="post" action="{{ route('org.store') }}">
							{{ csrf_field() }}
							@include('organisations.create')
							<br>
							<div class="modal-footer">
								<button style="margin-bottom: -6%" type="submit" class="btn btn-primary">Save</button>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

{{-- UPDATE OUTLET --}}
<div class="col-sm-12">
	<div class="card-body">
		<div class="card">
			<div id="OrgansModalCenter" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="card-header">
							<h5 class="modal-title " id="exampleModalCenterTitle">Update Organisation</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="card-body">
							<form id="validation-form123" method="post" action="{{ route('org.update', 'org') }}">
								{{ csrf_field() }}
								{{ method_field('put') }}
								@include('organisations.update')
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
	$(document).on('#addorg', function(event) {
		console.log(event.target);

	});
</script>
<!-- jquery-validation Js -->
<script src="{{ URL::to('assets/plugins/jquery-validation/js/jquery.validate.min.js') }}"></script>
<!-- form-picker-custom Js -->
<script src="{{ URL::to('assets/js/pages/form-validation.js') }}"></script>
@stop
