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
									<li class="breadcrumb-item"><a href="{{ route('company.index') }}">admin</a></li>
									<li class="breadcrumb-item"><a href="#!">update</a></li>
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
							<!-- [ configuration table ] start -->
							<div class="col-sm-12">
								<div class="card">
									<div class="card-header">
										<h5 class="float-left">Update Admin</h5>
									</div>

									<div class="card-block ">
										<div class="col-sm-8 offset-sm-2">
											<form id="validation-form123" method="post" action="{{ route('comapny.update', $admins->id) }}">
												{{ csrf_field() }}
												{{ method_field('put') }}
												@include('manageAdmins._form', [
													$usersUpdate = 'Save Changes'
													])
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	@stop

	@section('footer_js')
	<!-- jquery-validation Js -->
	<script src="{{ URL::to('assets/plugins/jquery-validation/js/jquery.validate.min.js') }}"></script>
	<!-- form-picker-custom Js -->
	<script src="{{ URL::to('assets/js/pages/form-validation.js') }}"></script>
	<script type="text/javascript">
		setTimeout(
			function() { $(':password').val(""); },
            1000  //1,000 milliseconds = 1 second
            );
        </script>
        @stop

