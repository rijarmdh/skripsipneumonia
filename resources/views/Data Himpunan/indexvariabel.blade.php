@extends('layouts.adminlte')

@section('adminlte') 
	<br><br>

	<section style="margin-right: 5%;" class="content-header responsive">
          <h1>
            Halaman Gejala
          </h1>
          
          <ul class="breadcrumb">
            <li><a href="dashboardlte"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li class="active">Tabel Gejala</li>
          </ul>

          <div class="row">
			<div class="col-xs-12">
			{{ Form::open(['method'=>'GET', 'route'=>'daftargejala.index', 'class'=>'navbar-form navbar-right ' ]) }}
							 	
			<input type="text" name="search" class="form-control col-md-3" required>
		 	
		 	<span>
		 	<button type="submit" class="btn btn-primary" >
				<i class="fa fa-search"></i>	
			</button>
		 	
		 		<a  class="btn btn-primary" href="{{ route('daftargejala.index') }}"><i class="fa fa-refresh" aria-hidden="true"></i></a>
			</span>

				{{ Form::close() }}	
			</div>
		</div>
    </section>
    <br><br>

  <div class="container">  		
  		<div class="col-md-11 ">
  			<div class="row">
				<div class="box box-primary">
					<div class="box-header with-border"><h3 class="box-title">Data Variabel Gejala</h3></div>
					<div class="box-body table-responsive">
						
							<table class="table table-responsive table-hover">
								<thead>
									<tr>
										<th>id</th>
										<th><b>Nama Variabel Gejala</b></th>
										<th></th>	
									</tr>
								</thead>

								<tbody>
									<?php $row = 0; ?>
									@foreach($daftarvariabel as $ig)
										<tr>
											<?php $row++?>
											<td>{{$row}}</td>
											<td>{{$ig->nama}}</td>
											<td>
												<a class="btn btn-xs btn-primary" href="{{route('daftargejala.show', $ig->id_variabel)}}">Detail</a>
											</td>												
											
										</tr>
{{-- 
										<td>

											<form method="post" action="{{route('datahimpunan.destroy', $himpunans->id_himpunan)}}" accept-charset="UTF-8">
												<input type="hidden" name="_method" value="DELETE">
												
												<input type="hidden" name="_token" value="{{ csrf_token() }}" >

												<input type="submit" class="btn btn-xs btn-danger" onclick="return confirm('yakin ingin menghapus ?');" value="delete"> 
												
											</form>
													
											</td> --}}
{{-- 
											<td>
												<a class="btn btn-xs btn-primary" href="{{route('datahimpunan.edit', $himpunans->id_himpunan)}}">Edit</a>
											</td> --}}
											
											
										
									@endforeach
								</tbody>
							</table>
							<div style="text-align: center;">
								{{$daftarvariabel->links()}}	
							</div>
					</div>
				</div>		
			</div>
  			
  		</div>
  	
  </div>
 	
@endsection