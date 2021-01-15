<?php

use Illuminate\Database\Seeder;
use App\User;
use App\DataPendaftar;
use App\Biodata;
use Faker\Factory as Faker;
use App\PilihanProdi;
use App\BukaPendaftaran;
class PendaftarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $no_tes;
    protected $no_urut;
    public function run()
    {
      /*
        $faker=Faker::create(); 
        foreach (range(0,100) as $i) {
          
          $insert =User::create([
            'username'=>$this->generateUsername(),
            'password'=>bcrypt('1234567890'),
            'status_akun'=>'aktif',
            'jenis_akun'=>'pendaftar'


          ]);
          $roles=$insert->roles()->attach([4]);
          $data_pendaftar=DataPendaftar::create([
            'users_id_pendaftar'=>$insert->id_user,
            'buka_pendaftaran_id'=>rand(5,6),
          ]);
          $foto=$faker->image(public_path()."/images/", 400, 600, 'people', false);
          $biodata=Biodata::create([
            'users_id_biodata'=>$insert->id_user,
            'nama_peserta'=>$faker->name,
            'email'=>$faker->email,
            'no_hp'=>$faker->e164PhoneNumber,
            'tanggal_lahir'=>'1996-11-30',
            'tempat_lahir'=> $faker->city,
            'alamat_lengkap'=>$faker->city,
            'agama_id'=>rand(1,7),
            'sekolah_npsn'=>'69888996',
            'tahun_lulus_sma'=>rand(2013,2018),
            'jenis_kelamin'=>'L',
            'kabupaten_kode'=>'105005',
            'provinsi_kode'=>'105',
            'foto_profil'=>$foto,
          ]);
        }

        //nomor test
        $pendaftar=User::where('jenis_akun','pendaftar')->where('status_akun','aktif')->get();
        foreach ($pendaftar as  $data) {
           if ($data->data_pendaftar->no_tes==null||$data->data_pendaftar->no_tes=="") {
            $this->generateNoTes($data->data_pendaftar->buka_pendaftaran_id);
            $no_tes=$this->no_tes;
            $no_urut=$this->no_urut;
            DataPendaftar::where('users_id_pendaftar',$data->id_user)->update(['no_tes'=>$no_tes,'no_urut'=>$no_urut]);
            echo $no_tes." inserted\n";
          }
        }


        //pilihan prodi

        /*$prodi_id=['62401','62402','61404'];
        foreach ($pendaftar as  $p) {
          $pilihan=1;
           for ($i=0; $i <count($prodi_id) ; $i++) { 
            $pilihan_prodi=PilihanProdi::where(['data_pendaftar_users_id'=>$p->id_user,'pilihan_ke'=>$pilihan]);
            if ($pilihan_prodi->count()==0) {
              PilihanProdi::create(['data_pendaftar_users_id'=>$p->id_user,'pilihan_ke'=>$pilihan,'prodi_id'=>$prodi_id[$i] ]);
            }else{
              $update=$pilihan_prodi->update(['prodi_id'=>$prodi_id[$i]]);
            }
            $pilihan++;
          }
        }*/

        //lokasi
         //insert lokasi
        /*
      $lokasi=DB::table('siakad.lokasi_kampus')->get();
      
        foreach ($lokasi as $in=> $l) {
          DB::table('lokasi_kampus')->insert([
            'id_lokasi_kampus'=>$l->id_lokasi_kampus,
            'nama_lokasi'=>$l->nama_lokasi,
            'alamat'=>$l->alamat,
          ]);
          echo $in." insert lokasi ".$l->nama_lokasi."\n";
        }

        //insert gedung
        $gedung=DB::table('siakad.gedung')->get();
        foreach ($gedung as $in=> $g) {
          DB::table('gedung')->insert([
            'id_gedung'=>$g->id_gedung,
            'nama_gedung'=>$g->nama_gedung,
            'lokasi_kampus_id'=>$g->id_lokasi_kampus,
            'fakultas_id'=>$g->id_fakultas,
          ]);
          echo $in." insert gedung ".$g->nama_gedung."\n";
        }*/

        //insert ruangan

      /*
        $ruangan=DB::table('siakad.ruang_kuliah')->whereNotNull('id_gedung')->get();
        foreach ($ruangan as $in=> $r) {
          DB::table('ruangan')->insert([
            'id_ruangan'=>$r->id_ruang_kuliah,
            'nama_ruangan'=>$r->nama_ruang,
            'singkatan_ruangan'=>$r->singkatan_ruang,
            'gedung_id'=>$r->id_gedung,
            'kapasitas'=>$r->kapasitas,
            
          ]);
          echo $in." insert ruangan ".$r->nama_ruang."\n";
        }
        */
        
      }

    private function generateUsername(){
      
      $username=$this->randomString(5);
      $cekdb=User::where('username',$username)->first();
      if ($cekdb) {
        $this->generateUsername();
      }else{
        return $username;
      }
    }
    private function randomString($length=5)
    {

      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;

    }
    private function generateNoTes($id_buka_pendaftaran)
    {
      $unja="UNJA";
      $tahun=substr(date('Y'),2,2);
      $data=BukaPendaftaran::where('id_buka_pendaftaran',$id_buka_pendaftaran)->first();
      $id_jalur=$data->jalur_masuk->id_jalur_masuk;
      $id_gelombang=$data->gelombang->id_gelombang;
      $id_kelompok_ujian=$data->kelompok_ujian->id_kelompok_ujian;

      $no_tes_tertinggi=DataPendaftar::where('buka_pendaftaran_id',$id_buka_pendaftaran)->whereHas('buka_pendaftaran',function($q)use($id_kelompok_ujian){
        $q->where('buka_pendaftaran.kelompok_ujian_id',$id_kelompok_ujian);
      })->max('no_urut');
      if ($no_tes_tertinggi==null||$no_tes_tertinggi==0||$no_tes_tertinggi=="") {
        $no_mulai=1;  
      }else{
        $no_mulai=$no_tes_tertinggi+1;
      }

      $digitnol="";
      for($i=4; $i>=strlen($no_mulai);$i--)
      {
        $digitnol.="0";
      }
      $nomor_mulai=$digitnol.$no_mulai;

      $this->no_tes= $unja.$tahun.$id_jalur.$id_gelombang.$id_kelompok_ujian.$nomor_mulai;
      $this->no_urut=$no_mulai;
    }


}
