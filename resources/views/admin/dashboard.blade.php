@extends('layouts/master')
@section('title',__('Dashboard | Education Management'))
@section('dashboard',__('active'))
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-dashboard"></i>
               </div>
               <div class="header-title">
                  <h1> Admin Dashboard</h1>
                  <small> admin.</small>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
            <div class="row">
               <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <a href="{{ route('admin.users')}}">
                        <div id="cardbox3" style="background-color: green;">
                           <div class="statistic-box">
                              <i class="fa fa-picture-o fa-3x"></i>
                              <div class="counter-number pull-right">
                                 <span class="count-number">{{count($users)}}</span> 
                                 <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                                 </span>
                              </div>
                              <h3>  Total Users</h3>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <a href="{{ route('admin.students')}}">
                        <div id="cardbox3" style="background-color: #3a526b;">
                           <div class="statistic-box">
                              <i class="fa fa-picture-o fa-3x"></i>
                              <div class="counter-number pull-right">
                                 <span class="count-number">{{count($students)}}</span> 
                                 <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                                 </span>
                              </div>
                              <h3>  Total Students</h3>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <a href="{{ route('admin.tutors')}}">
                        <div id="cardbox4" style="background-color: #ac2925;">
                           <div class="statistic-box">
                              <i class="fa fa-calendar fa-3x"></i>
                              <div class="counter-number pull-right">
                                 <span class="count-number">{{count($tutors)}}</span> 
                                 <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                                 </span>
                              </div>
                              <h3> 
                                 Total Tutors</h3>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <a href="{{ route('admin.institutes')}}">
                           <div id="cardbox2" style="background-color: #428bca;">
                              <div class="statistic-box">
                                 <i class="fa fa-address-card-o fa-3x"></i>
                                 <div class="counter-number pull-right">
                                    <span class="count-number">{{count($institutes)}}</span> 
                                    <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                                    </span>
                                 </div>
                                 <h3>Total Institutes</h3>
                              </div>
                           </div>
                     </a>
                  </div>
            </div>
            <div class="row">
               <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <a href="{{ route('admin.student.forms')}}">
                        <div id="cardbox3" style="background-color: green;">
                           <div class="statistic-box">
                              <i class="fa fa-picture-o fa-3x"></i>
                              <div class="counter-number pull-right">
                                 <span class="count-number">{{count($student_forms)}}</span> 
                                 <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                                 </span>
                              </div>
                              <h3>  Total Student Forms</h3>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <a href="{{ route('admin.tutor.forms')}}">
                        <div id="cardbox3" style="background-color: #3a526b;">
                           <div class="statistic-box">
                              <i class="fa fa-picture-o fa-3x"></i>
                              <div class="counter-number pull-right">
                                 <span class="count-number">{{count($tutor_forms)}}</span> 
                                 <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                                 </span>
                              </div>
                              <h3>  Total Tutor Forms</h3>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <a href="{{ route('admin.institute.forms')}}">
                        <div id="cardbox4" style="background-color: #ac2925;">
                           <div class="statistic-box">
                              <i class="fa fa-calendar fa-3x"></i>
                              <div class="counter-number pull-right">
                                 <span class="count-number">{{count($institute_forms)}}</span> 
                                 <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                                 </span>
                              </div>
                              <h3> 
                                 Total Institute Forms</h3>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <a href="{{ route('admin.testimonial.list')}}">
                           <div id="cardbox2" style="background-color: #428bca;">
                              <div class="statistic-box">
                                 <i class="fa fa-address-card-o fa-3x"></i>
                                 <div class="counter-number pull-right">
                                    <span class="count-number">{{count($testimonials)}}</span> 
                                    <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                                    </span>
                                 </div>
                                 <h3>Total Testimonials</h3>
                              </div>
                           </div>
                     </a>
                  </div>
            </div>
              
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
  

@endsection