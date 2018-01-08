@extends('layouts.adminlte')
@section('adminlte')
    <div class="container">
        <div class="row">
            <div class="box box-success col-md-8 col-md-offset-2">
                <div class="box-header with-border">
                  <h3 class="box-title">detail data Pasien </h3>
                    
                </div>

                {{ csrf_field() }}
                <div class="box-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="text-muted">
                                    Nama:
                                </td>

                                <td>{{$pasien->nama}}</td>        
                            </tr>

                            <tr>
                                <td class="text-muted">Nomor Identitas    :</td>
                                <td>{{$pasien->nomor_identitas}}</td>
                            </tr>   

                            <tr>
                                <td>Alamat     </td>

                                <td>
                                    {{$pasien->alamat}}
                                </td>
                            </tr>
                        </tbody>
                    </table>    
                </div>
            </div> 
        </div>
    </div>
    
@endsection