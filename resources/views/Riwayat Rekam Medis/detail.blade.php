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

    <br>
    <div class="container">
        <a href={{action('pdfController@getPDF', $rekmed->id_gejala)}} class="btn btn-sm btn-primary">Print</a>
        
        <div class="row">
            <br>
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
                                        <b>id</b>    
                                        </td>

                                        <td>{{$rekmed->Pasien->id_pasien}}</td>        
                                    </tr>

                                    <tr>
                                        <td class="text-muted">
                                        <b>Nama</b>    
                                        </td>

                                        <td>{{$rekmed->Pasien->nama}}</td>        
                                    </tr>

                                    <tr>
                                        <td class="text-muted">
                                        <b>Tanggal Periksa</b>    
                                        </td>

                                        <td>{{Carbon\Carbon::parse($rekmed->created_at)->format('d F, Y  \p\u\k\u\l\ \ h:i A') }}</td>        
                                    </tr>

                                    <tr>
                                        <td class="text-muted"><b>Suhu</b></td>
                                        <td>{{$rekmed->suhu}}</td>
                                    </tr>   

                                    <tr>
                                        <td class="text-muted"><b>Nadi</b></td>

                                        <td>
                                            {{$rekmed->nadi}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-muted"><b>Pernafasan</b></td>

                                        <td>
                                            {{$rekmed->pernafasan}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-muted"><b>Usia</b></td>

                                        <td>
                                            {{$rekmed->usia}}
                                        </td>
                                    </tr>

                                   

                                   

                                   
                                </tbody>
                            </table>    
                        </div>
                </div> 


                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Riwayat Penyakit Pasien</h3>

                        <div class="box-body">
                            <table class="table table-hover">
                                <tbody>
                                     <tr>
                                        <td class="text-muted"><b>Keganasan</b></td>

                                        <td>
                                        @if ($rekmed->keganasan == 1)
                                            <?php echo "iya" ?>
                                        @else
                                             <?php echo "tidak" ?> 
                                        @endif

                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-muted"><b>Penyakit Hati</b></td>

                                        <td>
                                            @if ($rekmed->penyakithati == "1")
                                                <?php echo "iya" ?>
                                            @else
                                                <?php echo "tidak" ?>
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-muted"><b>Penyakit Jantung Kongestif</b></td>

                                        <td>
                                            @if ($rekmed->jantung == "1")
                                                <?php echo "iya" ?>
                                            @else
                                                <?php echo "tidak" ?>
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-muted"><b>Penyakit Serebrovaskular</b></td>

                                        <td>
                                            @if ($rekmed->serebrovaskular == "1")
                                                <?php echo "iya" ?>
                                            @else
                                                <?php echo "tidak" ?>
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-muted"><b>Penyakit Ginjal</b></td>

                                        <td>
                                            @if ($rekmed->ginjal == "1")
                                                <?php echo "iya" ?>
                                            @else
                                                <?php echo "tidak" ?>
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-muted"><b>Penyakit Gangguan Kesadaran</b></td>

                                        <td>
                                            @if ($rekmed->gangguan_kesadaran == "1")
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
                   </div>

                   <div class="box-body">
                       <table class="table table-hover">
                           <tbody>
                                <tr>
                                        <td class="text-muted"><b>PH</b></td>

                                        <td>
                                            {{$rekmed->ph}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-muted"><b>Bloode Urea Nitrogen</b></td>

                                        <td>
                                            {{$rekmed->bun}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-muted"><b>Natrium</b></td>

                                        <td>
                                            {{$rekmed->natrium}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-muted"><b>Glukosa</b></td>

                                        <td>
                                            {{$rekmed->glukosa}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-muted"><b>Hematokrit</b></td>

                                        <td>
                                            {{$rekmed->hematokrit}}
                                        </td>
                                    </tr>

                                     <tr>
                                        <td class="text-muted"><b>Pao2</b></td>

                                        <td>
                                            {{$rekmed->pao2}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-muted"><b>Sistolik</b></td>

                                        <td>
                                            {{$rekmed->sistolik}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-muted"><b>Efusi Pleura</b></td>

                                        <td>
                                        @if ($rekmed->efusi_pleura == 1)
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
                                      {{$rekmed->nilaiz}}
                                    </td>
                            
                                </tr>

                                <tr>
                                    <td class="text-muted"><b>Kesimpulan Penyakit Pasien</b></td>

                                    <td>
                                        {{$rekmed->pneumonia}}
                                    </td>
                                </tr>

                                 <tr>
                                    <td class="text-muted"><b>Saran Perawatan</b></td>

                                    <td>
                                        {{$rekmed->solusi}}
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