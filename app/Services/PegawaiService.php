<?php
namespace App\Services;

use Auth;
use DB;
use Log;
use App\Model\JenisPendaftaran;
use App\Services\LdapService;
use App\User;
#use App\SiakadUserRole;
#use App\Role;
use App\Model\SiakadDosen;
use App\Model\SiakadRole;
use App\Model\SiakadUserRole;
use App\Pegawai;
use App\Model\SiakadUser;
use App\Model\SiakadPegawai;
use App\Model\Dik;
use App\Unit;
use Carbon\Carbon;  
use App\Model\StatusKeaktifanPegawai;
class PegawaiService 
{
  
  
  public static function isDosen($status)
  {
    return in_array($status, [3,4]);
  }
  public static function isPns($status)
  {
    return in_array($status, [1,3]) ;
  }
  
  public function copyToSiakadDosen($pegawai, $dosen)
  {
    Log::info("copyToSiakadDosen");
    $dosen->id_pegawai = $pegawai->id_pegawai;
    $dosen->nidn = $pegawai->nidn;
  }
  public function hasAttribute($attr, $peg)
  {
    return array_key_exists($attr, $peg);
  }

  public function copyToSiakadPegawai($pegawai, $spegawai)
  {
    Log::info("PegawaiService::copyToSiakadPegawai");
    /*Log::info(print_r($spegawai->attributes, true));
    foreach ($pegawai->getAttributes() as $key=>$val)
    {
      Log::info("$key = $val");
      
      //if ($this->hasAttribute($key, $spegawai->getAttributes()))
      if (\Schema::hasColumn($spegawai->getTable(), $key))
        $spegawai->$key = $pegawai->$key;
    }*/
    $spegawai->nama_pegawai     = $pegawai->nama_pegawai     ;
    $spegawai->nip              = $pegawai->nip              ;
    $spegawai->gelar_depan      = $pegawai->gelar_depan      ;
    $spegawai->gelar_belakang   = $pegawai->gelar_belakang   ;
    $spegawai->tgl_lahir        = $pegawai->tgl_lahir        ;
    $spegawai->tempat_lahir     = $pegawai->tempat_lahir     ;
    $spegawai->id_status_keaktifan_pegawai = $pegawai->id_status_keaktifan_pegawai;
    if ($this->isDosen($pegawai->status_kerja)) {
      $spegawai->dos_peg = 'DOSEN';
    }
    else  {
      $spegawai->dos_peg = 'PEGAWAI';
    }
  }
  public function copyToDik($pegawai, $dik)
  {
    Log::info("PegawaiService::copyToDik");
    $dik->nama = $dik->nama_pegawai     = $pegawai->nama_pegawai     ;
    $dik->nip_baru         = $pegawai->nip              ;
    $dik->gelar_dpn        = $dik->gelar_depan      = $pegawai->gelar_depan      ;
    $dik->gelar_blk        = $dik->gelar_belakang   = $pegawai->gelar_belakang   ;
    $dik->nidn             = $pegawai->nidn;
    $unit =Unit::where("id", "=", $pegawai->id_unit_kerja)->first();
    if ($unit !=null) {
      $dik->unit_kerja = $unit->unit;
    }
    $dik->kab_lahir = $dik->prop_lahir     = $pegawai->tempat_lahir     ;
    
    Log::info('status kerja ' . $pegawai->status_kerja);
    if ($this->isDosen($pegawai->status_kerja)) {
      $dik->dos_peg = 'DOSEN';
      
    } 
    else {
      $dik->dos_peg = 'PEGAWAI';
      
    }
    /*if ($this->isPns($pegawai->status_kerja)) {
      $dik->status_peg= 'AKTIF';  
    }
    else {
      $dik->status_peg= 'HONORER';  
    }*/
    if ($pegawai->id_status_keaktifan_pegawai == 1)
    {
      if ($this->isPns($pegawai->status_kerja))
      {
        $dik->status_peg     = 'AKTIF';
      }
      else
        $dik->status_peg     = 'HONORER';
    }
    else 
    {
      $st = StatusKeaktifanPegawai::find($pegawai->id_status_keaktifan_pegawai);
      //Log:info()
      if ($st!= null) {
        $dik->status_peg = strtoupper($st->nama_status_keaktifan_pegawai);
      }
      /*else
      {
        $dik->status_peg = null;
      }*/
    }
  }
  public function copyToDik2($pegawai, $dik)
  {
    Log::info('PegawaiService::copyToDik2');
    $dik->lokasi_presensi      = $pegawai->lokasi_presensi;
    $dik->lokasi_presensi2     = $pegawai->lokasi_presensi2;
    $dik->lokasi_presensi3     = $pegawai->lokasi_presensi3;
    $dik->start_date_presensi2 = $pegawai->start_date_presensi2;
    $dik->start_date_presensi3 = $pegawai->start_date_presensi3;
    $dik->end_date_presensi2   = $pegawai->end_date_presensi2;
    $dik->end_date_presensi3   = $pegawai->end_date_presensi3;
    $dik->presensi2x          = $pegawai->presensi2x;
    $dik->presensi_malam       = $pegawai->presensi_malam;  
  }
  public function register(\App\Pegawai $pegawai)
  {
    Log::info("register");
    $spegawai = new SiakadPegawai();
    /*if ($this->isRegistered($camaru->no_test)) {
      throw new \InvalidArgumentException("No Test Mahasiswa tersebut sudah terdaftar di Unja");
    }*/
    $dik = new Dik();
    $this->copyToSiakadPegawai($pegawai, $spegawai);
    $this->copyToDik($pegawai, $dik);
    
    $userbaru = new SiakadUser();
    
    if ($this->isDosen($pegawai->status_kerja)) {
      Log::info('akan membuat user dosen status: $pegawai->status_kerja , $pegawai->nidn');
      $userbaru->username = $pegawai->nidn;
      $userbaru->usertype='dosen';
    }
    else {
      Log::info('akan membuat user pegawai status: $pegawai->status_kerja , $pegawai->nip');
      $userbaru->username = $pegawai->nip;
      $userbaru->usertype='pegawai';
    }
    
    #$userbaru->email=$pegawai->email;
    $userbaru->name=$pegawai->nama_pegawai;
    $userbaru->token_reset_password='';
    //$userbaru->password = password_hash($pegawai->nip, PASSWORD_DEFAULT);
    $ldap = new LdapService();
    Log::info($userbaru->username);

    if ($ldap->searchUser($userbaru->username)){
      Log::info(" user sudah ada di ldap " . $userbaru->username);
      $ldap->changeUserPassword($userbaru->username, $userbaru->username, $userbaru->username);
      $info["sn"] = $userbaru->name;
      //$info["password"] = $userbaru->username;
      $info["givenname"] = $userbaru->name;
      $info["sn"] = $userbaru->name;
      $info["cn"] = $userbaru->name;
      $ldap->modifyUser($userbaru->username, $info);
    }
    else{
      $ldap->addUser2($userbaru->username, $userbaru->username, $userbaru->name, "");
    }
    
    $userrole = new SiakadUserRole();
    if ($this->isDosen($pegawai->status_kerja)) {
      $userrole->role_id = SiakadRole::where("role_code","=","dosen")->first()->role_id;
    }
    else {
      $userrole->role_id = SiakadRole::where("role_code","=","pegawai")->first()->role_id;
    }
    
    //DB::beginTransaction();
      $spegawai->save();
      $userbaru->save();
      $userrole->user_id = $userbaru->id;
      $userrole->save();
      $dik->save();
      if ($this->isDosen($pegawai->status_kerja)) {
        $sdosen  = new SiakadDosen();
        $this->copyToSiakadDosen($spegawai, $sdosen);
        $sdosen->nidn = $pegawai->nidn;
        $sdosen->id_pegawai = $spegawai->id_pegawai;
        $sdosen->save();
      }

    return $spegawai;
  }
  public function copyToDik3($pegawai, $dik)
  {
    Log::info("PegawaiService::copyToDik3");
    $dik->nama = $dik->nama_pegawai     = $pegawai->nama_pegawai     ;
    $dik->nip_baru         = $pegawai->nip              ;
    $dik->gelar_dpn        = $dik->gelar_depan      = $pegawai->gelar_depan      ;
    $dik->gelar_blk        = $dik->gelar_belakang   = $pegawai->gelar_belakang   ;
    $dik->nidn             = $pegawai->nidn;
    $unit =Unit::where("id", "=", $pegawai->id_unit_kerja)->first();
    if ($unit !=null) {
      $dik->unit_kerja = $unit->unit;
    }
    #$dik->kab_lahir = $dik->prop_lahir     = $pegawai->tempat_lahir     ;
    
    Log::info('status kerja ' . $pegawai->status_kerja);
    if ($this->isDosen($pegawai->status_kerja)) {
      $dik->dos_peg = 'DOSEN';
      
    } 
    else {
      $dik->dos_peg = 'PEGAWAI';
      
    }
    /*if ($this->isPns($pegawai->status_kerja)) {
      $dik->status_peg= 'AKTIF';  
    }
    else {
      $dik->status_peg= 'HONORER';  
    }*/
    if ($pegawai->id_status_keaktifan_pegawai == 1)
    {
      if ($this->isPns($pegawai->status_kerja))
      {
        $dik->status_peg     = 'AKTIF';
      }
      else
        $dik->status_peg     = 'HONORER';
    }
    else 
    {
      $st = StatusKeaktifanPegawai::find($pegawai->id_status_keaktifan_pegawai);
      //Log:info()
      if ($st!= null) {
        $dik->status_peg = strtoupper($st->nama_status_keaktifan_pegawai);
      }
      /*else
      {
        $dik->status_peg = null;
      }*/
    }
  }
  public function xregister(Camaru $camaru)
  {
    $mahasiswa = new Mahasiswa();
    if ($this->isRegistered($camaru->no_test)) {
      throw new \InvalidArgumentException("No Test Mahasiswa tersebut sudah terdaftar di Unja");
    }
    /*if ($this->isRegistered($camaru->no_test)) {
      throw new \Exception ("No Test Mahasiswa tersebut sudah terdaftar di Unja");
    }*/

    $this->copyCamaruToMahasiswa($camaru, $mahasiswa);
    $mhspt = new MhsPt();
    $this->createMhspt($mahasiswa, $camaru, $mhspt);
    $mhspt->id_mahasiswa = $mahasiswa;
    $mhspt->id_jenis_pendaftaran = $this->konversiJenisPendaftaran($camaru->jalur);
    $regmhs = new RegMhs();
    $this->createRegMhs($mhspt, $regmhs);
    $userbaru = new User();
    
    $userbaru->username = $mhspt->no_mhs;
    $userbaru->usertype='mahasiswa';
    //$userbaru->email=$mhspt->no_mhs."@student.unja.ac.id";
    $userbaru->email=$camaru->email;
    $userbaru->password = password_hash($camaru->no_test, PASSWORD_DEFAULT);
    $ldap = new LdapService();
    if ($ldap->searchUser($mhspt->no_mhs)){
      Log::info(" user sudah ada di ldap " . $mhspt->no_mhs);
      $ldap->changeUserPassword($mhspt->no_mhs, $mhspt->no_test, $mhspt->no_test);
      $info["sn"] = $mahasiswa->nama_mahasiswa;
      $info["password"] = $mhspt->no_test;
      $info["givenname"] = $mahasiswa->nama_mahasiswa;
      $info["sn"] = $mahasiswa->nama_mahasiswa;
      $info["cn"] = $mahasiswa->nama_mahasiswa;
      $ldap->modifyUser($mhspt->no_mhs, $info);
      
    }
    else{
      $ldap->addUser2($mhspt->no_mhs, $mhspt->no_test, $mahasiswa->nama_mahasiswa, "");
    }
    
    $userrole = new UserRole();
    $userrole->role_id = Role::where("role_code","=","mahasiswa")->first()->role_id;
    
    DB::beginTransaction();
      $mahasiswa->save();
      $mhspt->id_mahasiswa = $mahasiswa->id_mahasiswa;
      $mhspt->save();
      $regmhs->id_mhs_pt = $mhspt->id_mhs_pt;
      $regmhs->save();
      $userbaru->save();
      $userrole->user_id = $userbaru->id;
      $userrole->save();
    DB::commit();
    
    /*$ldap = new LdapService();
    if ($ldap->searchUser($mhspt->no_mhs)){
      Log::info(" user sudah ada di ldap " . $mhspt->no_mhs);
    }
    else{
      $ldap->addUser2($mhspt->no_mhs, $mhspt->no_test, $mhspt->mahasiswa->nama_mahasiswa, "");
    }*/
      
    //$username, $password, $firstname, $lastname
    return $mhspt;
  }
  public function createMhspt(Mahasiswa $mahasiswa, Camaru $camaru, Mhspt $mhspt)
  {
    $mhspt->id_mahasiswa = $mahasiswa->id_mahasiswa;
    $mhspt->angkatan = $camaru->angkatan;
    //dd($camaru->kode_prodi);
    $prodi = Prodi::where("kode_prodi", "=", $camaru->kode_prodi)->first();
    //dd($prodi);
    $xx= KelasProdi::where("id_prodi","=", $prodi->id_prodi)
    ->where("kode_nomhs", "=", $camaru->kode_nomhs)->first();
    
    //dd($xx);
    //dd($camaru->kode_nomhs);
    $mhspt->id_kelas_prodi = $xx->id_kelas_prodi;
    $mhspt->id_prodi = $prodi->id_prodi;
    //dd($mhspt->id_kelas_prodi);
    $mhspt->no_mhs = $this->generateNomhs($mhspt);
    $mhspt->no_test = $camaru->no_test;
    $mhspt->skhun = $camaru->skhun;
    $mhspt->tanggal_masuk = date("Y-m-d");
    $mhspt->id_semester_mulai = date("Y")."1";
    $mhspt->beasiswa = $camaru->beasiswa;
    $mhspt->id_status_mahasiswa = "A";
    
  }
  public function isRegistered($no_test)
  {
    $ada = MhsPt::where("no_test", "=", $no_test)->count();
    return $ada;
  
  }
  public function generateNomhs(MhsPt $mhspt)
  {
    //dd($mhspt->id_kelas_prodi);
    $kelasprodi = KelasProdi::find($mhspt->id_kelas_prodi);
    $max_no_mhs = MhsPt::where("id_kelas_prodi", "=", $mhspt->id_kelas_prodi)->max("no_mhs");
    $no_mhs_baru="";
    //dd($max_no_mhs);
    if (empty($max_no_mhs))
    {
      $nomor_max = 1; 
      $no_mhs_baru = sprintf("%s%s%03d", $kelasprodi->kode_nomhs, 
        substr($mhspt->angkatan,2) , $nomor_max);
    }
    else
    {
      //dd($kelasprodi->kode_nomhs);
      $panjang = strlen($kelasprodi->kode_nomhs . substr($mhspt->angkatan,2)); #'A1D116'
      $nomor_max = intval(substr($max_no_mhs , $panjang)); 
      if ($nomor_max==0){
        throw new \InvalidArgumentException ("Max Nomor mahasiswa baru tidak valid: $max_no_mhs");
      }
      $nomor_max++;
      $no_mhs_baru = sprintf("%s%s%03d", $kelasprodi->kode_nomhs, 
        substr($mhspt->angkatan,2) , $nomor_max);
    }
    //dd($no_mhs_baru);
    return $no_mhs_baru;
  }
  
  public function konversiAgama($nama_agama)
  {
    $agama = Agama::where("nama_agama", "=", $nama_agama)->first();
    if ($agama){
      return $agama->id_agama;
    }
    else{
      return null;
    }
  }
  
  public function konversiJenisPendaftaran($nama_jenis_pendaftaran)
  {
    $item = JenisPendaftaran::where("nama_jenis_pendaftaran", "=", $nama_jenis_pendaftaran)->first();
    if ($item){
      return $item->id_jenis_pendaftaran;
        
    }
    else{
      return null;
    }
  }
  
  public function copyCamaruToMahasiswa(Camaru $camaru, Mahasiswa $mahasiswa)
  {
    $mahasiswa->nama_mahasiswa = $camaru->nama_mahasiswa;
    $mahasiswa->tempat_lahir = $camaru->tempat_lahir;
    $mahasiswa->tgl_lahir = $camaru->tgl_lahir;
    $mahasiswa->jenis = $camaru->jenis;
    $mahasiswa->nama_ibu_kandung = $camaru->nama_ibu_kandung;
    $mahasiswa->nik = $camaru->nik;
    $mahasiswa->nisn = $camaru->nisn;
    $mahasiswa->id_agama = $this->konversiAgama($camaru->agama);
    $mahasiswa->alamat = $camaru->alamat;
    #$mahasiswa->rt = $camaru->;
    #$mahasiswa->rw = $camaru->;
    #$mahasiswa->dusun = $camaru->;
    #$mahasiswa->kelurahan = $camaru->;
    $mahasiswa->telepon1 = $camaru->telp1;
    $mahasiswa->email  = $camaru->email;
    $mahasiswa->tahun_lulus_smta = $camaru->tahun_lulus;
    $mahasiswa->asal_smta = $camaru->nama_sekolah;
    $mahasiswa->npsn = $camaru->npsn;
    $mahasiswa->program_studi_smta = $camaru->program_studi_smta;
    //stat=HER
    $mahasiswa->nama_ayah = $camaru->nama_ayah;
    //$mahasiswa->id_pekerjaan_ayah = $camaru->id_pekerjaan_ayah;
    //$mahasiswa->id_pendidikan_ayah = $camaru->id_pendidikan_ayah;
    //$mahasiswa->id_penghasilan_ayah = $camaru->id_penghasilan_ayah;
    $mahasiswa->nama_ibu = $camaru->nama_ibu;
    //$mahasiswa->id_pekerjaan_ibu = $camaru->id_pekerjaan_ibu;
    //$mahasiswa->id_pendidikan_ibu = $camaru->id_pendidikan_ibu;
    //$mahasiswa->id_penghasilan_ibu = $camaru->id_penghasilan_ibu;
    #$mahasiswa->rw = $camaru->;
    
    
  }
  public function createRegMhs(MhsPt $mhspt, RegMhs $regmhs)
  {
    $regmhs->id_mhs_pt = $mhspt->id_mhs_pt;
    $regmhs->id_semester = $mhspt->id_semester_mulai;
    $regmhs->status_reg="AKTIF";
    $regmhs->baru_lama="BARU";
    $regmhs->id_status_mahasiswa="A";
    $regmhs->id_tagihan=substr(date("Y"),2)."01" . $mhspt->no_test;
    
  }
  public function unregister(Camaru $camaru)
  {
    /*DB::beginTransaction();
    if ($camaru->mhsPt)
    {
      if ($camaru->mhsPt->regMhs)
      {
        $camaru->mhsPt->regMhs->delete();
      }
      
      $camaru->mhsPt->delete();
      $user1 = User::where("username","=",$camaru->mhsPt->no_mhs());
      if ($user1){
        $user1->delete();
      }
    }
    DB::commit();*/
    
    DB::transaction(function() use ($camaru)
    {
      //dd($camaru);
      if ($camaru->mhsPt)
      {
        if ($camaru->mhsPt->regMhs)
        {
          $camaru->mhsPt->regMhs->delete();
        }
          
        $camaru->mhsPt->delete();
        $user1 = User::where("username","=",$camaru->mhsPt->no_mhs);
        if ($user1){
          $user1->delete();
        }
      }
    });
  }
  public function modify(\App\Pegawai $pegawai)
  {
    Log::info("modify");
    //$spegawai = SiakadPegawai::find($pegawai->getOriginal('nip'));
    $spegawai = SiakadPegawai::find( $pegawai->id_pegawai_siakad);
    if ($this->isDosen($pegawai->status_kerja))
    {
      $userbaru = User::where("username", "=", $spegawai->nidn)->first();
      $userbaru->username = $pegawai->nidn;
      $userbaru->usertype='dosen';
    }
    else 
    {
      $userbaru = User::where("username", "=", $spegawai->nip)->first();
      $userbaru->username = $pegawai->nip;
      $userbaru->usertype='pegawai';
    }
    
    if ($spegawai->isDirty('nip') || $spegawai->isDirty('nidn'))
    {
      $ldap = new LdapService();
    }

    $userbaru->name=$pegawai->nama_pegawai;
    $this->copyToSiakadPegawai($pegawai, $spegawai);
    if ($this->isDosen($pegawai->status_kerja)) {
        
    } 
    Log::info($userbaru->username);
  }
  
}
