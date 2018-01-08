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
            Halaman Data Aturan
            
          </h1>
             <ul class="breadcrumb">
            <li><a href="dashboardlte"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li class="active">Tabel Aturan</li>
          </ul>

           <div class="row">
				<div class="col-xs-12">
					{{ Form::open(['method'=>'GET', 'route'=>'dataaturan.index', 'class'=>'navbar-form navbar-right ' ]) }}
								 	
				<input type="text" name="search" class="form-control col-md-3" required>
			 	
			 	<span>
				 	<button type="submit" class="btn btn-primary" >
						<i class="fa fa-search"></i>	
					</button>
				 	
			 		<a  class="btn btn-primary" href="{{ route('dataaturan.index') }}"><i class="fa fa-refresh" aria-hidden="true"></i></a>
				</span>

					{{ Form::close() }}	
				</div>
			</div>
    </section>
	<br><br>
	
  <div class="container">
  
  		
  		<div class="col-md-11">
  			<div class="row">
				<div class="box box-danger ">
					<div class="box-header">
					<h3 class="box-title">Tabel Data Aturan</h3></div>
					<div class="box-body">
						<div class="table-responsive no-padding">
							<table class="table table-bordered table-striped table-hover">
								<thead >
									<tr>
										<th>Nomor</th>
										<th style="text-align: center;" colspan="5">Pemeriksaan Fisik</th>
										<th style="text-align: center;" colspan="6">Pemeriksaan Laboratorium</th>
										<th style="text-align: center;" colspan="7">Riwayat Penyakit Komorbid Pasien</th>
										<th style="text-align: center;">Hasil</th>
										<th colspan="2"></th>

									</tr>

									<tr>
										<th style="text-align: center;">aturan</th>
										<th style="text-align: center;">Suhu</th>
										<th style="text-align: center;">Nadi</th>
										<th style="text-align: center;">Pernafasan</th>
										<th style="text-align: center;">Usia</th>
										<th style="text-align: center;">Sistolik</th>
										<th style="text-align: center;">PaO2</th>
										<th style="text-align: center;">pH</th>
										<th style="text-align: center;">BUN</th>
										<th style="text-align: center;">Natrium</th>
										<th style="text-align: center;">Glukosa</th>
										<th style="text-align: center;">Hematokrit</th>
										<th style="text-align: center;">Efusi_Pleura</th>
										<th style="text-align: center;">Keganasan</th>
										<th style="text-align: center;">Penyakit_Hati</th>
										<th style="text-align: center;">Jantung</th>
										<th style="text-align: center;">Serebrovaskular</th>
										<th style="text-align: center;">Ginjal</th>
										<th style="text-align: center;">Gangguan_Kesadaran</th>				
										<th style="text-align: center;">Pneumonia</th>
										<th colspan="2" style="text-align: center;"></th>
									</tr>
								</thead>

								<tbody>
									@foreach($aturan as $aturans)
										<tr>
											<td>{{$aturans->nama_aturan}}</td>	
											<td style="text-align: center;">{{$aturans->suhu}}</td>
											<td style="text-align: center;">{{$aturans->nadi}}</td>
											<td style="text-align: center;">{{$aturans->pernafasan}}</td>
											<td style="text-align: center;">{{$aturans->usia}}</td>
											<td style="text-align: center;">{{$aturans->sistolik}}</td>
											<td style="text-align: center;">{{$aturans->pao2}}</td>
											<td style="text-align: center;">{{$aturans->ph}}</td>
											<td style="text-align: center;">{{$aturans->bun}}</td>
											<td style="text-align: center;">{{$aturans->natrium}}</td>
											<td style="text-align: center;">{{$aturans->glukosa}}</td>
											<td style="text-align: center;">{{$aturans->hematokrit}}</td>
											<td style="text-align: center;">{{$aturans->efusi_pleura}}</td>
											<td style="text-align: center;">{{$aturans->keganasan}}</td>
											<td style="text-align: center;">{{$aturans->penyakithati}}</td>
											<td style="text-align: center;">{{$aturans->jantung}}</td>
											<td style="text-align: center;">{{$aturans->serebrovaskular}}</td>
											<td style="text-align: center;"> {{$aturans->ginjal}}</td>
											<td style="text-align: center;">{{$aturans->gangguan_kesadaran}}</td>
											<td style="text-align: center;">{{$aturans->pneumonia}}</td>
											
											<td>

											<form method="post" action="{{route('dataaturan.destroy', $aturans->id_aturan)}}" accept-charset="UTF-8">
												<input type="hidden" name="_method" value="DELETE">
												
												<input type="hidden" name="_token" value="{{ csrf_token() }}" >

												<input type="submit" class="btn btn-xs btn-danger" onclick="return confirm('yakin ingin menghapus ?');" value="delete"> 
												
											</form>
													
											</td>

											<td>
												<a class="btn btn-xs btn-primary" href="{{route('dataaturan.edit', $aturans->id_aturan)}}">Edit</a>
											</td>
{{-- 											<td>

												<a class="btn btn-xs btn-primary" href="{{route('datapasien.show', $pasiens->id_pasien)}}">Detail</a>
											
											</td>
 --}}										
										</tr>
									@endforeach
								</tbody>
							</table>


							
						</div>
							<div style="text-align: center;"> {{$aturan->links()}} </div>
					</div>
					
				</div>		
			</div>
  			
  		</div>
  	
  </div>
 	

@endsection

