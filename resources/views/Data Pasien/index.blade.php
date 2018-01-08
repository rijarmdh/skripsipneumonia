@extends('layouts.adminlte')

@section('adminlte')
<style type="text/css">
	th{
		text-align: center;
		font-size:13px;
	}
	td{
		text-align: center;
		font-size:13px;
	}


	</style>


 	<br>
 	<br>
	 <section style="margin-right: 5%;" class="content-header">
      <h1>
        Halaman Data Pasien
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboardlte"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">
        Data Pasien</li>
      </ol>

      <div class="row">
			<div class="col-xs-12">
				{{ Form::open(['method'=>'GET', 'route'=>'datapasien.index', 'class'=>'navbar-form navbar-right ' ]) }}
							 	
			<input type="text" name="search" class="form-control col-md-3" required>
		 	
		 	<span>
		 	<button type="submit" class="btn btn-primary" >
				<i class="fa fa-search"></i>	
			</button>
		 	
		 		<a  class="btn btn-primary" href="{{ route('datapasien.index') }}"><i class="fa fa-refresh" aria-hidden="true"></i></a>
			</span>

				{{ Form::close() }}	
			</div>
		</div>
    </section>

    <br>
  	<div class="container">
  
  		<div class="col-md-11">
  			<div class="row">
				<div class="box box-primary">
					<div class="box-header with-border"><h3 class="box-title">Data Diri Pasien</h3>

					</div>
					<div class="box-body no-padding table-responsive">
							<table class="table table-hover table-responsive">
								<thead>
									<tr>
										<th>id</th>
										<th colspan="col">Nama</th>
										
										<th >Alamat</th>
										
										<th>Tempat_Lahir</th>
										<th>Tanggal_Lahir</th>
										<th>Jenis_Kelamin</th>
										
										<th>Pekerjaan</th>
										<th>Email</th>
										<th>Pendidikan</th>
										<th colspan="3">Action</th>
									</tr>
								</thead>

								<tbody>


									@if (Auth::user()->jabatan == 'Pakar')
										@foreach($pasien as $pasiens)
										<tr>
											<td>{{$pasiens->id_pasien}}</td>
											<td>{{$pasiens->nama}}</td>
											<td>{{$pasiens->alamat}}</td>
											<td>{{$pasiens->tempat_lahir}}</td>
											<td>{{$pasiens->tanggal_lahir}}</td>
											<td>{{$pasiens->jenis_kelamin}}</td>
											<td>{{$pasiens->pekerjaan}}</td>
											<td>{{$pasiens->email}}</td>
											<td>{{$pasiens->pendidikan}}</td>

									
 											<td>
												<a class="btn btn-xs btn-primary" href="{{route('datapasien.show', $pasiens->id_pasien)}}">Detail</a>
											</td>
										
										</tr>
										@endforeach

									@else
										@foreach($pasien as $pasiens)
										<tr>
											
											<td>{{$pasiens->id_pasien}}</td>
											<td>{{$pasiens->nama}}</td>
											<td>{{$pasiens->alamat}}</td>
											<td>{{$pasiens->tempat_lahir}}</td>
											<td>{{$pasiens->tanggal_lahir}}</td>
											<td>{{$pasiens->jenis_kelamin}}</td>
											<td>{{$pasiens->pekerjaan}}</td>
											<td>{{$pasiens->email}}</td>
											<td>{{$pasiens->pendidikan}}</td>

											<td>
												<form method="post" action="{{route('datapasien.destroy', $pasiens->id_pasien)}}" accept-charset="UTF-8">
													<input type="hidden" name="_method" value="DELETE">
													
													<input type="hidden" name="_token" value="{{ csrf_token() }}" >

													<input type="submit" class="btn btn-xs btn-danger" onclick="return confirm('yakin ingin menghapus ?');" value="delete"> 	
												</form>
												
											</td>

											<td>
												<a class="btn btn-xs btn-primary" href="{{route('datapasien.edit', $pasiens->id_pasien)}}">Edit</a>
											</td>
											<td>

												<a class="btn btn-xs btn-primary" href="{{route('datapasien.show', $pasiens->id_pasien)}}">Detail</a>
											
											</td>
										
										</tr>
									@endforeach
									@endif


									
								</tbody>
							</table>
						
					</div>
					<div style="text-align: center;">
						{{$pasien->links()}}
					</div>
				</div>		
			</div>
  			
  		</div>
  	
  	</div>
 	

@endsection