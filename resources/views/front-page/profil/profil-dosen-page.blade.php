@extends('front-page.master')
@section('judul')
	Profil Dosen
@stop
@section('css-tambahan')
	
	@include('plugins.alertify-css')
@stop
@section('body')

<section class="blog_area single-post-area section_padding">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2>Profil Dosen</h2>
				<h5></h5>
				<div class="blog_right_sidebar">
					<div class="accordion" id="accordionExample">
					  @foreach($fakultas as $f)
					  <div class="card z-depth-0 bordered">
					    <div class="card-header" id="headingOne">
					      <h5 class="mb-0">
					        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$f->id_unit_kerja}}"
					          aria-expanded="true" aria-controls="collapse{{$f->id_unit_kerja}}">
					          {{$f->ref_unit->nama_ref_unit_kerja_lengkap}}
					        </button>
					      </h5>
					    </div>
					    <div id="collapse{{$f->id_unit_kerja}}" class="collapse" aria-labelledby="headingOne"
					      data-parent="#accordionExample">
					      <div class="card-body">
					        <ul>
					        	@foreach($f->sub_unit_prodi as $p)
					        	<li><a style="color: blue !important; text-decoration: underline;" href="{{url('profil-dosen/prodi/'.$p->id_unit_kerja)}}">{{$p->ref_unit->nama_ref_unit_kerja_lengkap}}</a></li>
					        	@endforeach
					        </ul>
					      </div>
					    </div>
					  </div>
					  @endforeach
					 
					</div>
				</div>
			</div>
			{{-- <div class="col-lg-4">
				<h2>Cari Dosen </h2>
				<h5>Ketik Sebagian Nama Dosen Pencarian</h5>
				<div class="blog_right_sidebar">
					<aside class="single_sidebar_widget search_widget">
						<form action="{{url('cek-kelulusan')}}" method="post">
							@csrf
							<div class="form-group">
								<div class="input-group mb-3">
									<input type="text" class="form-control" name="search" placeholder="Nama/NIP/NIDN" onfocus="if (!window.__cfRLUnblockHandlers) return false; this.placeholder = ''" onblur="if (!window.__cfRLUnblockHandlers) return false; this.placeholder = 'Nomor pendaftaran/nomor tes/nomor peserta ujian'">
									<div class="input-group-append">
										<button class="btn" type="button"><i class="fa fa-search"></i></button>
									</div>
								</div>
							</div>
							<button class="button rounded-0 primary-bg text-white w-100 btn_1" type="submit">SUBMIT</button>
						</form>
					</aside>
					
				</div>
			</div> --}}
		</div>
	</div>
</section>
	

@stop
@section('js-tambahan')
	@include('plugins.alertify-js')
	<script type="text/javascript">
		
	</script>
@stop

