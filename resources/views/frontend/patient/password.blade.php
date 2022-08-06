@extends('frontend.layouts.app')

@section('main')
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{asset('patient.settings.page')}}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Profile Settings</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Profile Settings</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">
					
					    <!-- Profile Sidebar -->
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
							<div class="profile-sidebar">
								<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">
										<a href="#" class="booking-doc-img">
											<img src="frontend/assets/img/patients/patient.jpg" alt="User Image">
										</a>
										<div class="profile-det-info">
											<h3>Richard Wilson</h3>
											<div class="patient-details">
												<h5><i class="fas fa-birthday-cake"></i> 24 Jul 1983, 38 years</h5>
												<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> Newyork, USA</h5>
											</div>
										</div>
									</div>
								</div>
                                <!--Dashboard Menu Start-->
								<div class="dashboard-widget">
									@include('frontend.patient.menu')
								</div>
								<!--Dashboard Menu End-->

							</div>
						</div>
						<!-- /Profile Sidebar -->
						
                        <!--Change Password Start-->
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col-md-12 col-lg-6">

                                        @include('validate')
										
											<!-- Change Password Form -->
											<form action="{{route('patient.password.change')}}" method="POST" >
                                                @csrf

												<div class="form-group">
													<label>Old Password</label>
													<input name="old_pass" type="password" class="form-control">
												</div>
												<div class="form-group">
													<label>New Password</label>
													<input name="pass" type="password" class="form-control">
												</div>
												<div class="form-group">
													<label>Confirm Password</label>
													<input name="pass_confirmation" type="password" class="form-control">
												</div>
												<div class="submit-section">
													<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
												</div>
											</form>
											<!-- /Change Password Form -->
											
										</div>
									</div>
								</div>
							</div>
						</div>
                        <!--Change Password Start-->

					</div>
				</div>

			</div>		
			<!-- /Page Content -->
@endsection