@extends('Font.Layouts.master')
@section('main')
    <section class="section-4 bg-2">
        <div class="container pt-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class=" rounded-3 p-3">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="jobs.html"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                    &nbsp;Back to Jobs</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container job_details_area">
            <div class="row pb-5">
                <div class="col-md-8">
                    <div class="card shadow border-0">
                        <div class="job_details_header">
                            <div class="single_jobs white-bg d-flex justify-content-between">
                                <div class="jobs_left d-flex align-items-center">

                                    <div class="jobs_conetent">
                                        <a href="#">
                                            <h4>{{ $jobs->title }}</h4>
                                        </a>
                                        <div class="links_locat d-flex align-items-center">
                                            <div class="location">
                                                <p> <i class="fa fa-map-marker"></i> {{ $jobs->location }}</p>
                                            </div>
                                            <div class="location">
                                                <p> <i class="fa fa-clock-o"></i> {{ $jobs->jobType->name }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="jobs_right">
                                    <div class="apply_now">
                                        <a class="heart_mark" href="#"> <i class="fa fa-heart-o"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="descript_wrap white-bg">
                            <div class="single_wrap">
                                <h4>Job description</h4>
                                <p>{{ $jobs->description }}</p>

                            </div>
                            <div class="single_wrap">
                                <h4>Responsibility</h4>
                                <ul>
                                    <li>{{ $jobs->responsibility }}</li>
                                </ul>
                            </div>
                            <div class="single_wrap">
                                <h4>Qualifications</h4>
                                <ul>
                                    <li>{{ $jobs->qualifications }}</li>

                                </ul>
                            </div>
                            <div class="single_wrap">
                                <h4>Benefits</h4>
                                <p>{{ $jobs->benefits }}</p>
                            </div>
                            <div class="border-bottom"></div>
                            <div class="pt-3 text-end">
                                <a href="#" class="btn btn-secondary">Save</a>
                                <a href="#" class="btn btn-primary">Apply</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow border-0">
                        <div class="job_sumary">
                            <div class="summery_header pb-1 pt-4">
                                <h3>Job Summery</h3>
                            </div>
                            <div class="job_content pt-3">
                                <ul>
                                    <li>Published on:
                                        <span>{{ \Carbon\Carbon::parse($jobs->created_at)->formatLocalized('%d-%B-%Y') }}</span>
                                    </li>
                                    <li>Vacancy: <span>{{ $jobs->vacancy }}</span></li>
                                    <li>Salary: <span>{{ $jobs->salary }}</span></li>
                                    <li>Location: <span>{{ $jobs->location }}</span></li>
                                    <li>Job Nature: <span> {{ $jobs->jobType->name }}</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow border-0 my-4">
                        <div class="job_sumary">
                            <div class="summery_header pb-1 pt-4">
                                <h3>Company Details</h3>
                            </div>
                            <div class="job_content pt-3">
                                <ul>
                                    <li>Name: <span>{{ $jobs->company_name }}</span></li>
                                    <li>Locaion: <span>{{ $jobs->company_location }}</span></li>
                                    <li>Webite: <span>{{ $jobs->company_website }}</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection