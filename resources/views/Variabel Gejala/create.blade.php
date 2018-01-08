@extends('layouts.adminlte')

@section('adminlte')

<br><br><br>

<section style="margin-right: 5%;" class="content-header responsive">
          <h1>
            Halaman Konsultasi Gejala
            
          </h1>
             <ul class="breadcrumb">
            <li><a href="dashboardlte"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Halaman Konsultasi</li>
          </ul>
    </section>

<br><br>
<div class="container">
	<form class="form-horizontal" role="form" method="POST" action="{{ action('gejalaController@hitung') }}">
	   
        {{ csrf_field() }}    
                           	
		<div class="row">
			<div class="col-md-5">
				<div class="box box-primary">
					<div class="box-header with-border"><h3 class="box-title">1. Pasien</h3>
					</div>
					<div class="box-body">
						<div class="form-group{{ $errors->has('id_pasien') ? ' has-error' : '' }}">
					  		<label for="roles" class="col-xs-3 col-md-offset-1">Pasien</label>

			                 <div class="col-md-8">
			                  <select name="id_pasien" class="form-control">
			                 	@foreach($pasien as $pasiens)
			                 		<option value ="{{$pasiens->id_pasien}}">{{$pasiens->nama}}</option>
			                 	@endforeach
			            
			                  </select>
			                </div>
			 			</div>
					</div> 
				</div>

                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">2. Hasil Pemeriksaan Gejala Fisik</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group{{ $errors->has('suhu') ? ' has-error' : '' }}">
                            <label style="margin-top: 2%;" for="suhu" class="col-xs-3 col-md-offset-1  ">Suhu
                            </label>

                            <div class="col-md-7">
                                <div class="input-group">
                                    <input id="suhu" type="text" class="form-control" name="suhu" value="{{ old('suhu') }}" placeholder="Masukkan nilai Suhu" required autofocus>
                                    <div class="input-group-addon" >Celsius</div>
                                </div>
                                    
                                    @if ($errors->has('suhu'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('suhu') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nadi') ? ' has-error' : '' }}">
                            <label style="margin-top: 2%;" for="nadi" class="col-xs-3 col-md-offset-1 ">Denyut Nadi
                            </label>

                            <div class="col-md-7">
                                <div class="input-group">
                                    <input id="nadi" type="text" class="form-control" name="nadi" value="{{ old('nadi') }}" placeholder="Masukkan nilai Denyut Nadi" required>
                                    <div class="input-group-addon">
                                        x/menit
                                    </div>
                                </div>
                                    

                                @if ($errors->has('nadi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nadi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('pernafasan') ? ' has-error' : '' }}">
                            <label style="margin-top: 2%;" for="pernafasan" class="col-xs-3 col-md-offset-1 ">Pernafasan
                            </label>

                            <div class="col-md-7">
                                <div class="input-group">
                                    <input id="pernafasan" type="text" class="form-control" name="pernafasan" value="{{ old('pernafasan') }}" placeholder="Masukkan nilai Pernafasan" required>
                                    <div class="input-group-addon">
                                        x/menit
                                    </div>
                                </div>

                                @if ($errors->has('pernafasan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pernafasan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('sistolik') ? ' has-error' : '' }}">
                            <label style="margin-top: 2%;" for="pao2" class="col-xs-3 col-md-offset-1 ">Sistolik</label>

                            <div class="col-md-7">
                                <div class="input-group">
                                    <input id="sistolik" type="text" class="form-control" name="sistolik" value="{{ old('sistolik') }}" placeholder="Masukkan nilai Sistolik" required>
                                    <div class="input-group-addon">mmHg</div>
                                </div>
                                    

                                    @if ($errors->has('sistolik'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('sistolik') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>

                        {{-- <div class="form-group{{ $errors->has('usia') ? ' has-error' : '' }}">
                            <label style="margin-top: 2%;" for="usia" class="col-xs-3 col-md-offset-1 ">Usia</label>

                            <div class="col-md-7">
                                <div class="input-group">
                                    <input id="usia" type="text" class="form-control" name="usia" value="{{ old('usia') }}" placeholder="Masukkan Usia" required>
                                    <div class="input-group-addon">
                                        tahun
                                    </div>
                                </div>

                                @if ($errors->has('usia'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('usia') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}
                    </div>  
                </div>

                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">3. Hasil Pemeriksaan Laboratorium</h3>
                       
                    </div>

                    <div class="box-body">
                        <div class="form-group{{ $errors->has('pao2') ? ' has-error' : '' }}">
                            <label style="margin-top: 2%;" for="pao2" class="col-xs-3 col-md-offset-1 ">pao2</label>

                            <div class="col-md-7">
                                <div class="input-group">
                                    <input id="pao2" type="text" class="form-control" name="pao2" value="{{ old('pao2') }}" placeholder="Masukkan nilai PaO2" required> 
                                    <div class="input-group-addon">mmHg</div>
                                </div>
                                 

                                @if ($errors->has('pao2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pao2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('ph') ? ' has-error' : '' }}">
                            <label style="margin-top: 2%;" for="ph" class="col-xs-3 col-md-offset-1 ">pH</label>

                            <div class="col-md-7">
                                <div class="input-group">
                                    <input id="ph" type="text" class="form-control" name="ph" value="{{ old('ph') }}" placeholder="Masukkan nilai pH" required>
                                    <div class="input-group-addon">pH</div>
                                </div>
                                    

                                    @if ($errors->has('ph'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('ph') }}</strong>
                                        </span>
                                    @endif

                            </div>
                        </div>

                                    
                        <div class="form-group{{ $errors->has('bun') ? ' has-error' : '' }}">
                            <label style="margin-top: 2%;" for="bun" class="col-xs-3 col-md-offset-1 ">BUN</label>

                            <div class="col-md-7">
                                <div class="input-group">
                                    <input id="bun" type="text" class="form-control" name="bun" value="{{ old('bun') }}" placeholder="Masukkan nilai BUN" required>
                                    <div class="input-group-addon">mmol/L</div>
                                </div>

                                    @if ($errors->has('bun'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('bun') }}</strong>
                                        </span>
                                    @endif

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('natrium') ? ' has-error' : '' }}">
                            <label style="margin-top: 2%;" for="natrium" class="col-xs-3 col-md-offset-1 ">Natrium</label>

                            <div class="col-md-7">
                                <div class="input-group">
                                    <input id="natrium" type="text" class="form-control" name="natrium" value="{{ old('natrium') }}" placeholder="Masukkan nilai Natrium" required>
                                    <div class="input-group-addon">mEq/L</div>
                                </div>
                                    

                                    @if ($errors->has('natrium'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('natrium') }}</strong>
                                        </span>
                                    @endif

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('glukosa') ? ' has-error' : '' }}">
                            <label style="margin-top: 2%;" for="glukosa" class="col-xs-3 col-md-offset-1  ">Glukosa</label>

                            <div class="col-md-7">
                                <div class="input-group">
                                    <input id="glukosa" type="text" class="form-control" name="glukosa" value="{{ old('glukosa') }}" placeholder="Masukkan nilai Glukosa" required autofocus>
                                    <div class="input-group-addon">mmol/L</div>
                                </div>
                                    

                                    @if ($errors->has('glukosa'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('glukosa') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('hematokrit') ? ' has-error' : '' }}">
                            <label style="margin-top: 2%;" for="hematokrit" class="col-xs-3 col-md-offset-1 ">Hematokrit</label>

                            <div class="col-md-7">
                                <div class="input-group">
                                    <input id="hematokrit" type="text" class="form-control" name="hematokrit" value="{{ old('hematokrit') }}" placeholder="Masukkan nilai Hematokrit" required>
                                    <div class="input-group-addon">%</div>
                                </div>
                                   

                                @if ($errors->has('hematokrit'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hematokrit') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('efusi_pleura') ? ' has-error' : '' }}">
                            <label style="margin-top: 2%;" for="efusi_pleura" class="col-xs-3 col-md-offset-1 ">Efusi Pleura</label>

                            <div class="col-md-7">
                                <select name="efusi_pleura" class="form-control">
                     
                                    <option value ="1">Ya</option>
                                    <option value ="0">Tidak</option>

                                 </select>

                                @if ($errors->has('efusi_pleura'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('efusi_pleura') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                
			</div>

			<div class="col-md-6">
				

				{{--  --}}

				<div class="box box-warning">
					<div class="box-header with-border">
						<h3 class="box-title">4. Apakah Pasien Memiliki / Pernah Mengalami Penyakit Berikut</h3><br> 
					</div>

					<div class="box-body">
						
                    	<div class="form-group{{ $errors->has('penyakithati') ? ' has-error' : '' }}">

                            <div class="col-md-8">
                        	<label  for="penyakithati" >Riwayat Penyakit Hati</label>
                            </div>

                            <div class="col-md-12">
                                <select name="penyakithati" class="form-control">
                     
	                                <option value ="1">Ya</option>
	                                <option value ="0">Tidak</option>

	                             </select>

                                @if ($errors->has('penyakithati'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('penyakithati') }}</strong>
                                    </span>
                                @endif
                            </div>
                    	</div>

		                      
                    	 <div class="form-group{{ $errors->has('jantung') ? ' has-error' : '' }}">
                            <div class="col-md-8">
                                <label  for="jantung" > Penyakit jantung Kongestif</label>  
                            </div>
                        	

                            <div class="col-md-12" >
                                <select name="jantung" class="form-control">
                     
	                                <option value ="1">Ya</option>
	                                <option value ="0">Tidak</option>

	                             </select>

                                @if ($errors->has('jantung'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jantung') }}</strong>
                                    </span>
                                @endif
                            </div>
                    	</div>

		                        	
                    	<div class="form-group{{ $errors->has('serebrovaskular') ? ' has-error' : '' }}">
                            <div class="col-md-8">
                                <label for="serebrovaskular" > Serebrovaskular</label>    
                            </div>
                        	

                            <div class="col-md-12">
                               	<select name="serebrovaskular" class="form-control">
	                                <option value ="1">Ya</option>
	                                <option value ="0">Tidak</option>
	                             </select>

                                @if ($errors->has('serebrovaskular'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('serebrovaskular') }}</strong>
                                    </span>
                                @endif

                            </div>
                    	</div>

                    	<div class="form-group{{ $errors->has('ginjal') ? ' has-error' : '' }}">

                            <div class="col-md-8">
                                <label for="ginjal">Penyakit Ginjal</label>    
                            </div>
                        	

                            <div class="col-md-12">
                               <select name="ginjal" class="form-control">
                     
	                                <option value ="1">Ya</option>
	                                <option value ="0">Tidak</option>

	                             </select>

                                @if ($errors->has('ginjal'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ginjal') }}</strong>
                                    </span>
                                @endif

                            </div>
                    	</div>

		                        
                    	<div class="form-group{{ $errors->has('gangguan_kesadaran') ? ' has-error' : '' }}">

                            <div class="col-md-8">
                                <label for="gangguan_kesadaran" >Gangguan Kesadaran</label>    
                            </div>
                        	

                            <div class="col-md-12">
                               <select name = "gangguan_kesadaran" class="form-control">
                     
	                                <option value ="1">Ya</option>
	                                <option value ="0">Tidak</option>

	                             </select>

                                @if ($errors->has('gangguan_kesadaran'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gangguan_kesadaran') }}</strong>
                                    </span>
                                @endif

                            </div>
                    	</div>

                        <div class="form-group{{ $errors->has('keganasan') ? ' has-error' : '' }}">

                            <div class="col-md-8">
                                <label  for="keganasan" >Apakah Penyakit Yang Diderita Ganas</label>    
                            </div>
                            

                            <div class="col-md-12">
                                <select name="keganasan" class="form-control">
                     
                                    <option value ="1">Ya</option>
                                    <option value ="0">Tidak</option>

                                 </select>

                                @if ($errors->has('keganasan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('keganasan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
					</div>
				</div>
                <div class="form-group" >
                    <div class="col-md-6 col-md-offset-10">
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                </div>
			</div>
	   	</div>

</form>
</div>
 
@endsection 