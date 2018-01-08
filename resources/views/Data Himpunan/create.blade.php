@extends('layouts.adminlte')

@section('adminlte')

<br><br><br>
	<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="box box-danger">
                <div class="box-header with-border"><h3 class="box-title">Data Himpunan Fuzzy dan Nilai Domain</h3></div><br>
                <div class="box-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('datahimpunan.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('namahimpunan') ? ' has-error' : '' }}">
                            <label for="nama" class="col-md-4 control-label">Nama Himpunan</label>

                            <div class="col-md-6">
                                <input id="namahimpunan" type="text" class="form-control" name="namahimpunan" value="{{ old('namahimpunan') }}" required autofocus>

                                @if ($errors->has('namahimpunan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('namahimpunan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('batasbawah') ? ' has-error' : '' }}">
                            <label for="batasbawah" class="col-md-4 control-label">Nilai Batas Bawah</label>

                            <div class="col-md-6">
                                <input id="batasbawah" type="text" class="form-control" name="batasbawah" value="{{ old('batasbawah') }}" required>

                                @if ($errors->has('batasbawah'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('batasbawah') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('batastengaha') ? ' has-error' : '' }}">
                            <label for="batastengaha" class="col-md-4 control-label">Nilai Batas Tengah Pertama</label>

                            <div class="col-md-6">
                                <input id="batastengaha" type="text" class="form-control" name="batastengaha" value="{{ old('batastengaha') }}" >

                                @if ($errors->has('batastengaha'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('batastengaha') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('batastengahb') ? ' has-error' : '' }}">
                            <label for="batastengahb" class="col-md-4 control-label">Nilai Batas Tengah Kedua</label>

                            <div class="col-md-6">
                                <input id="batastengahb" type="text" class="form-control" name="batastengahb" value="{{ old('batastengahb') }}" >

                                @if ($errors->has('batastengahb'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('batastengahb') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('batasatas') ? ' has-error' : '' }}">
                            <label for="batasatas" class="col-md-4 control-label">Nilai Batas Atas</label>

                            <div class="col-md-6">
                                <input id="batasatas" type="text" class="form-control" name="batasatas" value="{{ old('batasatas') }}" required>

                                @if ($errors->has('batasatas'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('batasatas') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <br><br>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection