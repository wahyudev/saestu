@extends('front-page.master')
@section('judul')
	Tanya Jawab
@stop
@section('css-tambahan')
	
	@include('plugins.alertify-css')
@stop
@section('body')
<section class="blog_area single-post-area section_padding">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 posts-list">
				<div class="alert alert-info" style="font-size: 12px;">
					<table>
						<tr>
							<td valign="top">1.</td><td>Gunakan halaman ini untuk memberi Komentar/Pertanyaan/Kritik dan saran Anda mengenai proses pendaftaran seleksi mahasiswa baru Universitas Jambi</td>
						</tr>
						<tr>
							<td valign="top">2.</td><td>Kami akan berusaha menjawab/menanggapi semua komentar/pertanyaan Anda, asalkan Anda mencantumkan identitas yang jelas, sehingga mudah ditindaklanjuti</td>
						</tr>
						<tr>
							<td valign="top">3.</td>
							<td>Komentar/pertanyaan dengan bahasa yang TIDAK SOPAN tidak akan ditanggapi/ditampilkan.
				    Yang menggunakan huruf KAPITAL akan langsung kami DELETE!</td>
						</tr>
					</table>
				</div>
				@if(Session::has('alert'))
	        @include('layouts.alert')
	      @endif
				<form class="form-horizontal" action="{{url('tanya-jawab/submit-pertanyaan')}}" method="post">
					@csrf

					<div class="form-group">
						<labe class="label">Nama Lengkap</label>
						<input type="text" name="nama_pelaku" class="form-control" required="" placeholder="Nama Anda">
					</div>
					<div class="form-group">
						<labe class="label">Nomor Pendaftaran/Nomor Tes</label>
						<input type="text" name="email" class="form-control" required="" placeholder="Masukan nomor pendaftaran/ nomor tes anda">
					</div>
					
					<div class="form-group">
						<label class="label">Pertanyaan/Tanggapan/Kritik/Saran</label>
						<textarea class="form-control" rows="10" name="pertanyaan" required=""></textarea>
					</div>
					<div class="form-group">
						<div class="form-style-agile">
        
		          <div class="g-recaptcha" data-sitekey="6LdVEfIUAAAAAOpol10t7v14RWjD18cpD8ZJbeJe"></div>
		                  
		      	</div>
					</div>
					<div class="form-group">
						<button class="btn btn-primary btn-md">Kirim</button>
					</div>
				</form>
				
				
			</div>
			<div class="col-lg-8">
				<div class="blog_right_sidebar">
					<form class="form-horizontal" action="{{url('tanya-jawab/cari-pertanyaan')}}" method="get">
						@csrf

						<div class="form-group">
							<label class="label">Cari Pertanyaan Anda Sebelumnya</label>
							<div class="input-group">
								<input type="text" name="kata_kunci" class="form-control" required="" placeholder="Masukan nama atau nomor tes anda">
								<span class="input-group-btn">
									<button class="btn btn-primary "><i class="fa fa-search"></i> Cari</button>
								</span>
							</div>
						
						</div>
						
						
					
					</form>
					<div class="comments-area" style="margin-top: 0px;">
						<h4>Komentar / Pertanyaan</h4>
						@forelse($pertanyaan as $tj)
						<div class="comment-list" style="border-bottom: 2px solid; padding-bottom: 2px;">
							<div class="single-comment justify-content-between d-flex">
								<div class="user justify-content-between d-flex">
									
									<div class="desc">
										<div class="d-flex justify-content-between">
											<div class="d-flex align-items-center">
												
													<p href="#">Pertanyaan Oleh: {{$tj->nama_pelaku}}</p>
												
												<p class="date">{{Tanggal::time_indo($tj->tanggal_tanya)}}</p>
											</div>
											
										</div>
										<p class="comment">"{{$tj->pertanyaan}}"</p>
										@if($tj->penjawab!=null&&$tj->tanggapan!=null)
										<blockquote class="blockquote">
										  <footer style="font-size:12px;" class="blockquote-footer"><i>Tanggapan <cite title="Source Title"><b>Operator</b></cite> </i></footer>
										  <p style="padding-left: 30px;">{!!$tj->tanggapan!!}</p>
										</blockquote>
										@else
										<blockquote class="blockquote">
										  <footer style="font-size:12px;" class="blockquote-footer"><i><cite title="Source Title"><b>Belum ditanggapi</b></cite> </i></footer>
										 
										</blockquote>
										@endif
										
									</div>
								</div>
							</div>
						</div>
						@empty
							<div class="alert alert-info">
								Belum ada Pertanyaan
							</div>
						@endforelse
						
					</div>
				</div>
				<nav class="blog-pagination justify-content-center d-flex">
					<ul class="pagination">
						@if($pertanyaan->currentPage() > 1)
						<li class="page-item">
							<a href="{{$pertanyaan->previousPageUrl()}}" class="page-link" aria-label="Previous"><i class="ti-angle-left"></i></a>
						</li>
						@endif
						@for($i=1; $i <= $pertanyaan->lastPage(); $i++ )
		        @if($i <=10)
						<li class="page-item ">
		        	<a class="page-link" href="{{url()->current().'?page='.$i}}">{{$i}}</a>
		        </li>
		        
		        @endif
		        @endfor
		        @if($pertanyaan->currentPage()  < $pertanyaan->lastPage() )
						<li class="page-item">
							<a href="{{$pertanyaan->nextPageUrl()}}" class="page-link" aria-label="Next"><i class="ti-angle-right"></i></a>
						</li>
						@endif
						
					</ul>

				</nav>
				
			</div>
		</div>
	</div>

</section>

	<!-- Services section end -->
	

@stop
@section('js-tambahan')
	@include('plugins.alertify-js')
	<script type="text/javascript">
		
	</script>
@stop

