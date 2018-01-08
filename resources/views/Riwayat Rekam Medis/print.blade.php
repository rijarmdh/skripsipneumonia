<!DOCTYPE html>
<html>
<head>
	<title></title>

	<style type="text/css">
		tr td{
			font-size:15px;
		}
	</style>
</head>
<body>

	<div>
		<h2 style="text-align: center;">Dokumen Hasil Konsultasi Pasien</h2>
		<br>
	</div>

	<div>
		<div>
			<table style="width: 100%;">
				<tbody>
				    <tr>
				        <td>
				        id    
				        </td>

				        <td style="padding-left:450px;">:{{$rekmed->Pasien->id_pasien}}</td>        
				    </tr>

				    <tr>
				        <td >
				        Nama    
				        </td>

				        <td style="padding-left:450px;">:{{$rekmed->Pasien->nama}}</td>        
				    </tr>

				    <tr>
				        <td >
				        Tanggal Periksa    
				        </td>

				        <td style="padding-left:450px;">:{{Carbon\Carbon::parse($rekmed->created_at)->format('d F Y  \p\u\k\u\l\ \ h:i A') }}</td>        
				    </tr>


				    <tr>
				        <td>Suhu</td>
				        <td style="padding-left:450px;">:{{$rekmed->suhu."  Celsius"}}</td>
				    </tr>   

				    <tr>
				        <td>Nadi</td>

				        <td style="padding-left:450px;">:
				            {{$rekmed->nadi."  x/menit"}}
				        </td>
				    </tr>

				    <tr>
				        <td>Pernafasan</td>

				        <td style="padding-left:450px;">:
				            {{$rekmed->pernafasan."  x/menit"}}
				        </td>
				    </tr>

				    <tr>
				        <td>Usia</td>

				        <td style="padding-left:450px;">:
				            {{$rekmed->usia."  tahun"}}
				        </td>
				    </tr>
				   
				</tbody>
			</table>
		</div>
		<hr>

		<div>
			
			<div>
	        	<h3>Riwayat Penyakit Pasien</h3>
	        </div>

			<div>
	            <table style="width: 95%;">
	                <tbody>
	                     <tr>
	                        <td>Keganasan</td>

	                        <td>:
	                        @if ($rekmed->keganasan == 1)
	                            <?php echo "iya" ?>
	                        @else
	                             <?php echo "tidak" ?> 
	                        @endif

	                        </td>
	                    </tr>

	                    <tr>
	                        <td>Penyakit Hati</td>

	                        <td>:
	                            @if ($rekmed->penyakithati == "1")
	                                <?php echo "iya" ?>
	                            @else
	                                <?php echo "tidak" ?>
	                            @endif
	                        </td>
	                    </tr>

	                    <tr>
	                        <td>Penyakit Jantung Kongestif</td>

	                        <td>:
	                            @if ($rekmed->jantung == "1")
	                                <?php echo "iya" ?>
	                            @else
	                                <?php echo "tidak" ?>
	                            @endif
	                        </td>
	                    </tr>

	                    <tr>
	                        <td>Penyakit Serebrovaskular</td>

	                        <td>:
	                            @if ($rekmed->serebrovaskular == "1")
	                                <?php echo "iya" ?>
	                            @else
	                                <?php echo "tidak" ?>
	                            @endif
	                        </td>
	                    </tr>

	                    <tr>
	                        <td>Penyakit Ginjal</td>

	                        <td>:
	                            @if ($rekmed->ginjal == "1")
	                                <?php echo "iya" ?>
	                            @else
	                                <?php echo "tidak" ?>
	                            @endif
	                        </td>
	                    </tr>

	                    <tr>
	                        <td>Penyakit Gangguan Kesadaran</td>

	                        <td>:
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
	        <hr>
		</div>
	</div> 

    <div>
		<div>
			<div>
	           <h3>Hasil Laboratorium</h3>
	       	</div>

	       	<div>
	           <table style="width: 100%;">
	               <tbody>
	                    <tr>
	                        <td>PH</td>

	                        <td style="padding-left:450px;">:
	                            {{$rekmed->ph}}
	                        </td>
	                    </tr>

	                    <tr>
	                        <td>Bloode Urea Nitrogen</td>

	                        <td style="padding-left:450px;">:
	                            {{$rekmed->bun."  mmol/L"}}
	                        </td>
	                    </tr>

	                    <tr>
	                        <td>Natrium</td>

	                        <td style="padding-left:450px;">:
	                            {{$rekmed->natrium."  mEq/L"}}
	                        </td>
	                    </tr>

	                    <tr>
	                        <td>Glukosa</td>

	                        <td style="padding-left:450px;">:
	                            {{$rekmed->glukosa."  mmol/L"}}
	                        </td>
	                    </tr>

	                    <tr>
	                        <td>Hematokrit</td>

	                        <td style="padding-left:450px;">:
	                            {{$rekmed->hematokrit." %"}}
	                        </td>
	                    </tr>

	                     <tr>
	                        <td>Pao2</td>

	                        <td style="padding-left:450px;">:
	                            {{$rekmed->pao2."  mmHg"}}
	                        </td>
	                    </tr>

	                    <tr>
	                        <td>Sistolik</td>

	                        <td style="padding-left:450px;">:
	                            {{$rekmed->sistolik."  mmHg"}}
	                        </td>
	                    </tr>

	                    <tr>
	                        <td>Efusi Pleura</td>

	                        <td style="padding-left:450px;">:
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
       		<hr>
		</div>

		<div>
			
		   <div>
	          <h3>
	              Hasil Pemeriksaan
	          </h3>
		   </div>

	       <div>
	           <table style="width: 100%;">
	               <tbody>
	             	    <tr>
	                        <td>Kesimpulan Penyakit Pasien</td>

	                        <td style="padding-left:450px;">
	                            :{{$rekmed->pneumonia}}
	                        </td>
	                    </tr>

	                     <tr>
	                        <td>Saran Perawatan</td>

	                        <td style="padding-left:450px;">
	                            :{{$rekmed->solusi}}
	                        </td>
	                    </tr>
	               </tbody>
	           </table>
	       </div>
	       <hr>
   		</div>	
	</div>

</body>
</html>


	
