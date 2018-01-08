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
            <div class="col-md-5">
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

                                        <td>{{$lastgejala->nama}}</td>        
                                    </tr>


                                    <tr>
                                        <td class="text-muted">
                                        <b>Tanggal Periksa</b>    
                                        </td>

                                        <td>
                                            {{Carbon\Carbon::parse($lastgejala->created_at)->format('d F Y  \p\u\k\u\l\ \ h:i A') }}
                                        </td>        
                                    </tr>


                                    <tr>
                                        <td class="text-muted"><b>Suhu</b></td>
                                        <td>{{$lastgejala->suhu}}</td>
                                    </tr>   

                                    <tr>
                                        <td class="text-muted"><b>Nadi</b></td>

                                        <td>
                                            {{$lastgejala->nadi}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-muted"><b>Pernafasan</b></td>

                                        <td>
                                            {{$lastgejala->pernafasan}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-muted"><b>Usia</b></td>

                                        <td>
                                            {{$lastgejala->usia}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>    
                        </div>
                </div> 


                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Riwayat Penyakit Pasien</h3>
                         <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" type="button" data-widget="collapse">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>

                        <div class="box-body">
                            <table class="table table-hover">
                                <tbody>
                                     <tr>
                                        <td class="text-muted"><b>Keganasan</b></td>

                                        <td>
                                        @if ($lastgejala->keganasan == 1)
                                            <?php echo "iya" ?>
                                        @else
                                             <?php echo "tidak" ?> 
                                        @endif

                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-muted"><b>Penyakit Hati</b></td>

                                        <td>
                                            @if ($lastgejala->penyakithati == "1")
                                                <?php echo "iya" ?>
                                            @else
                                                <?php echo "tidak" ?>
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-muted"><b>Penyakit Jantung Kongestif</b></td>

                                        <td>
                                            @if ($lastgejala->jantung == "1")
                                                <?php echo "iya" ?>
                                            @else
                                                <?php echo "tidak" ?>
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-muted"><b>Penyakit Serebrovaskular</b></td>

                                        <td>
                                            @if ($lastgejala->serebrovaskular == "1")
                                                <?php echo "iya" ?>
                                            @else
                                                <?php echo "tidak" ?>
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-muted"><b>Penyakit Ginjal</b></td>

                                        <td>
                                            @if ($lastgejala->ginjal == "1")
                                                <?php echo "iya" ?>
                                            @else
                                                <?php echo "tidak" ?>
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-muted"><b>Penyakit Gangguan Kesadaran</b></td>
                                        <td>
                                            @if ($lastgejala->gangguan_kesadaran == "1")
                                                <?php echo "iya" ?>
                                            @else
                                                <?php echo "tidak" ?>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
               <div class="box box-warning">
                   <div class="box-header with-border">
                       <h3 class="box-title">Hasil Laboratorium</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" type="button" data-widget="collapse">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                   </div>

                   <div class="box-body">
                       <table class="table table-hover">
                           <tbody>
                                <tr>
                                        <td class="text-muted"><b>PH</b></td>

                                        <td>
                                            {{$lastgejala->ph}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-muted"><b>Bloode Urea Nitrogen</b></td>

                                        <td>
                                            {{$lastgejala->bun}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-muted"><b>Natrium</b></td>

                                        <td>
                                            {{$lastgejala->natrium}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-muted"><b>Glukosa</b></td>

                                        <td>
                                            {{$lastgejala->glukosa}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-muted"><b>Hematokrit</b></td>

                                        <td>
                                            {{$lastgejala->hematokrit}}
                                        </td>
                                    </tr>

                                     <tr>
                                        <td class="text-muted"><b>Pao2</b></td>

                                        <td>
                                            {{$lastgejala->pao2}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-muted"><b>Sistolik</b></td>

                                        <td>
                                            {{$lastgejala->sistolik}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-muted"><b>Efusi Pleura</b></td>

                                        <td>
                                        @if ($lastgejala->efusi_pleura == 1)
                                            <?php echo "ya" ?>
                                        @else
                                            <?php echo "tidak" ?>
                                        @endif
                                           
                                        </td>
                                    </tr>
                           </tbody>
                       </table>
                   </div>
               </div>

               <div class="box box-success">
                   <div class="box-header with-border">
                       <h3 class="box-title">
                           Hasil Pemeriksaan
                       </h3>
                   </div>

                   <div class="box-body">
                       <table class="table">
                           <tbody class="table table-hover">
                               <tr>
                                    <td class="text-muted"><b>Skor Pneumonia</b></td>

                                    <td>
                                      {{$lastgejala->nilaiz}}
                                    </td>
                            
                                </tr>

                                <tr>
                                    <td class="text-muted"><b>Kesimpulan Penyakit Pasien</b></td>

                                    <td>
                                        {{$lastgejala->pneumonia}}
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-muted"><b>Saran Perawatan</b></td>

                                    <td>
                                        {{$lastgejala->solusi}}
                                    </td>
                                </tr>

                           </tbody>
                       </table>
                   </div>
               </div>

            </div>
        </div> 
    </div>
    
@endsection