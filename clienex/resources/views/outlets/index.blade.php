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

				{{-- Flash Message --}}
				@include('messages.flash')

				<div class="main-body">
					<div class="page-wrapper">
						<!-- [ Main Content ] start -->
						<div class="row">
							<!-- [ task-board ] start -->
							<div class="col-xl-3 col-lg-12">
								<div class="card task-board-left">
									<div class="card-header">
										<h5>Outlets</h5>
									</div>
									<div class="card-block">
										<div class="task-right">
											<div class="task-right-header-status">
												<span class="f-w-400" data-toggle="collapse">Organisation Details</span>	
											</div>
											<div class="taskboard-right-progress">
												<h6 class="m-t-10">Name: {{ $orgs->name }}</h6>
												<div class="progress">
													<div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
												<h6 class="m-t-15">RC No.: {{ $orgs->reg_number }}</h6>
												<div class="progress">
													<div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
												<h6 class="m-t-15">Email: {{ $orgs->email }}</h6>
												<div class="progress">
													<div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
												<h6 class="m-t-15">Phone No: {{ $orgs->phone_no }}</h6>
												<div class="progress">
													<div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
												<h6 class="m-t-15">Domain: {{ $orgs->subdomain }}</h6>
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
										<li class="nav-item">
											<a class="nav-link text-secondary" href="{{ route('user.index') }}"><i class="fas fa-user-cog"></i> Employees</a>
										</li>

										<li class="nav-item">
											<a class="nav-link text-secondary" href="{{ route('user.status') }}"><i class="fas fa-user-lock"></i> Employee Status</a>
											
										</li>

										<li class="nav-item">
											<a class="nav-link text-secondary" href="{{ route('user.index') }}"><i class="fas fa-chart-bar"></i> Analysis</a>
											
										</li>
									</ul>
									<div class="nav-item nav-grid f-view">
										<button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#addoutletCenter">Add New +</button>
									</div>
								</nav>
								<div class="row">
									@foreach($outlets as $outlet)
									@include('outlets._table')
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

{{-- UPDATE OUTLET --}}
<div class="col-sm-12">
	<div class="card-body">
		<div class="card">
			<div id="updateModalCenter" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="card-header">
							<h5 class="modal-title " id="exampleModalCenterTitle">Update Outlet</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="card-body">
							<form id="validation-form123" method="post" action="{{ route('outlet.update', 'outlet') }}">
								{{ csrf_field() }}
								{{ method_field('put') }}
								@include('outlets.update')
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

{{-- ADD NEW OUTLET --}}
<div class="card-body">
	<div class="card">
		<div id="addoutletCenter" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="card-header">
						<h5 class="modal-title " id="exampleModalCenterTitle">Create Outlet</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="card-body">
						<form id="validation-form123" method="post" action="{{ route('outlet.store') }}">
							{{ csrf_field() }}
							
							@include('outlets.create')
							
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