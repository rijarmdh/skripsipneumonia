@extends('layouts.adminlte')

@section('adminlte')

<div class="container">
	<div class="row">
		<div class="box box-primary">
			<div class="box-header with-border">
            <h3 class="box-title">
                Ubah Data User
            </h3>
                
			</div>
			<div class="box-body">
				{!! Form::model($user, ['url'=>route('datauser.update', $user->id), 'method'=>'put', 'class'=>'form-horizontal']) !!}

				{{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email}}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('jabatan') ? ' has-error' : '' }}">
                            <label for="roles" class="col-md-4 control-label">Jabatan</label>

                            <div class="col-md-6">
                              <select name="jabatan" value="{{Auth::user()->jabatan}}" class="form-control">
                             
                                <option value ="admin">Admin</option>
                                <option value ="Pakar">Pakar/Dokter</option>

                              </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>

				{!! Form::close() !!}
			</div>
		</div>		
	</div>

</div>

@endsection