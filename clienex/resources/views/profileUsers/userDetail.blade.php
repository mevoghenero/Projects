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
								<!-- </div> -->
									<ul class="breadcrumb">
										<li class="breadcrumb-item"><a href="/"><i class="feather icon-home"></i></a></li>
										<li class="breadcrumb-item"><a href="">user</a></li>
										<li class="breadcrumb-item"><a href="#!">add user</a></li>
									</ul>
                                        <div class="col-md-6">
                                                    <table class="table table-bordered">
                                                        <!-- <thead>
                                                            <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Task Name</th>
                                                            <th scope="col">Text</th>
                                                            <th scope="col">Edit</th>
                                                            <th scope="col">Delete</th>
                                                            </tr>
                                                        </thead> -->
                                                        {{-- Flash Message --}}
								                         @include('messages.flash')
                                                        <tbody>
                                                            <tr>
                                                            <td>{{$profile->file}}</td>
                                                            <td>{{$profile->firstName}}</td>
                                                            <td>{{$profile->lastName}}</td>
                                                            <td>{{$profile->email}}</td>
                                                            <td>{{$profile->phoneNo}}</td>
                                                            <td>{{$profile->password}}</td>
                                                            <td><a class="btn btn-success" href="{{route('profile.edit')}}">Edit</a></td>
                                                            </tr>
                                                        </tbody>
                                                        </table> 
                                                </div>
                                            </div>
                                        </div>
                                        @stop
