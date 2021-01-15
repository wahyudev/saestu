@extends('front-page.master')
@section('judul')
	Profil Dosen
@stop
@section('css-tambahan')
	
	@include('plugins.alertify-css')
	<style type="text/css">
		td{
			vertical-align: top !important;
			
		}
	</style>
@stop
@section('body')

<section class="blog_area single-post-area section_padding">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<h2>Dosen </h2>
				<h5></h5>
				<div class="blog_right_sidebar">
					<aside class="single_sidebar_widget search_widget">
						<center>
							
						 <img class="img-rounded" style="height: 250px; width:200px; margin-bottom: 20px;" src="https://kepeg.unja.ac.id/foto/{{($peg->file_foto==null || $peg->file_foto=='') ? 'default.jpg':$peg->file_foto}}">
						<br>

						</center>
						<div class="nama" style="margin-left: 40px;">
							<h5>{{Helpers::nama_gelar($peg)}}<br>
							 NIDN: {{$peg->nidn}}
							</h5>
						</div>
						
					</aside>
					
				</div>
			</div>
			<div class="col-lg-8">
				<h2>Profil Dosen</h2>
				<h5></h5>
				<div class="blog_right_sidebar">
					<div class="accordion" id="accordionExample">
					  
					  <div class="card z-depth-0 bordered">
					    <div class="card-header" id="headingOne">
					      <h5 class="mb-0">
					        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#tentangsaya"
					          aria-expanded="true" aria-controls="collapse">
					         	Tetang Saya
					        </button>
					      </h5>
					    </div>
					    <div id="tentangsaya" class="collapse" aria-labelledby="headingOne"
					      data-parent="#accordionExample">
					      <div class="card-body">
					        <div class="table-responsive">
					        	<table width="100%" class="data">
					        		<tbody>
					        			<tr>
						        			<td  width="20%">Nama</td><td width="2%">:</td><td>{{Helpers::nama_gelar($peg)}}</td>
						        		</tr>
						        		<tr>
						        			<td>NIP</td><td>:</td><td>{{$peg->nip}}</td>
						        		</tr>
						        		<tr>
									        <td >Status Kepegawaian</td><td>:</td><td>{{ $peg->nama_status_kepegawaian}}</td>
									      </tr>
									      <tr>
									        <td >Status Kerja</td><td>:</td><td>{{ $peg->nama_status_kerja}}</td>
									      </tr>

									      <tr>
									        <td >Status Keaktifan</td><td>:</td><td>{{ $peg->nama_status_keaktifan_pegawai}}</td>
									      </tr>
									      
									      <tr>
									        <td>Jabatan Fungsional</td>
									        <td >:</td>
									        <td> {{$peg->nama_jabatan }}
									            
									        </td>
									      </tr>
									      <tr>
									        <td >Deskripsi</td><td>:</td><td>{{ $peg->deskripsi_saya}}</td>
									      </tr>
					        		</tbody>
					        	</table>
					        </div>
					      </div>
					    </div>
					  </div>
					  <div class="card z-depth-0 bordered">
					    <div class="card-header" id="headingOne">
					      <h5 class="mb-0">
					        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#pendidikan"
					          aria-expanded="true" aria-controls="collapse">
					         	Riwayat Pendidikan
					        </button>
					      </h5>
					    </div>
					    <div id="pendidikan" class="collapse" aria-labelledby="headingOne"
					      data-parent="#accordionExample">
					      <div class="card-body">
					        <div class="table-responsive">
					        	<table width="100%" class="data">
					        		<thead>
					        			<tr>
					        				<th>No</th><th>Jenjang</th><th>Pergururan Tinggi</th><th>Program Studi</th><th>Tahun Lulus</th>
					        			</tr>
					        		</thead>
					        		<tbody>
					        			@foreach($pendidikan as $p)
					        			<tr>
						        			<td>{{$loop->iteration}}.</td><td>{{$p->nama_jenjang_pendidikan}}</td><td>{{$p->nama_sekolah}}</td><td>{{$p->program_studi }}</td><td>{{$p->tahun_lulus}}</td>
						        		</tr>
						        		@endforeach
					        		</tbody>
					        	</table>
					        </div>
					        
					      </div>
					    </div>
					  </div>
					  <div class="card z-depth-0 bordered">
					    <div class="card-header" id="headingOne">
					      <h5 class="mb-0">
					        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#matakuliah"
					          aria-expanded="true" aria-controls="collapse">
					         	Matakuliah yang Diampu
					        </button>
					      </h5>
					    </div>
					    <div id="matakuliah" class="collapse" aria-labelledby="headingOne"
					      data-parent="#accordionExample">
					      <div class="card-body">
					        <ul style="list-style-type: circle;">
					        @foreach($matakuliah as $mata)
					        <li>{{$mata->nama_matakuliah}}</li>	
					        @endforeach
					        </ul>
					      </div>
					    </div>
					  </div>
					  <div class="card z-depth-0 bordered">
					    <div class="card-header" id="headingOne">
					      <h5 class="mb-0">
					        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#penelitian"
					          aria-expanded="true" aria-controls="collapse">
					         	Riwayat Penelitian
					        </button>
					      </h5>
					    </div>
					    <div id="penelitian" class="collapse" aria-labelledby="headingOne"
					      data-parent="#accordionExample">
					      <div class="card-body">
					        <div class="table-responsive">
					        	<table width="100%" class="data">
					        		<thead>
					        			<tr>
					        				<th>No</th><th>Judul</th><th width="15%">Tahun</th>
					        			</tr>
					        		</thead>
					        		<tbody>
					        			@foreach($penelitian as $p)
					        			<tr>
						        			<td>{{$loop->iteration}}.</td><td>{{$p->judul}}</td><td>{{$p->tahun}}</td>
						        		</tr>
						        		@endforeach
					        		</tbody>
					        	</table>
					        </div>
					      </div>
					    </div>
					  </div>
					  <div class="card z-depth-0 bordered">
					    <div class="card-header" id="headingOne">
					      <h5 class="mb-0">
					        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#pengabdian"
					          aria-expanded="true" aria-controls="collapse">
					         	Riwayat Pengabdian
					        </button>
					      </h5>
					    </div>
					    <div id="pengabdian" class="collapse" aria-labelledby="headingOne"
					      data-parent="#accordionExample">
					      <div class="card-body">
					        <div class="table-responsive">
					        	<table width="100%" class="data">
					        		<thead>
					        			<tr>
					        				<th>No</th><th>Judul</th><th width="15%">Tahun</th>
					        			</tr>
					        		</thead>
					        		<tbody>
					        			@foreach($pengabdian as $p)
					        			<tr>
						        			<td>{{$loop->iteration}}.</td><td>{{$p->judul}}</td><td>{{$p->tahun}}</td>
						        		</tr>
						        		@endforeach
					        		</tbody>
					        	</table>
					        </div>
					      </div>
					    </div>
					  </div>
					  <div class="card z-depth-0 bordered">
					    <div class="card-header" id="headingOne">
					      <h5 class="mb-0">
					        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse"
					          aria-expanded="true" aria-controls="collapse">
					         	Penghargaan dan Pengakuan
					        </button>
					      </h5>
					    </div>
					    <div id="collaps" class="collapse" aria-labelledby="headingOne"
					      data-parent="#accordionExample">
					      <div class="card-body">
					        <ul>
					        	
					        </ul>
					      </div>
					    </div>
					  </div>




					
					 
					</div>
				</div>
			</div>
			
		</div>
	</div>
</section>
	

@stop

@section('js-tambahan')
	@include('plugins.alertify-js')
	<script type="text/javascript">
		
	</script>
@stop

