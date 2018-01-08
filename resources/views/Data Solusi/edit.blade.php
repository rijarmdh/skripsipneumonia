@extends('layouts.adminlte')

@section('adminlte')
<br><br><br>
<div class="container">
    <div class="row">
        <div class="col-md-7 col-md-offset-2">
            <div class="box boc-warning">
                <div class="box-header with-border"><h3 class="box-title">Register Data Pasien</h3></div>
                <div class="box-body">
                   {!! Form::model($solusi, ['url'=>route('datasolusi.update', $solusi->id), 'method'=>'put', 'class'=>'form-horizontal']) !!}

						{{ csrf_field() }}
                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label for="nama" class="col-md-4 control-label">Nama Solusi</label>

                            <div class="col-md-7">
                                <input id="nama" type="text" class="form-control" name="nama" value="{{ $solusi->nama}}" required autofocus>

                                @if ($errors->has('nama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection