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
}
