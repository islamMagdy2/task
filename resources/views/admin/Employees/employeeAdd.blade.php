@extends('layouts.admin')

@section('headerNav')
    <div class="col-sm-6">
        <h1>@lang('Nav.employees')</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">@lang('Nav.home')</a></li>
            <li class="breadcrumb-item"><a href="/employees">@lang('Nav.employees')</a></li>
            @if(isset($employee))
                <li class="breadcrumb-item active">@lang('Nav.update') @lang('Nav.employee') Info.</li>
            @else
                <li class="breadcrumb-item active">@lang('Nav.add') @lang('Nav.employee')</li>
            @endif
        </ol>
    </div>
@endsection

@section('style')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/select2-bootstrap4.min.css')}}">
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row" style="">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        @if(isset($employee))
                            <h3 class="card-title">@lang('Nav.update') @lang('Nav.employee') Info.</h3>
                        @else
                            <h3 class="card-title">@lang('Nav.add') @lang('Nav.employee')</h3>
                        @endif
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(isset($employee))
                            <form method="post" action="{{route('employeeUpdate',$employee->id)}}">
                                @method('put')
                                @else
                                    <form method="post" action="{{route('employeeStore')}}">
                                        @endif
                                        @csrf
                                        <div class="form-group">
                                            <label for="inputName">@lang('data.first') Name</label>
                                            @if(isset($employee))
                                                <input type="text" value="{{$employee->firstName}}" name="firstName" id="inputFirstName" class="form-control">
                                            @else
                                                <input type="text" value="{{old('firstName')}}" name="firstName" id="inputFirstName" class="form-control">
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="inputWebsite">@lang('data.last') @lang('data.name')</label>
                                            @if(isset($employee))
                                                <input type="text" name="lastName" id="inputLastName" value="{{$employee->lastName}}" class="form-control">
                                            @else
                                                <input type="text" name="lastName" id="inputLastName" value="{{old('lastName')}}" class="form-control">
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail">Email</label>
                                            @if(isset($employee))
                                                <input type="email" name="email" value="{{$employee->email}}" id="inputEmail" class="form-control">
                                            @else
                                                <input type="email" name="email" value="{{old('email')}}" id="inputEmail" class="form-control">
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail">@lang('data.phone')</label>
                                            @if(isset($employee))
                                                <input type="text" name="phone" value="{{$employee->phone}}" id="inputPhone" class="form-control">
                                            @else
                                                <input type="text" name="phone" value="{{old('phone')}}" id="inputPhone" class="form-control">
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Company</label>
                                            <select name="company" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger">
                                                @foreach($companies as $company)
                                                    @if(isset($employee) and $employee->companies_id ==$company->id)
                                                        <option selected>{{$company->name}}</option>
                                                     @else
                                                        <option>{{$company->name}}</option>
                                                    @endif
                                                        @endforeach
                                            </select>
                                        </div>
                                        <br>

                                        <div class="row">
                                            <div class="col-12">
                                                <a href="{{route('employees')}}" class="btn btn-secondary">@lang('Nav.cancel')</a>
                                                @if(isset($employee))
                                                    <input type="submit" value="@lang('Nav.update') @lang('Nav.employee')" class="btn btn-success float-right">
                                                @else
                                                    <input type="submit" value="@lang('Nav.create') @lang('Nav.new') @lang('Nav.employee')" class="btn btn-success float-right">
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.row -->
        </div>

    </section>
    <br>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('js')
    <script src="{{asset('js/bs-custom-file-input.min.js')}}"></script>
    <script src="{{asset('js/select2.full.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
        $('.alert').delay(4000).fadeOut();
        $('.select2').select2();
    </script>
    <!-- Select2 -->
@endsection

