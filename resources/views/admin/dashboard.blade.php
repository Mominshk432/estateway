@extends('admin.layouts.layout')
@section('title')
    Dashboard
@endsection
@section('body')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">

                        <h4 class="page-title">Welcome!</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xxl-4 col-sm-12">
                    <div class="card widget-flat text-bg-pink">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="ri-map-2-line widget-icon"></i>
                            </div>
                            <h6 class="text-uppercase mt-0" title="">Total Projects</h6>
                            <h2 class="my-2">{{$total_projects}}</h2>
                        </div>
                    </div>
                </div> <!-- end col-->

                <div class="col-xxl-4 col-sm-12">
                    <div class="card widget-flat text-bg-purple">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="ri-group-2-line widget-icon"></i>
                            </div>
                            <h6 class="text-uppercase mt-0" title="Customers">Total Site Visits</h6>
                            <h2 class="my-2">{{$total_site_visits}}</h2>
                        </div>
                    </div>
                </div> <!-- end col-->
                <div class="col-xxl-4 col-sm-12">
                    <div class="card widget-flat text-bg-info">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="ri-group-2-line widget-icon"></i>
                            </div>
                            <h6 class="text-uppercase mt-0" title="Customers">Site Visits This Month</h6>
                            <h2 class="my-2">{{$site_visits_this_month}}</h2>
                        </div>
                    </div>
                </div> <!-- end col-->

            </div>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="header-title">Projects</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap">
                                    <thead>
                                    <tr>
                                        <th>Heading</th>
                                        <th>Address</th>
                                        <th>Description</th>
                                        <th>Category</th>
                                        <th>Bedrooms</th>
                                        <th>Bathrooms</th>
                                        <th>Size</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($projects as $project)
                                        <tr>

                                            <td>{{$project->heading ?? ''}}</td>
                                            <td>{{$project->address ?? ''}}</td>
                                            <td>{{!empty($project->address) ? \Illuminate\Support\Str::limit($project->address,100) : ''}}</td>
                                            <td>{{$project->category->title ?? ''}}</td>
                                            <td>{{$project->no_of_bedrooms ?? '0'}}</td>
                                            <td>{{$project->no_of_bathrooms ?? '0'}}</td>
                                            <td>{{$project->size ?? '0'}} Sq.ft.</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div> <!-- end row-->

            <!-- end row -->

        </div>
        <!-- container -->

    </div>
@endsection
