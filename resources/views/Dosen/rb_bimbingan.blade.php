@extends('main')
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>{{$title}}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row align-items-top">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <span>List Mahasiswa Bimbingan</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive mt-3">
                            <table class="table" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA MAHASISWA</th>
                                        <th>TANGGAL SIDANG</th>
                                        <th>JUDUL TA</th>
                                        <th>STATUS</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($arr as $key => $val)
                                        @php
                                            $st     = DB::table('trx_rb_bimbingan')->where('id_mhs', $val->id)->where('id_dospem', $id_dospem)->where('is_active', 1)->first();
                                            $jdlta  = DB::table('trx_ba_seminar')->where('id_mhs', $val->id)->where('id_dospem', $id_dospem)->where('is_active', 1)->first();
                                        @endphp
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$val->nik}} - {{$val->name}}</td>
                                            @if ($jdlta)
                                                <td>{{\Carbon\Carbon::parse($jdlta->tanggal)->isoFormat('dddd, DD MMM YYYY')}}</td>
                                                <td>{{$jdlta->judul}}</td>
                                            @else
                                                <td>-</td>
                                                <td>-</td>
                                            @endif
                                            @if($st)
                                                <td><button type="button" class="btn btn-outline-success btn-sm">Sudah Dinilai</button></td>
                                            @else
                                                <td><button type="button" class="btn btn-outline-danger btn-sm">Belum Di NIlai</button></td>
                                            @endif
                                            <td>
                                                @if ($jdlta)
                                                    @if ($st)
                                                        <button type="button" class="btn btn-outline-info" data-name="shownilai" data-item="{{$val->id}}">
                                                            <i class="bi bi-pencil-square"></i> Nilai
                                                        </button type="button">
                                                    @else
                                                        <button type="button" class="btn btn-outline-info" data-name="nilai" data-item="{{$val->id}}" data-judul="{{$jdlta->judul}}">
                                                            <i class="bi bi-pencil-square"></i> Nilai
                                                        </button type="button">
                                                    @endif

                                                @else
                                                    <button type="button" class="btn btn-outline-info" data-name="" data-item="{{$val->id}}" disabled>
                                                        <i class="bi bi-pencil-square"></i> Nilai
                                                    </button type="button">
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

{{-- Modal Nilai --}}
<div class="modal fade" id="modal_nilai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Buat Nilai</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-nilai mt-3">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>INDIKATOR KINERJA</th>
                                    <th>
                                        NILAI <br>
                                        <span>0-100</span>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="3">Berdasarkan Prosess Bimbingan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-2">
                                                a-10.
                                            </div>
                                            <div class="col-10 text-start">
                                                Menunjukan sikap menghormati orang lain dalam kehidupan sehari hari.
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="number" data-name="nilai_sp1_1">
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-2">
                                                b-3.
                                            </div>
                                            <div class="col-10 text-start">
                                                Kemampuan untuk menerapkan norma-norma etika dalam sebuah permasalahan.
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="number" data-name="nilai_sp1_2">
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-2">
                                                d-1.
                                            </div>
                                            <div class="col-10 text-start">
                                                Kemampuan untuk mengindetifikasi isu pokok dalam sebuah permasalahan.
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="number" data-name="nilai_sp1_3">
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-2">
                                                h-1.
                                            </div>
                                            <div class="col-10 text-start">
                                                Kemampuan untuk memahami tren-tren yang muncul saat ini.
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="number" data-name="nilai_sp1_4">
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-2">
                                                i-1.
                                            </div>
                                            <div class="col-10 text-start">
                                                Kemampuan untuk menggunakan data dan/atau informasi digital.
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="number" data-name="nilai_sp1_5">
                                    </td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-2">
                                                i-2.
                                            </div>
                                            <div class="col-10 text-start">
                                                Kemampuan untuk mengelola data dan/atau informasi digital.
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="number" data-name="nilai_sp1_6">
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>NILAI TOTAL</th>
                                    <th>
                                        <input type="number" data-name="total_sp1" disabled>
                                    </th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th>NILAI RERATA (Dibagi 6)</th>
                                    <th>
                                        <input type="number" data-name="rata_sp1" disabled>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                        <table class="table table-nilai mt-3">
                            <thead>
                                <tr>
                                    <th colspan="3" style="font-style: italic">Berdasarkan Sidang Tugas Akhir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-2">
                                                c-1.
                                            </div>
                                            <div class="col-10 text-start">
                                                Kemampuan untuk menyusun laporan tertulis dengan jelas.
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="number" data-name="nilai_sp2_1">
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-2">
                                                c-2.
                                            </div>
                                            <div class="col-10 text-start">
                                                Kemampuan untuk meyampaikan presentasi secara efektif.
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="number" data-name="nilai_sp2_2">
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-2">
                                                c-3.
                                            </div>
                                            <div class="col-10 text-start">
                                                Kemampuan untuk mendiskusikan gagasan secara efektif dab beragumen secara logis.
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="number" data-name="nilai_sp2_3">
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>NILAI TOTAL</th>
                                    <th>
                                        <input type="number" data-name="total_sp2" disabled>
                                    </th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th>NILAI RERATA (Dibagi 3)</th>
                                    <th>
                                        <input type="number" data-name="rata_sp2" disabled>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                        <input type="hidden" data-name="id_mhs_nilai">
                        <input type="hidden" data-name="judul">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-name="save_nilai">Save</button>
            </div>
        </div>
    </div>
</div>
{{-- End Modal Nilai --}}

{{-- Modal Show Nilai --}}
<div class="modal fade" id="modal_sho_nilai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Show Nilai</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-nilai mt-3">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>INDIKATOR KINERJA</th>
                                    <th>
                                        NILAI <br>
                                        <span>0-100</span>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="3">Berdasarkan Prosess Bimbingan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-2">
                                                a-10.
                                            </div>
                                            <div class="col-10 text-start">
                                                Menunjukan sikap menghormati orang lain dalam kehidupan sehari hari.
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="number" data-name="show_nilai_sp1_1" disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-2">
                                                b-3.
                                            </div>
                                            <div class="col-10 text-start">
                                                Kemampuan untuk menerapkan norma-norma etika dalam sebuah permasalahan.
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="number" data-name="show_nilai_sp1_2" disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-2">
                                                d-1.
                                            </div>
                                            <div class="col-10 text-start">
                                                Kemampuan untuk mengindetifikasi isu pokok dalam sebuah permasalahan.
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="number" data-name="show_nilai_sp1_3" disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-2">
                                                h-1.
                                            </div>
                                            <div class="col-10 text-start">
                                                Kemampuan untuk memahami tren-tren yang muncul saat ini.
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="number" data-name="show_nilai_sp1_4" disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-2">
                                                i-1.
                                            </div>
                                            <div class="col-10 text-start">
                                                Kemampuan untuk menggunakan data dan/atau informasi digital.
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="number" data-name="show_nilai_sp1_5" disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-2">
                                                i-2.
                                            </div>
                                            <div class="col-10 text-start">
                                                Kemampuan untuk mengelola data dan/atau informasi digital.
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="number" data-name="show_nilai_sp1_6" disabled>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>NILAI TOTAL</th>
                                    <th>
                                        <input type="number" data-name="show_total_sp1" disabled>
                                    </th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th>NILAI RERATA (Dibagi 6)</th>
                                    <th>
                                        <input type="number" data-name="show_rata_sp1" disabled>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                        <table class="table table-nilai mt-3">
                            <thead>
                                <tr>
                                    <th colspan="3" style="font-style: italic">Berdasarkan Sidang Tugas Akhir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-2">
                                                c-1.
                                            </div>
                                            <div class="col-10 text-start">
                                                Kemampuan untuk menyusun laporan tertulis dengan jelas.
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="number" data-name="show_nilai_sp2_1" disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-2">
                                                c-2.
                                            </div>
                                            <div class="col-10 text-start">
                                                Kemampuan untuk meyampaikan presentasi secara efektif.
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="number" data-name="show_nilai_sp2_2" disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-2">
                                                c-3.
                                            </div>
                                            <div class="col-10 text-start">
                                                Kemampuan untuk mendiskusikan gagasan secara efektif dab beragumen secara logis.
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="number" data-name="show_nilai_sp2_3" disabled>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>NILAI TOTAL</th>
                                    <th>
                                        <input type="number" data-name="show_total_sp2" disabled>
                                    </th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th>NILAI RERATA (Dibagi 3)</th>
                                    <th>
                                        <input type="number" data-name="show_rata_sp2" disabled>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- End Modal Show Nilai --}}

{{-- JS Add Nilai --}}
<script>
    $(document).on("click", "[data-name='nilai']", function(e) {
        var id_mhs_nilai = $(this).attr("data-item");
        var judul = $(this).attr("data-judul");
        $("[data-name='nilai_sp1_1']").val('');
        $("[data-name='nilai_sp1_2']").val('');
        $("[data-name='nilai_sp1_3']").val('');
        $("[data-name='nilai_sp1_4']").val('');
        $("[data-name='nilai_sp1_5']").val('');
        $("[data-name='nilai_sp1_6']").val('');
        $("[data-name='total_sp1']").val('');
        $("[data-name='rata_sp1']").val('');
        $("[data-name='nilai_sp2_1']").val('');
        $("[data-name='nilai_sp2_2']").val('');
        $("[data-name='nilai_sp2_3']").val('');
        $("[data-name='total_sp2']").val('');
        $("[data-name='rata_sp2']").val('');
        $("[data-name='id_mhs_nilai']").val(id_mhs_nilai);
        $("[data-name='judul']").val(judul);
        $("#modal_nilai").modal('show');
    });

    $(document).on("keyup", "[data-name='nilai_sp1_1']", function(e) {
        var nilai_sp1_1 = $("[data-name='nilai_sp1_1']").val();
        var nilai_sp1_2 = $("[data-name='nilai_sp1_2']").val();
        var nilai_sp1_3 = $("[data-name='nilai_sp1_3']").val();
        var nilai_sp1_4 = $("[data-name='nilai_sp1_4']").val();
        var nilai_sp1_5 = $("[data-name='nilai_sp1_5']").val();
        var nilai_sp1_6 = $("[data-name='nilai_sp1_6']").val();

        var total_sp1 = parseFloat(nilai_sp1_1)+parseFloat(nilai_sp1_2)+parseFloat(nilai_sp1_3)+parseFloat(nilai_sp1_4)+parseFloat(nilai_sp1_5)+parseFloat(nilai_sp1_6);
        var rata_sp1 = parseFloat(total_sp1)/6;
        $("[data-name='total_sp1']").val(total_sp1);
        $("[data-name='rata_sp1']").val(Math.round(rata_sp1));
    });

    $(document).on("keyup", "[data-name='nilai_sp1_2']", function(e) {
        var nilai_sp1_1 = $("[data-name='nilai_sp1_1']").val();
        var nilai_sp1_2 = $("[data-name='nilai_sp1_2']").val();
        var nilai_sp1_3 = $("[data-name='nilai_sp1_3']").val();
        var nilai_sp1_4 = $("[data-name='nilai_sp1_4']").val();
        var nilai_sp1_5 = $("[data-name='nilai_sp1_5']").val();
        var nilai_sp1_6 = $("[data-name='nilai_sp1_6']").val();

        var total_sp1 = parseFloat(nilai_sp1_1)+parseFloat(nilai_sp1_2)+parseFloat(nilai_sp1_3)+parseFloat(nilai_sp1_4)+parseFloat(nilai_sp1_5)+parseFloat(nilai_sp1_6);
        var rata_sp1 = parseFloat(total_sp1)/6;
        $("[data-name='total_sp1']").val(total_sp1);
        $("[data-name='rata_sp1']").val(Math.round(rata_sp1));
    });

    $(document).on("keyup", "[data-name='nilai_sp1_3']", function(e) {
        var nilai_sp1_1 = $("[data-name='nilai_sp1_1']").val();
        var nilai_sp1_2 = $("[data-name='nilai_sp1_2']").val();
        var nilai_sp1_3 = $("[data-name='nilai_sp1_3']").val();
        var nilai_sp1_4 = $("[data-name='nilai_sp1_4']").val();
        var nilai_sp1_5 = $("[data-name='nilai_sp1_5']").val();
        var nilai_sp1_6 = $("[data-name='nilai_sp1_6']").val();

        var total_sp1 = parseFloat(nilai_sp1_1)+parseFloat(nilai_sp1_2)+parseFloat(nilai_sp1_3)+parseFloat(nilai_sp1_4)+parseFloat(nilai_sp1_5)+parseFloat(nilai_sp1_6);
        var rata_sp1 = parseFloat(total_sp1)/6;
        $("[data-name='total_sp1']").val(total_sp1);
        $("[data-name='rata_sp1']").val(Math.round(rata_sp1));
    });

    $(document).on("keyup", "[data-name='nilai_sp1_4']", function(e) {
        var nilai_sp1_1 = $("[data-name='nilai_sp1_1']").val();
        var nilai_sp1_2 = $("[data-name='nilai_sp1_2']").val();
        var nilai_sp1_3 = $("[data-name='nilai_sp1_3']").val();
        var nilai_sp1_4 = $("[data-name='nilai_sp1_4']").val();
        var nilai_sp1_5 = $("[data-name='nilai_sp1_5']").val();
        var nilai_sp1_6 = $("[data-name='nilai_sp1_6']").val();

        var total_sp1 = parseFloat(nilai_sp1_1)+parseFloat(nilai_sp1_2)+parseFloat(nilai_sp1_3)+parseFloat(nilai_sp1_4)+parseFloat(nilai_sp1_5)+parseFloat(nilai_sp1_6);
        var rata_sp1 = parseFloat(total_sp1)/6;
        $("[data-name='total_sp1']").val(total_sp1);
        $("[data-name='rata_sp1']").val(Math.round(rata_sp1));
    });

    $(document).on("keyup", "[data-name='nilai_sp1_5']", function(e) {
        var nilai_sp1_1 = $("[data-name='nilai_sp1_1']").val();
        var nilai_sp1_2 = $("[data-name='nilai_sp1_2']").val();
        var nilai_sp1_3 = $("[data-name='nilai_sp1_3']").val();
        var nilai_sp1_4 = $("[data-name='nilai_sp1_4']").val();
        var nilai_sp1_5 = $("[data-name='nilai_sp1_5']").val();
        var nilai_sp1_6 = $("[data-name='nilai_sp1_6']").val();

        var total_sp1 = parseFloat(nilai_sp1_1)+parseFloat(nilai_sp1_2)+parseFloat(nilai_sp1_3)+parseFloat(nilai_sp1_4)+parseFloat(nilai_sp1_5)+parseFloat(nilai_sp1_6);
        var rata_sp1 = parseFloat(total_sp1)/6;
        $("[data-name='total_sp1']").val(total_sp1);
        $("[data-name='rata_sp1']").val(Math.round(rata_sp1));
    });

    $(document).on("keyup", "[data-name='nilai_sp1_6']", function(e) {
        var nilai_sp1_1 = $("[data-name='nilai_sp1_1']").val();
        var nilai_sp1_2 = $("[data-name='nilai_sp1_2']").val();
        var nilai_sp1_3 = $("[data-name='nilai_sp1_3']").val();
        var nilai_sp1_4 = $("[data-name='nilai_sp1_4']").val();
        var nilai_sp1_5 = $("[data-name='nilai_sp1_5']").val();
        var nilai_sp1_6 = $("[data-name='nilai_sp1_6']").val();

        var total_sp1 = parseFloat(nilai_sp1_1)+parseFloat(nilai_sp1_2)+parseFloat(nilai_sp1_3)+parseFloat(nilai_sp1_4)+parseFloat(nilai_sp1_5)+parseFloat(nilai_sp1_6);
        var rata_sp1 = parseFloat(total_sp1)/6;
        $("[data-name='total_sp1']").val(total_sp1);
        $("[data-name='rata_sp1']").val(Math.round(rata_sp1));
    });

    $(document).on("keyup", "[data-name='nilai_sp2_1']", function(e) {
        var nilai_sp2_1 = $("[data-name='nilai_sp2_1']").val();
        var nilai_sp2_2 = $("[data-name='nilai_sp2_2']").val();
        var nilai_sp2_3 = $("[data-name='nilai_sp2_3']").val();

        var total_sp2 = parseFloat(nilai_sp2_1)+parseFloat(nilai_sp2_2)+parseFloat(nilai_sp2_3);
        var rata_sp2 = parseFloat(total_sp2)/3;
        $("[data-name='total_sp2']").val(total_sp2);
        $("[data-name='rata_sp2']").val(Math.round(rata_sp2));
    });

    $(document).on("keyup", "[data-name='nilai_sp2_2']", function(e) {
        var nilai_sp2_1 = $("[data-name='nilai_sp2_1']").val();
        var nilai_sp2_2 = $("[data-name='nilai_sp2_2']").val();
        var nilai_sp2_3 = $("[data-name='nilai_sp2_3']").val();

        var total_sp2 = parseFloat(nilai_sp2_1)+parseFloat(nilai_sp2_2)+parseFloat(nilai_sp2_3);
        var rata_sp2 = parseFloat(total_sp2)/3;
        $("[data-name='total_sp2']").val(total_sp2);
        $("[data-name='rata_sp2']").val(Math.round(rata_sp2));
    });

    $(document).on("keyup", "[data-name='nilai_sp2_3']", function(e) {
        var nilai_sp2_1 = $("[data-name='nilai_sp2_1']").val();
        var nilai_sp2_2 = $("[data-name='nilai_sp2_2']").val();
        var nilai_sp2_3 = $("[data-name='nilai_sp2_3']").val();

        var total_sp2 = parseFloat(nilai_sp2_1)+parseFloat(nilai_sp2_2)+parseFloat(nilai_sp2_3);
        var rata_sp2 = parseFloat(total_sp2)/3;
        $("[data-name='total_sp2']").val(total_sp2);
        $("[data-name='rata_sp2']").val(Math.round(rata_sp2));
    });

    $(document).on("click", "[data-name='save_nilai']", function(e) {
        var id_mhs      = $("[data-name='id_mhs_nilai']").val();
        var judul       = $("[data-name='judul']").val();
        var nilai_sp1_1 = $("[data-name='nilai_sp1_1']").val();
        var nilai_sp1_2 = $("[data-name='nilai_sp1_2']").val();
        var nilai_sp1_3 = $("[data-name='nilai_sp1_3']").val();
        var nilai_sp1_4 = $("[data-name='nilai_sp1_4']").val();
        var nilai_sp1_5 = $("[data-name='nilai_sp1_5']").val();
        var nilai_sp1_6 = $("[data-name='nilai_sp1_6']").val();
        var nilai_sp2_1 = $("[data-name='nilai_sp2_1']").val();
        var nilai_sp2_2 = $("[data-name='nilai_sp2_2']").val();
        var nilai_sp2_3 = $("[data-name='nilai_sp2_3']").val();

        if(id_mhs === '' || nilai_sp1_1 === '' || nilai_sp1_2 === '' || nilai_sp1_3 === '' || nilai_sp1_4 === '' || nilai_sp1_5 === '' || nilai_sp1_6 === '' || nilai_sp2_1 === '' || nilai_sp2_2 === '' || nilai_sp2_3 === ''){
            Swal.fire({
                position: 'center',
                title: 'Form is empty!',
                icon: 'error',
                showConfirmButton: false,
                timer: 1000
            })
        }else{
            $.ajax({
                type: "POST",
                url: "{{route('add_nilai_rb_sidang_dosen')}}",
                data: {
                    id_mhs: id_mhs,
                    judul: judul,
                    nilai_sp1_1: nilai_sp1_1,
                    nilai_sp1_2: nilai_sp1_2,
                    nilai_sp1_3: nilai_sp1_3,
                    nilai_sp1_4: nilai_sp1_4,
                    nilai_sp1_5: nilai_sp1_5,
                    nilai_sp1_6: nilai_sp1_6,
                    nilai_sp2_1: nilai_sp2_1,
                    nilai_sp2_2: nilai_sp2_2,
                    nilai_sp2_3: nilai_sp2_3
                },
                cache: false,
                success: function(response) {
                    // console.log(response);
                    Swal.fire({
                        position: 'center',
                        title: 'Success!',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500
                    }).then((response) => {
                        location.reload();
                    })
                },
                error: function(response) {
                    Swal.fire({
                        position: 'center',
                        title: 'Action Not Valid!',
                        icon: 'warning',
                        showConfirmButton: true,
                        // timer: 1500
                    }).then((response) => {
                        // location.reload();
                    })
                }
            });
        }
    });
</script>
{{-- End JS Add Nilai --}}

{{-- JS Show Nilai --}}
<script>
    $(document).on("click", "[data-name='shownilai']", function(e) {
        var id_mhs = $(this).attr("data-item");

        $.ajax({
            type: "POST",
            url: "{{route('show_nilai_rb_sidang_dosen')}}",
            data: {
                id_mhs: id_mhs,
            },
            cache: false,
            success: function(data) {
                // console.log(data);

                $("[data-name='show_nilai_sp1_1']").val(data.nilai_sp1_1);
                $("[data-name='show_nilai_sp1_2']").val(data.nilai_sp1_2);
                $("[data-name='show_nilai_sp1_3']").val(data.nilai_sp1_3);
                $("[data-name='show_nilai_sp1_4']").val(data.nilai_sp1_4);
                $("[data-name='show_nilai_sp1_5']").val(data.nilai_sp1_5);
                $("[data-name='show_nilai_sp1_6']").val(data.nilai_sp1_6);
                var total_sp1 = parseFloat(data.nilai_sp1_1)+parseFloat(data.nilai_sp1_2)+parseFloat(data.nilai_sp1_3)+parseFloat(data.nilai_sp1_4)+parseFloat(data.nilai_sp1_5)+parseFloat(data.nilai_sp1_6);
                var rata_sp1 = parseFloat(total_sp1)/6;
                $("[data-name='show_total_sp1']").val(total_sp1);
                $("[data-name='show_rata_sp1']").val(Math.round(rata_sp1));

                $("[data-name='show_nilai_sp2_1']").val(data.nilai_sp2_1);
                $("[data-name='show_nilai_sp2_2']").val(data.nilai_sp2_2);
                $("[data-name='show_nilai_sp2_3']").val(data.nilai_sp2_3);
                var total_sp2 = parseFloat(data.nilai_sp2_1)+parseFloat(data.nilai_sp2_2)+parseFloat(data.nilai_sp2_3);
                var rata_sp2 = parseFloat(total_sp2)/3;
                $("[data-name='show_total_sp2']").val(total_sp2);
                $("[data-name='show_rata_sp2']").val(Math.round(rata_sp2));

                $("#modal_sho_nilai").modal('show');
            },
            error: function(data) {
                Swal.fire({
                    position: 'center',
                    title: 'Action Not Valid!',
                    icon: 'warning',
                    showConfirmButton: true,
                    // timer: 1500
                }).then((data) => {
                    // location.reload();
                })
            }
        });
    });
</script>
{{-- End JS Show Nilai --}}

{{-- JS Datatable --}}
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
{{-- End JS Datatable --}}


@stop
