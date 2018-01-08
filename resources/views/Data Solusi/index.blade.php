@extends('layouts.adminlte')

@section('adminlte')

<style type="text/css">
	td{
		text-align: center;
		font-size: 14px;
	}
</style>

<br>
<div class="container">
<br><br>
{{-- <a class="btn btn-xls btn-primary col-md-offset-1" href="{{route('datasolusi.create')}}">Tambah Solusi</a><br><br> --}}

<div class="col-md-9 col-md-offset-1">
	<div class="row">
		<div class="box box-primary">
			<div class="box-header with-border"><h3 class="box-title">Data Solusi</h3></div>
				<div class="box-body no-padding table-responsive">
						<table class="table table-responsive table-hover">
							<thead>
								<tr>
									<th>id</th>
									<th style="text-align: center;">Nama</th>
									<th style="text-align: center;">Aksi</th>
								</tr>
							</thead>

							<tbody>
								<?php $row = 0; ?>

								@foreach($solusi as $solusis)
									<tr>
										<?php $row++ ?>
										<td style="text-align: left;">{{$row}}</td>
										<td>{{$solusis->nama}}</td>

											{{-- <form method="post" action="{{route('datasolusi.destroy', $solusis->id)}}" accept-charset="UTF-8">
													<input type="hidden" name="_method" value="DELETE">
													
													<input type="hidden" name="_token" value="{{ csrf_token() }}" >

													<input type="submit" class="btn btn-xs btn-danger" onclick="return confirm('yakin ingin menghapus ?');" value="delete"> 	
												</form>	 --}}

										<td>
											<a class="btn btn-xs btn-primary" href="{{route('datasolusi.edit', $solusis->id)}}">Edit</a>
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

@endsection