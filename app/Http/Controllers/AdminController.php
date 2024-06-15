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

class AdminController extends Controller
{
    function idnusr(){
        $arr    = DB::table('users')->select('users.*', 'b.name as role_name')
                    ->leftJoin('mst_role AS b', 'b.id', '=', 'users.role_id')
                    ->where('users.id', auth::user()->id)->first();
        return $arr;
    }

    // Kelola Pengguna
    function kadmin(): object {
        $arr    = DB::table('users')->where('role_id', 1)->where('is_active', 1)->get();
        $data = array(
            'idnusr'    => $this->idnusr(),
            'title'     => 'Kelola Admin',
            'arr'       => $arr
        );

        return view('Admin.k_admin')->with($data);
    }

    function kdosen(): object {
        $arr    = DB::table('users')->where('role_id', 2)->where('is_active', 1)->get();
        $data = array(
            'idnusr'    => $this->idnusr(),
            'title'     => 'Kelola Dosen',
            'arr'       => $arr
        );

        return view('Admin.k_dosen')->with($data);
    }

    function kmahasiswa(): object {
        $arr    = DB::table('users')->where('role_id', 3)->where('is_active', 1)->get();
        $data = array(
            'idnusr'    => $this->idnusr(),
            'title'     => 'Kelola Mahasiswa',
            'arr'       => $arr
        );

        return view('Admin.k_mahasiswa')->with($data);
    }


    function add_users(Request $request): object {

        $dt         = $request['data'];
        $update_by  = auth::user()->id;

        $cek_nik    = DB::table('users')->where('nik', $dt['nik'])->where('is_active', 1)->get();
        if(count($cek_nik) > 0){
            return response('error');
        }else{

            $data   = array(
                'role_id'   => $dt['role_id'],
                'nik'       => $dt['nik'],
                'name'      => $dt['name'],
                'no_tlp'    => $dt['no_tlp'],
                'email'     => $dt['email'],
                'password'  => Hash::make($dt['password']),
                'pass'      => $dt['password'],
                'photo'     => $dt['photo'],
                'ttd'       => $dt['ttd'],
                'is_active' => 1,
                'update_by' => $update_by,
            );
            DB::table('users')->insert([$data]);

            return response('success');
        }

    }

    function actshowusers(Request $request): object {
        $id     = $request['id'];
        $data   = DB::table('users')->where('id', $id)->first();
        return response()->json($data);
    }

    function edit_users(Request $request): object {

        $dt         = $request['data'];
        $update_by  = auth::user()->id;

        $cek_nik    = DB::table('users')->where('nik', $dt['nik'])->where('is_active', 1)->get();
        $nik_old    = $dt['nik_old'];
        if(count($cek_nik) > 0){
            if($nik_old == $dt['nik']){
                $data   = array(
                    'role_id'   => $dt['role_id'],
                    'name'      => $dt['name'],
                    'no_tlp'    => $dt['no_tlp'],
                    'email'     => $dt['email'],
                    'password'  => Hash::make($dt['password']),
                    'pass'      => $dt['password'],
                    'photo'     => $dt['photo'],
                    'ttd'       => $dt['ttd'],
                    'is_active' => $dt['is_active'],
                    'update_by' => $update_by,
                );
                DB::table('users')->where('id', $dt['id'])->update($data);
                return response('success');
            }else{
                return response('error');
            }
            return response('error');
        }else{
            $data   = array(
                'role_id'   => $dt['role_id'],
                'nik'       => $dt['nik'],
                'name'      => $dt['name'],
                'no_tlp'    => $dt['no_tlp'],
                'email'     => $dt['email'],
                'password'  => Hash::make($dt['password']),
                'pass'      => $dt['password'],
                'photo'     => $dt['photo'],
                'ttd'       => $dt['ttd'],
                'is_active' => $dt['is_active'],
                'update_by' => $update_by,
            );
            DB::table('users')->where('id', $dt['id'])->update($data);
            return response('success');
        }
    }

    function delete_users(Request $request): object {

        $id         = $request['id'];
        $update_by  = auth::user()->id;

        $data   = array(
            'is_active' => 0,
            'update_by' => $update_by,
        );
        DB::table('users')->where('id', $id)->update($data);
        return response('success');
    }

    function upload_ttd(Request $request): object {

        $id         = $request['id'];
        $ttd        = $request['ttd'];
        $update_by  = auth::user()->id;

        $data   = array(
            'ttd' => $ttd,
        );
        DB::table('users')->where('id', $id)->update($data);
        return response('success');
    }

    function actphoto(Request $request): object {

        if ($request->hasFile('add_foto')) {
            $fourRandomDigit = rand(10, 99999);
            $photo      = $request->file('add_foto');
            $fileName   = $fourRandomDigit . '.' . $photo->getClientOriginalExtension();

            $path = public_path() . '/assets/profile/';

            File::makeDirectory($path, 0777, true, true);

            $request->file('add_foto')->move($path, $fileName);

            return response($fileName);
        } elseif ($request->hasFile('add_ttd')) {
            $fourRandomDigit = rand(10, 99999);
            $photo      = $request->file('add_ttd');
            $fileName   = $fourRandomDigit . '.' . $photo->getClientOriginalExtension();

            $path = public_path() . '/assets/ttd/';

            File::makeDirectory($path, 0777, true, true);

            $request->file('add_ttd')->move($path, $fileName);

            return response($fileName);
        } elseif ($request->hasFile('add_image')) {
            $fourRandomDigit = rand(10, 99999);
            $photo      = $request->file('add_image');
            $fileName   = $fourRandomDigit . '.' . $photo->getClientOriginalExtension();

            $path = public_path() . '/assets/image/';

            File::makeDirectory($path, 0777, true, true);

            $request->file('add_image')->move($path, $fileName);

            return response($fileName);
        } elseif ($request->hasFile('add_file')) {
            $fourRandomDigit = rand(10, 99999);
            $photo      = $request->file('add_file');
            $fileName   = $fourRandomDigit . '.' . $photo->getClientOriginalExtension();

            $path = public_path() . '/assets/file/';

            File::makeDirectory($path, 0777, true, true);

            $request->file('add_file')->move($path, $fileName);

            return response($fileName);
        } else {
            return response('Failed');
        }
    }
    // End Kelola Pengguna

    // Kelola Dosen
    function kpembimbing(): object {
        $arr        = Admin::getdatasettingpembimbing();
        $mhs        = DB::table('users')->where('role_id', 3)->where('is_active', 1)->get();
        $dosen      = DB::table('users')->where('role_id', 2)->where('is_active', 1)->get();

        $data = array(
            'idnusr'    => $this->idnusr(),
            'title'     => 'Kelola Dosen',
            'arr'       => $arr,
            'mhs'       => $mhs,
            'dosen'     => $dosen
        );

        return view('Admin.k_pembimbing')->with($data);
    }

    function add_setting_dosen(Request $request): object {

        $dt         = $request['data'];
        $update_by  = auth::user()->id;

        $data   = array(
            'id_mhs'        => $dt['id_mhs'],
            'id_dospem_1'   => $dt['id_dospem_1'],
            'id_dospem_2'   => $dt['id_dospem_2'],
            'id_dospej_1'   => $dt['id_dospej_1'],
            'id_dospej_2'   => $dt['id_dospej_2'],
            'id_dospej_3'   => $dt['id_dospej_3'],
            'is_active'     => 1,
            'update_by'     => $update_by,
        );

        $cek      = DB::table('trx_setting_bimbingan')->where('id_mhs', $dt['id_mhs'])->where('is_active', 1)->get();

        if(count($cek) <= 0){
            DB::table('trx_setting_bimbingan')->insert([$data]);
            return response('success');
        }else{
            return response('error');
        }

    }

    function actshowkeloladospem(Request $request): object {
        $id         = $request['id'];
        $data       = DB::table('trx_setting_bimbingan')->where('id', $id)->first();
        return response()->json($data);
    }

    function edit_kelola_dospem(Request $request): object {
        $dt         = $request['data'];
        $update_by  = auth::user()->id;

        $data   = array(
            'id_mhs' => $dt['id_mhs'],
            'id_dospem_1' => $dt['id_dospem_1'],
            'id_dospem_2' => $dt['id_dospem_2'],
            'id_dospej_1' => $dt['id_dospej_1'],
            'id_dospej_2' => $dt['id_dospej_2'],
            'id_dospej_3' => $dt['id_dospej_3'],
            'update_by' => $update_by,
        );
        DB::table('trx_setting_bimbingan')->where('id', $dt['id'])->update($data);
        return response('success');
    }

    function delete_kelola_dospem(Request $request): object {
        $id         = $request['id'];
        $update_by  = auth::user()->id;

        $data   = array(
            'is_active' => 0,
            'update_by' => $update_by,
        );
        DB::table('trx_setting_bimbingan')->where('id', $id)->update($data);
        return response('success');
    }

    // End Kelola Dosen

    // Rubrik Penilaianm
    function rb_penilaian(): object {
        $arr        = Admin::getdatarubrikpenilaian();
        $mhs        = DB::table('users')->where('role_id', 3)->where('is_active', 1)->get();
        $dosen      = DB::table('users')->where('role_id', 2)->where('is_active', 1)->get();

        $data = array(
            'idnusr'    => $this->idnusr(),
            'title'     => 'Rubrik Penilaian',
            'arr'       => $arr,
            'mhs'       => $mhs,
            'dosen'     => $dosen
        );

        return view('Admin.rb_penilaian')->with($data);
    }
    // End Rubrik Penilaian

    function admtes()
    {
        $reqbooking  = '["2024-04-27"]';
        $kategori  = 1;
        $date_start  = '2024-04-27 20:00:00';
        $date_end  = '2024-04-27 23:00:00';
        $arr = Mahasiswa::pdfseminar(3);
        echo '<pre>';
        print_r($arr);
        exit;
    }
}
