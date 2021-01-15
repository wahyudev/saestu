@extends('front-page.master')
@section('judul')
	Profil Dosen {{$prodi->nama_ref_unit_kerja_lengkap}}
@stop
@section('css-tambahan')
	
	@include('plugins.alertify-css')
@stop
@section('body')


<section class="feature_part single_feature_padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2>Profil Dosen {{$prodi->ref_unit->nama_ref_unit_kerja_lengkap}}</h2>
          
          
        </div>
      </div>
      <hr>
      @forelse($peg->chunk(3) as $chunk)
      <div class="row">   
        @foreach($chunk as $dos)
        <div class="col-xs-12 col-lg-4">
          <div class="single_feature">
              <div class="single_feature_part">
                 
                  <img class="img-rounded" style="height: 180px; width:150px; margin-bottom: 20px;" src="https://kepeg.unja.ac.id/foto/{{($dos->file_foto==null || $dos->file_foto=='') ? 'default.jpg':$dos->file_foto}}">
                  
                  <h5><u>{{Helpers::nama_gelar($dos)}}</u><br>
                    NIDN: {{$dos->nidn}}
                  </h5>
                  <p>
                    
                    @if($dos->deskripsi_saya==null||$dos->deskripsi_saya=='')
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  @else
                  {{$dos->deskripsi_saya}}
                  @endif
                   </p>
                  <br>
                  <a href="{{url('profil-dosen/dosen/'.encrypt($dos->id_pegawai))}}" class="btn btn-xs btn-primary "><i class="glyphicon glyphicon-plus"></i> Klik Untuk detail</a>
              </div>
          </div>
        </div>
        @endforeach
      </div>
      <br>
      @empty
      <div class="row">  
        <div class="col-lg-12">
          <div class="alert alert-info">
            Maaf data belum tersedia
          </div>
         </div>
      </div>
      @endforelse
    </div>
</section>
	

@stop
@section('js-tambahan')
	@include('plugins.alertify-js')
	<script type="text/javascript">
		
	</script>
@stop

