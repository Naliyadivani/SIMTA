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
                            <span>List BA Sidang TA</span>

                            <button type="button" class="btn btn-primary" data-name="add">Add BA Sidang TA</button>
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
                                        <th>CATATAN SIDANG</th>
                                        <th>HASIL Sidang</th>
                                        <th>TIM PENGUJI</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($arr as $key => $val)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$val->nik}} - {{$val->name}}</td>
                                            <td>
                                                {{\Carbon\Carbon::parse($val->tanggal)->isoFormat('dddd, DD MMM YYYY')}}
                                            </td>
                                            <td>{{$val->judul}}</td>
                                            <td>{{$val->catatan}}</td>
                                            <td>{{$val->hasil}}</td>
                                            @php
                                                $tim    = DB::table('trx_setting_bimbingan')->where('id_mhs', $val->id_mhs)->where('is_active', 1)->first();

                                                if ($tim->id_dospem_1 != null) {
                                                    $arr1       = DB::table('users')->where('id', $tim->id_dospem_1)->first();
                                                    $dospem1    = $arr1->nik.' - '.$arr1->name;
                                                }else {
                                                     $dospem1    = '-';
                                                }

                                                if ($tim->id_dospem_2 != null) {
                                                    $arr2       = DB::table('users')->where('id', $tim->id_dospem_2)->first();
                                                    $dospem2    = $arr2->nik.' - '.$arr2->name;
                                                }else {
                                                     $dospem2    = '-';
                                                }

                                                if ($tim->id_dospej_1 != null) {
                                                    $arr3       = DB::table('users')->where('id', $tim->id_dospej_1)->first();
                                                    $dospem3    = $arr3->nik.' - '.$arr3->name;
                                                }else {
                                                     $dospem3    = '-';
                                                }

                                                if ($tim->id_dospej_2 != null) {
                                                    $arr4       = DB::table('users')->where('id', $tim->id_dospej_2)->first();
                                                    $dospem4    = $arr4->nik.' - '.$arr4->name;
                                                }else {
                                                     $dospem4    = '-';
                                                }

                                                if ($tim->id_dospej_3 != null) {
                                                    $arr5       = DB::table('users')->where('id', $tim->id_dospej_3)->first();
                                                    $dospem5    = $arr5->nik.' - '.$arr5->name;
                                                }else {
                                                     $dospem5    = '-';
                                                }
                                            @endphp
                                            <td>
                                                1. Pembimbing 1 : {{$dospem1}} <br>
                                                2. Pembimbing 2 : {{$dospem2}} <br>
                                                3. Penguji 1 : {{$dospem3}} <br>
                                                4. Penguji 2 : {{$dospem4}} <br>
                                                5. Penguji 3 : {{$dospem5}} <br>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-outline-info" data-name="show" data-item="{{$val->id}}">
                                                    <i class="bi bi-eye-fill"></i>
                                                </button>
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

{{-- Modal Add --}}
<div class="modal fade" id="modal_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add BA Sidang</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card-style">
                            <div class="mb-3">
                                <label for="" class="form-label">Pilih Mahasiswa</label>
                                <select data-name="id_mhs" class="form-select select-2-add">
                                    <option value="">-- Select Mahasiswa --</option>
                                    @foreach ($mhs as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->nik }} - {{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Judul TA</label>
                                <textarea name="" id="" cols="30"class="form-control" data-name="judul"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Tanggal Sidang</label>
                                <input type="text" class="form-control" id="" placeholder="" data-name="tanggal">
                            </div>

                            <h4>PILIH TIM PENGUJI</h4>
                            <div class="mb-3">
                                <label for="" class="form-label">Dosen Pembimbing 1</label>
                                <select data-name="id_dospem_1" class="form-select select-2-add" disabled>
                                    <option value="-">-- Select Dosen --</option>
                                    @foreach ($dosen as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->nik }} - {{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Dosen Pembimbing 2</label>
                                <select data-name="id_dospem_2" class="form-select select-2-add" disabled>
                                    <option value="-">-- Select Dosen --</option>
                                    @foreach ($dosen as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->nik }} - {{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Dosen Penguji 1</label>
                                <select data-name="id_dospej_1" class="form-select select-2-add" disabled>
                                    <option value="-">-- Select Dosen --</option>
                                    @foreach ($dosen as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->nik }} - {{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Dosen Penguji 2</label>
                                <select data-name="id_dospej_2" class="form-select select-2-add" disabled>
                                    <option value="-">-- Select Dosen --</option>
                                    @foreach ($dosen as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->nik }} - {{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Dosen Penguji 3</label>
                                <select data-name="id_dospej_3" class="form-select select-2-add" disabled>
                                    <option value="-">-- Select Dosen --</option>
                                    @foreach ($dosen as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->nik }} - {{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Catatan SIdang TA</label>
                                <textarea name="" id="" cols="30"class="form-control" data-name="catatan"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Hasil SIdang TA</label>
                                <div class="row">
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="hasil" id="hasil" value="LULUS">
                                            <label class="form-check-label" for="hasil">
                                                LULUS
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-5">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="hasil" id="hasil" value="LULUS DENGAN PERBAIKAN">
                                            <label class="form-check-label" for="hasil">
                                                LULUS DENGAN PERBAIKAN
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-5">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="hasil" id="hasil" value="MENGULANG SIDANG TA">
                                            <label class="form-check-label" for="hasil">
                                                MENGULANG SIDANG TA
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-name="save_add">Save</button>
            </div>
        </div>
    </div>
</div>
{{-- End Modal Add --}}

{{-- Modal Show --}}
<div class="modal fade" id="modal_show" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Show BA Sidang</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card-style">
                            <div class="mb-3">
                                <label for="" class="form-label">Pilih Mahasiswa</label>
                                <select data-name="show_id_mhs" class="form-select select-2-add" disabled>
                                    <option value="">-- Select Mahasiswa --</option>
                                    @foreach ($mhs as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->nik }} - {{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Judul TA</label>
                                <textarea name="" id="" cols="30"class="form-control" data-name="show_judul" disabled></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Tanggal Sidang</label>
                                <input type="text" class="form-control" id="" placeholder="" data-name="show_tanggal" disabled>
                            </div>

                            <h4>PILIH TIM PENGUJI</h4>
                            <div class="mb-3">
                                <label for="" class="form-label">Dosen Pembimbing 1</label>
                                <select data-name="show_id_dospem_1" class="form-select select-2-add" disabled>
                                    <option value="-">-- Select Dosen --</option>
                                    @foreach ($dosen as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->nik }} - {{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Dosen Pembimbing 2</label>
                                <select data-name="show_id_dospem_2" class="form-select select-2-add" disabled>
                                    <option value="-">-- Select Dosen --</option>
                                    @foreach ($dosen as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->nik }} - {{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Dosen Penguji 1</label>
                                <select data-name="show_id_dospej_1" class="form-select select-2-add" disabled>
                                    <option value="-">-- Select Dosen --</option>
                                    @foreach ($dosen as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->nik }} - {{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Dosen Penguji 2</label>
                                <select data-name="show_id_dospej_2" class="form-select select-2-add" disabled>
                                    <option value="-">-- Select Dosen --</option>
                                    @foreach ($dosen as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->nik }} - {{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Dosen Penguji 3</label>
                                <select data-name="show_id_dospej_3" class="form-select select-2-add" disabled>
                                    <option value="-">-- Select Dosen --</option>
                                    @foreach ($dosen as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->nik }} - {{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Catatan SIdang TA</label>
                                <textarea name="" id="" cols="30"class="form-control" data-name="show_catatan" disabled></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Hasil SIdang TA</label>
                                <div class="row">
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="showhasil" id="hasil" value="LULUS" disabled>
                                            <label class="form-check-label" for="hasil">
                                                LULUS
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-5">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="showhasil" id="hasil" value="LULUS DENGAN PERBAIKAN" disabled>
                                            <label class="form-check-label" for="hasil">
                                                LULUS DENGAN PERBAIKAN
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-5">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="showhasil" id="hasil" value="MENGULANG SIDANG TA" disabled>
                                            <label class="form-check-label" for="hasil">
                                                MENGULANG SIDANG TA
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- End Modal Show --}}

{{-- JS Add Data --}}
<script>
    $(document).on("click", "[data-name='add']", function(e) {
        // $("[data-name='id_mhs']").val('').trigger("change");
        $("[data-name='judul']").val('');
        $("[data-name='tanggal']").val('');
        $("[data-name='catatan']").val('');
        $("[data-name='id_dospem_1']").val('').trigger("change");
        $("[data-name='id_dospem_2']").val('').trigger("change");
        $("[data-name='id_dospej_1']").val('').trigger("change");
        $("[data-name='id_dospej_2']").val('').trigger("change");
        $("[data-name='id_dospej_3']").val('').trigger("change");
        $("#modal_add").modal('show');
    });

    $(document).on("change", "[data-name='id_mhs']", function(e) {
        var id_mhs = $(this).val();

        $.ajax({
            type: "POST",
            url: "{{route('show_setting_dospem_dosen')}}",
            data: {
                id_mhs: id_mhs,
            },
            cache: false,
            success: function(data) {
                // console.log(data);
                $("[data-name='id_dospem_1']").val(data['id_dospem_1']).trigger("change");
                $("[data-name='id_dospem_2']").val(data['id_dospem_2']).trigger("change");
                $("[data-name='id_dospej_1']").val(data['id_dospej_1']).trigger("change");
                $("[data-name='id_dospej_2']").val(data['id_dospej_2']).trigger("change");
                $("[data-name='id_dospej_3']").val(data['id_dospej_3']).trigger("change");
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

    $(document).on("click", "[data-name='save_add']", function(e) {
        var id_mhs      = $("[data-name='id_mhs']").val();
        var judul       = $("[data-name='judul']").val();
        var tanggal     = $("[data-name='tanggal']").val();
        var catatan     = $("[data-name='catatan']").val();
        var hasil       = $('input[name="hasil"]:checked').val();

        if (id_mhs === '' || judul === '' || tanggal === '' || catatan === '') {
            Swal.fire({
                position: 'center',
                title: 'Form is empty!',
                icon: 'error',
                showConfirmButton: false,
                timer: 1000
            })
        } else {
            $.ajax({
                type: "POST",
                url: "{{route('add_ba_sidang_ta_dosen')}}",
                data: {
                    id_mhs: id_mhs,
                    judul: judul,
                    tanggal: tanggal,
                    catatan: catatan,
                    hasil: hasil
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
{{-- End JS Add Data --}}

{{-- JS Show Data --}}
<script>
    $(document).on("click", "[data-name='show']", function(e) {
        var id = $(this).attr("data-item");

        $.ajax({
            type: "POST",
            url: "{{route('show_ba_sidang_dosen')}}",
            data: {
                id: id,
            },
            cache: false,
            success: function(data) {
                // console.log(data);
                $("[data-name='show_id_mhs']").val(data['id_mhs']).trigger("change");
                $("[data-name='show_judul']").val(data['judul']);
                $("[data-name='show_tanggal']").val(data['tanggal']);
                $("[data-name='show_catatan']").val(data['catatan']);
                var val = data['hasil'];
                $('input[name="showhasil"][value="'+val+'"]').prop('checked', true);

                var id_mhs = data['id_mhs'];

                $.ajax({
                    type: "POST",
                    url: "{{route('show_setting_dospem_dosen')}}",
                    data: {
                        id_mhs: id_mhs,
                    },
                    cache: false,
                    success: function(data) {
                        // console.log(data);
                        $("[data-name='show_id_dospem_1']").val(data['id_dospem_1']).trigger("change");
                        $("[data-name='show_id_dospem_2']").val(data['id_dospem_2']).trigger("change");
                        $("[data-name='show_id_dospej_1']").val(data['id_dospej_1']).trigger("change");
                        $("[data-name='show_id_dospej_2']").val(data['id_dospej_2']).trigger("change");
                        $("[data-name='show_id_dospej_3']").val(data['id_dospej_3']).trigger("change");

                        $("#modal_show").modal('show');
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
{{-- End JS Show Data --}}

{{-- JS Datepicker --}}
<script>
    $('input[data-name="tanggal"]').datepicker({
        format: "yyyy-mm-dd",
        viewMode: "days",
        minViewMode: "days",
        autoclose: true
    });
</script>
{{-- End JS Datepicker --}}


{{-- JS Datatable --}}
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
{{-- End JS Datatable --}}

{{-- Select2 --}}
<script>
    $(".select-2-add").select2({
        allowClear: false,
        width: '100%',
        dropdownParent: $("#modal_add")
    });

    $(".select-2-edit").select2({
        allowClear: false,
        width: '100%',
        dropdownParent: $("#modal_edit")
    });
</script>
{{-- End Select2 --}}

@stop
