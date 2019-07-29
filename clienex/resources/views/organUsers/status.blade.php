@extends('layouts.app')

@section('header_css')
<!-- footable css -->
<link rel="stylesheet" href="{{ URL::to('assets/plugins/footable/css/footable.bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ URL::to('assets/plugins/footable/css/footable.standalone.min.css') }}">
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
									<li class="breadcrumb-item">
										@if(auth()->user()->load('organisation'))
										<a href="{{ route('outlet.index', auth()->user()->organisation_id) }}"><i class="feather icon-home"></i></a>
										@endif
									</li>
									<li class="breadcrumb-item"><a href="{{ route('user.index') }}">employee</a></li>
									<li class="breadcrumb-item"><a href="#!">status</a></li>
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
							<!-- [ foo-table ] start -->
							<div class="col-sm-12">
								<div class="card">
									<div class="card-header">
										<h5>Status</h5>
										
									</div>
									<div class="card-block">
										<table id="simpletable" class="table dt-responsive task-list-table table-striped table-bordered nowrap">
											<thead>
												<tr>
													<th>#</th>
													<th>First Name</th>
													<th data-breakpoints="xs">Last Name</th>
													<th data-breakpoints="xs">Outlet</th>
													<th data-breakpoints="xs">Role</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>
												@foreach($users as $user)
												<tr>
													<td>{{ $loop->index + 1 }}</td>
													<td>{{ $user->first_name}}</td>
													<td>{{  $user->last_name }}</td>
													<td>
														@foreach($outlets as $outlet)
														{{ $user->outlet_id == $outlet->_id ? $outlet->branch_name : '' }}
														@endforeach
													</td>
													<td>
														@foreach($user->roles as $role)
														{{ $role->name }}
														@endforeach
													</td>
													<td>
														@if($user->status == 3)
														<form method="post" class="btn-submit" action="{{ route('user.updateStatus', $user->_id) }}">
															{{ csrf_field() }}
															{{ method_field('put') }}
															<input type="hidden" name="status" value="0">
															<button type="submit" class="btn-submit btn btn-success">Active</button>
														</form>
														@else
														<form method="post" class="btn-submit" action="{{ route('user.updateStatus', $user->_id) }}">
															{{ csrf_field() }}
															{{ method_field('put') }}
															<input type="hidden" name="status" value="3">
															<button  type="submit" class="btn-submit btn btn-danger">Inactive</button>
														</form>
														@endif
													</td>

												</tr>
												@endforeach

											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- [ foo-table ] end -->
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
@section('footer_js')
<!-- footable Js -->
<script src="{{ URL::to('assets/plugins/footable/js/footable.min.js') }}"></script>
<script>
	$(function() {
		$(".btn-submit").submit(function(e) {	
        //get the action-url of the form
        var actionurl = e.currentTarget.action;
        //handle the request
        $.ajax({
        	url: actionurl,
        	type: 'post',
        	dataType: 'application/json',
        	data: $(".btn-submit").serialize(),
        	success: function(data) {
        		return false;
        	}
        });
        //prevent Default functionality
        e.preventdefault();
    });
	});
</script>
@stop