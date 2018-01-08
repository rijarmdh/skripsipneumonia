@extends('layouts.adminlte')
@section('adminlte')
	<div class="container">
		<div class="row">
			<div class="box box-primary col-md-8 col-md-offset-2">
				<div class="box-header with-border">
					<h3 class="box-title">
						detail data user 
					</h3>
					
				</div>

				{{ csrf_field() }}
				<div class="box-body">
					<table class="table">
						<tbody>
							<tr>
								<td class="text-muted">
									Nama:
								</td>

								<td>{{$user->name}}</td>		
							</tr>

							<tr>
								<td class="text-muted">email	:</td>
								<td>{{$user->email}}</td>
							</tr>	

							<tr>
								<td>jabatan		</td>

								<td>
									{{$user->jabatan}}
								</td>
							</tr>
						</tbody>
					</table>	
				</div>
			</div> 
		</div>
	</div>
	
@endsection