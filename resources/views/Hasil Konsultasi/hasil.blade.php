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
           Hasil Pemeriksaan
          </h1>

          <ul class="breadcrumb">
            <li><a href="{{url('dashboardlte')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Hasil Pemeriksaan</li>
          </ul>
    </section>
    <br><br><br>

    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Pasien</h3> 
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" type="button" data-widget="collapse">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>

                     {{ csrf_field() }}
                    <div class="box-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                  <td class="text-muted">
                                    <b>Nama</b>    
                                  </td>

                                  <td>{{$hasil->nama}}</td>        
                                </tr>

                                <tr>
                                  <td class="text-muted">
                                    <b>Tanggal Periksa</b>    
                                  </td>

                                  <td> {{Carbon\Carbon::parse($hasil->created_at)->format('d F Y  \p\u\k\u\l\ \ h:i A') }}</td>        
                                </tr>

                                <tr>
                                  <td class="text-muted"><b>Skor Pneumonia</b></td>
                                    <td>
                                      {{$hasil->nilaiz}}
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-muted"><b>Kesimpulan Penyakit Pasien</b></td>
                                    <td>
                                        {{$hasil->pneumonia}}
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-muted"><b>Saran Perawatan</b></td>

                                    <td>
                                        {{$hasil->solusi}}
                                    </td>
                                </tr>
                              
                            </tbody>
                        </table> 
                    </div>
                </div> 
                <a href="{{url('hasilkonsultasi')}}" class="btn btn-xls btn-primary">Detail Pemeriksaan</a>   
            </div>
        </div>
    </div> 
  
@endsection