@extends('layouts.adminlte')

@section('adminlte')

<br><br><br>
	<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="box box-danger">
                <div class="box-header with-border"><h3 class="box-title">Data Variabel Gejala</h3></div><br>
                <div class="box-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('daftargejala.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label for="nama" class="col-md-4 control-label">Nama Variabel</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama') }}" required autofocus>

                                @if ($errors->has('nama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama') }}</strong>
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