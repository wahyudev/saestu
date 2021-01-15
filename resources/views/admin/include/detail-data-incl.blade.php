<div class="nav-tabs-custom">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Data Utama</a></li>
    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="true">Data Keluarga</a></li>
    <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="true">Sekolah/PT</a></li>

    <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="true">Dokumen Pendukung</a></li>

    @if($data->beasiswa)
    <li class=""><a href="#tab_5" data-toggle="tab" aria-expanded="true">Data Beasiswa</a></li>
    @if($tombol_validasi==true)
    <li class=""><a href="#tab_6" data-toggle="tab" aria-expanded="true">Proses Validasi</a></li>
    @endif
    @endif
    
    
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab_1">
      <b>Data Kelulusan</b>
      <div class="row">
        
        <div class="col-lg-10 col-xs-12">
          <table class="table">
            <tr>
              <td width="35%">Nomor Tes</td><td width="1%">:</td><td>{{$data->no_test}}</td>
        
            </tr>
            <tr>
              <td>Jalur Pendafataran</td><td>:</td><td>{{$data->jenis_pendaftaran->nama_jenis_pendaftaran.' '.$data->jenis_pendaftaran->keterangan}}</td>
            </tr>
            <tr>
              <td width="35%">Angkatan</td><td width="1%">:</td><td>{{$data->angkatan}}</td>
            </tr>
            <tr>
              <td>Jurusan/Program Studi</td><td>:</td><td>{{$data->prodi_lulus->nama_prodi.' ('.$data->prodi_lulus->jenjang_pendidikan->nama_jenjang_pendidikan.')'}}</td>
            </tr>

            @if($data->beasiswa)
            <tr>
              <td>Beasiswa</td><td>:</td><td>{{$data->beasiswa->nama_beasiswa}}</td>
            </tr>
            @endif
          </table>
        </div>
        
        <div class="col-lg-2 col-xs-12">
           <img  src="{{asset('camaru/foto/'.$data->pas_foto)}}" alt="Chania" width="150px" height="190px"> 
        </div>

      </div>
      
      <b>Data Pribadi</b>

      <div class="row">
        
        <div class="col-lg-6 col-xs-12">
          <table class="table">
            <tr>
              <td width="35%">NIK</td><td width="2%">:</td><td>{{$data->nik}}</td>
        
            </tr>
            @if(Helpers::is_pasca($data)==0)
            <tr>
              <td>NISN</td><td>:</td><td>{{$data->nisn}}</td>
            </tr>
            @endif
            <tr>
              <td>Nama Calon Mahasiswa</td><td>:</td><td>{{$data->nama_mahasiswa}}</td>
            </tr>
            <tr>
              <td>Tempat /Tanggal Lahir</td><td>:</td><td>{{$data->tempat_lahir.' / '.Tanggal::tgl_indo($data->tgl_lahir)}}</td>
            </tr>
            <tr>
              <td>Jenis Kelamin</td><td>:</td><td>{{$data->jenis_kelamin}}</td>
            </tr>
            <tr>
              <td>Agama</td><td>:</td><td>{{$data->agama_camaru ? $data->agama_camaru->nama_agama:'Belum diisi'}}</td>
            </tr>
            <tr>
              <td>Golongan Darah</td><td>:</td><td>{{$data->golongan_darah}}</td>
            </tr>
            <tr>
              <td>Hobi</td><td>:</td><td>{{$data->hobi}}</td>
            </tr>
          </table>
        </div>
        <div class="col-lg-6 col-xs-12">
          <table class="table">
            <tr>
              <td width="35%">Alamat</td><td width="2%">:</td>
              <td>
              @if($data->kecamatan)
                {{$data->alamat.' / '.$data->kelurahan.', RT '.$data->rt.' RW '.$data->rw.', '.$data->kecamatan->nama_wilayah.', '.$data->kecamatan->kabupaten_kota->nama_wilayah.', '.$data->kecamatan->kabupaten_kota->provinsi->nama_wilayah.' '.$data->kode_pos}}
              @else
              Belum melengkapi
              @endif
              </td>
            </tr>
            <tr>
              <td>Nomor HP</td><td>:</td><td>{{$data->telp1}}</td>
            </tr>
            <tr>
              <td>Email</td><td>:</td><td>{{$data->email}}</td>
            </tr>
            @if(Helpers::is_pasca($data)==0)
            <tr>
              <td>Jumlah Tanggungan (masih sekolah)</td><td>:</td><td>{{$data->jumlah_tanggungan}}</td>
            </tr>
            
            <tr>
              <td>Daya Listrik (Va)</td><td>:</td><td>{{$data->daya_listrik}}</td>
            </tr>
            @endif
          </table>
        </div>
      </div>
    </div>
    <div class="tab-pane" id="tab_2">
      
      <b>Data Ayah</b>

      <div class="row">
        
        <div class="col-lg-6 col-xs-12">
          <table class="table">
            <tr>
              <td width="35%">Nama Ayah</td><td width="2%">:</td><td>{{$data->nama_ayah}}</td>
        
            </tr>
            @if(Helpers::is_pasca($data)==0)
            <tr>
              <td>NIK</td><td>:</td><td>{{$data->nik_ayah}}</td>
            </tr>
            <tr>
              <td>Tanggal Lahir</td><td>:</td><td>{!!Tanggal::tgl_indo($data->tgl_lahir_ayah)!!}</td>
            </tr>
            <tr>
              <td>Pendidikan Terakhir</td><td>:</td><td>{{$data->pendidikan_ayah ? $data->pendidikan_ayah->nama_jenjang_pendidikan:'Belum diisi'}}</td>
            </tr>
            @endif
            
          </table>
        </div>
        @if(Helpers::is_pasca($data)==0)
        <div class="col-lg-6 col-xs-12">
          <table class="table">
            <tr>
              <td width="35%">Pekerjaan</td><td width="2%">:</td><td>{{$data->pekerjaan_ayah ? $data->pekerjaan_ayah->nama_pekerjaan:'Belum diisi'}}</td>
        
            </tr>
            <tr>
              <td>Penghasilan Perbulan</td><td>:</td><td>{{Uang::format_uang($data->angka_penghasilan_ayah)}}</td>
            </tr>
            <tr>
              <td>Status/Keadaan</td><td>:</td><td>{{$data->status_ayah ? $data->status_ayah->nama_status_keluarga:'Belum diisi' }}</td>
            </tr>
            <tr>
              <td>No HP</td><td>:</td><td>{{$data->telp_ayah}}</td>
            </tr>
            
          </table>
        </div>
        @endif
      </div>
      <b>Data Ibu</b>

      <div class="row">
        
        <div class="col-lg-6 col-xs-12">
          <table class="table">
            <tr>
              <td width="35%">Nama Ibu</td><td width="2%">:</td><td>{{$data->nama_ibu}}</td>
        
            </tr>
            @if(Helpers::is_pasca($data)==0)
            <tr>
              <td>NIK</td><td>:</td><td>{{$data->nik_ibu}}</td>
            </tr>
            <tr>
              <td>Tanggal Lahir</td><td>:</td><td>{!!Tanggal::tgl_indo($data->tgl_lahir_ibu)!!}</td>
            </tr>
            <tr>
              <td>Pendidikan Terakhir</td><td>:</td><td>{{$data->pendidikan_ibu ? $data->pendidikan_ibu->nama_jenjang_pendidikan:'Belum diisi'}}</td>
            </tr>
            @endif
            
          </table>
        </div>
        @if(Helpers::is_pasca($data)==0)
        <div class="col-lg-6 col-xs-12">
          <table class="table">
            <tr>
              <td width="35%">Pekerjaan</td><td width="2%">:</td><td>{{$data->pekerjaan_ibu ? $data->pekerjaan_ibu->nama_pekerjaan:'Belum diisi'}}</td>
        
            </tr>
            <tr>
              <td>Penghasilan Perbulan</td><td>:</td><td>{{Uang::format_uang($data->angka_penghasilan_ibu)}}</td>
            </tr>
            <tr>
              <td>Status/Keadaan</td><td>:</td><td>{{$data->status_ibu ? $data->status_ibu->nama_status_keluarga:'Belum diis'}}</td>
            </tr>
            <tr>
              <td>No HP</td><td>:</td><td>{{$data->telp_ibu}}</td>
            </tr>
            
          </table>
        </div>
        @endif
      </div>
      @if(Helpers::is_pasca($data)==0)
      <b>Data Wali</b>

      <div class="row">
        
        <div class="col-lg-6 col-xs-12">
          <table class="table">
            <tr>
              <td width="35%">Nama Wali</td><td width="2%">:</td>
              <td>{{($data->nama_wali==null)? "-":$data->nama_wali}}</td>
        
            </tr>
            
            <tr>
              <td>Tanggal Lahir</td><td>:</td>
              <td>
                {!!($data->tgl_lahir_wali==null)? "-":Tanggal::tgl_indo($data->tgl_lahir_wali)!!}
                </td>
            </tr>
            <tr>
              <td>Pendidikan Terakhir</td><td>:</td>
              <td>{{($data->nama_wali==null) ? '-':$data->pendidikan_wali->nama_jenjang_pendidikan}}</td>
            </tr>
            
          </table>
        </div>
        <div class="col-lg-6 col-xs-12">
          <table class="table">
            <tr>
              <td width="35%">Pekerjaan</td><td width="2%">:</td>
              <td>{{($data->nama_wali==null) ? '-':$data->pekerjaan_wali->nama_pekerjaan}}</td>
        
            </tr>
            <tr>
              <td>Penghasilan Perbulan</td><td>:</td><td>{{($data->nama_wali==null) ? '-':Uang::format_uang($data->angka_penghasilan_wali)}}</td>
            </tr>
            
            <tr>
              <td>No HP</td><td>:</td><td>{{$data->telp_wali==null ? '-':$data->telp_wali}}</td>
            </tr>
            
          </table>
        </div>
      </div>
      @endif
    </div>
    <div class="tab-pane" id="tab_3">
      @if(Helpers::is_pasca($data)==0)
      
        <b>Sekolah</b>
        @if($data->sekolah)

        <div class="row">
          
          <div class="col-lg-6 col-xs-12">
            <table class="table">
              <tr>
                <td width="35%">Nama Sekolah</td><td width="2%">:</td><td>{{$data->sekolah->nama_sekolah}}</td>
          
              </tr>
              <tr>
                <td>Bentuk Sekolah</td><td>:</td><td>{{$data->sekolah->bentuk}}</td>
              </tr>
              <tr>
                <td>Wiayah</td><td>:</td><td>{{$data->sekolah->kabupaten_kota_smta->nama_wilayah.', '.$data->sekolah->provinsi_smta->nama_wilayah}}</td>
              </tr>
              <tr>
                <td>Alamat Jalan</td><td>:</td><td>{{$data->sekolah->alamat_jalan}}</td>
              </tr>
              
              <tr>
                <td>Program Studi</td><td>:</td><td>{{$data->program_studi_smta}}</td>
              </tr>
              
            </table>
          </div>
          <div class="col-lg-6 col-xs-12">
            <table class="table">
              <tr>
                <td width="35%">Tahun Masuk</td><td width="2%">:</td><td>{{$data->tahun_masuk}}</td>
          
              </tr>
              <tr>
                <td>Tahun Lulus</td><td>:</td><td>{{$data->tahun_lulus}}</td>
              </tr>
              <tr>
                <td>Nilai Rata-rata Sekolah</td><td>:</td><td>{{$data->nilai_sek}}</td>
              </tr>
              <tr>
                <td>Nial Rata-rata UAN</td><td>:</td><td>{{$data->nilai_uan}}</td>
              </tr>
              
            </table>
          </div>
          
        </div>
        @else
         <br> Data belum diisi
        @endif
      @else
        <b>Data Pendidikan Sebelumnya</b>
        <div class="row">
          
          <div class="col-lg-12 col-xs-12">
            <table class="table">
              <tr>
                <td width="35%">Nama Univ/PT</td><td width="2%">:</td><td>{{$data->universitas_pendidikan_terakhir}}</td>
          
              </tr>
              <tr>
                <td>Prodi</td><td>:</td><td>{{$data->prodi_pendidikan_terakhir}}</td>
              </tr>
              <tr>
                <td>Tahun Lulus</td><td>:</td><td>{{$data->tahun_lulus}}</td>
              </tr>
              
              
            </table>
          </div>
          
          
        </div>
      @endif
      
    </div>
    <div class="tab-pane" id="tab_4">
      
      <b>Dokumen Pendukung</b>
      @if(Helpers::is_pasca($data)==0)

      <div class="row">
        
        <div class="col-lg-6 col-xs-12">
          <table class="table">
            <tr>
              <td>Kartu Peserta SNMPTN/SBMPTN/SMMPTN dll</td><td>:</td><td>@if($data->scan_kartu_masuk_pt!=null)
              <a href="{{url('camaru/dokumen/'.$data->scan_kartu_masuk_pt)}}"  target="_blank">{{$data->scan_kartu_masuk_pt}}</a>
              @else
              <span class="label label-danger">Belum Upload</span>
              @endif
            </tr>
            <tr>
              <td>KTP</td><td>:</td><td>@if($data->scan_ktp!=null)
              <a href="{{url('camaru/dokumen/'.$data->scan_ktp)}}"  target="_blank">{{$data->scan_ktp}}</a>
              @else
              <span class="label label-danger">Belum Upload</span>
              @endif
            </tr>
            <tr>
              <td width="35%">SKL</td><td width="2%">:</td><td>
                @if($data->scan_skl!=null)
                <a href="{{url('camaru/dokumen/'.$data->scan_skl)}}"  target="_blank">{{$data->scan_skl}}</a>
                @else
                <span class="label label-danger">Belum Upload</span>
                @endif
              </td>
        
            </tr>
            <tr>
              <td width="35%">Ijazah</td><td width="2%">:</td><td>
                @if($data->scan_ijazah!=null)
                <a href="{{url('camaru/dokumen/'.$data->scan_ijazah)}}"  target="_blank">{{$data->scan_ijazah}}</a></td>
                @else
                <span class="label label-danger">Belum Upload</span>
                @endif
            </tr>
            
            <tr>
              <td>Formulir Biodata</td><td>:</td><td>@if($data->scan_biodata!=null)
              <a href="{{url('camaru/dokumen/'.$data->scan_biodata)}}"  target="_blank">{{$data->scan_biodata}}</a>
              @else
              <span class="label label-danger">Belum Upload</span>
              @endif
            </tr>
            <tr>
              <td>KTP Aayah</td><td>:</td><td>@if($data->scan_ktp_ayah!=null)
              <a href="{{url('camaru/dokumen/'.$data->scan_ktp_ayah)}}"  target="_blank">{{$data->scan_ktp_ayah}}</a>
              @else
              <span class="label label-danger">Belum Upload</span>
              @endif
            </tr>
            <tr>
              <td>KTP IBU</td><td>:</td><td>@if($data->scan_ktp_ibu!=null)
              <a href="{{url('camaru/dokumen/'.$data->scan_ktp_ibu)}}"  target="_blank">{{$data->scan_ktp_ibu}}</a>
              @else
              <span class="label label-danger">Belum Upload</span>
              @endif
            </tr>
            
            
            
            
          </table>
        </div>
        <div class="col-lg-6 col-xs-12">
          <table class="table">
            <tr>
              <td>Kartu Keluarga (KK)</td><td>:</td>
              <td>
                @if($data->scan_kk!=null)
                <a href="{{url('camaru/dokumen/'.$data->scan_kk)}}" = target="_blank">{{$data->scan_kk}}</a>
                @else
                    <span class="label label-danger">Belum Upload</span>
                @endif
              </td>
            </tr>
            <tr>
              <td>SK Penghasilan Orang Tua/Daftar Gaji/Slip Gaji</td><td>:</td><td>
                @if($data->scan_surat_penghasilan!=null)
                <a href="{{url('camaru/dokumen/'.$data->scan_surat_penghasilan)}}" = target="_blank">{{$data->scan_surat_penghasilan}}</a>
                @else
                <span class="label label-danger">Belum Upload</span>
                @endif
              </td>
            </tr>
            @if($data->id_beasiswa==null)
            <tr>
              <td>Surat Pernyataan Orang Tua</td><td>:</td><td>
                @if($data->scan_pernyataan_orang_tua!=null)
                <a href="{{url('camaru/dokumen/'.$data->scan_pernyataan_orang_tua)}}" = target="_blank">{{$data->scan_pernyataan_orang_tua}}</a>
                @else
                <span class="label label-danger">Belum Upload</span>
                @endif
              </td>
            </tr>
            @endif
            <tr>
              <td>Bukti Rekening Listrik Terakhir/Bukti Pembelian Token</td><td>:</td>
              <td>
                @if($data->scan_rekening_listrik!=null)
                <a href="{{url('camaru/dokumen/'.$data->scan_rekening_listrik)}}"  target="_blank">{{$data->scan_rekening_listrik}}</a>
                @else
                    <span class="label label-danger">Belum Upload</span>
                @endif
              </td>
            </tr>
            <tr>
              <td width="35%">Bukti Pembayaran PDAM (jika ada)</td><td width="2%">:</td>
                  <td>
                    @if($data->scan_pembayaran_pdam!=null)
                    <a href="{{url('camaru/dokumen/'.$data->scan_pembayaran_pdam)}}" target="_blank">{{$data->scan_pembayaran_pdam}}</a>
                    @else
                    <span class="label label-danger">Belum Upload</span>
                    @endif
                  </td>
        
            </tr>
            <tr>
              <td>Bukti Pembayaran Pajak Bumi dan Bangunan (PBB)</td><td>:</td>
              <td>
                @if($data->scan_pembayaran_pbb!=null)
                    <a href="{{url('camaru/dokumen/'.$data->scan_pembayaran_pbb)}}"  target="_blank">{{$data->scan_pembayaran_pbb}}</a>
                    @else
                    <span class="label label-danger">Belum Upload</span>
                    @endif
              </td>
            </tr>
            
            <tr>
              <td>Akte Kelahiran</td><td>:</td>
              <td>
                @if($data->scan_akte_kelahiran!=null)
                <a href="{{url('camaru/dokumen/'.$data->scan_akte_kelahiran)}}"  target="_blank">{{$data->scan_akte_kelahiran}}</a>
                @else
                  <span class="label label-danger">Belum Upload</span>
                @endif
              </td>
            </tr>
            
          </table>
        </div>

      </div>
      @if(Helpers::is_mhs_kesehatan($data))
      <br>
      <b>Dokumen Dokumen Hasil Tes Kesehatan</b>
      <div class="row">
        <div class="col-lg-6 col-xs-12">
          <table class="table">
            <tr>
              <td>Scan Surat Keterangan Sehat Jasmani/Berbadan Sehat</td><td>:</td><td>@if($data->bukti_sehat_jasmani!=null)
              <a href="{{url('camaru/dokumen/'.$data->bukti_sehat_jasmani)}}"  target="_blank">{{$data->bukti_sehat_jasmani }}</a>
              @else
              <span class="label label-danger">Belum Upload</span>
              @endif
            </tr>
            <tr>
              <td>Scan Bebas Narkoba dan Zat Aditif</td><td>:</td><td>@if($data->bukti_bebas_narkoba !=null)
              <a href="{{url('camaru/dokumen/'.$data->bukti_bebas_narkoba)}}"  target="_blank">{{$data->bukti_bebas_narkoba}}</a>
              @else
              <span class="label label-danger">Belum Upload</span>
              @endif
            </tr> 
          </table>
        </div>
        <div class="col-lg-6 col-xs-12">
          <table class="table">
            <tr>
              <td>Scan Bebas Buta Warna</td><td>:</td>
              <td>
                @if($data->bukti_bebas_buta_warna!=null)
                <a href="{{url('camaru/dokumen/'.$data->bukti_bebas_buta_warna)}}" = target="_blank">{{$data->bukti_bebas_buta_warna}}</a>
                @else
                    <span class="label label-danger">Belum Upload</span>
                @endif
              </td>
            </tr>
            <tr>
              <td>Scan Hasil Tes Audiometri/Pendengaran </td><td>:</td><td>
                @if($data->bukti_sehat_pendengaran!=null)
                <a href="{{url('camaru/dokumen/'.$data->bukti_sehat_pendengaran)}}" = target="_blank">{{$data->bukti_sehat_pendengaran}}</a>
                @else
                <span class="label label-danger">Belum Upload</span>
                @endif
              </td>
            </tr> 
          </table>
        </div>
      </div>
      @endif
      <br>
      <div class="row">
        
        <div class="col-lg-4 col-xs-12">
          
          <b>Foto Rumah Depan Tampak Seluruh Bagian</b>

          <a data-width="800" data-height="600" href="{{url('camaru/foto/'.$data->foto_rumah_depan)}}" class="html5lightbox" data-group="mygroup" data-thumbnail="{{url('camaru/foto/'.$data->foto_rumah_depan)}}" title="Foto Rumah Depan">
            <img src=" {{url('camaru/foto/'.$data->foto_rumah_depan)}}" class="img-responsive" style="height: 320px;width: 100%;">
          </a>
        </div>
        <div class="col-lg-4 col-xs-12">
          
          <b>Foto Ruang Tamu Tampak Seluruh Bagian</b>
          <a href="{{url('camaru/foto/'.$data->foto_ruang_tamu)}}" class="html5lightbox" data-group="mygroup" data-thumbnail="{{url('camaru/foto/'.$data->foto_ruang_tamu)}}" title="Foto Rumah Depan">
            <img src=" {{url('camaru/foto/'.$data->foto_ruang_tamu)}}" class="img-responsive" style="height: 320px;width: 100%;">
            
          </a>
        </div>
        <div class="col-lg-4 col-xs-12">
          
          <b>Foto Dapur Tampak Seluruh Bagian</b>
          <a href="{{url('camaru/foto/'.$data->foto_dapur)}}" class="html5lightbox" data-group="mygroup" data-thumbnail="{{url('camaru/foto/'.$data->foto_dapur)}}" title="Foto Rumah Depan">
            <img src=" {{url('camaru/foto/'.$data->foto_dapur)}}" class="img-responsive" style="height: 320px;width: 100%;">
            
          </a>
        </div>
        <div class="col-lg-4 col-xs-12">
          
          <b>Foto Kamar Tampak Seluruh Bagian</b>
          <a href="{{url('camaru/foto/'.$data->foto_kamar)}}" class="html5lightbox" data-group="mygroup" data-thumbnail="{{url('camaru/foto/'.$data->foto_kamar)}}" title="Foto Rumah Depan">
            <img src=" {{url('camaru/foto/'.$data->foto_kamar)}}" class="img-responsive" style="height: 320px;width: 100%;">
            
          </a>
        </div>
        <div class="col-lg-4 col-xs-12">
          
          <b>Foto Kamar Mandi Tampak Seluruh Bagian</b>
          <a href="{{url('camaru/foto/'.$data->foto_kamar_mandi)}}" class="html5lightbox" data-group="mygroup" data-thumbnail="{{url('camaru/foto/'.$data->foto_kamar_mandi)}}" title="Foto Rumah Depan">
            <img src=" {{url('camaru/foto/'.$data->foto_kamar_mandi)}}" class="img-responsive" style="height: 320px;width: 100%;">
            
          </a>
        </div>
        <div class="col-lg-4 col-xs-12">
          
          <b>Foto  Seluruh Anggota Keluarga </b>
          <a href="{{url('camaru/foto/'.$data->foto_keluarga)}}" class="html5lightbox" data-group="mygroup" data-thumbnail="{{url('camaru/foto/'.$data->foto_keluarga)}}" title="Foto Rumah Depan">
            <img src=" {{url('camaru/foto/'.$data->foto_keluarga)}}" class="img-responsive" style="height: 320px;width: 100%;">
            
          </a>
        </div>
      </div>
      @else
      <div class="row">
        
        <div class="col-lg-12 col-xs-12">
          <table class="table">
            <tr>
              <td>KTP</td><td>:</td><td>@if($data->scan_ktp!=null)
              <a href="{{url('camaru/dokumen/'.$data->scan_ktp)}}"  target="_blank">{{$data->scan_ktp}}</a>
              @else
              <span class="label label-danger">Belum Upload</span>
              @endif
            </tr>
            <tr>
            
            <tr>
              <td width="35%">Ijazah</td><td width="2%">:</td><td>
                @if($data->scan_ijazah!=null)
                <a href="{{url('camaru/dokumen/'.$data->scan_ijazah)}}"  target="_blank">{{$data->scan_ijazah}}</a></td>
                @else
                <span class="label label-danger">Belum Upload</span>
                @endif
            </tr>

          </table>
        </div>
        
      </div>
      @endif
      
      
    </div>
    @if($data->beasiswa)
    <div class="tab-pane" id="tab_5">
      <h4>Data Calon Penerima Beasiswa</h4>
      @if($data->id_beasiswa==1)
      
      
      
      <div class="row">
        
        <div class="col-lg-12 col-xs-12">
          <table class="table">
            <tr>
              <td width="35%">Nomor KIP</td><td width="2%">:</td><td>{{$data->nomor_kip}}</td>
        
            </tr>
            <tr>
              <td>Scan KIP</td><td>:</td><td><a href="{{url('camaru/beasiswa/'.$data->scan_kip)}}" = target="_blank">{{$data->scan_kip}}</a></td>
            </tr>
            
            <tr>
              <td width="35%">Scan Kartu Keluarga Sejahtera</td><td width="2%">:</td>
                <td>
                  @if($data->scan_kks!=null)
                  <a href="{{url('camaru/beasiswa/'.$data->scan_kks)}}" target="_blank">{{$data->scan_kks}}</a>
                  @else
                  <span class="label label-danger">Belum Upload</span>
                  @endif
                </td>
        
            </tr>
            <tr>
              <td width="35%">Scan Formulir Beasiswa</td><td width="2%">:</td>
                <td>
                  @if($data->scan_formulir_beasiswa!=null)
                  <a href="{{url('camaru/beasiswa/'.$data->scan_formulir_beasiswa)}}" target="_blank">{{$data->scan_formulir_beasiswa}}</a>
                  @else
                  <span class="label label-danger">Belum Upload</span>
                  @endif
                </td>
        
            </tr>
            <tr>
              <td>Scan Rapor SMA/Sederajat</td><td>:</td>
              <td>
                @if($data->scan_rapor_sma!=null)
                    <a href="{{url('camaru/beasiswa/'.$data->scan_rapor_sma)}}"  target="_blank">{{$data->scan_rapor_sma}}</a>
                    @else
                    <span class="label label-danger">Belum Upload</span>
                    @endif
              </td>
            </tr>
            <tr>
              <td>Scan Surat Ket. Tidak Mampu</td><td>:</td><td><a href="{{url('camaru/beasiswa/'.$data->scan_surat_keterangan_tidak_mampu)}}"  target="_blank">{{$data->scan_surat_keterangan_tidak_mampu}}</a></td>
            </tr>
            <tr>
              <td>Scan Surat Pernyataan</td><td>:</td><td><a href="{{url('camaru/beasiswa/'.$data->surat_pernyataan_bersedia_dikeluarkan)}}"  target="_blank">{{$data->surat_pernyataan_bersedia_dikeluarkan}}</a></td>
            </tr>
            
          </table>
        </div>
        
      </div>
      
      
      <b><h4>Data Prestasi</h4></b>
      <div class="table-responsive">
        <table class="table tbale-striped table-bordered" id="table">
          <thead>
            <tr>
              <th width="3%">No</th><th width="45%">Nama Prestasi</th><th width="15%">Tingkat</th><th width="7%">Tahun Peroleh</th><th>File Sertifikat</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data->Prestasi as $r)
            <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$r->nama_prestasi}}</td>
            <td>{{$r->tingkat_prestasi->tingkat}}</td>
            <td>{{$r->tahun}}</td>
            <td><a href="{{url('camaru/beasiswa/'.$r->file_sertifikat)}}"  target="_blank">{{$r->file_sertifikat}}</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      @else
      <div class="row">
        <div class="col-lg-12">
          <div class="alert alert-success">
            <center>
              <h3>
                BEASISWA {{$data->beasiswa->nama_beasiswa}}
              </h3>
            </center>
          </div>
        </div>
      </div>
      @endif
      
    </div>
      @if($tombol_validasi==true)
      <div class="tab-pane" id="tab_6">
        
        <br>
        <div class="row">
          
          <div class="col-xs-12">
            @if($data->validasi_data_pokok=='valid')
            <center>
              <form action="{{url('admin/validasi-data-beasiswa/submit-validasi/'.encrypt($data->id_camaru))}}" id="form_submit_validasi" method="post">@csrf<input type="hidden" name="validasi_penerima_beasiswa" id='validasi_penerima_beasiswa'></form>
              @if($data->validasi_penerima_beasiswa=='menunggu')
              <button class="btn btn-lg btn-primary" onclick="submit_validasi_beasiswa('diterima')"> Lolos Sebagai Penerima Beasiswa </button> | <button class="btn btn-lg btn-danger" onclick="submit_validasi_beasiswa('ditolak')"> Ditolak Sebagai Penerima Beasiswa </button>
              @else
                <div class="well">
                  Sudah divalidasi <b>{{ strtoupper($data->validasi_penerima_beasiswa) }}</b> Oleh {{Helpers::nama_gelar(DB::table('kepeg.pegawai')->where('nip',$data->nip_validator_beasiswa)->first())}} <br>
                  Pada tanggal {!!Tanggal::time_indo($data->tgl_validasi_beasiswa)!!}

                  @if($data->validasi_penerima_beasiswa=='ditolak')
                  <br>
                  <b>Alasan : </b>
                  <p>{{$data->catatan_validasi_beasiswa}}</p>
                  @endif
                </div>
                <div class="alert alert-danger">
                  Jika mahasiswa sudah mencetak bukti registrasi dan punya NIM maka otomatis tombol validasi hilang dan validasi tidak dapat dibatalkan
                </div>
                <br>
                @if($data->no_mhs==null)
                <button class="btn btn-lg btn-primary" onclick="submit_validasi_beasiswa('menunggu')"> Batalkan Validasi</button> 
                @endif
              @endif
            </center>
            @else
            <center>
              <div class="alert alert-info">
                <blockquote>
                  Harus validasi data pokok terlebih dahulu!
                </blockquote>
              </div>
            </center>
            @endif
          </div>
          
        </div>
        
      </div>
      @else
      <div class="tab-pane" id="tab_6">
              
        <br>
        <div class="row">
          
          <div class="col-xs-12">
            <center>
             
              @if($data->validasi_penerima_beasiswa=='menunggu')
              <div class="well">
                Masih dalam Proses Verifikasi
              </div>
              @else
                <div class="well">
                  Sudah divalidasi <b>{{ strtoupper($data->validasi_penerima_beasiswa) }}</b> Oleh {{Helpers::nama_gelar(DB::table('kepeg.pegawai')->where('nip',$data->nip_validator_beasiswa)->first())}} <br>
                  Pada tanggal {!!Tanggal::time_indo($data->tgl_validasi_beasiswa)!!}

                  @if($data->validasi_penerima_beasiswa=='ditolak')
                  <br>
                  <b>Alasan : </b>
                  <p>{{$data->catatan_validasi_beasiswa}}</p>
                  @endif
                </div>
                <br>
                
              @endif
            </center>
          </div>
          
        </div>
        
      </div>
      @endif
    @endif
    


    
  
  </div>
  <!-- /.tab-content -->
</div>