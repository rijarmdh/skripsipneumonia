@extends('layouts.adminlte')

@section('adminlte')


    <br><br><br>
    <section style="margin-right: 5%;" class="content-header responsive">
          <h1>
            Halaman Detail Pasien
            
          </h1>
             <ul class="breadcrumb">
            <li><a href="{{route('datapasien.index')}}"><i class="fa fa-dashboard"></i> Data Pasien</a></li>
            <li class="active">Tambah Pasien</li>
          </ul>
    </section>


    <br><br><br>
	<div class="container">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('datapasien.store') }}">
        {{ csrf_field() }}
            
            <div class="row">           
                <div class="col-md-5">
                    <div class="box box-primary">
                        <div class="box-header with-border"><h3 class="box-title ">Register Data Pasien</h3></div>
                            <div class="box-body">
                        

                                <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                                    
                                    <div class="col-md-12">
                                        <label for="nama">Nama Pasien</label>
                                    </div>
                                         
                                    <div class=" col-md-12">
                                        <div class="input-group"> 
                                            <div class="input-group-addon"><i style="color: #b82601" class="fa fa-male" aria-hidden="true"></i></div>
                                            <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama Pasien" required autofocus>

                                             @if ($errors->has('nama'))
                                                 <span class="help-block">
                                                    <strong>{{ $errors->first('nama') }}</strong>
                                                 </span>
                                            @endif
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('nama_panggilan') ? ' has-error' : '' }}">
                                    <div class="col-md-12">
                                        <label for="nomor_identitas">Nama Panggilan</label>
                                    </div>
                                        
                                    <div class="col-md-12">
                                        <div class="input-group">
                                             <div class="input-group-addon"><i style="color: #813772" class="fa  fa-sticky-note" aria-hidden="true"></i></div>
                                             <input id="nama_panggilan" type="text" class="form-control" name="nama_panggilan" value="{{ old('nama_panggilan') }}" placeholder="masukkan nama panggilan" required autofocus>

                                              @if ($errors->has('nama_panggilan'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('nama_panggilan') }}</strong>
                                                </span>
                                              @endif
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                                    <div class="col-md-12">
                                        <label for="alamat">Alamat</label>
                                    </div>    
                                        

                                    <div class="col-md-12">
                                        <div class="input-group">

                                        <div class="input-group-addon"><i style="color: #e24e42" class="fa fa-map-marker"></i></div>
                                        <input id="alamat" type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" placeholder="Masukkan Alamat Tinggal" required autofocus>

                                        @if ($errors->has('alamat'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('alamat') }}</strong>
                                            </span>
                                        @endif
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('no_telepon') ? ' has-error' : '' }}">
                                    <div class="col-md-12">
                                        <label for="no_telepon" >Nomor Telepon</label>
                                    </div> 
                                        

                                    <div class="col-md-12">
                                        <div class="input-group">

                                        <div class="input-group-addon"><i  style="color: #4abdac;" class="fa fa-mobile"></i></div>
                                        <input id="no_telepon" type="text" class="form-control" name="no_telepon" value="{{ old('no_telepon') }}" placeholder="masukkan nomor telepon" required autofocus>

                                        @if ($errors->has('no_telepon'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('no_telepon') }}</strong>
                                            </span>
                                        @endif
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('tempat_lahir') ? ' has-error' : '' }}">
                                    <div class="col-md-12">
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                    </div>    
                                        

                                    <div class="col-md-12">
                                        <div class="input-group">

                                        <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                                        <input id="tempat_lahir" type="text" class="form-control" name="tempat_lahir" value="{{ old('tempat_lahir') }}" placeholder="Masukkan Tempat Lahir" required autofocus>

                                        @if ($errors->has('tempat_lahir'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('tempat_lahir') }}</strong>
                                            </span>
                                        @endif
                                        </div>
                                        
                                    </div>
                                </div>


                                <div class="form-group{{ $errors->has('tanggal_lahir') ? ' has-error' : '' }}">
                                    <div class="col-md-12">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                    </div>    
                                         

                                    <div class="col-md-12">
                                        <div class="input-group date">

                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input id="datepicker" type="text" class="form-control" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" placeholder="Masukkan Tanggal Lahir" required autofocus>

                                        @if ($errors->has('tanggal_lahir'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('tanggal_lahir') }}</strong>
                                            </span>
                                        @endif
                                        </div>
                                        
                                    </div>
                                </div>


                                <div class="form-group{{ $errors->has('jenis_kelamin') ? ' has-error' : '' }}">
                                    
                                    <div class="col-md-12">
                                        <label for="alamat">Jenis Kelamin</label>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-neuter"></i></div>
                                            <select class="form-control" name="jenis_kelamin">
                                                <option value="laki">Laki - Laki</option>
                                                <option value="perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                            
                                        
                                    </div>
                                </div>

                                <br>
                           
                            </div>
                    </div>
                </div> 

                <div class="col-md-6">

                    <div class="box box-success">

                        <div class="box-header with-border">
                            <h3 class="box-title">
                                Data Pasien
                            </h3>
                        </div>

                        <div class="box-body">
                           <div class="form-group{{ $errors->has('status_perkawinan') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                     <label for="status_perkawinan">Status Perkawinan</label>
                                </div>
                               

                                <div class="col-md-12">
                                    <select class="form-control" name="status_perkawinan">
                                        <option value="menikah">Menikah</option>
                                        <option value="lajang">Lajang</option>
                                    </select>
                                    
                                </div>
                            </div>


                        <div class="form-group{{ $errors->has('kewarganegaraan') ? ' has-error' : '' }}">
                            
                            <div class="col-md-12">
                                <label for="kewarganegaraan" >Kewarganegaraan</label>
                            </div>
                                

                            <div class="col-md-12">
                                <div class="input-group">

                                <div class="input-group-addon"><i class="fa fa-globe"></i></div>
                                <input id="kewarganegaraan" type="text" class="form-control" name="kewarganegaraan" value="{{ old('kewarganegaraan') }}" placeholder="Masukkan Kewarganegaraan Anda" required autofocus>

                                @if ($errors->has('kewarganegaraan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kewarganegaraan') }}</strong>
                                    </span>
                                @endif
                                </div>
                                
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('agama') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <label for="agama">Agama</label>
                            </div>
                                

                            <div class="col-md-12">
                                <div class="input-group">

                                <div class="input-group-addon"><i class="fa fa-check"></i></div>
                                <input id="agama" type="text" class="form-control" name="agama" value="{{ old('agama') }}" placeholder="Masukkan Agama" required autofocus>

                                @if ($errors->has('agama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('agama') }}</strong>
                                    </span>
                                @endif
                                </div>
                                
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('pekerjaan') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <label for="pekerjaan">Pekerjaan</label>
                            </div>
                                

                            <div class="col-md-12">
                                <div class="input-group">

                                <div class="input-group-addon"><i class="fa fa-briefcase"></i></div>
                                <input id="pekerjaan" type="text" class="form-control" name="pekerjaan" value="{{ old('pekerjaan') }}" placeholder="Masukkan Pekerjaan Anda" required autofocus>

                                @if ($errors->has('pekerjaan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pekerjaan') }}</strong>
                                    </span>
                                @endif
                                </div>
                                
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <label for="email">Email</label>
                            </div>
                                

                            <div class="col-md-12">
                                <div class="input-group">

                                <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Masukkan Email " required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                </div>
                                
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('pendidikan') ? ' has-error' : '' }}">
                             <div class="col-md-12">
                                <label for="pendidikan">Pendidikan</label> 
                             </div>  
                                

                            <div class="col-md-12">
                                <div class="input-group">

                                <div class="input-group-addon"><i class="fa fa-graduation-cap"></i></div>
                                <input id="pendidikan" type="text" class="form-control" name="pendidikan" value="{{ old('pendidikan') }}" placeholder="Masukkan Pendidikan Saat Ini" required autofocus>

                                @if ($errors->has('pendidikan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pendidikan') }}</strong>
                                    </span>
                                @endif
                                </div>
                                
                            </div>
                        </div> 
                        </div>
                        
                    </div>
                       
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <div class="box-title">
                                <h3>Dalam Keadaan Darurat Dapat Menghubungi</h3>
                            </div>

                            <div class="box-body">
                                 {{-- BIODATA KERABAT YANG BISA DI HUBUNGI --}}
                                    <div class="form-group{{ $errors->has('nama_kerabat') ? ' has-error' : '' }}">
                                        <div class="col-md-12">
                                            <label for="nama_kerabat">Nama </label>
                                        </div>
                                            

                                        <div class="col-md-12">
                                            <div class="input-group">

                                            <div class="input-group-addon"><i class="fa fa-id-card-o"></i></div>
                                            <input id="nama_kerabat" type="text" class="form-control" name="nama_kerabat" value="{{ old('nama_kerabat') }}" placeholder="Masukkan Nama" required autofocus>

                                            @if ($errors->has('nama_kerabat'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('nama_kerabat') }}</strong>
                                                </span>
                                            @endif
                                            </div>
                                            
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('hubungan') ? ' has-error' : '' }}">
                                        <div class="col-md-12">
                                            <label for="hubungan" >Hubungan</label>
                                        </div> 
                                            

                                        <div class="col-md-12">
                                            <div class="input-group">

                                            <div class="input-group-addon"><i class="fa fa-handshake-o"></i></div>
                                            <input id="hubungan" type="text" class="form-control" name="hubungan" value="{{ old('hubungan') }}" placeholder="Masukkan Hubungan Dengan Anda" required autofocus>

                                            @if ($errors->has('hubungan'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('hubungan') }}</strong>
                                                </span>
                                            @endif
                                            </div>
                                            
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('nomortelepon') ? ' has-error' : '' }}">
                                        <div class="col-md-12">
                                            <label for="nomortelepon">Nomor Telepon</label>    
                                        </div>
                                        

                                        <div class="col-md-12">
                                            <div class="input-group">

                                            <div class="input-group-addon"><i style="color: #4abdac;" class="fa fa-phone-square"></i></div>
                                            <input id="nomortelepon" type="text" class="form-control" name="nomortelepon" value="{{ old('nomortelepon') }}" placeholder="Masukkan Nomor Telepon" required autofocus>

                                            @if ($errors->has('nomortelepon'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('nomortelepon') }}</strong>
                                                </span>
                                            @endif
                                            </div>
                                            
                                        </div>
                                    </div>
                            </div>                    
                        </div>
                    </div> 
                </div>

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-10">
                        <button type="submit" class="btn btn-primary">
                            Register
                         </button>
                    </div>                    
                </div>      
        </form> 
    </div>
@endsection