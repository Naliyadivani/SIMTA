<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Crypt;
use \Illuminate\Support\Facades\File;
use Illuminate\Support\Arr;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Carbon;
use App\Models\user;
use App\Models\Admin;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Auth;
use Hash;
use Redirect;
use DB;

class DosenController extends Controller
{
    function idnusr(){
        $arr    = DB::table('users')->select('users.*', 'b.name as role_name')
                    ->leftJoin('mst_role AS b', 'b.id', '=', 'users.role_id')
                    ->where('users.id', auth::user()->id)->first();
        return $arr;
    }

    // Log Bimbingan
    function dosenlogbimbingan(): object {
        $id_dospem  = auth::user()->id;
        $arr        = DB::table('trx_log_bimbingan')->select('trx_log_bimbingan.*', DB::raw('count(trx_log_bimbingan.id) as jmllog'), 'b.name', 'b.nik')
                        ->leftJoin('users AS b', 'b.id', '=', 'trx_log_bimbingan.id_mhs')
                        ->where('trx_log_bimbingan.id_dospem', $id_dospem)
                        ->where('trx_log_bimbingan.is_active', 1)
                        ->groupBy('trx_log_bimbingan.id_mhs')->get();

        $data = array(
            'idnusr'    => $this->idnusr(),
            'title'     => 'Log Bimbingan',
            'arr'       => $arr
        );

        return view('Dosen.log_bimbingan')->with($data);
    }

    function detail_log_bimbingan_dosen(Request $request): object {
        $id_dospem  = auth::user()->id;
        $id_mhs     = $request['id_mhs'];
        $arr        = DB::table('trx_log_bimbingan')->select('trx_log_bimbingan.*', 'b.name', 'b.nik')
                        ->leftJoin('users AS b', 'b.id', '=', 'trx_log_bimbingan.id_mhs')
                        ->where('trx_log_bimbingan.id_mhs', $id_mhs)
                        ->where('trx_log_bimbingan.id_dospem', $id_dospem)
                        ->where('trx_log_bimbingan.is_active', 1)->get();

        $data = array(
            'idnusr'    => $this->idnusr(),
            'title'     => 'Log Bimbingan',
            'arr'       => $arr
        );

        return view('Dosen.detail_log_bimbingan')->with($data);
    }

    function show_log_bimbingan_dosen(Request $request): object {
        $id     = $request['id'];
        $data   = DB::table('trx_log_bimbingan')->where('id', $id)->first();
        return response()->json($data);
    }

    function approved_log_bimbingan_dosen(Request $request): object {
        $id         = $request['id'];

        $data   = array(
            'status'    => 2
        );
        DB::table('trx_log_bimbingan')->where('id', $id)->update($data);
        return response('success');
    }

    function reject_log_bimbingan_dosen(Request $request): object {
        $id         = $request['id'];

        $data   = array(
            'note'      => $request['note'],
            'status'    => 3
        );
        DB::table('trx_log_bimbingan')->where('id', $id)->update($data);
        return response('success');
    }


    // End Log Bimbingan

    // BA Seminar
    function ba_seminardosen(): object {
        $id_dospem  = auth::user()->id;
        $arr        = DB::table('trx_ba_seminar')->select('trx_ba_seminar.*', 'b.name', 'b.nik')
                        ->leftJoin('users AS b', 'b.id', '=', 'trx_ba_seminar.id_mhs')
                        ->where('trx_ba_seminar.id_dospem', $id_dospem)
                        ->where('trx_ba_seminar.is_active', 1)->get();
        $dosen      = DB::table('users')->where('role_id', 2)->where('is_active', 1)->get();

        $data = array(
            'idnusr'    => $this->idnusr(),
            'title'     => 'Berita Acara Seminar',
            'arr'       => $arr,
            'dosen'     => $dosen
        );

        return view('Dosen.ba_seminar')->with($data);
    }

    function show_ba_seminar_dosen(Request $request): object {
        $id     = $request['id'];
        $data   = DB::table('trx_ba_seminar')->where('id', $id)->first();
        return response()->json($data);
    }

    function approved_ba_seminar_dosen(Request $request): object {
        $id         = $request['id'];

        $data   = array(
            'judul'     => $request['judul'],
            'catatan'   => $request['catatan'],
            'status'    => 2
        );
        DB::table('trx_ba_seminar')->where('id', $id)->update($data);
        return response('success');
    }

    function reject_ba_seminar_dosen(Request $request): object {
        $id         = $request['id'];

        $data   = array(
            'note'      => $request['note'],
            'status'    => 3
        );
        DB::table('trx_ba_seminar')->where('id', $id)->update($data);
        return response('success');
    }
    // End BA Seminar

    // BA Seminar
    function ba_sidangdosen(): object {
        $id_dospem  = auth::user()->id;
        $arr        = DB::table('trx_ba_sidang')->select('trx_ba_sidang.*', 'b.name', 'b.nik')
                        ->leftJoin('users AS b', 'b.id', '=', 'trx_ba_sidang.id_mhs')
                        ->where('trx_ba_sidang.id_dospem', $id_dospem)
                        ->where('trx_ba_sidang.is_active', 1)->get();
        $ckmhs      = DB::table('trx_setting_bimbingan')->where('is_active', 1)->get();
        $lismhs     = [];
        foreach($ckmhs as $key => $val){
            if($id_dospem == $val->id_dospem_1 || $id_dospem == $val->id_dospem_2){
                $lismhs[$key]   = $val->id_mhs;
            }
        }
        $mhs        = DB::table('users')->whereIn('id', $lismhs)->where('is_active', 1)->get();
        $dosen      = DB::table('users')->where('role_id', 2)->where('is_active', 1)->get();

        $data = array(
            'idnusr'    => $this->idnusr(),
            'title'     => 'Berita Sidang TA',
            'arr'       => $arr,
            'mhs'       => $mhs,
            'dosen'     => $dosen
        );

        return view('Dosen.ba_sidang')->with($data);
    }

    function show_setting_dospem_dosen(Request $request): object {
        $id_mhs     = $request['id_mhs'];
        $data       = DB::table('trx_setting_bimbingan')->where('id_mhs', $id_mhs)->first();
        return response()->json($data);
    }

    function add_ba_sidang_ta_dosen(Request $request): object {
        $id_mhs     = $request['id_mhs'];
        $id_dospem  = auth::user()->id;
        $tanggal    = $request['tanggal'];
        $catatan    = $request['catatan'];
        $judul      = $request['judul'];
        $hasil      = $request['hasil'];

        $data   = array(
            'id_mhs'    => $id_mhs,
            'id_dospem' => $id_dospem,
            'tanggal'   => $tanggal,
            'judul'     => $judul,
            'catatan'   => $catatan,
            'hasil'     => $hasil,
            'is_active' => 1
        );
        $log        = DB::table('trx_ba_sidang')->insert([$data]);
        return response('success');
    }

    function show_ba_sidang_dosen(Request $request): object {
        $id     = $request['id'];
        $data       = DB::table('trx_ba_sidang')->where('id', $id)->first();
        return response()->json($data);
    }
    // End BA Sidang

    // RB Bimbingan
    function rb_bimbingandosen(): object {
        $id_dospem  = auth::user()->id;
        $ckmhs      = DB::table('trx_setting_bimbingan')->where('is_active', 1)->get();
        $lismhs     = [];
        foreach($ckmhs as $key => $val){
            if($id_dospem == $val->id_dospem_1 || $id_dospem == $val->id_dospem_2){
                $lismhs[$key]   = $val->id_mhs;
            }
        }
        $arr        = DB::table('users')->whereIn('id', $lismhs)->where('is_active', 1)->get();

        $data = array(
            'idnusr'    => $this->idnusr(),
            'title'     => 'Rubrik Penilaian Mahasiswa Bimbingan',
            'arr'       => $arr,
            'id_dospem' => $id_dospem
        );

        return view('Dosen.rb_bimbingan')->with($data);
    }

    function add_nilai_rb_sidang_dosen(Request $request): object {
        $id_dospem  = auth::user()->id;

        $data   = array(
            'id_dospem' => $id_dospem,
            'id_mhs' => $request['id_mhs'],
            'judul' => $request['judul'],
            'nilai_sp1_1' => $request['nilai_sp1_1'],
            'nilai_sp1_2' => $request['nilai_sp1_2'],
            'nilai_sp1_3' => $request['nilai_sp1_3'],
            'nilai_sp1_4' => $request['nilai_sp1_4'],
            'nilai_sp1_5' => $request['nilai_sp1_5'],
            'nilai_sp1_6' => $request['nilai_sp1_6'],
            'nilai_sp2_1' => $request['nilai_sp2_1'],
            'nilai_sp2_2' => $request['nilai_sp2_2'],
            'nilai_sp2_3' => $request['nilai_sp2_3'],
            'is_active' => 1
        );
        $log        = DB::table('trx_rb_bimbingan')->insert([$data]);
        return response('success');
    }

    function show_nilai_rb_sidang_dosen(Request $request): object {
        $id_mhs     = $request['id_mhs'];
        $id_dospem  = auth::user()->id;
        $data       = DB::table('trx_rb_bimbingan')->where('id_mhs', $id_mhs)->where('id_dospem', $id_dospem)->first();
        return response()->json($data);
    }

    // End RB Bimbingan

    // RB Bimbingan
    function rb_ujiandosen(): object {
        $id_dospem  = auth::user()->id;
        $ckmhs      = DB::table('trx_setting_bimbingan')->where('is_active', 1)->get();
        $lismhs     = [];
        foreach($ckmhs as $key => $val){
            if($id_dospem == $val->id_dospej_1 || $id_dospem == $val->id_dospej_2 || $id_dospem == $val->id_dospej_3){
                $lismhs[$key]   = $val->id_mhs;
            }
        }
        $arr        = DB::table('users')->whereIn('id', $lismhs)->where('is_active', 1)->get();

        $data = array(
            'idnusr'    => $this->idnusr(),
            'title'     => 'Rubrik Penilaian Mahasiswa Ujian',
            'arr'       => $arr,
            'id_dospem' => $id_dospem
        );

        return view('Dosen.rb_ujian')->with($data);
    }

    function add_nilai_rb_uji_dosen(Request $request): object {
        $id_dospem  = auth::user()->id;

        $data   = array(
            'id_dospem' => $id_dospem,
            'id_mhs' => $request['id_mhs'],
            'judul' => $request['judul'],
            'nilai_sp1_1' => $request['nilai_sp1_1'],
            'nilai_sp1_2' => $request['nilai_sp1_2'],
            'nilai_sp1_3' => $request['nilai_sp1_3'],
            'nilai_sp1_4' => $request['nilai_sp1_4'],
            'nilai_sp1_5' => $request['nilai_sp1_5'],
            'nilai_sp1_6' => $request['nilai_sp1_6'],
            'is_active' => 1
        );
        $log        = DB::table('trx_rb_ujian')->insert([$data]);
        return response('success');
    }

    function show_nilai_rb_uji_dosen(Request $request): object {
        $id_mhs     = $request['id_mhs'];
        $id_dospem  = auth::user()->id;
        $data       = DB::table('trx_rb_ujian')->where('id_mhs', $id_mhs)->where('id_dospem', $id_dospem)->first();
        return response()->json($data);
    }

    // End RB Bimbingan

}
