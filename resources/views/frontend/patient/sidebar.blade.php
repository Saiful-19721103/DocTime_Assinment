<!-- Profile Sidebar -->
<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
							<div class="profile-sidebar">
								<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">

										<!--Profile Picture Upload-->
										<a href="#" class="booking-doc-img">
											@if(!Auth::guard('patient')->user()->photo)
											<img src="https://cdn.pixabay.com/photo/2016/08/20/05/38/avatar-1606916__340.png" alt="User Image">
											@else
											<img src="https://cdn.pixabay.com/photo/2016/08/20/05/38/avatar-1606916__340.png" alt="User Image">
											@endif
										</a>
										<!--Profile Picture Upload-->

										<div class="profile-det-info">
											<h3>{{Auth::guard('patient')->user()->name}}</h3>
											<div class="patient-details">
												<h5><i class="fas fa-birthday-cake"></i>{{Auth::guard('patient')->user()->email}}</h5>
												<h5><i class="fas fa-birthday-cake"></i>{{Auth::guard('patient')->user()->mobile}}</h5>
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
						<!-- / Profile Sidebar -->