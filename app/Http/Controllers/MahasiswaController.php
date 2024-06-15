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

class MahasiswaController extends Controller
{
    function idnusr(){
        $arr    = DB::table('users')->select('users.*', 'b.name as role_name')
                    ->leftJoin('mst_role AS b', 'b.id', '=', 'users.role_id')
                    ->where('users.id', auth::user()->id)->first();
        return $arr;
    }

    // LOg Bimbingan
    function mhslogbimbingan(): object {
        $id_mhs     = auth::user()->id;
        $arr        = DB::table('trx_log_bimbingan')->select('trx_log_bimbingan.*', 'b.name', 'b.nik')
                        ->leftJoin('users AS b', 'b.id', '=', 'trx_log_bimbingan.id_dospem')
                        ->where('trx_log_bimbingan.id_mhs', $id_mhs)
                        ->where('trx_log_bimbingan.is_active', 1)->get();
        $ckdosen    = DB::table('trx_setting_bimbingan')->where('id_mhs', auth::user()->id)->where('is_active', 1)->first();
        $dosen      = DB::table('users')->whereIn('id', [$ckdosen->id_dospem_1,$ckdosen->id_dospem_2])->where('is_active', 1)->get();
        $list_dosenpem  = DB::table('trx_log_bimbingan')->select(DB::raw('count(*) as total'), 'b.id', 'b.nik', 'b.name')
                        ->leftJoin('users AS b', 'b.id', '=', 'trx_log_bimbingan.id_dospem')
                        ->where('trx_log_bimbingan.id_mhs', $id_mhs)
                        ->where('trx_log_bimbingan.is_active', 1)->groupBy('trx_log_bimbingan.id_dospem')->get();

        $data = array(
            'idnusr'    => $this->idnusr(),
            'title'     => 'Log Bimbingan',
            'arr'       => $arr,
            'dosen'     => $dosen,
            'id_mhs'    => $id_mhs,
            'list_dosenpem' => $list_dosenpem
        );

        return view('Mahasiswa.log_bimbingan')->with($data);
    }

    function add_log_bimbingan_mhs(Request $request): object {
        $id_mhs     = $request['id_mhs'];
        $id_dospem  = $request['id_dospem'];
        $tanggal    = $request['tanggal'];
        $catatan    = $request['catatan'];
        $plant      = $request['plant'];

        $data   = array(
            'id_mhs'    => $id_mhs,
            'id_dospem' => $id_dospem,
            'tanggal'   => $tanggal,
            'catatan'   => $catatan,
            'plant'     => $plant,
            'status'    => 1,
            'is_active' => 1
        );
        $log        = DB::table('trx_log_bimbingan')->insert([$data]);
        return response('success');
    }

    function delete_mhs_logbimbingan(Request $request): object {
        $id         = $request['id'];
        $update_by  = auth::user()->id;

        $data   = array(
            'is_active' => 0,
        );
        DB::table('trx_log_bimbingan')->where('id', $id)->update($data);
        return response('success');
    }

    function show_log_bimbingan_mhs(Request $request): object {
        $id     = $request['id'];
        $data   = DB::table('trx_log_bimbingan')->where('id', $id)->first();
        return response()->json($data);
    }
    // End Log BImbingan

    // BA Seminar
    function mhsbaseminar(): object {
        $id_mhs     = auth::user()->id;
        $arr        = DB::table('trx_ba_seminar')->select('trx_ba_seminar.*', 'b.name', 'b.nik')
                        ->leftJoin('users AS b', 'b.id', '=', 'trx_ba_seminar.id_dospem')
                        ->where('trx_ba_seminar.id_mhs', $id_mhs)
                        ->where('trx_ba_seminar.is_active', 1)->get();
        $ckdosen    = DB::table('trx_setting_bimbingan')->where('id_mhs', auth::user()->id)->where('is_active', 1)->first();
        $dosen      = DB::table('users')->whereIn('id', [$ckdosen->id_dospem_1,$ckdosen->id_dospem_2,$ckdosen->id_dospej_1,$ckdosen->id_dospej_2,$ckdosen->id_dospej_3])->where('is_active', 1)->get();
        $cekunduh   =DB::table('trx_ba_seminar')->where('id_mhs', auth::user()->id)->where('status', 2)->where('is_active', 1)->get();

        $data = array(
            'idnusr'    => $this->idnusr(),
            'title'     => 'Berita Acara Seminar',
            'arr'       => $arr,
            'dosen'     => $dosen,
            'cekunduh'  => $cekunduh
        );

        return view('Mahasiswa.ba_seminar')->with($data);
    }

    function add_ba_seminar_mhs(Request $request): object {
        $id_mhs     = $request['id_mhs'];
        $id_dospem  = $request['id_dospem'];
        $tanggal    = $request['tanggal'];
        $catatan    = $request['catatan'];
        $judul      = $request['judul'];

        $data   = array(
            'id_mhs'    => $id_mhs,
            'id_dospem' => $id_dospem,
            'tanggal'   => $tanggal,
            'catatan'   => $catatan,
            'judul'     => $judul,
            'status'    => 1,
            'is_active' => 1
        );
        $log        = DB::table('trx_ba_seminar')->insert([$data]);
        return response('success');
    }

    function delete_mhs_ba_seminar(Request $request): object {
        $id         = $request['id'];
        $update_by  = auth::user()->id;

        $data   = array(
            'is_active' => 0,
        );
        DB::table('trx_ba_seminar')->where('id', $id)->update($data);
        return response('success');
    }

    function show_ba_seminar_mhs(Request $request): object {
        $id     = $request['id'];
        $data   = DB::table('trx_ba_seminar')->where('id', $id)->first();
        return response()->json($data);
    }
    // End BA Seminar

    // BA Seminar
    function ba_sidangmhs(): object {
        $id_mhs  = auth::user()->id;
        $arr        = DB::table('trx_ba_sidang')->select('trx_ba_sidang.*', 'b.name', 'b.nik')
                        ->leftJoin('users AS b', 'b.id', '=', 'trx_ba_sidang.id_mhs')
                        ->where('trx_ba_sidang.id_mhs', $id_mhs)
                        ->where('trx_ba_sidang.is_active', 1)->get();
        $dosen      = DB::table('users')->where('role_id', 2)->where('is_active', 1)->get();

        $data = array(
            'idnusr'    => $this->idnusr(),
            'title'     => 'Berita Sidang TA',
            'arr'       => $arr,
            'dosen'     => $dosen
        );

        return view('Mahasiswa.ba_sidang')->with($data);
    }

    function show_setting_dospem_mhs(Request $request): object {
        $id_mhs     = auth::user()->id;
        $data       = DB::table('trx_setting_bimbingan')->where('id_mhs', $id_mhs)->first();
        return response()->json($data);
    }

    function show_ba_sidang_mhs(Request $request): object {
        $id     = $request['id'];
        $data       = DB::table('trx_ba_sidang')->where('id', $id)->first();
        return response()->json($data);
    }
    // End BA Sidang

}
