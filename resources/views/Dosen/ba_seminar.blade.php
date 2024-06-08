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
                            <span>List BA Seminar</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive mt-3">
                            <table class="table" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA MAHASISWA</th>
                                        <th>TANGGAL SEMINAR</th>
                                        <th>JUDUL TA</th>
                                        <th>CATATAN SEMINAR</th>
                                        <th>STATUS</th>
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
                                            <td>
                                                @if ($val->status == 1)
                                                    <button type="button" class="btn btn-outline-warning btn-sm">Waiting</button>
                                                @elseif ($val->status == 2)
                                                    <button type="button" class="btn btn-outline-success btn-sm">Approved</button>
                                                @elseif ($val->status == 3)
                                                    <button type="button" class="btn btn-outline-danger btn-sm">Rejected</button>
                                                    <span class="text-info" style="cursor: pointer;" data-name="note_reject" data-item="{{$val->id}}">
                                                        <i class="bi bi-exclamation-circle-fill"></i>
                                                    </span>
                                                @else
                                                    <button type="button" class="btn btn-outline-warning btn-sm">Waiting</button>
                                                @endif
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-outline-danger" data-name="reject" data-item="{{$val->id}}">
                                                    <i class="bi bi-x-circle"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-success" data-name="approved" data-item="{{$val->id}}">
                                                    <i class="bi bi-check2-all"></i>
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

{{-- Modal Approved --}}
<div class="modal fade" id="modal_approved" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Approved BA Seminar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card-style">
                            <div class="mb-3">
                                <label for="" class="form-label">Dosen</label>
                                <select data-name="id_dospem" class="form-select select-2-add" disabled>
                                    <option value="">-- Select Dosen --</option>
                                    @foreach ($dosen as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->nik }} - {{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Tanggal Seminar</label>
                                <input type="text" class="form-control" id="" placeholder="" data-name="tanggal" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Judul TA</label>
                                <textarea name="" id="" cols="30"class="form-control" data-name="judul"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Catatan Seminar</label>
                                <textarea name="" id="" cols="30"class="form-control" data-name="catatan"></textarea>
                                <input type="hidden" data-name="id_approved">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" data-name="save_approved">Approved</button>
            </div>
        </div>
    </div>
</div>
{{-- End Modal Approved --}}

{{-- Modal Reject --}}
<div class="modal fade" id="modal_reject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Reject BA Seminar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card-style">
                            <div class="mb-3">
                                <label for="" class="form-label">Dosen</label>
                                <select data-name="id_dospem" class="form-select select-2-add" disabled>
                                    <option value="">-- Select Dosen --</option>
                                    @foreach ($dosen as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->nik }} - {{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Tanggal Seminar</label>
                                <input type="text" class="form-control" id="" placeholder="" data-name="tanggal" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Judul TA</label>
                                <textarea name="" id="" cols="30" class="form-control" data-name="judul" disabled></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Catatan Seminar</label>
                                <textarea name="" id="" cols="30" class="form-control" data-name="catatan" disabled></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Note</label>
                                <textarea name="" id="" cols="30" class="form-control" data-name="note"></textarea>
                                <input type="hidden" data-name="id_reject">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-name="save_reject">Reject</button>
            </div>
        </div>
    </div>
</div>
{{-- End Modal Reject --}}

{{-- Modal Note Reject --}}
<div class="modal fade" id="modal_note_reject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Note Reject</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card-style">

                            <div class="mb-3">
                                <label for="" class="form-label">Note</label>
                                <textarea name="" id="" cols="30" class="form-control" data-name="show_note" disabled></textarea>
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
{{-- End Modal Note Reject --}}

{{-- JS Approved Data --}}
<script>
    $(document).on("click", "[data-name='approved']", function(e) {
        var id = $(this).attr("data-item");

        $.ajax({
            type: "POST",
            url: "{{route('show_ba_seminar_dosen')}}",
            data: {
                id: id,
            },
            cache: false,
            success: function(data) {
                // console.log(data);
                $("[data-name='id_dospem']").val(data['id_dospem']).trigger("change");
                $("[data-name='tanggal']").val(data['tanggal']);
                $("[data-name='catatan']").val(data['catatan']);
                $("[data-name='judul']").val(data['judul']);
                $("[data-name='id_approved']").val(data['id']);
                $("#modal_approved").modal('show');
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

    $(document).on("click", "[data-name='save_approved']", function(e) {
        var id          = $("[data-name='id_approved']").val();
        var catatan     = $("[data-name='catatan']").val();
        var judul       = $("[data-name='judul']").val();

        if (id === '' || catatan === '' | judul === '') {
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
                url: "{{route('approved_ba_seminar_dosen')}}",
                data: {
                    id: id,
                    catatan: catatan,
                    judul: judul
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
{{-- End JS Approved Data --}}

{{-- JS Rject Data --}}
<script>
    $(document).on("click", "[data-name='reject']", function(e) {
        var id = $(this).attr("data-item");

        $.ajax({
            type: "POST",
            url: "{{route('show_ba_seminar_dosen')}}",
            data: {
                id: id,
            },
            cache: false,
            success: function(data) {
                // console.log(data);
                $("[data-name='id_dospem']").val(data['id_dospem']).trigger("change");
                $("[data-name='tanggal']").val(data['tanggal']);
                $("[data-name='catatan']").val(data['catatan']);
                $("[data-name='judul']").val(data['judul']);
                $("[data-name='id_reject']").val(data['id']);
                $("#modal_reject").modal('show');
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

    $(document).on("click", "[data-name='save_reject']", function(e) {
        var id      = $("[data-name='id_reject']").val();
        var note    = $("[data-name='note']").val();

        if (id === '' || note === '') {
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
                url: "{{route('reject_ba_seminar_dosen')}}",
                data: {
                    id: id,
                    note: note
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
{{-- End JS Rject Data --}}

{{-- JS Note Reject --}}
<script>
    $(document).on("click", "[data-name='note_reject']", function(e) {
        var id = $(this).attr("data-item");

        $.ajax({
            type: "POST",
            url: "{{route('show_ba_seminar_dosen')}}",
            data: {
                id: id,
            },
            cache: false,
            success: function(data) {
                // console.log(data);
                $("[data-name='show_note']").val(data['note']);
                $("#modal_note_reject").modal('show');
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
{{-- End JS Note Reject --}}

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
