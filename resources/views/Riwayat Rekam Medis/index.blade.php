@extends('layouts.adminlte')

@section('adminlte')
 
<style type="text/css">
	th {
		text-align: center;
		font-size: 13px;
	}

	td{
		text-align: center;
		font-size: 13px;
	}
</style>



<br><br><br>
	<section style="margin-right: 5%;" class="content-header responsive">
          <h1>
            Halaman Data Rekam Medis
            
          </h1>
             <ul class="breadcrumb">
            <li><a href="dashboardlte"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li class="active">Tabel Rekam Medis</li>
          </ul>

           <div class="row">
				<div class="col-xs-12">
					{{ Form::open(['method'=>'GET', 'route'=>'datagejala.index', 'class'=>'navbar-form navbar-right ' ]) }}
								 	
				<input type="text" name="search" class="form-control col-md-3" required>
			 	
			 	<span>
				 	<button type="submit" class="btn btn-primary" >
						<i class="fa fa-search"></i>	
					</button>
				 	
			 		<a  class="btn btn-primary" href="{{ route('datagejala.index') }}"><i class="fa fa-refresh" aria-hidden="true"></i></a>
				</span>

			 		{{ Form::close() }}	
				</div>
			</div>
    </section>

	<br><br><br>
  <div class="container">
  
  		
  		<div class="col-md-11 ">
  			<div class="row">
				<div class="box box-danger ">
					<div class="box-header with-border">
					<h3 class="box-title">Riwayat Rekam Medis Pasien</h3>
					</div>
					<div class="box-body table-responsive">
						<div class="table-responsive">
							<table class="table  table-striped table-hover">
								<thead>
									<tr>
										<th>id</th>
										<th>Nama</th>
										<th><b>Alamat</b></th>
										<th><b>Tempat Lahir</b></th>
										<th><b>Tanggal Lahir</b></i></th>
										<th>Jenis Kelamin</th>
										
									</tr>
								</thead>

								<tbody>

									@foreach($rekammedis as $rekmed)
										<tr>

											<td>{{$rekmed->id_pasien}}</td>
											<td>{{$rekmed->nama}}</td>
											<td>{{$rekmed->alamat}}</td>
											<td>{{$rekmed->tempat_lahir}}</td>
											<td>{{$rekmed->tanggal_lahir}}</td>
											<td>{{$rekmed->jenis_kelamin}}</td>
											
											
											<td>

										{{-- 	<form method="post" action="{{route('datagejala.destroy', $rekmed->id_pasien)}}" accept-charset="UTF-8">
												<input type="hidden" name="_method" value="DELETE">
												
												<input type="hidden" name="_token" value="{{ csrf_token() }}" >

												<input type="submit" class="btn btn-xs btn-danger" onclick="return confirm('yakin ingin menghapus ?');" value="delete"> 
												
											</form> --}}
													
											</td>

											<td>
												<a class="btn btn-xs btn-primary" href="{{action('gejalaController@riwayat', $rekmed->id_pasien)}}">Detail</a>
											
											</td>
										
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>		
			</div>
  		</div>
  </div>

@endsection