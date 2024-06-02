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

            $arr_dospej_1           = collect(\DB::select("SELECT * FROM users WHERE id='$val->id_dospej_1'"))->first();
            $arr[$key]['name_dospej1']  = $arr_dospej_1->nik.' - '.$arr_dospej_1->name;

            if($val->id_dospej_2 == null){
                $arr[$key]['name_dospej2']  = '-';
            }else{
                $arr_dospem_2           = collect(\DB::select("SELECT * FROM users WHERE id='$val->id_dospej_2'"))->first();
                $arr[$key]['name_dospej2']  = $arr_dospej_2->nik.' - '.$arr_dospej_2->name;
            }

            if($val->id_dospej_3 == null){
                $arr[$key]['name_dospej3']  = '-';
            }else{
                $arr_dospem_3           = collect(\DB::select("SELECT * FROM users WHERE id='$val->id_dospej_3'"))->first();
                $arr[$key]['name_dospej3']  = $arr_dospej_3->nik.' - '.$arr_dospej_3->name;
            }

        }

        return $arr;
    }
}
