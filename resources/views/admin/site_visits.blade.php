@extends('admin.layouts.layout')
@section('title')
    Site-Visits
@endsection
@section('custom-css')
    <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
          rel="stylesheet">
@endsection
@section('body')

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Site Visits</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="header-title">List</h4>
                        </div>
                        <div class="card-body">
                            <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100"
                                   style="vertical-align: baseline">
                                <thead>
                                <tr>
                                    <th>Property</th>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($visits as $visit)
                                    <tr>
                                        <td>{{$visit->project->heading ?? ''}}</td>
                                        <td>{{$visit->name ?? ''}}</td>
                                        <td>{{$visit->email ?? ''}}</td>
                                        <td>{{$visit->phone ?? ''}}</td>
                                        <td id="tooltip-1"
                                            title="{{$visit->message ?? ''}}">
                                            <button class="btn btn-success btn-sm">Hover to read message</button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div> <!-- end row-->
        </div> <!-- container -->
    </div> <!-- content -->

@endsection
@section('custom-scripts')
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script>
        $(function () {
            $("#tooltip-1").tooltip();
        });
    </script>
@endsection
