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
use PDF;

class MainController extends Controller
{
    function idnusr(){
        $arr    = DB::table('users')->select('users.*', 'b.name as role_name')
                    ->leftJoin('mst_role AS b', 'b.id', '=', 'users.role_id')
                    ->where('users.id', auth::user()->id)->first();
        return $arr;
    }

    function dasbor(): object {
        $data = array(
            'idnusr' => $this->idnusr(),
            'title' => 'Dashboard',
        );

        return view('Dashboard.list')->with($data);
    }

    function showpdfadmin(Request $request): object {
        $id   = $request['id'];
        $detail = Admin::datapdf1($id);
        $data = array(
            'dt' => $detail,
        );
        return view('Pdf.pdfadmin')->with($data);
    }

    function pdfadmin(Request $request): object {
        $id   = $request['id'];
        $detail = Admin::datapdf1($id);
        $data = array(
            'dt' => $detail
        );
        $pdf = PDF::loadView('Pdf.pdfadmin', $data);
        return $pdf->download('Rubrik_penilaian_'.$detail['nim_mhs'].'.pdf');
    }

    function showpdfmhslogbimbingan(Request $request): object {
        $id_mhs     = $request['id_mhs'];
        $id_dospem  = $request['id_dospem'];
        $detail = Mahasiswa::pdflogbimbingan($id_mhs,$id_dospem);
        $data = array(
            'dt' => $detail,
        );
        return view('Pdf.pdfmhslogbimbingan')->with($data);
    }

    function actionpdfmhslogbimbingan(Request $request): object {
        $id_mhs     = $request['id_mhs'];
        $id_dospem  = $request['id_dospem'];

        return redirect()->route("pdfmhslogbimbingan",["id_mhs"=>$id_mhs,"id_dospem"=>$id_dospem]);
    }

    function pdfmhslogbimbingan(Request $request): object {
        $id_mhs     = $request['id_mhs'];
        $id_dospem  = $request['id_dospem'];
        $detail = Mahasiswa::pdflogbimbingan($id_mhs,$id_dospem);
        $data = array(
            'dt' => $detail
        );
        $pdf = PDF::loadView('Pdf.pdfmhslogbimbingan', $data);
        $pdf->download('log_bimbingan_'.$detail['nim_mhs'].'.pdf');

        return response('success');
    }

    function showpdfmhssidangta(Request $request): object {
        $id         = $request['id'];
        $id_mhs     = $request['id_mhs'];
        $id_dospem  = $request['id_dospem'];
        $detail = Mahasiswa::pdfsidangta($id,$id_mhs,$id_dospem);
        $data = array(
            'dt' => $detail,
        );
        return view('Pdf.pdfmhssidangta')->with($data);
    }

    function pdfmhssidangta(Request $request): object {
        $id         = $request['id'];
        $id_mhs     = $request['id_mhs'];
        $id_dospem  = $request['id_dospem'];
        $detail = Mahasiswa::pdfsidangta($id,$id_mhs,$id_dospem);
        $data = array(
            'dt' => $detail,
        );
        $pdf = PDF::loadView('Pdf.pdfmhssidangta', $data);
        return $pdf->download('BA_SIDANG'.$detail['nim_mhs'].'.pdf');
    }


}
