@extends('layouts.app')

@section('content')

<section class="page-title">
    <div class="container">
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12 content-column">
                <div class="content-box clearfix">
                    <div class="title pull-left">
                        <h1>About</h1>
                    </div>
                    <ul class="bread-crumb pull-right clearfix">
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li>About Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>



<!--- About us Section ---->
<div class="container-fluid wel-sec pd-tb-50 ">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="wel-box">
                    <img src="{{ asset('assets/images/abt-img.jpg') }}" alt="about" class="img-fluid img-padding">
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="wel-box-body">
                    <div class="sub-text">About Us</div>
                    <p>Indianhometutor is India's largest and most trusted Learning Network. Our vision is to be
                        one-stop learning partner for every Indian with Verified Tutors, Trainers & Institutes, we are a
                        trusted partner of choice for students, parents and professionals visiting us every month to
                        fulfill learning requirements across more than 1000 categories.</p>
                    <p>Using Indianhometutor.com, students, parents and professionals can compare multiple Tutors,
                        Trainers and Institutes and choose the ones that best suit their requirements.</p>
                    <p>If you are a Tutor, Trainer or an Institute, you can get relevant enquiries based on your skills
                        and offer online as well as offline coaching services.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-xl-10 col-sm-11 topContent">
                <div class="team">
                    <h1 class="textAlignCen titleTxt fontBold marginBottom-md">Our Team</h1>
                    <p class="marginBottom-md subHeaderTxt textAlignCen">All good minds coming together!</p>
                    <div class="row">
                        <div class="col-xl-3 col-sm-6 col-md-3 marginTop-xl marginBottom-md teamImageDiv">
                            <p><img src="https://s3-ap-southeast-1.amazonaws.com/tv-prod/urbanproTeamMember/1-mask%2520group%252087.png"
                                    width="210px" height="210px" style="border: 1px solid #000;"></p>
                            <p class="marginTop-md" style="line-height: 1;">Demo Image</p>
                            <p class="marginTop-sm designation">Founder &amp; CEO</p>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-md-3 marginTop-xl marginBottom-md teamImageDiv">
                            <p><img src="https://s3-ap-southeast-1.amazonaws.com/tv-prod/urbanproTeamMember/3-mask%2520group%252080.png"
                                    width="210px" height="210px" style="border: 1px solid #000;"></p>
                            <p class="marginTop-md" style="line-height: 1;">Demo Image</p>
                            <p class="marginTop-sm designation">Co-Founder</p>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-md-3 marginTop-xl marginBottom-md teamImageDiv">
                            <p><img src="https://s3-ap-southeast-1.amazonaws.com/tv-prod/urbanproTeamMember/5-mask%2520group%252031.png"
                                    width="210px" height="210px" style="border: 1px solid #000;"></p>
                            <p class="marginTop-md" style="line-height: 1;">Demo Image</p>
                            <p class="marginTop-sm designation">Co-founder</p>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-md-3 marginTop-xl marginBottom-md teamImageDiv">
                            <p><img src="https://s3-ap-southeast-1.amazonaws.com/tv-prod/urbanproTeamMember/8-mask%2520group%252082.png"
                                    width="210px" height="210px" style="border: 1px solid #000;"></p>
                            <p class="marginTop-md" style="line-height: 1;">Demo Image</p>
                            <p class="marginTop-sm designation">Operations</p>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-md-3 marginTop-xl marginBottom-md teamImageDiv">
                            <p><img src="https://s3-ap-southeast-1.amazonaws.com/tv-prod/urbanproTeamMember/10-10.png"
                                    width="210px" height="210px" style="border: 1px solid #000;"></p>
                            <p class="marginTop-md" style="line-height: 1;">Demo Image</p>
                            <p class="marginTop-sm designation">Finance</p>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-md-3 marginTop-xl marginBottom-md teamImageDiv">
                            <p><img src="https://s3-ap-southeast-1.amazonaws.com/tv-prod/urbanproTeamMember/11-yarlagaddaramakrishna.png"
                                    width="210px" height="210px" style="border: 1px solid #000;"></p>
                            <p class="marginTop-md" style="line-height: 1;">Demo Image</p>
                            <p class="marginTop-sm designation">Technology</p>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-md-3 marginTop-xl marginBottom-md teamImageDiv">
                            <p><img src="https://s3-ap-southeast-1.amazonaws.com/tv-prod/urbanproTeamMember/13-8.png"
                                    width="210px" height="210px" style="border: 1px solid #000;"></p>
                            <p class="marginTop-md" style="line-height: 1;">Demo Image</p>
                            <p class="marginTop-sm designation">HR</p>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-md-3  marginTop-xl marginBottom-md teamImageDiv">
                            <p><img src="https://s3-ap-southeast-1.amazonaws.com/tv-prod/urbanproTeamMember/16-sagar.png"
                                    width="210px" height="210px" style="border: 1px solid #000;"></p>
                            <p class="marginTop-md" style="line-height: 1;">Demo Image</p>
                            <p class="marginTop-sm designation">Technology</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection