<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Mahasiswa extends Model
{
    use HasFactory;

    public static function pdflogbimbingan($id_mhs,$id_dospem){

        $dt_mhs   = collect(\DB::select("SELECT * FROM users WHERE id='$id_mhs'"))->first();
        $dt_dospem   = collect(\DB::select("SELECT * FROM users WHERE id='$id_dospem'"))->first();

        $dataloop   = [];
        $data       = DB::table('trx_log_bimbingan')->where('id_mhs', $id_mhs)->where('id_dospem', $id_dospem)->get();
        foreach($data as $key => $val){
            $dataloop[$key]['tanggal'] = $val->tanggal;
            $dataloop[$key]['catatan'] = $val->catatan;
            $dataloop[$key]['plant'] = $val->plant;
        }


        $arr['nama_mhs']    = $dt_mhs->name;
        $arr['nim_mhs']     = $dt_mhs->nik;

        $arr['nama_dospem'] = $dt_dospem->name;
        $arr['nip_dospem']   = $dt_dospem->nik;
        $arr['ttd_dospem']  = $dt_dospem->ttd;

        $arr['data_loop']   = $dataloop;



        return $arr;
    }

    public static function pdfsidangta($id,$id_mhs,$id_dospem){

        $data   = collect(\DB::select("SELECT * FROM trx_setting_bimbingan WHERE id_mhs='$id_mhs' AND id_dospej_1='$id_dospem'"))->first();

        $mhs        = collect(\DB::select("SELECT * FROM users WHERE id='$data->id_mhs'"))->first();
        $nama_mhs   = $mhs->name;
        $nim_mhs    = $mhs->nik;

        $arr_dospem_1   = collect(\DB::select("SELECT * FROM users WHERE id='$data->id_dospem_1'"))->first();
        $dospem1        = $arr_dospem_1->name;
        $nip_dospem1    = $arr_dospem_1->nik;
        $ttd_dospem1    = $arr_dospem_1->ttd;

        if($data->id_dospem_2 == null){
            $dospem2        = '-';
            $nip_dospem2    = '-';
            $ttd_dospem2    = '-';
        }else{
            $arr_dospem_2           = collect(\DB::select("SELECT * FROM users WHERE id='$data->id_dospem_2'"))->first();
            $dospem2        = $arr_dospem_2->name;
            $nip_dospem2    = $arr_dospem_2->nik;
            $ttd_dospem2    = $arr_dospem_2->ttd;
        }

        if($data->id_dospej_1 == null){
            $dospej1        = '-';
            $nip_dospej1    = '-';
            $ttd_dospej1    = '-';
        }else{
            $arr_dospej_1           = collect(\DB::select("SELECT * FROM users WHERE id='$data->id_dospej_1'"))->first();
            $dospej1        = $arr_dospej_1->name;
            $nip_dospej1    = $arr_dospej_1->nik;
            $ttd_dospej1    = $arr_dospej_1->ttd;
        }

        if($data->id_dospej_2 == null){
            $dospej2        = '-';
            $nip_dospej2    = '-';
            $ttd_dospej2    = '-';
        }else{
            $arr_dospem_2           = collect(\DB::select("SELECT * FROM users WHERE id='$data->id_dospej_2'"))->first();
            $dospej2        = $arr_dospej_2->name;
            $nip_dospej2    = $arr_dospej_2->nik;
            $ttd_dospej2    = $arr_dospej_2->ttd;
        }

        if($data->id_dospej_3 == null){
            $dospej3        = '-';
            $nip_dospej3    = '-';
            $ttd_dospej3    = '-';
        }else{
            $arr_dospem_3           = collect(\DB::select("SELECT * FROM users WHERE id='$data->id_dospej_3'"))->first();
            $dospej3        = $arr_dospej_3->name;
            $nip_dospej3    = $arr_dospej_3->nik;
            $ttd_dospej3    = $arr_dospej_3->ttd;
        }

        $ket_sid     = collect(\DB::select("SELECT * FROM trx_ba_sidang WHERE id_mhs='$id_mhs' AND id_dospem='$id_dospem'"))->first();

        $arr['nama_mhs']    = $nama_mhs;
        $arr['nim_mhs']     = $nim_mhs;
        $arr['tanggal_sidang']    = $ket_sid->tanggal;
        $arr['judul']       = $ket_sid->judul;
        $arr['dospem1']     = $dospem1;
        $arr['nip_dospem1']     = $nip_dospem1;
        $arr['dospem2']     = $dospem2;
        $arr['nip_dospem2']     = $nip_dospem2;
        $arr['dospej1']     = $dospej1;
        $arr['nip_dospej1']     = $nip_dospej1;
        $arr['dospej2']     = $dospej2;
        $arr['nip_dospej2']     = $nip_dospej2;
        $arr['dospej3']     = $dospej3;
        $arr['nip_dospej3']    = $nip_dospej3;
        $arr['ttd_dospem1']    = $ttd_dospem1;
        $arr['ttd_dospem2']    = $ttd_dospem2;
        $arr['ttd_dospem3']    = $ttd_dospej1;
        $arr['ttd_dospem4']    = $ttd_dospej2;
        $arr['ttd_dospem5']    = $ttd_dospej3;
        $arr['hasil_sidang']   = $ket_sid->hasil;
        $arr['catatan']   = $ket_sid->catatan;

        return $arr;
    }

    public static function pdfseminar($id_mhs){

        $data   = DB::table('trx_ba_seminar')->where('id_mhs', $id_mhs)->where('status', 2)->where('is_active', 1)->get();
        $dt_mhs = collect(\DB::select("SELECT * FROM users WHERE id='$id_mhs'"))->first();
        // $data   = collect(\DB::select("SELECT * FROM trx_setting_bimbingan WHERE id_mhs='$id_mhs' AND id_dospej_1='$id_dospem' AND is_active='1'"))->first();

        $dt     = [];
        foreach($data as $key => $val){
            $tanggal_sidang = $val->tanggal;
            $judul          = $val->judul;

            $dp1   = collect(\DB::select("SELECT * FROM trx_setting_bimbingan WHERE id_mhs='$id_mhs' AND id_dospem_1='$val->id_dospem' AND is_active='1'"))->first();
            $dp2   = collect(\DB::select("SELECT * FROM trx_setting_bimbingan WHERE id_mhs='$id_mhs' AND id_dospem_2='$val->id_dospem' AND is_active='1'"))->first();
            $dj1   = collect(\DB::select("SELECT * FROM trx_setting_bimbingan WHERE id_mhs='$id_mhs' AND id_dospej_1='$val->id_dospem' AND is_active='1'"))->first();
            $dj2   = collect(\DB::select("SELECT * FROM trx_setting_bimbingan WHERE id_mhs='$id_mhs' AND id_dospej_2='$val->id_dospem' AND is_active='1'"))->first();
            $dj3   = collect(\DB::select("SELECT * FROM trx_setting_bimbingan WHERE id_mhs='$id_mhs' AND id_dospej_3='$val->id_dospem' AND is_active='1'"))->first();

            $ttd   = collect(\DB::select("SELECT * FROM users WHERE id='$val->id_dospem'"))->first();
            if($dp1){
                $dt['dt_dospem_catatan_1'] = $val->catatan;
                $dt['dt_dospem_ttd_1'] = $ttd->ttd;
                $dt['dt_dospem_name_1'] = $ttd->name;
                $dt['dt_dospem_nip_1'] = $ttd->nik;
            }elseif($dp2){
                $dt['dt_dospem_catatan_2'] = $val->catatan;
                $dt['dt_dospem_ttd_2'] = $ttd->ttd;
                $dt['dt_dospem_name_2'] = $ttd->name;
                $dt['dt_dospem_nip_2'] = $ttd->nik;
            }elseif($dj1){
                $dt['dt_dospem_catatan_3'] = $val->catatan;
                $dt['dt_dospem_ttd_3'] = $ttd->ttd;
                $dt['dt_dospem_name_3'] = $ttd->name;
                $dt['dt_dospem_nip_3'] = $ttd->nik;
            }elseif($dj2){
                $dt['dt_dospem_catatan_4'] = $val->catatan;
                $dt['dt_dospem_ttd_4'] = $ttd->ttd;
                $dt['dt_dospem_name_4'] = $ttd->name;
                $dt['dt_dospem_nip_4'] = $ttd->nik;
            }elseif($dj3){
                $dt['dt_dospem_catatan_5'] = $val->catatan;
                $dt['dt_dospem_ttd_5'] = $ttd->ttd;
                $dt['dt_dospem_name_5'] = $ttd->name;
                $dt['dt_dospem_nip_5'] = $ttd->nik;
            }
        }

        $arr['nama_mhs']    = $dt_mhs->name;
        $arr['nim_mhs']     = $dt_mhs->nik;
        $arr['judul']       = $judul;
        $arr['tanggal_sidang']    = $tanggal_sidang;
        $arr['data']        = $dt;


        return $arr;
    }


}
