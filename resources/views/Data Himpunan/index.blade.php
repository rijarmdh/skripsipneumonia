@extends('layouts.adminlte')

@section('adminlte')
	
 <style type="text/css">
 	th{
 		font-size: 13px;
 	}
 	td{
 		font-size: 13px;
 	}
 </style>
	<br><br>

	<section style="margin-right: 5%;" class="content-header responsive">
          <h1>
            Halaman Himpunan
            
          </h1>
          <ul class="breadcrumb">
            <li><a href="dashboardlte"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li class="active">Tabel Himpunan</li>
          </ul>

          {{-- <div class="row">
			<div class="col-xs-12">
				{{ Form::open(['method'=>'GET', 'route'=>'datahimpunan.index', 'class'=>'navbar-form navbar-right ' ]) }}
							 	
			<input type="text" name="search" class="form-control col-md-3" required>
		 	
		 	<span>
		 	<button type="submit" class="btn btn-primary" >
				<i class="fa fa-search"></i>	
			</button>
		 	
		 		<a  class="btn btn-primary" href="{{ route('datahimpunan.index') }}"><i class="fa fa-refresh" aria-hidden="true"></i></a>
			</span>

				{{ Form::close() }}	
			</div>
		</div> --}}
    </section>
    <br><br>

  <div class="container">  		
  		<div class="col-md-11 ">
  			<div class="row">
				<div class="box box-primary">
					<div class="box-header with-border"><h3 class="box-title">Himpunan</h3></div>
					<div class="box-body table-responsive">
						
							<table class="table table-responsive table-hover">
								<thead>
									<tr>
										<th>id</th>
										<th><b>Nama Himpunan</b></th>
										<th><b>Batas Bawah</b></th>
										<th><b>Batas Tengah </b></i></th>
										<th>Batas Tengah</th>
										<th>Batas Atas</th>
										<th></th>						
									</tr>
								</thead>

								<tbody>
									<?php $row = 0; ?>
									@foreach($himpunan as $himpunans)
										<tr>
											<?php $row++?>
											<td>{{$row}}</td>
											<td>{{$himpunans->namahimpunan}}</td>
											<td>{{$himpunans->batasbawah}}</td>
											<td>
											@if ($himpunans->batastengaha == 0)
												<?php echo " " ?>
											@else
												{{$himpunans->batastengaha}}	
											@endif
											</td>

											<td>
											@if ($himpunans->batastengahb == 0)
												{{" "}}

											@else
												{{$himpunans->batastengahb}}
											@endif
	
											</td>
											<td>{{$himpunans->batasatas}}</td>
											<td style="text-align: right;">

											<form method="post" action="{{route('datahimpunan.destroy', $himpunans->id_himpunan)}}" accept-charset="UTF-8">
												<input type="hidden" name="_method" value="DELETE">
												
												<input type="hidden" name="_token" value="{{ csrf_token() }}" >

												<input type="submit" class="btn btn-xs btn-danger" onclick="return confirm('yakin ingin menghapus ?');" value="delete"> 
												
											</form>
													
											</td>

											<td>
												<a class="btn btn-xs btn-primary" href="{{route('datahimpunan.edit', $himpunans->id_himpunan)}}">Edit</a>
											</td>
											{{-- <td>

												<a class="btn btn-xs btn-primary" href="{{route('datahimpunan.show', $himpunans->id_himpunan)}}">Detail</a>
											
											</td> --}}
										
										</tr>
									@endforeach
								</tbody>
							</table>
						
					</div>

					
				</div>		
			</div>
  			
  		</div>
  	
  </div>
 	
@endsection