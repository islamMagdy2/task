@section('headerNav')
<div class="col-sm-6">
    <h1>Laravel</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active">@lang('Nav.home')</li>
        <li class="breadcrumb-item active">@lang('Nav.welcomePage')</li>
    </ol>
</div>
@endsection
@extends('layouts.admin')
@section('content')
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Laravel Task</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body">
                   @lang('welcome.welcome')<em> <strong>Islam Magdy</strong> </em>
                    <br>
                    <strong>Mobile:</strong>01005494519
                    <br>
                    <strong>Email:</strong>Islam_Magdy63@outlook.com
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                   @lang('welcome.copyrights')
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
