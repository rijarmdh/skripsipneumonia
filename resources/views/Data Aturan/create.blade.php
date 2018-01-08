@extends('layouts.adminlte')

@section('adminlte')



<br><br>

    <section style="margin-right: 5%;" class="content-header responsive">
          <h1>
            Halaman Tambah Aturan
            
          </h1>
             <ul class="breadcrumb">
            <li><a href="dataaturan.index"><i class="fa fa-dashboard"></i>Data Aturan</a></li>
            <li class="active">Tambah Aturan</li>
          </ul>
    </section>


    <br><br><br>
<div class="container">
	<form class="form-horizontal" role="form" method="POST" action=" {{ route('dataaturan.store') }}">
	                        {{ csrf_field() }}                       	
		<div class="row">
			<div class="col-md-5">


				
            {{-- laboratorium --}}
				<div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Gejala Fisik</h3>
                    </div>
                    <div class="box-body">

                    <div class="form-group{{ $errors->has('nama_aturan') ? ' has-error' : '' }}">
                            <div class="col-md-7">
                                <label for="nama_aturan"> Nama Aturan
                                </label>    
                            </div>

                            <div class="col-md-12">
                               
                                    <input id="nama_aturan" type="text" class="form-control" name="nama_aturan" value="{{ old('nama_aturan') }}" placeholder="Masukkan nama aturan" required autofocus>
                                    
                                    {{-- <div class="input-group-addon" >Celsius</div> --}}
                                    
                                    @if ($errors->has('nama_aturan'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nama_aturan') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('suhu') ? ' has-error' : '' }}">
                            <div class="col-md-7">
                                <label for="suhu"> IF Suhu
                                </label>    
                            </div>

                            <div class="col-md-12">
                               
                                    {{-- <input id="suhu" type="text" class="form-control" name="suhu" value="{{ old('suhu') }}" placeholder="Masukkan nilai Suhu" required autofocus> --}}
                                    
                                    {{-- <div class="input-group-addon" >Celsius</div> --}}

                                    <span class="col-md-4">
                                      <input type="radio" name="suhu" class="flat-red" value="rendah" checked>
                                      Rendah
                                    </span>

                                    <span class="col-md-4">
                                      <input type="radio" name="suhu" class="flat-red" value="normal">
                                      Normal
                                    </span>

                                    <span class="col-md-4">
                                      <input type="radio" name="suhu" class="flat-red" value="panas">
                                      Panas
                                    </span>
                                    
                                    @if ($errors->has('suhu'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('suhu') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('nadi') ? ' has-error' : '' }}">
                            <div class="col-md-7">
                                <label for="nadi"> AND Denyut Nadi
                                </label>
                            </div>
                                
                            <div class="col-md-12">
                                {{-- <div class="input-group">
                                    <input id="nadi" type="text" class="form-control" name="nadi" value="{{ old('nadi') }}" placeholder="Masukkan nilai Denyut Nadi" required>
                                    <div class="input-group-addon">
                                        x/menit
                                    </div>
                                </div> --}}
                                <span class="col-md-4">
                                  <input type="radio" name="nadi" class="flat-red" value="rendah" checked>
                                  Rendah
                                </span>

                                <span class="col-md-4">
                                  <input type="radio" name="nadi" class="flat-red" value="normal">
                                  Normal
                                </span>

                                <span class="col-md-4">
                                  <input type="radio" name="nadi" class="flat-red" value="tinggi">
                                  Tinggi
                                </span>

                                @if ($errors->has('nadi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nadi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('pernafasan') ? ' has-error' : '' }}">

                            <div class="col-md-8">
                                <label> AND Pernafasan
                                </label>    
                            </div>
                            

                            <div class="col-md-12">
                               {{--  <div class="input-group">
                                    <input id="pernafasan" type="text" class="form-control" name="pernafasan" value="{{ old('pernafasan') }}" placeholder="Masukkan nilai Pernafasan" required>
                                    <div class="input-group-addon">
                                        x/menit
                                    </div>
                                </div> --}}

                                <span class="col-md-4">
                                  <input type="radio" name="pernafasan" class="flat-red" value="lemah" checked>
                                  Lemah
                                </span>

                                <span class="col-md-4">
                                  <input type="radio" name="pernafasan" class="flat-red" value="normal">
                                  Normal
                                </span>

                                <span class="col-md-4">
                                  <input type="radio" name="pernafasan" class="flat-red" value="cepat">
                                  Cepat
                                </span>

                                @if ($errors->has('pernafasan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pernafasan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('sistolik') ? ' has-error' : '' }}">

                            <div class="col-md-8">
                                <label>AND Sistolik</label>
                            </div>
                            

                            <div class="col-md-12">
                                <span class="col-md-4">
                                  <input type="radio" name="sistolik" class="flat-red" value="rendah" checked>
                                  Rendah
                                </span>

                                <span class="col-md-4">
                                  <input type="radio" name="sistolik" class="flat-red" value="normal">
                                  Normal
                                </span>

                                <span class="col-md-4">
                                  <input type="radio" name="sistolik" class="flat-red" value="tinggi">
                                  Tinggi
                                </span>
                                
                                    {{-- <input id="sistolik" type="text" class="form-control" name="sistolik" value="{{ old('sistolik') }}" placeholder="Masukkan nilai Sistolik" required>
                                    <div class="input-group-addon">mmHg</div>
                                --}}
                                    

                                @if ($errors->has('sistolik'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sistolik') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('usia') ? ' has-error' : '' }}">

                            <div class="col-md-8">
                                <label> AND Usia</label>    
                            </div>
                            

                            <div class="col-md-12">
                                {{-- 
                                    <input id="usia" type="text" class="form-control" name="usia" value="{{ old('usia') }}" placeholder="Masukkan Usia" required>
                                    <div class="input-group-addon">
                                        tahun
                                    </div>
                                 --}}

                                  <span class="col-md-4">
                                  <input type="radio" name="usia" class="flat-red" value="muda" checked>
                                  Muda
                                </span>

                                <span class="col-md-4">
                                  <input type="radio" name="usia" class="flat-red" value="dewasa">
                                  Dewasa
                                </span>

                                <span class="col-md-4">
                                  <input type="radio" name="usia" class="flat-red" value="lansia">
                                  Lansia
                                </span>
                                @if ($errors->has('usia'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('usia') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>  
                </div>

                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Laboratorium</h3>
                    </div>

                    <div class="box-body">
                        <div class="form-group{{ $errors->has('pao2') ? ' has-error' : '' }}">
                            <div class="col-md-8">
                                <label >AND PaO2</label>
                            </div>
                            

                            <div class="col-md-12">
                                
                                <span class="col-md-4">
                                  <input type="radio" name="pao2" class="minimal-red" value="hipoksia"  checked>
                                  Hipoksia
                                </span>

                                <span class="col-md-4 hidden"></span>

                                <span class="col-md-4">
                                  <input type="radio" name="pao2" class="minimal-red" value="normal">
                                  Normal
                                </span>
 
                                
                                    {{-- <input id="pao2" type="text" class="form-control" name="pao2" value="{{ old('pao2') }}" placeholder="Masukkan nilai PaO2" required> 
                                    <div class="input-group-addon">mmHg</div> --}}
                                
                                
                                @if ($errors->has('pao2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pao2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('ph') ? ' has-error' : '' }}">
                            
                            <div class="col-md-8">
                                <label for="ph">AND pH</label>
                            </div>
                            
                            <div class="col-md-12">
                                
                                    {{-- <input id="ph" type="text" class="form-control" name="ph" value="{{ old('ph') }}" placeholder="Masukkan nilai pH" required>
                                    <div class="input-group-addon">pH</div> --}}
                                <span class="col-md-4">
                                  <input type="radio" name="ph" class="minimal-red" value="asam" checked>
                                  Asam
                                </span>

                                <span class="col-md-4">
                                    <input type="radio" name="ph" class="minimal-red" value="normal">
                                  Normal
                                </span>

                                <span class="col-md-4">
                                  <input type="radio" name="ph" class="minimal-red" value="basa">
                                  Basa
                                </span>

                                    @if ($errors->has('ph'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('ph') }}</strong>
                                        </span>
                                    @endif

                            </div>
                        </div>

                                    
                        <div class="form-group{{ $errors->has('bun') ? ' has-error' : '' }}">
                            <div class="col-md-8">
                                <label >AND BUN</label>
                            </div>
                                
                            <div class="col-md-12">
                                
                                {{-- <input id="bun" type="text" class="form-control" name="bun" value="{{ old('bun') }}" placeholder="Masukkan nilai BUN" required>
                                <div class="input-group-addon">mmol/L</div> --}}

                                <span class="col-md-4">
                                    <input type="radio" name="bun" class="minimal-red" value="normal" checked>
                                  Normal
                                </span>

                                <span class="col-md-4">
                                  <input type="radio" name="bun" class="minimal-red" value="tinggi">
                                  Tinggi
                                </span>
                                

                                    @if ($errors->has('bun'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('bun') }}</strong>
                                        </span>
                                    @endif

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('natrium') ? ' has-error' : '' }}">
                            <div class="col-md-8">
                                <label>AND Natrium</label>
                            </div>  
                                
                            <div class="col-md-12">         
                               {{--  <input id="natrium" type="text" class="form-control" name="natrium" value="{{ old('natrium') }}" placeholder="Masukkan nilai Natrium" required>
                                <div class="input-group-addon">mEq/L</div> --}}
                                <span class="col-md-4">
                                  <input type="radio" name="natrium" class="minimal-red" value="rendah" checked>
                                  Rendah
                                </span>

                                <span class="col-md-4">
                                    <input type="radio" name="natrium" class="minimal-red" value="normal">
                                  Normal
                                </span>

                                <span class="col-md-4">
                                  <input type="radio" name="natrium" class="minimal-red" value="tinggi">
                                  Tinggi
                                </span>
                                    

                                    @if ($errors->has('natrium'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('natrium') }}</strong>
                                        </span>
                                    @endif

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('glukosa') ? ' has-error' : '' }}">

                            <div class="col-md-8">
                                <label>AND Glukosa</label>
                            </div>
                                

                            <div class="col-md-12">
                                
                                    {{-- <input id="glukosa" type="text" class="form-control" name="glukosa" value="{{ old('glukosa') }}" placeholder="Masukkan nilai Glukosa" required autofocus>
                                    <div class="input-group-addon">mmol/L</div> --}}
                                
                                <span class="col-md-4">
                                  <input type="radio" name="glukosa" class="minimal-red" value="rendah" checked>
                                  Rendah
                                </span>

                                <span class="col-md-4">
                                    <input type="radio" name="glukosa" class="minimal-red" value="normal">
                                  Normal
                                </span>

                                <span class="col-md-4">
                                  <input type="radio" name="glukosa" class="minimal-red" value="tinggi">
                                  Tinggi
                                </span>    

                                @if ($errors->has('glukosa'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('glukosa') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('hematokrit') ? ' has-error' : '' }}">
                            <div class="col-md-8">
                                <label>AND Hematokrit</label>    
                            </div>
                            

                            <div class="col-md-12">
                                
                                {{-- <input id="hematokrit" type="text" class="form-control" name="hematokrit" value="{{ old('hematokrit') }}" placeholder="Masukkan nilai Hematokrit" required>
                                    <div class="input-group-addon">%</div> --}}
                               
                               <span class="col-md-4">
                                  <input type="radio" name="hematokrit" class="minimal-red" value="rendah" checked>
                                  Rendah
                                </span>

                                <span class="col-md-4">
                                    <input type="radio" name="hematokrit" class="minimal-red" value="normal">
                                  Normal
                                </span>

                                <span class="col-md-4">
                                  <input type="radio" name="hematokrit" class="minimal-red" value="tinggi">
                                  Tinggi
                                </span>  

                                @if ($errors->has('hematokrit'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hematokrit') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('efusi_pleura') ? ' has-error' : '' }}">

                            <div class="col-md-8">
                                <label> AND Efusi Pleura</label>
                            </div>
                            

                            <div class="col-md-12">
                                <select name="efusi_pleura" class="form-control">
                     
                                    <option value ="Ya">Ya</option>
                                    <option value ="Tidak">Tidak</option>

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

                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Riwayat Penyakit Pasien</h3>
                    </div>

                    <div class="box-body">
                        <div class="form-group{{ $errors->has('keganasan') ? ' has-error' : '' }}">
                        
                            <div class="col-md-8"> 
                              <label  for="keganasan" >AND Keganasan Komorbid</label>
                            </div>
                            

                            <div class="col-md-12">
                                <select name="keganasan" class="form-control">
                     
                                    <option value ="Ya">Ya</option>
                                    <option value ="Tidak">Tidak</option>

                                 </select>

                                @if ($errors->has('keganasan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('keganasan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('penyakithati') ? ' has-error' : '' }}">

                            <div class="col-md-8">
                                <label  for="penyakithati" >AND Penyakit Hati</label>    
                            </div>
                            

                            <div class="col-md-12">
                                <select name="penyakithati" class="form-control">
                     
                                    <option value ="Ya">Ya</option>
                                    <option value ="Tidak">Tidak</option>

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
                                <label  for="jantung">AND Penyakit jantung</label>    
                            </div>
                            

                            <div class="col-md-12" >
                                <select name="jantung" class="form-control">
                     
                                    <option value ="Ya">Ya</option>
                                    <option value ="Tidak">Tidak</option>

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
                                <label for="serebrovaskular">AND Serebrovaskular</label>    
                            </div>
                            

                            <div class="col-md-12">
                                <select name="serebrovaskular" class="form-control">
                                    <option value ="Ya">Ya</option>
                                    <option value ="Tidak">Tidak</option>
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
                                <label for="ginjal">AND Penyakit Ginjal</label>    
                            </div>
                            

                            <div class="col-md-12">
                               <select name="ginjal" class="form-control">
                     
                                    <option value ="Ya">Ya</option>
                                    <option value ="Tidak">Tidak</option>

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
                                <label for="gangguan_kesadaran" >AND Gangguan Kesadaran</label>    
                            </div>
                            

                            <div class="col-md-12">
                               <select name = "gangguan_kesadaran" class="form-control">
                     
                                    <option value ="Ya">Ya</option>
                                    <option value ="Tidak">Tidak</option>

                                 </select>

                                @if ($errors->has('gangguan_kesadaran'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gangguan_kesadaran') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        {{-- <div class="form-group{{ $errors->has('pneumonia') ? ' has-error' : '' }}">
                            <label style="margin-top: 2%;" for="pneumonia" class="col-xs-3 col-md-offset-1 ">Pneumonia</label>

                            <div class="col-md-7">
                                <input id="pneumonia" type="text" class="form-control" name="pneumonia" value="{{ old('pneumonia') }}" required>

                                @if ($errors->has('pneumonia'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pneumonia') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div> --}}
                    </div>
                </div>
                

				



				{{--  --}}
				

                 <div class="box box-primary">
                    <div class="box-header with-border"><h3 class="box-title">Pneumonia</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group{{ $errors->has('id_pasien') ? ' has-error' : '' }}">
                            <label for="roles" class="col-xs-3 control-label">THEN Pneumonia</label>

                             <div class="col-md-8">
                              <select name="pneumonia" class="form-control">
                                <option value ="ringan">Ringan</option>
                                <option value ="berat">Berat</option>
                        
                              </select>
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



    