<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Admin extends Model
{
    use HasFactory;

    public static function getdatasettingpembimbing(){

        $data   = DB::table('trx_setting_bimbingan')->where('is_active', 1)->get();
        $arr    = [];
        foreach($data as $key => $val){
            $arr[$key]['id']  = $val->id;

            $mhs                    = collect(\DB::select("SELECT * FROM users WHERE id='$val->id_mhs'"))->first();
            $arr[$key]['name_mhs']  = $mhs->nik.' - '.$mhs->name;

            $arr_dospem_1           = collect(\DB::select("SELECT * FROM users WHERE id='$val->id_dospem_1'"))->first();
            $arr[$key]['name_dospem1']  = $arr_dospem_1->nik.' - '.$arr_dospem_1->name;

            if($val->id_dospem_2 == null){
                $arr[$key]['name_dospem2']  = '-';
            }else{
                $arr_dospem_2           = collect(\DB::select("SELECT * FROM users WHERE id='$val->id_dospem_2'"))->first();
                $arr[$key]['name_dospem2']  = $arr_dospem_2->nik.' - '.$arr_dospem_2->name;
            }

            if($val->id_dospej_1 == null){
                $arr[$key]['name_dospej1']  = '-';
            }else{
                $arr_dospej_1           = collect(\DB::select("SELECT * FROM users WHERE id='$val->id_dospej_1'"))->first();
                $arr[$key]['name_dospej1']  = $arr_dospej_1->nik.' - '.$arr_dospej_1->name;
            }

            if($val->id_dospej_2 == null){
                $arr[$key]['name_dospej2']  = '-';
            }else{
                $arr_dospej_2           = collect(\DB::select("SELECT * FROM users WHERE id='$val->id_dospej_2'"))->first();
                $arr[$key]['name_dospej2']  = $arr_dospej_2->nik.' - '.$arr_dospej_2->name;
            }

            if($val->id_dospej_3 == null){
                $arr[$key]['name_dospej3']  = '-';
            }else{
                $arr_dospej_3           = collect(\DB::select("SELECT * FROM users WHERE id='$val->id_dospej_3'"))->first();
                $arr[$key]['name_dospej3']  = $arr_dospej_3->nik.' - '.$arr_dospej_3->name;
            }

        }

        return $arr;
    }


    public static function getdatarubrikpenilaian(){

        $data   = DB::table('trx_setting_bimbingan')->where('is_active', 1)->get();
        $dt    = [];
        foreach($data as $key => $val){
            $dt[$key]['id']  = $val->id;

            $mhs                    = collect(\DB::select("SELECT * FROM users WHERE id='$val->id_mhs'"))->first();
            $dt[$key]['name_mhs']  = $mhs->nik.' - '.$mhs->name;

            $arr_dospem_1           = collect(\DB::select("SELECT * FROM users WHERE id='$val->id_dospem_1'"))->first();
            $dt[$key]['name_dospem1']  = $arr_dospem_1->nik.' - '.$arr_dospem_1->name;

            if($val->id_dospem_2 == null){
                $dt[$key]['name_dospem2']  = '-';
            }else{
                $arr_dospem_2           = collect(\DB::select("SELECT * FROM users WHERE id='$val->id_dospem_2'"))->first();
                $dt[$key]['name_dospem2']  = $arr_dospem_2->nik.' - '.$arr_dospem_2->name;
            }

            if($val->id_dospej_1 == null){
                $dt[$key]['name_dospej1']  = '-';
            }else{
                $arr_dospej_1           = collect(\DB::select("SELECT * FROM users WHERE id='$val->id_dospej_1'"))->first();
                $dt[$key]['name_dospej1']  = $arr_dospej_1->nik.' - '.$arr_dospej_1->name;
            }

            if($val->id_dospej_2 == null){
                $dt[$key]['name_dospej2']  = '-';
            }else{
                $arr_dospej_2           = collect(\DB::select("SELECT * FROM users WHERE id='$val->id_dospej_2'"))->first();
                $dt[$key]['name_dospej2']  = $arr_dospej_2->nik.' - '.$arr_dospej_2->name;
            }

            if($val->id_dospej_3 == null){
                $dt[$key]['name_dospej3']  = '-';
            }else{
                $arr_dospej_3           = collect(\DB::select("SELECT * FROM users WHERE id='$val->id_dospej_3'"))->first();
                $dt[$key]['name_dospej3']  = $arr_dospej_3->nik.' - '.$arr_dospej_3->name;
            }

        }

        $arr = [];
        $no =  1;
        foreach($dt as $key => $val){
            $arr[$key]['no']  = $no++;
            $arr[$key]['id']  = $val['id'];
            $arr[$key]['name_mhs']  = $val['name_mhs'];

            $id     = $val['id'];
            $dt1    = collect(\DB::select("SELECT * FROM trx_setting_bimbingan WHERE id='$id'"))->first();

            $id_mhs     = $dt1->id_mhs;
            $id_dospem  = $dt1->id_dospem_1;
            $dt_pb1     = collect(\DB::select("SELECT * FROM trx_rb_bimbingan WHERE id_mhs='$id_mhs' AND id_dospem='$id_dospem'"))->first();
            if($dt_pb1){
                $arr[$key]['nib1']  = round(($dt_pb1->nilai_sp1_1+$dt_pb1->nilai_sp1_2+$dt_pb1->nilai_sp1_3+$dt_pb1->nilai_sp1_4+$dt_pb1->nilai_sp1_5+$dt_pb1->nilai_sp1_6)/6);
                $arr[$key]['nij1']  = round(($dt_pb1->nilai_sp2_1+$dt_pb1->nilai_sp2_2+$dt_pb1->nilai_sp2_3)/3);

                $nkpem_bim1 = round(($dt_pb1->nilai_sp1_1+$dt_pb1->nilai_sp1_2+$dt_pb1->nilai_sp1_3+$dt_pb1->nilai_sp1_4+$dt_pb1->nilai_sp1_5+$dt_pb1->nilai_sp1_6)/6);
                $nkpem_sid1 = round(($dt_pb1->nilai_sp2_1+$dt_pb1->nilai_sp2_2+$dt_pb1->nilai_sp2_3)/3);
            }else{
                $arr[$key]['nib1']  = 0;
                $arr[$key]['nij1']  = 0;

                $nkpem_bim1 = 0;
                $nkpem_sid1 = 0;
            }

            $id_dospem  = $dt1->id_dospem_2;
            $dt_pb2     = collect(\DB::select("SELECT * FROM trx_rb_bimbingan WHERE id_mhs='$id_mhs' AND id_dospem='$id_dospem'"))->first();
            if($dt_pb2){
                $arr[$key]['nib2']  = round(($dt_pb2->nilai_sp1_1+$dt_pb2->nilai_sp1_2+$dt_pb2->nilai_sp1_3+$dt_pb2->nilai_sp1_4+$dt_pb2->nilai_sp1_5+$dt_pb2->nilai_sp1_6)/6);
                $arr[$key]['nij2']  = round(($dt_pb2->nilai_sp2_1+$dt_pb2->nilai_sp2_2+$dt_pb2->nilai_sp2_3)/3);

                $nkpem_bim2 = round(($dt_pb2->nilai_sp1_1+$dt_pb2->nilai_sp1_2+$dt_pb2->nilai_sp1_3+$dt_pb2->nilai_sp1_4+$dt_pb2->nilai_sp1_5+$dt_pb2->nilai_sp1_6)/6);
                $nkpem_sid2 = round(($dt_pb2->nilai_sp2_1+$dt_pb2->nilai_sp2_2+$dt_pb2->nilai_sp2_3)/3);
            }else{
                $arr[$key]['nib2']  = 0;
                $arr[$key]['nij2']  = 0;

                $nkpem_bim2 = 0;
                $nkpem_sid2 = 0;
            }

            $id_dospem  = $dt1->id_dospej_1;
            $dt_pj1     = collect(\DB::select("SELECT * FROM trx_rb_ujian WHERE id_mhs='$id_mhs' AND id_dospem='$id_dospem'"))->first();
            if($dt_pj1){
                $arr[$key]['nipj1']  = round(($dt_pj1->nilai_sp1_1+$dt_pj1->nilai_sp1_2+$dt_pj1->nilai_sp1_3+$dt_pj1->nilai_sp1_4+$dt_pj1->nilai_sp1_5+$dt_pj1->nilai_sp1_6)/6);
                $nkpej_uji1 = round(($dt_pj1->nilai_sp1_1+$dt_pj1->nilai_sp1_2+$dt_pj1->nilai_sp1_3+$dt_pj1->nilai_sp1_4+$dt_pj1->nilai_sp1_5+$dt_pj1->nilai_sp1_6)/6);;
            }else{
                $arr[$key]['nipj1']  = 0;
                $nkpej_uji1 = 0;
            }

            $id_dospem  = $dt1->id_dospej_2;
            $dt_pj2     = collect(\DB::select("SELECT * FROM trx_rb_ujian WHERE id_mhs='$id_mhs' AND id_dospem='$id_dospem'"))->first();
            if($dt_pj2){
                $arr[$key]['nipj2']  = round(($dt_pj2->nilai_sp1_1+$dt_pj2->nilai_sp1_2+$dt_pj2->nilai_sp1_3+$dt_pj2->nilai_sp1_4+$dt_pj2->nilai_sp1_5+$dt_pj2->nilai_sp1_6)/6);
                $nkpej_uji2 = round(($dt_pj2->nilai_sp1_1+$dt_pj2->nilai_sp1_2+$dt_pj2->nilai_sp1_3+$dt_pj2->nilai_sp1_4+$dt_pj2->nilai_sp1_5+$dt_pj2->nilai_sp1_6)/6);;
            }else{
                $arr[$key]['nipj2']  = 0;
                $nkpej_uji2 = 0;
            }

            $id_dospem  = $dt1->id_dospej_3;
            $dt_pj3     = collect(\DB::select("SELECT * FROM trx_rb_ujian WHERE id_mhs='$id_mhs' AND id_dospem='$id_dospem'"))->first();
            if($dt_pj3){
                $arr[$key]['nipj3']  = round(($dt_pj3->nilai_sp1_1+$dt_pj3->nilai_sp1_2+$dt_pj3->nilai_sp1_3+$dt_pj3->nilai_sp1_4+$dt_pj3->nilai_sp1_5+$dt_pj3->nilai_sp1_6)/6);
                $nkpej_uji3 = round(($dt_pj3->nilai_sp1_1+$dt_pj3->nilai_sp1_2+$dt_pj3->nilai_sp1_3+$dt_pj3->nilai_sp1_4+$dt_pj3->nilai_sp1_5+$dt_pj3->nilai_sp1_6)/6);
            }else{
                $arr[$key]['nipj3']  = 0;
                $nkpej_uji3 = 0;
            }

            if($nkpem_bim2 == 0){
                $bobot_bimbingan = 50/100;
            }else{
                $bobot_bimbingan = 25/100;
            }

            if($nkpem_sid2 == 0){
                $bobot_sidang = 10/100;
            }else{
                $bobot_sidang = 5/100;
            }

            if($nkpej_uji2 == 0 && $nkpej_uji3 == 0){
                $bobot_penguji = 40/100;
            }elseif($nkpej_uji3 == 0){
                $bobot_penguji = 20/100;
            }else{
                $bobot_penguji = 13.3/100;
            }

            $arr[$key]['nilai_akhir'] = round(($nkpem_bim1*$bobot_bimbingan)+($nkpem_sid1*$bobot_sidang)+($nkpem_bim2*$bobot_bimbingan)+($nkpem_sid2*$bobot_sidang)+($nkpej_uji1*$bobot_penguji)+($nkpej_uji2*$bobot_penguji)+($nkpej_uji3*$bobot_penguji));

        }

        return $arr;
    }

    public static function datapdf1($id){

        $data   = collect(\DB::select("SELECT * FROM trx_setting_bimbingan WHERE id='$id'"))->first();

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
            $arr_dospej_2           = collect(\DB::select("SELECT * FROM users WHERE id='$data->id_dospej_2'"))->first();
            $dospej2        = $arr_dospej_2->name;
            $nip_dospej2    = $arr_dospej_2->nik;
            $ttd_dospej2    = $arr_dospej_2->ttd;
        }

        if($data->id_dospej_3 == null){
            $dospej3        = '-';
            $nip_dospej3    = '-';
            $ttd_dospej3    = '-';
        }else{
            $arr_dospej_3           = collect(\DB::select("SELECT * FROM users WHERE id='$data->id_dospej_3'"))->first();
            $dospej3        = $arr_dospej_3->name;
            $nip_dospej3    = $arr_dospej_3->nik;
            $ttd_dospej3    = $arr_dospej_3->ttd;
        }

        $id_mhs     = $mhs->id;
        $id_dospem1  = $data->id_dospem_1;
        $dt_pb1     = collect(\DB::select("SELECT * FROM trx_rb_bimbingan WHERE id_mhs='$id_mhs' AND id_dospem='$id_dospem1'"))->first();
        if($dt_pb1){
            $nkpem_bim1 = round(($dt_pb1->nilai_sp1_1+$dt_pb1->nilai_sp1_2+$dt_pb1->nilai_sp1_3+$dt_pb1->nilai_sp1_4+$dt_pb1->nilai_sp1_5+$dt_pb1->nilai_sp1_6)/6);
            $nkpem_sid1 = round(($dt_pb1->nilai_sp2_1+$dt_pb1->nilai_sp2_2+$dt_pb1->nilai_sp2_3)/3);
        }else{
            $nkpem_bim1 = 0;
            $nkpem_sid1 = 0;
        }

        $id_dospem2  = $data->id_dospem_2;
        $dt_pb2     = collect(\DB::select("SELECT * FROM trx_rb_bimbingan WHERE id_mhs='$id_mhs' AND id_dospem='$id_dospem2'"))->first();
        if($dt_pb2){
            $nkpem_bim2 = round(($dt_pb2->nilai_sp1_1+$dt_pb2->nilai_sp1_2+$dt_pb2->nilai_sp1_3+$dt_pb2->nilai_sp1_4+$dt_pb2->nilai_sp1_5+$dt_pb2->nilai_sp1_6)/6);
            $nkpem_sid2 = round(($dt_pb2->nilai_sp2_1+$dt_pb2->nilai_sp2_2+$dt_pb2->nilai_sp2_3)/3);
        }else{
            $nkpem_bim2 = 0;
            $nkpem_sid2 = 0;
        }

        $id_dospem3  = $data->id_dospej_1;
        $dt_pj1     = collect(\DB::select("SELECT * FROM trx_rb_ujian WHERE id_mhs='$id_mhs' AND id_dospem='$id_dospem3'"))->first();
        if($dt_pj1){
            $nkpej_uji1 = round(($dt_pj1->nilai_sp1_1+$dt_pj1->nilai_sp1_2+$dt_pj1->nilai_sp1_3+$dt_pj1->nilai_sp1_4+$dt_pj1->nilai_sp1_5+$dt_pj1->nilai_sp1_6)/6);
        }else{
            $nkpej_uji1 = 0;
        }

        $id_dospem4  = $data->id_dospej_2;
        $dt_pj2     = collect(\DB::select("SELECT * FROM trx_rb_ujian WHERE id_mhs='$id_mhs' AND id_dospem='$id_dospem4'"))->first();
        if($dt_pj2){
            $nkpej_uji2 = round(($dt_pj2->nilai_sp1_1+$dt_pj2->nilai_sp1_2+$dt_pj2->nilai_sp1_3+$dt_pj2->nilai_sp1_4+$dt_pj2->nilai_sp1_5+$dt_pj2->nilai_sp1_6)/6);;
        }else{
            $nkpej_uji2 = 0;
        }

        $id_dospem5  = $data->id_dospej_3;
        $dt_pj3     = collect(\DB::select("SELECT * FROM trx_rb_ujian WHERE id_mhs='$id_mhs' AND id_dospem='$id_dospem5'"))->first();
        if($dt_pj3){
            $nkpej_uji3 = round(($dt_pj3->nilai_sp1_1+$dt_pj3->nilai_sp1_2+$dt_pj3->nilai_sp1_3+$dt_pj3->nilai_sp1_4+$dt_pj3->nilai_sp1_5+$dt_pj3->nilai_sp1_6)/6);
        }else{
            $nkpej_uji3 = 0;
        }

        if($nkpem_bim2 == 0){
            $bobot_bimbingan = 50/100;
        }else{
            $bobot_bimbingan = 25/100;
        }

        if($nkpem_sid2 == 0){
            $bobot_sidang = 10/100;
        }else{
            $bobot_sidang = 5/100;
        }

        if($nkpej_uji2 == 0 && $nkpej_uji3 == 0){
            $bobot_penguji = 40/100;
        }elseif($nkpej_uji3 == 0){
            $bobot_penguji = 20/100;
        }else{
            $bobot_penguji = 13.3/100;
        }

        $nilai_akhir = round(($nkpem_bim1*$bobot_bimbingan)+($nkpem_sid1*$bobot_sidang)+($nkpem_bim2*$bobot_bimbingan)+($nkpem_sid2*$bobot_sidang)+($nkpej_uji1*$bobot_penguji)+($nkpej_uji2*$bobot_penguji)+($nkpej_uji3*$bobot_penguji));

        $ket_sid     = collect(\DB::select("SELECT * FROM trx_ba_sidang WHERE id_mhs='$id_mhs' AND id_dospem='$id_dospem3'"))->first();

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
        $arr['nip_dospej3']     = $nip_dospej3;
        $arr['nkpem_bim1']     = $nkpem_bim1;
        $arr['nkpem_sid1']     = $nkpem_sid1;
        $arr['nkpem_bim2']     = $nkpem_bim2;
        $arr['nkpem_sid2']     = $nkpem_sid2;
        $arr['nkpej_uji1']     = $nkpej_uji1;
        $arr['nkpej_uji2']     = $nkpej_uji2;
        $arr['nkpej_uji3']     = $nkpej_uji3;
        $arr['ttd_dospem1']    = $ttd_dospem1;
        $arr['ttd_dospem2']    = $ttd_dospem2;
        $arr['ttd_dospem3']    = $ttd_dospej1;
        $arr['ttd_dospem4']    = $ttd_dospej2;
        $arr['ttd_dospem5']    = $ttd_dospej3;
        $arr['nilai_akhir']    = $nilai_akhir;
        $arr['bobot1']    = $bobot_bimbingan;
        $arr['bobot2']    = $bobot_sidang;
        $arr['bobot3']    = $bobot_penguji;


        return $arr;
    }


}
