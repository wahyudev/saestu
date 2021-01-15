<form class="form-inline" action="" method="get">
      
  <div class="row">
    <div class="form-group col-lg-4 col-md-4 col-xs-12">
      <label>Validasi</label>
      <select id="filter_validasi" name="filter_validasi" style="width: 100%" onchange="load_data()" class="form-control select2">
        <option value="">Semua</option>
        <option value="menunggu" {{session('validasi')=='menunggu' ? 'selected':''}}>Menunggu Validasi</option>
        <option value="valid" {{session('validasi')=='valid' ? 'selected':''}}>Valid</option>
        <option value="tidak_valid" {{session('validasi')=='tidak_valid' ? 'selected':''}}>Tidak Valid</option>
      </select>
    </div>
    <div class="form-group col-lg-4 col-md-4 col-xs-12">
      <label>Dosen/Pegawai</label>
      <select id="filter_pegawai" name="filter_pegawai" style="width: 100%" onchange="load_data()" class="form-control select2ajaxpegawai">
        
      </select>
    </div>
  </div>
  
</form> 