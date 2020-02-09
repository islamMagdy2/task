@extends('layouts.admin')

@section('headerNav')
    <div class="col-sm-6">
        <h1>Companies</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">@lang('Nav.home')</a></li>
            <li class="breadcrumb-item"><a href="/companies">@lang('Nav.companies')</a></li>
            @if(isset($company))
            <li class="breadcrumb-item active">@lang('Nav.update') @lang('Nav.companies') Info.</li>
                @else
                <li class="breadcrumb-item active">@lang('Nav.add') @lang('Nav.company')</li>
                @endif
        </ol>
    </div>
@endsection


@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row" style="">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        @if(isset($company))
                        <h3 class="card-title">@lang('Nav.update') @lang('Nav.company') Info.</h3>
                        @else
                            <h3 class="card-title">@lang('Nav.add') @lang('Nav.company')</h3>
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
                                    @foreach($errors->all() as     $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(isset($company))
                                <form method="post" enctype="multipart/form-data" action="{{route('companyUpdate',$company->id)}}">
                                    @method('put')
                                @else
                                <form method="post" enctype="multipart/form-data" action="{{route('companyStore')}}">
                                @endif
                            @csrf
                            <div class="form-group">
                            <label for="inputName">@lang('data.name')</label>
                            @if(isset($company))
                              <input type="text" value="{{$company->name}}" name="name" id="inputName" class="form-control">
                                @else
                            <input type="text" value="{{old('name')}}" name="name" id="inputName" class="form-control">
                             @endif
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Email</label>
                            @if(isset($company))
                                <input type="email" name="email" value="{{$company->email}}" id="inputEmail" class="form-control">
                            @else
                            <input type="email" name="email" value="{{old('email')}}" id="inputEmail" class="form-control">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="inputWebsite">@lang('data.website')</label>
                            @if(isset($company))
                            <input type="text" name="website" id="inputWebsite" value="{{$company->website}}" class="form-control">
                                @else
                                <input type="text" name="website" id="inputWebsite" value="{{old('website')}}" class="form-control">
                                @endif
                        </div>
                        <div class="form-group">
                            <label for="Logo">@lang('Nav.company') Logo</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="logo" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-12">
                                    <a href="{{route('companies')}}" class="btn btn-secondary">@lang('Nav.cancel')</a>
                                    @if(isset($company))
                                    <input type="submit" value="@lang('Nav.update') @lang('Nav.company')" class="btn btn-success float-right">
                                        @else
                                        <input type="submit" value="@lang('Nav.create') @lang('Nav.new')  @lang('Nav.company') " class="btn btn-success float-right">
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
    <script type="text/javascript">
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
        $('.alert').delay(4000).fadeOut();
    </script>
@endsection

