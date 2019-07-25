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
								<!-- </div> -->
									<ul class="breadcrumb">
										<li class="breadcrumb-item"><a href="/"><i class="feather icon-home"></i></a></li>
										<li class="breadcrumb-item"><a href="">user</a></li>
										<li class="breadcrumb-item"><a href="#!">add user</a></li>
									</ul>
									<!-- [ breadcrumb ] end -->
									<div class="main-body">
									<div class="page-wrapper">
									<!-- [ Main Content ] start -->
									<div class="row">
									<!-- [ configuration table ] start -->
									<div class="col-sm-12">
									<div class="card">
									<div class="card-header">
										<h5 class="float-left">User-Profile</h5>
									</div>
									<!-- card content -->
									<div class="container-fluid">
									@if($errors->any())
										@foreach($errors->all() as $error)
										{{ $error }}
										@endforeach
									@endif
										<div class="row">
											<div class="col-md-6">
												<div class="card">
                        							<div class="card-block">
                            							<div class="text-center m-b-30">
                                							<img class="img-fluid rounded-circle" src="" alt="Clienex-User">
                                							<h5 class="mt-3">Clienex</h5>
                            							</div>
														<form action="{{route('profile.store')}}" method="POST">
														@csrf
                            							<div class="row m-t-30">
                                							<div class="col-6 p-r-0 form-group">
                                    							<input type="file" name="file" >
                                							</div>
                            							</div>
														</form>
                        							</div>
                    							</div>
											</div>
											<!-- The form content -->
											<div class="col-md-6">
												<div class="row">
													<div class="col-md-12">

														<form action="{{route('profile.store')}}" method="POST" >
															@csrf

															<div class="form-group">
																<input type="text" placeholder="First Name" name="firstName" class="form-control" required>
															</div>

															<div class="form-group">
																<input type="text" placeholder="Last Name" name="lastName" class="form-control" required>
															</div>

															<div class="form-group">
																<input type="text" placeholder="E-mail Address" name="email" class="form-control" required>
																@if($errors->has('email'))
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $errors->first('email') }}</strong>
																</span>
																@endif
															</div>
													</div>
													<div class="col-md-12">
															<div class="form-group">
																<input type="text" placeholder="Phone Number" name="phoneNo" class="form-control" required>
															</div>

															<div class="form-group">
																<input type="password" placeholder="Password" name="password" class="form-control" required>
															
															@if($errors->has('password'))
				`											<span class="invalid-feedback" role="alert">
															   <strong>{{ $errors->first('password') }}</strong>
															</span>
															@endif
															</div>

															<div class="form-group">
															    <input type="password" placeholder="Confirm Password" name="confirmPassword" class="form-control" required>
															</div>

															<button type="submit" class="btn btn-primary">submit</button>
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
				</div>
			</div>
		</div>
	</div>
</div>
</section>
@stop
				
				






							