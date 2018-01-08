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
<div class="container">
	
	<div class="col-sm-11 ">
		<div class="row">
		<div class="box box-danger ">
			<div class="box-header with-border">
			<h3 class="box-title">Riwayat Rekam Medis Pasien</h3>
			{{-- <h3>{{$riwayat->Pasien->nama}}</h3> --}}
			</div>
			<div class="box-body table-responsive">
				<div class="table-responsive">

					<table class="table  table-striped table-hover">
						<thead>
							<tr>
								<th>id</th>
								{{-- <th>Nama</th> --}}
								<th>Tanggal_Periksa</th>
								<th>Suhu</th>
								<th>Nadi</th>
								<th>Pernafasan</th>
								<th>Usia</th>
								<th>Pao2</th>
								<th>Pneumonia</th>
								<th>Saran_Perawatan</th>
							</tr>
						</thead>

						<tbody>

							<?php $row = 0; ?>
							@if ($riwayat->count() == 0)

								<tr><td colspan="8" style="text-align: center;">
										<h2>
											<b>Pasien Belum Melakukan Pemeriksaan</b>
										</h2>
									</td>
								</tr>

							@else

								@foreach($riwayat as $rwyt)
									<tr>
										<?php $row++?>
										<td>{{$row}}</td>
										{{-- <td>{{$rwyt->Pasien->nama}}</td> --}}
										<td> {{Carbon\Carbon::parse($rwyt->created_at)->format('d F Y  \p\u\k\u\l\ \ h:i A') }}</td>
										<td>{{$rwyt->suhu}}</td>
										<td>{{$rwyt->nadi}}</td>
										<td>{{$rwyt->pernafasan}}</td>
										<td>{{$rwyt->usia}}</td>
										<td>{{$rwyt->pao2}}</td>
										<td>{{$rwyt->pneumonia}}</td>
										<td>{{$rwyt->solusi}}</td>
										<td>
											<form method="post" action="{{route('datagejala.destroy', $rwyt->id_gejala)}}" accept-charset="UTF-8">
												<input type="hidden" name="_method" value="DELETE">
												<input type="hidden" name="_token" value="{{ csrf_token() }}" >
												<input type="submit" class="btn btn-xs btn-danger" onclick="return confirm('yakin ingin menghapus ?');" value="delete">
											</form>
										</td>
										<td>
											<a class="btn btn-xs btn-primary" href="{{route('datagejala.show', $rwyt->id_gejala)}}">Detail</a>
										</td>	
									</tr>
								@endforeach
							@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>		
	</div>
		{{-- <a href="{{route('datagejala.create', $rekammedis->id_pasien)}}" class="btn btn-sm btn-primary col-md-offset-11" >Lakukan Konsultasi</a> --}}
	</div>

</div>
 	

@endsection