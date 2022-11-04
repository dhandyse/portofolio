<?php

use App\Models\ActivityLog;
use App\Models\LogUser;
use Illuminate\Support\Facades\DB;
use App\Models\UserManagement\GroupUser;
use App\Models\UserManagement\Users;
use Illuminate\Support\Facades\Crypt;

if (!function_exists('getTanggalIndo')) {
  function getTanggalIndo($tanggal)
  {
    date_default_timezone_set("Asia/Bangkok");
    $bulan = array(
      1 =>   'Januari',
      2 => 'Februari',
      3 => 'Maret',
      4 => 'April',
      5 => 'Mei',
      6 => 'Juni',
      7 => 'Juli',
      8 => 'Agustus',
      9 => 'September',
      10 => 'Oktober',
      11 => 'November',
      12 => 'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
  }
}
if (!function_exists('GetUser')) {
  function GetUser($id)
  {
    $user = DB::table('users')->where('id', $id)->first();
    $users = '';
    $nama_group = '';
    if ($user) {
      $users = $user->name;
      $user_group = DB::table('group_user')->select('*')->join('master_group_user', 'group_user.id_master_group', '=', 'master_group_user.id')->where('group_user.id', $user->id_group_user)->first();
      $nama_group = $user_group->master_group;
    }
    return $users . ' - ' . $nama_group;
  }
}
if (!function_exists('getBulan')) {
  function getBulan($no)
  {
    $bulan = array(
      1 =>   'Januari',
      2 => 'Februari',
      3 => 'Maret',
      4 => 'April',
      5 => 'Mei',
      6 => 'Juni',
      7 => 'Juli',
      8 => 'Agustus',
      9 => 'September',
      10 => 'Oktober',
      11 => 'November',
      12 => 'Desember'
    );

    return $bulan[$no];
  }
}

if (!function_exists('formatRp')) {
  function formatRp($param)
  {
    return "Rp " . number_format($param, 2, ',', '.');
  }
}

if (!function_exists('numberFormat')) {
  function numberFormat($value)
  {
    $value = floatval($value);
    return number_format($value, 2, ',', '.');
  }
}

if (!function_exists('FormatInt')) {
  function FormatInt($value)
  {
    $value = floatval($value);
    return number_format($value, 0, ',', '.');
  }
}

if (!function_exists('cutString')) {
  function cutString($text, $maxchar, $separator, $end = '...')
  {
    if (strlen($text) > $maxchar) {
      $words = preg_split('/\\' . $separator . '/', $text);
      $output = '';
      $i      = 0;
      while (1) {
        $length = strlen($output) + strlen($words[$i]);
        if ($length > $maxchar) {
          break;
        } else {
          $output .= $words[$i] . $separator;
          ++$i;
        }
      }
      $output .= $end;
    } else {
      $output = $text;
    }
    return $output;
  }
}


if (!function_exists('GetKategori')) {
  function GetKategori($id)
  {
    $kategori = DB::table('tbl_master_kategori')->where('id', $id)->first();
    $kat = '';
    if ($kategori) {
      $kat = $kategori->kategori;
    }
    return $kat;
  }
}

if (!function_exists('GetParameter')) {
  function GetParameter($id)
  {
    $parameter = DB::table('tbl_master_parameter')->where('id', $id)->first();
    $param = '';
    if ($parameter) {
      $param = $parameter->parameter;
    }
    return $param;
  }
}

if (!function_exists('GetMateril')) {
  function GetMateril($id)
  {
    $materiil = DB::table('tbl_master_materiil')->where('id', $id)->first();
    $mat = '';
    if ($materiil) {
      $mat = $materiil->materiil;
    }
    return $mat;
  }
}

if (!function_exists('GetKodam')) {
  function GetKodam($id)
  {
    $kodam = DB::table('tbl_master_kodam')->where('id', $id)->first();
    $kodm = '';
    if ($kodam) {
      $kodm = $kodam->nama_kodam;
    }
    return $kodm;
  }
}

if (!function_exists('GetPotensiDemografi')) {
  function GetPotensiDemografi($id)
  {
    $potensi = DB::table('tbl_master_demografi_potensi')->where('id', $id)->first();
    $poten = '';
    if ($potensi) {
      $poten = $potensi->nama_potensi;
    }
    return $poten;
  }
}

if (!function_exists('GetPotensiGeografi')) {
  function GetPotensiGeografi($id)
  {
    $potensi = DB::table('tbl_master_geografi_potensi')->where('id', $id)->first();
    $poten = '';
    if ($potensi) {
      $poten = $potensi->nama_potensi;
    }
    return $poten;
  }
}

if (!function_exists('GetPotensiKPN')) {
  function GetPotensiKPN($id)
  {
    $potensi = DB::table('tbl_master_komp_pertahanan_negara_potensi')->where('id', $id)->first();
    $poten = '';
    if ($potensi) {
      $poten = $potensi->nama_potensi;
    }
    return $poten;
  }
}

if (!function_exists('GetPotensiLogistikWilayah')) {
  function GetPotensiLogistikWilayah($id)
  {
    $potensi = DB::table('tbl_master_logistik_wilayah_potensi')->where('id', $id)->first();
    $poten = '';
    if ($potensi) {
      $poten = $potensi->nama_potensi;
    }
    return $poten;
  }
}

if (!function_exists('GetPotensiSDAB')) {
  function GetPotensiSDAB($id)
  {
    $potensi = DB::table('tbl_master_sdab_potensi')->where('id', $id)->first();
    $poten = '';
    if ($potensi) {
      $poten = $potensi->nama_potensi;
    }
    return $poten;
  }
}

if (!function_exists('GetPotensiSarprasnas')) {
  function GetPotensiSarprasnas($id)
  {
    $potensi = DB::table('tbl_master_sarprasnas_potensi')->where('id', $id)->first();
    $poten = '';
    if ($potensi) {
      $poten = $potensi->nama_potensi;
    }
    return $poten;
  }
}
if (!function_exists('GetPotensiKondisiSosial')) {
  function GetPotensiKondisiSosial($id)
  {
    $potensi = DB::table('tbl_master_kondisi_sosial_potensi')->where('id', $id)->first();
    $poten = '';
    if ($potensi) {
      $poten = $potensi->nama_potensi;
    }
    return $poten;
  }
}


//BABINSA
if (!function_exists('getKorem')) {
  function getKorem($id)
  {
    $data = DB::table('tbl_master_korem')->where('id', $id)->first();
    $hasil = ($data) ? $data->korem : 'Error';

    return $hasil;
  }
}

if (!function_exists('getKodim')) {
  function getKodim($id)
  {
    $data = DB::table('tbl_master_kodim')->where('id', $id)->first();
    $hasil = ($data) ? $data->kodim : 'Error';

    return $hasil;
  }
}

if (!function_exists('datakoramil')) {
  function datakoramil($id)
  {
    $data = DB::table('tbl_master_koramil')->where('id', $id)->first();
    $hasil = ($data) ? $data->nama_koramil : 'Error';
    // dd($hasil);
    return $hasil;
  }
}

if (!function_exists('countBabinsa')) {
  function countBabinsa($id, $div, $tw, $tahun, $status)
  {
    $where = ($div == 'kodam') ? 'kodam_id' : 'korem_id';
    $data = DB::table('tbl_teritorial_paban2_jumlah_apwil_babinsa')->select(DB::raw('SUM(cast(dspp as double precision)) as jml_dspp'), DB::raw('SUM(cast(nyata as double precision)) as jml_nyata'))->where($where, $id)->where('tw', $tw)->where('tahun', $tahun)->where('status', $status)->first();

    return $data;
  }
}
//END

//BABINPOTMAR
if (!function_exists('getKoarmada')) {
  function getKoarmada($id)
  {
    $data = DB::table('tbl_master_koarmada')->where('id', $id)->first();
    $hasil = ($data) ? $data->nama_koarmada : 'Error';
    return $hasil;
  }
}

if (!function_exists('getLantamal')) {
  function getLantamal($id)
  {
    $data = DB::table('tbl_master_lantamal')->where('id', $id)->first();
    $hasil = ($data) ? $data->nama_lantamal : 'Error';

    return $hasil;
  }
}

if (!function_exists('getLanal')) {
  function getLanal($id)
  {
    $data = DB::table('tbl_master_lanal')->where('id', $id)->first();
    $hasil = ($data) ? $data->nama_lanal : 'Error';

    return $hasil;
  }
}
if (!function_exists('getposal')) {
  function getposal($id)
  {
    $data = DB::table('tbl_master_posal')->where('id', $id)->first();
    $hasil = ($data) ? $data->nama_posal : 'Error';

    return $hasil;
  }
}

if (!function_exists('countBabinpotmar')) {
  function countBabinpotmar($id, $div, $tw, $tahun, $status)
  {
    $where = ($div == 'koarmada') ? 'koarmada_id' : 'lantamal_id';
    $data = DB::table('tbl_teritorial_paban2_jumlah_apwil_babinpotmar')->select(DB::raw('SUM(cast(dspp as double precision)) as jml_dspp'), DB::raw('SUM(cast(nyata as double precision)) as jml_nyata'))->where($where, $id)->where('tw', $tw)->where('tahun', $tahun)->where('status', $status)->first();

    return $data;
  }
}
//END

//BABINPOTDIRGA
if (!function_exists('getKoopsau')) {
  function getKoopsau($id)
  {
    $data = DB::table('tbl_master_koopsau')->where('id', $id)->first();
    $hasil = ($data) ? $data->nama_koopsau : 'Error';
    return $hasil;
  }
}

if (!function_exists('getTipeLanud')) {
  function getTipeLanud($id)
  {
    $data = DB::table('tbl_master_tipe_lanud')->where('id', $id)->first();
    $hasil = ($data) ? $data->nama_tipe_lanud : 'Error';

    return $hasil;
  }
}

if (!function_exists('getLanud')) {
  function getLanud($id)
  {
    $data = DB::table('tbl_master_lanud')->where('id', $id)->first();
    $hasil = ($data) ? $data->nama_lanud : 'Error';

    return $hasil;
  }
}

if (!function_exists('countBabinpotdirga')) {
  function countBabinpotdirga($id, $div, $tw, $tahun, $status)
  {
    $where = ($div == 'koopsau') ? 'koopsau_id' : 'tipe_lanud_id';
    $data = DB::table('tbl_teritorial_paban2_jumlah_apwil_babinpotdirga')->select(DB::raw('SUM(cast(dspp as double precision)) as jml_dspp'), DB::raw('SUM(cast(nyata as double precision)) as jml_nyata'))->where($where, $id)->where('tw', $tw)->where('tahun', $tahun)->where('status', $status)->first();

    return $data;
  }
}
//END

if (!function_exists('getTW')) {
  function getTW($id)
  {
    switch ($id) {
      case '1':
        $data = 'I';
        break;
      case '2':
        $data = 'II';
        break;
      case '3':
        $data = 'III';
        break;
      case '4':
        $data = 'IV';
        break;
      default:
        $data = '';
    }

    return $data;
  }
}

if (!function_exists('getIdBabinsa')) {
  function getIdBabinsa($nama, $kondisi)
  {
    if ($kondisi == "kodam") {
      $table = 'kodam';
      $where = 'nama_kodam';
    } else if ($kondisi == "korem") {
      $table = 'korem';
      $where = 'korem';
    } else {
      $table = 'kodim';
      $where = 'kodim';
    }
    $data = DB::table('tbl_master_' . $table)->where($where, $nama)->first();
    $hasil = ($data) ? $data->id : 0;

    return $hasil;
  }
}

if (!function_exists('getIdBabinpotmar')) {
  function getIdBabinpotmar($nama, $kondisi)
  {
    if ($kondisi == "koarmada") {
      $table = 'koarmada';
      $where = 'nama_koarmada';
    } else if ($kondisi == "lantamal") {
      $table = 'lantamal';
      $where = 'nama_lantamal';
    } else {
      $table = 'lanal';
      $where = 'nama_lanal';
    }
    $data = DB::table('tbl_master_' . $table)->where($where, $nama)->first();
    $hasil = ($data) ? $data->id : 0;

    return $hasil;
  }
}

if (!function_exists('getIdBabinpotdirga')) {
  function getIdBabinpotdirga($nama, $kondisi)
  {
    if ($kondisi == "koopsau") {
      $table = 'koopsau';
      $where = 'nama_koopsau';
    }

    $data = DB::table('tbl_master_' . $table)->where($where, $nama)->first();
    $hasil = ($data) ? $data->id : 0;

    return $hasil;
  }
}

if (!function_exists('getTLanud')) {
  function getTLanud($koopsau, $tipe_lanud)
  {
    $koop = DB::table('tbl_master_koopsau')->where('nama_koopsau', $koopsau)->first();
    $data = DB::table('tbl_master_tipe_lanud')->where('nama_tipe_lanud', $tipe_lanud)->where('id_koopsau', $koop->id)->first();
    $hasil = ($data) ? $data->id : 0;

    return $hasil;
  }
}

if (!function_exists('getLan')) {
  function getLan($koopsau, $tipe_lanud, $lanud)
  {
    $koop = DB::table('tbl_master_koopsau')->where('nama_koopsau', $koopsau)->first();
    $tLanud = DB::table('tbl_master_tipe_lanud')->where('nama_tipe_lanud', $tipe_lanud)->where('id_koopsau', $koop->id)->first();
    $data = DB::table('tbl_master_lanud')->where('id_tipe_lanud', $tLanud->id)->where('nama_lanud', $lanud)->first();
    $hasil = ($data) ? $data->id : 0;

    return $hasil;
  }
}


// PABAN V BAKTI TNI
if (!function_exists('GetTMMDBagian')) {
  function GetTMMDBagian($id)
  {
    $bagian = DB::table('tbl_master_tmmd_bagian')->where('id', $id)->first();
    $bag = '';
    if ($bagian) {
      $bag = $bagian->nama_bagian;
    }
    return $bag;
  }
}

if (!function_exists('GetKarbakBagian')) {
  function GetKarbakBagian($id)
  {
    $bagian = DB::table('tbl_master_karbak_bagian')->where('id', $id)->first();
    $bag = '';
    if ($bagian) {
      $bag = $bagian->nama_bagian;
    }
    return $bag;
  }
}

if (!function_exists('GetKotama')) {
  function GetKotama($id)
  {
    $kotama = DB::table('tbl_master_kotama')->where('id', $id)->first();
    $kot = '';
    if ($kotama) {
      $kot = $kotama->nama_kotama;
    }
    return $kot;
  }
}

if (!function_exists('GetTMMDJenis')) {
  function GetTMMDJenis($id)
  {
    $jenis = DB::table('tbl_master_tmmd_jenis')->where('id', $id)->first();
    $jen = '';
    if ($jenis) {
      $jen = $jenis->nama_jenis;
    }
    return $jen;
  }
}

if (!function_exists('GetOpsterJenis')) {
  function GetOpsterJenis($id)
  {
    $jenis = DB::table('tbl_master_opster_jenis')->where('id', $id)->first();
    $jen = '';
    if ($jenis) {
      $jen = $jenis->nama_jenis;
    }
    return $jen;
  }
}

if (!function_exists('GetKarbakJenis')) {
  function GetKarbakJenis($id)
  {
    $jenis = DB::table('tbl_master_karbak_jenis')->where('id', $id)->first();
    $jen = '';
    if ($jenis) {
      $jen = $jenis->nama_jenis;
    }
    return $jen;
  }
}

if (!function_exists('getKabupaten')) {
  function getKabupaten($kode_kabupaten)
  {
    $data = DB::table('master_kabupaten')->where('kode_kabupaten', $kode_kabupaten)->first();
    $hasil = ($data) ? $data->nama_kabupaten : 'Error';

    return $hasil;
  }
}

if (!function_exists('getKecamatan')) {
  function getKecamatan($kode_kecamatan)
  {
    $data = DB::table('master_kecamatan')->where('kode_kecamatan', $kode_kecamatan)->first();
    $hasil = ($data) ? $data->nama_kecamatan : 'Error';

    return $hasil;
  }
}

if (!function_exists('getKelurahan')) {
  function getKelurahan($kode_kelurahan)
  {
    $data = DB::table('master_kelurahan')->where('kode_kelurahan', $kode_kelurahan)->first();
    $hasil = ($data) ? $data->nama_kelurahan : 'Error';

    return $hasil;
  }
}

if (!function_exists('GetStatus')) {
  function GetStatus($id)
  {
    $status = DB::table('tbl_master_status')->where('id', $id)->first();
    $stat = '';
    if ($status) {
      $stat = $status->nama_status;
    }
    return $stat;
  }
}

if (!function_exists('GetWiltasKaltim1')) {
  function GetWiltasKaltim1($id)
  {
    $kaltim_1 = DB::table('tbl_master_wilayah_perbatasan_kaltim_1')->where('id', $id)->first();
    $kal = '';
    if ($kaltim_1) {
      $kal = $kaltim_1->nama_wilayah;
    }
    return $kal;
  }
}

if (!function_exists('GetWiltasKaltim2')) {
  function GetWiltasKaltim2($id)
  {
    $kaltim_2 = DB::table('tbl_master_wilayah_perbatasan_kaltim_2')->where('id', $id)->first();
    $kal = '';
    if ($kaltim_2) {
      $kal = $kaltim_2->nama_wilayah;
    }
    return $kal;
  }
}

if (!function_exists('GetWiltasKalbar')) {
  function GetWiltasKalbar($id)
  {
    $kalbar = DB::table('tbl_master_wilayah_perbatasan_kalbar')->where('id', $id)->first();
    $kal = '';
    if ($kalbar) {
      $kal = $kalbar->nama_wilayah;
    }
    return $kal;
  }
}

if (!function_exists('GetWiltasRIRDTL')) {
  function GetWiltasRIRDTL($id)
  {
    $ri_rdtl = DB::table('tbl_master_wilayah_perbatasan_ri_rdtl')->where('id', $id)->first();
    $ri = '';
    if ($ri_rdtl) {
      $ri = $ri_rdtl->nama_wilayah;
    }
    return $ri;
  }
}

if (!function_exists('GetWiltasRIPNG')) {
  function GetWiltasRIPNG($id)
  {
    $ri_png = DB::table('tbl_master_wilayah_perbatasan_ri_png')->where('id', $id)->first();
    $ri = '';
    if ($ri_png) {
      $ri = $ri_png->nama_wilayah;
    }
    return $ri;
  }
}

// User, Menu Management
if (!function_exists('cekStatusMenu')) {
  function cekStatusMenu($menu, $jenis_user)
  {
    $data = DB::table('permission')
      ->select('status')
      ->where('id_menu', $menu)
      ->where('id_group_user', $jenis_user)
      ->first();
    return $data;
  }
}
// Input "nama menu", output "user_group" yang memiliki permission
if (!function_exists('getGroupMenu')) {
  function getGroupMenu($namaMenu)
  {
    $menu = DB::table('menu')
      ->select('id')
      ->where('name', $namaMenu)
      ->first();
    $permission = DB::table('permission')
      ->select('id_group_user')
      ->where('id_menu', $menu->id)
      ->where('status', 1)
      ->get();
    $group = [];
    foreach ($permission as $data) {
      array_push(
        $group,
        DB::table('group_user')
          ->select('group_user')
          ->where('id', $data->id_group_user)
          ->first()
          ->group_user
      );
    }
    return implode(",", $group);
  }
}
// Output "menu" sesuai permission grup
if (!function_exists('getGroupPermission')) {
  function getGroupPermission($idGroup, $urlMenu)
  {
    $permission = DB::table('permission')
      ->leftJoin('menu as menu', 'permission.id_menu', 'menu.id')
      ->where('permission.id_group_user', $idGroup)
      ->where(function ($query) use ($urlMenu) {
        $query->where('menu.url', 'like', $urlMenu . '%')
          ->orWhere('menu.url', NULL);
      })
      ->where('permission.status', 1)
      ->orderBy('order')
      ->get();
    return $permission;
  }
}
if (!function_exists('getChildMenu')) {
  function getChildMenu($idMenu, $urlMenu)
  {
    $childMenu = DB::table('permission')
      ->leftJoin('menu as menu', 'permission.id_menu', 'menu.id')
      ->where('menu.parent', $idMenu)
      ->where('permission.id_group_user', Auth::user()->id_group_user)
      ->where('url', 'like', $urlMenu . '%')
      ->where('permission.status', 1)
      ->orderBy('order')
      ->get();
    return $childMenu;
  }
}
if (!function_exists('getUserGroupName')) {
  function getUserGroupName($idUser)
  {
    $namaGroup = DB::table('group_user')
      ->where('id', $idUser)
      ->first()
      ->group_user;
    return $namaGroup;
  }
}

//DISLOKASI
if (!function_exists('getDataKotama')) {
  function getDataKotama($jenis, $id_kotama = null, $id_korem = null)
  {
    $data = null;

    if ($jenis == 'AD' || $jenis == 1) {
      $data['kotama'] = DB::table('tbl_master_kodam')->select('id', 'nama_kodam as nama_kotama')->orderBy('id', 'asc')->get();
      $data['satker'] = DB::table('tbl_master_korem')->select('id', 'korem as nama')->where('id_kodam', $id_kotama)->orderBy('id', 'ASC')->get();
      $data['subsatker'] = DB::table('tbl_master_kodim')->select('id', 'kodim as nama')->where('id_korem', $id_korem)->orderBy('id', 'ASC')->get();
    } else if ($jenis == 'AU' || $jenis == 2) {
      $data['kotama'] = DB::table('tbl_master_koopsau')->select('id', 'nama_koopsau as nama_kotama')->orderBy('id', 'asc')->get();
      $data['satker'] = DB::table("tbl_master_tipe_lanud")->select('id', 'nama_tipe_lanud as nama')->where('id_koopsau', $id_kotama)->orderBy('id', 'ASC')->get();
      $data['subsatker'] = DB::table("tbl_master_lanud")->select('id', 'nama_lanud as nama')->where('id_tipe_lanud', $id_korem)->orderBy('id', 'ASC')->get();
    } else if ($jenis == 'AL' || $jenis == 3) {
      $data['kotama'] = DB::table('tbl_master_koarmada')->select('id', 'nama_koarmada as nama_kotama')->orderBy('id', 'asc')->get();
      $data['satker'] = DB::table("tbl_master_lantamal")->select('id', 'nama_lantamal as nama')->where('id_koarmada', $id_kotama)->orderBy('id', 'ASC')->get();
      $data['subsatker'] = DB::table("tbl_master_lanal")->select('id', 'nama_lanal as nama')->where('id_lantamal', $id_korem)->orderBy('id', 'ASC')->get();
    }
    return $data;
  }
}

if (!function_exists('namaKotama')) {
  function namaKotama($jenis, $id, $lainya = null)
  {
    $data = null;
    if ($jenis == 'AD' || $jenis == 1) {
      $data = DB::table('tbl_master_kodam')->select('id', 'nama_kodam as nama_kotama', 'kode_provinsi')->where('id', $id)->first();
    } else if ($jenis == 'AU' || $jenis == 2) {
      $data = DB::table('tbl_master_koopsau')->select('id', 'nama_koopsau as nama_kotama', 'kode_provinsi')->where('id', $id)->first();
    } else if ($jenis == 'AL' || $jenis == 3) {
      $data = DB::table('tbl_master_koarmada')->select('id', 'nama_koarmada as nama_kotama', 'kode_provinsi')->where('id', $id)->first();
    }

    if ($lainya == 1) {
      return $data->kode_provinsi;
    } else {
      return $data->nama_kotama;
    }
  }
}

if (!function_exists('getWilKotama')) {
  function getWilKotama($kotama, $jenis, $jn)
  {
    if ($jenis == 'AD' || $jenis == 1) {
      $dat = DB::table('tbl_master_kodam')->where('id', $kotama)->first();
    } else if ($jenis == 'AU' || $jenis == 2) {
      $dat = DB::table('tbl_master_koopsau')->where('id', $kotama)->first();
    } else if ($jenis == 'AL' || $jenis == 3) {
      $dat = DB::table('tbl_master_koarmada')->where('id', $kotama)->first();
    }

    $prov = null;
    $kab = null;
    $kec = null;
    $kel = null;
    if ($dat) {
      $prov = $dat->kode_provinsi;
      $kab = $dat->kode_kabupaten;
      $kec = $dat->kode_kecamatan;
      $kel = $dat->kode_kelurahan;
    }

    if ($jn == 1) {
      return $prov;
    } else if ($jn == 2) {
      return $kab;
    } else if ($jn == 3) {
      return $kec;
    } else {
      return $kel;
    }
  }
}

if (!function_exists('getNamaBagian')) {
  function getNamaBagian($bg)
  {
    $data = DB::table('tbl_master_tmmd_bagian')->where('id', $bg)->first();
    $nama = '';
    if ($data) {
      $nama = $data->nama_bagian;
    }
    return $nama;
  }
}

if (!function_exists('notif')) {
  function notif($id_group_user)
  {
    $user_id = Auth::user()->id;
    $array_activity_log_id_read = DB::table('audit.read_messages')->where('user_id', $user_id)->pluck('activity_log_id')->all();

    $query = ActivityLog::select('*', 'audit.activity_logs.id as id_notifikasi', 'users.name as nama_satker', 'audit.activity_logs.created_at as log_created_at')
      ->join('users', 'audit.activity_logs.created_by', '=', 'users.id')
      ->whereNotIn('audit.activity_logs.id', $array_activity_log_id_read)
      ->where('apps', config('app.name'));
    if (in_array(Auth::user()->group->group_user, explode(',', config('global.admin_group')))) {
      // JIKA USER NYA: ASOPS MABES TNI / ADMIN ASOPS MABES TNI
      $isi_notif = $query->orderBy('audit.activity_logs.id', 'desc')->limit(10)->get();
    } else {
      $isi_notif = $query->where('users.id_group_user', $id_group_user)->orderBy('audit.activity_logs.id', 'desc')->limit(10)->get();
    }
    return $isi_notif;
  }
}

if (!function_exists('all_notif')) {
  function all_notif($id_group_user)
  {
    $user_id = Auth::user()->id;
    $array_activity_log_id_read = DB::table('audit.read_messages')->where('user_id', $user_id)->pluck('activity_log_id')->all();

    $query = ActivityLog::select('*', 'audit.activity_logs.id as id_notifikasi', 'users.name as nama_satker', 'audit.activity_logs.created_at as log_created_at')
      ->join('users', 'audit.activity_logs.created_by', '=', 'users.id')
      ->whereNotIn('audit.activity_logs.id', $array_activity_log_id_read)
      ->where('apps', config('app.name'));
    if (in_array(Auth::user()->group->group_user, explode(',', config('global.admin_group')))) {
      // JIKA USER NYA: ASOPS MABES TNI / ADMIN ASOPS MABES TNI
      $isi_notif = $query->orderBy('audit.activity_logs.id', 'desc')->get();
    } else {
      $isi_notif = $query->where('users.id_group_user', $id_group_user)->orderBy('audit.activity_logs.id', 'desc')->get();
    }
    return $isi_notif;
  }
}
if (!function_exists('getGroupUserName')) {
  function getGroupUserName($id)
  {
    $data = DB::table('group_user')->where('id', $id)->first();

    return ($data) ? $data->group_user : 'Group User Tidak Ditemukan';
  }
}

if (!function_exists('get_data_related_to_user')) {
  function get_data_related_to_user($id_master_group)
  {
    $array_group_user = GroupUser::where('id_master_group', $id_master_group)->pluck('id')->toArray();
    $array_user = Users::whereIn('id_group_user', $array_group_user)->pluck('id')->toArray();
    return $array_user;
  }
}
