@section('style')
<style>

    .page-pagination {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin: -5px -10px; }
    .page-pagination li {
        list-style: none;
        font-size: 16px;
        line-height: 24px;
        font-family: "Poppins", sans-serif;
        color: #222222;
        text-align: center;
        margin: 5px 10px; }
    .page-pagination li a {
        color: #222222;
        background-color: #f8f8f8;
        padding: 10px;
        border-radius: 50px;
        width: 44px;
        height: 44px; }
    .page-pagination li a i {
        line-height: 24px; }
    .page-pagination li:hover a {
        color: #004395;
        background-color: #f9c322; }
    .page-pagination li.active a {
        color: #ffffff;
        background-color: #004395; }
    .page-pagination li:first-child a {
        color: #222222;
        width: auto;
        padding: 10px 20px; }
    .page-pagination li:first-child a i {
        margin-right: 10px;
        float: left; }
    .page-pagination li:first-child a:hover {
        color: #004395; }
    .page-pagination li:last-child a {
        color: #222222;
        width: auto;
        padding: 10px 20px; }
    .page-pagination li:last-child a i {
        margin-left: 10px;
        float: right; }
    .page-pagination li:last-child a:hover {
        color: #004395; }

</style>
<!-- Toastr -->
<link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
@endsection

@section('headerNav')
    <div class="col-sm-6">
        <h1>@lang('Nav.companies')</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">@lang('Nav.home')</a></li>
            <li class="breadcrumb-item active">@lang('Nav.companies')</li>
        </ol>
    </div>
@endsection

@extends('layouts.admin')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">@lang('Nav.companies')</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-bordered table-striped" id="example">
                    <thead>
                    <tr>
                        <th style="width: 1%">
                            #
                        </th>
                        <th style="width: 20%">
                            @lang('Nav.company')
                            @lang('data.name')

                        </th>
                        <th style="width: 30%">
                            @lang('Nav.company')
                            Email
                        </th>
                        <th style="width: 20%" >
                            @lang('Nav.company')
                            @lang('data.website')

                        </th>
                        <th style="width: 30%" class="text-center">
                            @lang('Nav.company')
                            Logo
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                    @endif

                    @foreach($companies as $company)

                    <tr>
                        <td>
                            {{$company->id}}
                        </td>
                        <td>
                                {{$company->name}}
                        </td>

                        <td>
                                {{$company->email}}
                        </td>
                        <td>
                            {{$company->website}}
                        </td>
                        <td class="text-center">
                            <img src="{{asset("storage/$company->logo")}}" alt="Company Logo if exists" width="100">
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-info btn-sm" href="{{route('companyEdit',$company->id)}}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                @lang('data.edit')
                            </a>
                            <form method="post" action="{{route('companyDelete',$company->id)}}">
                                @csrf
                                @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('@lang("data.del") {{$company->name}} ??')">
                                    <i class="fas fa-trash">
                                    </i>
                                @lang('data.delete')
                            </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
                {{--Pagination--}}
            <div class="row mt-20" style="margin: 50px 0px 10px;">
                <div class="col">
                    <ul class="page-pagination">
                        @if(!$companies->onFirstPage())
                            <li><a href="{{$companies->previousPageUrl()}}"><i class="fa fa-angle-left"></i> Prev</a></li>
                        @endif
                        @foreach($companies->getUrlRange(1,$companies->lastPage()) as $page=>$url)
                            @if($page == $companies->currentPage())
                                <li class="active"><a href="{{$url}}" style="color: white;">{{$page}}</a></li>
                            @else
                                <li class=""><a href="{{$url}}">{{$page}}</a></li>
                            @endif

                        @endforeach
                        @if($companies->hasMorePages())
                            <li><a href="{{$companies->nextPageUrl()}}"><i class="fa fa-angle-right"></i> Next</a></li>
                        @endif
                    </ul>
                </div>
            </div>


            <!-- /.card-body -->

        <!-- /.card -->

    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection


{{--    <script>--}}
{{--        $(function () {--}}
{{--            $("#example").DataTable({--}}
{{--                processing: true,--}}
{{--                serverSide: true,--}}
{{--                ajax:{--}}
{{--                    url:"{{route('companies')}}",--}}
{{--                },--}}
{{--                columns:[--}}
{{--                    {--}}
{{--                        data:'image',--}}
{{--                        name:'image',--}}
{{--                        render: function (date,type, full, meta) {--}}
{{--                            return "<img src={{URL::to('/')}}/storage/"+data+"width='70'>"--}}
{{--                        },--}}
{{--                        orderable:false--}}
{{--                    },--}}
{{--                    {--}}
{{--                        data:'name',--}}
{{--                        name:'CompanyName'--}}
{{--                    },--}}
{{--                    {--}}
{{--                        data:'email',--}}
{{--                        name:'email'--}}
{{--                    },--}}
{{--                    {--}}
{{--                        data:'website',--}}
{{--                        name:'website'--}}
{{--                    },--}}
{{--                    {--}}
{{--                        data :'action',--}}
{{--                        name :'action',--}}
{{--                        orderable: false--}}
{{--                    }--}}
{{--                ]--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}


@section('js')
    <script>
        $('.alert').delay(3000).fadeOut();
    </script>
@endsection
