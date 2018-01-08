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

<br><br><br>
    <section style="margin-right: 5%;" class="content-header responsive">
          <h1>
            Halaman Detail Pasien
            
          </h1>
             <ul class="breadcrumb">
            <li><a href="{{route('datapasien.index')}}"><i class="fa fa-dashboard"></i> Data Pasien</a></li>
            <li class="active">Detail Pasien</li>
          </ul>
    </section>
    <br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="box box-primary">
                    <div class="box-header with-border">
                    <h3 class="box-title">Detail Data Pasien</h3> 
                    </div>

                     {{ csrf_field() }}
                        <div class="box-body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="text-muted">
                                        <b>id:</b>    
                                        </td>

                                        <td>{{$pasien->id_pasien}}</td>        
                                    </tr>

                                    <tr>
                                        <td class="text-muted">
                                        <b>Nama:</b>    
                                        </td>

                                        <td>{{$pasien->nama}}</td>        
                                    </tr>

                                    <tr>
                                        <td class="text-muted"><b>Nama Panggilan:</b></td>
                                        <td>{{$pasien->nama_panggilan}}</td>
                                    </tr>   

                                    <tr>
                                        <td class="text-muted"><b>Alamat</b></td>

                                        <td>
                                            {{$pasien->alamat}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-muted"><b>Nomor Telepon</b></td>

                                        <td>
                                            {{$pasien->no_telepon}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-muted"><b>Tempat Lahir</b></td>

                                        <td>
                                            {{$pasien->tempat_lahir}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-muted"><b>Tanggal Lahir</b></td>

                                        <td>
                                            {{$pasien->tanggal_lahir}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-muted"><b>Jenis Kelamin</b></td>

                                        <td>
                                            {{$pasien->jenis_kelamin}}
                                        </td>
                                    </tr>

                                   

                                   
                                </tbody>
                            </table>    
                        </div>
                </div> 
            </div>

            <div class="col-md-6">
               <div class="box box-warning">
                   <div class="box-header with-border">
                       <h3 class="box-title">Detail Data Pasien</h3>
                   </div>

                   <div class="box-body">
                       <table class="table table-hover">
                           <tbody>
                                <tr>
                                        <td class="text-muted"><b>Status Perkawinan</b></td>

                                        <td>
                                            {{$pasien->status_perkawinan}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-muted"><b>Kewarganegaraan</b></td>

                                        <td>
                                            {{$pasien->kewarganegaraan}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-muted"><b>Agama</b></td>

                                        <td>
                                            {{$pasien->agama}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-muted"><b>Pekerjaan</b></td>

                                        <td>
                                            {{$pasien->pekerjaan}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-muted"><b>Email</b></td>

                                        <td>
                                            @if ($pasien->email == null)
                                                <?php echo "Belum Diisi / Tidak Memiliki Email" ?>
                                            @endif
                                            {{$pasien->email}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-muted"><b>Pendidikan</b></td>

                                        <td>
                                            {{$pasien->pendidikan}}
                                        </td>
                                    </tr>
                           </tbody>
                       </table>
                   </div>
               </div>

                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Dalam Keadaan Tertentu Dapat Menghubungi</h3>

                        <div class="box-body">
                            <table class="table table-hover">
                                <tbody>
                                     <tr>
                                        <td class="text-muted"><b>Nama Kerabat</b></td>

                                        <td>
                                            {{$pasien->nama_kerabat}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-muted"><b>Hubungan</b></td>

                                        <td>
                                            {{$pasien->hubungan}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-muted"><b>Nomor Telepon</b></td>

                                        <td>
                                            {{$pasien->nomortelepon}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
    
@endsection