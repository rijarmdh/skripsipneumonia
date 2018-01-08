@extends('layouts.adminlte')

@section('adminlte')

<br>
<br>
	<div class="container">
		<a class="btn btn-primary col-md-offset-1" style=" margin-top: 2.5%;" href="{{route('datauser.create')}}"> Tambah </a><br><br>
		

			<div class="col-md-9 col-md-offset-1">
				<div class="row">
					<div class="box box-primary">
						<div class="box-header with border"><h3 class="box-title">Pengguna Sistem</h3>
						</div>
						<div class="box-body no-padding">
							<table class="table table-responsive table-hover">
								<thead>
									<tr>
										<th>id</th>
										<th>Nama</th>
										<th>Email</th>
										<th>Jabatan</th>
										<th></th>
										<th></th>
										<th></th>						
									</tr>
								</thead>

								<tbody>
									<?php $row = 0; ?>
									@foreach($user as $users)
										<tr>
											<?php $row++?>
											<td>{{$row}}</td>
											<td>{{$users->name}}</td>
											<td>{{$users->email}}</td>
											<td>{{$users->jabatan}}</td>
											<td>

											<form method="post" action="{{route('datauser.destroy', $users->id)}}" accept-charset="UTF-8">
												<input type="hidden" name="_method" value="DELETE">
												
												<input type="hidden" name="_token" value="{{ csrf_token() }}" >

												<input type="submit" class="btn btn-xs btn-danger" onclick="return confirm('yakin ingin menghapus ?');" value="delete"> 
												
											</form>
													
											</td>

											<td>
												<a class="btn btn-xs btn-primary" href="{{route('datauser.edit', $users->id)}}">Edit</a>
											</td>
											<td>

												<a class="btn btn-xs btn-primary" href="{{route('datauser.show', $users->id)}}">Detail</a>
											
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