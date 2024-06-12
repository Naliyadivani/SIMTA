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
                            <span>List Log Bimbingan</span>
                            <div>
                                <button type="button" class="btn btn-info" data-name="exportpdf">Unduh PDF</button>
                                <button type="button" class="btn btn-success" data-name="add">Buat LOG BIMBINGAN</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive mt-3">
                            <table class="table" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>DOSEN PEMBIMBING</th>
                                        <th>TANGGAL BIMBINGAN</th>
                                        <th>CATATAN BIMBINGAN</th>
                                        <th>ACTION PLANT</th>
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
                                            <td>{{$val->catatan}}</td>
                                            <td>{{$val->plant}}</td>
                                            <td>
                                                @if ($val->status == 1)
                                                    <button type="button" class="btn btn-outline-warning btn-sm">Submited</button>
                                                @elseif ($val->status == 2)
                                                    <button type="button" class="btn btn-outline-success btn-sm">Approved</button>
                                                @elseif ($val->status == 3)
                                                    <button type="button" class="btn btn-outline-danger btn-sm">Rejected</button>
                                                    <span class="text-info" style="cursor: pointer;" data-name="note_reject" data-item="{{$val->id}}">
                                                        <i class="bi bi-exclamation-circle-fill"></i>
                                                    </span>
                                                @else
                                                    <button type="button" class="btn btn-outline-warning btn-sm">Submited</button>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($val->status == 1)
                                                    <button type="button" class="btn btn-outline-danger" data-name="delete" data-item="{{$val->id}}">
                                                        <i class='bx bxs-trash me-0'></i>
                                                    </button>
                                                @else
                                                    <button type="button" class="btn btn-outline-danger" data-name="" data-item="" disabled>
                                                        <i class='bx bxs-trash me-0'></i>
                                                    </button>
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

{{-- Modal Add --}}
<div class="modal fade" id="modal_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">ADD Bimbingan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card-style">
                            <div class="mb-3">
                                <label for="" class="form-label">Dosen Pembimbing</label>
                                <select data-name="id_dospem" class="form-select select-2-add">
                                    <option value="">-- Select Dosen Pembimbing --</option>
                                    @foreach ($dosen as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->nik }} - {{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Tanggal Bimbingan</label>
                                <input type="text" class="form-control" id="" placeholder="" data-name="tanggal">
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Catatan Bimbingan</label>
                                <textarea name="" id="" cols="30"class="form-control" data-name="catatan"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Action Plant</label>
                                <textarea name="" id="" cols="30"class="form-control" data-name="plant"></textarea>
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
{{-- End Modal ADD --}}

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

{{-- Modal Export PDF --}}
<div class="modal fade" id="modal_exportpdf" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Export Log Bimbingan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card-style">
                            <div class="mb-3">
                                <label for="" class="form-label">Dosen Pembimbing</label>
                                <select data-name="export_id_dospem" class="form-select select-2-export">
                                    <option value="">-- Select Dosen Pembimbing --</option>
                                    @foreach ($dosen as $key => $value)
                                        <option value="{{$value->id}}">{{ $value->nik }} - {{ $value->name }}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" data-name="export_id_mhs" value="{{$id_mhs}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-name="action_export">Export</button>
            </div>
        </div>
    </div>
</div>
{{-- End Modal Export PDF --}}

{{-- JS ADD Data --}}
<script>
    $(document).on("click", "[data-name='add']", function(e) {
        $("[data-name='id_dospem']").val('').trigger("change");
        $("[data-name='tanggal']").val('');
        $("[data-name='catatan']").val('');
        $("[data-name='plant']").val('');
        $("#modal_add").modal('show');
    });

    $(document).on("click", "[data-name='save_add']", function(e) {
        var id_mhs      = "{!! $idnusr->id !!}";
        var id_dospem   = $("[data-name='id_dospem']").val();
        var tanggal     = $("[data-name='tanggal']").val();
        var catatan     = $("[data-name='catatan']").val();
        var plant       = $("[data-name='plant']").val();

        if (id_mhs === '' || id_dospem === '' || tanggal === '' || catatan === '' || plant === '') {
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
                url: "{{route('add_log_bimbingan_mhs')}}",
                data: {
                    id_mhs: id_mhs,
                    id_dospem: id_dospem,
                    tanggal: tanggal,
                    catatan: catatan,
                    plant: plant
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
{{-- End JS ADD Data --}}

{{-- JS Delete Data --}}
<script>
    $(document).on("click", "[data-name='delete']", function(e) {
        var id = $(this).attr("data-item");

        Swal.fire({
            title: 'Anda yakin?',
            text: 'Aksi ini tidak dapat diulang!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus data!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "{{ route('delete_mhs_logbimbingan') }}",
                    data: {id:id},
                    cache: false,
                    success: function(data) {
                        Swal.fire({
                            position:'center',
                            title: 'Success!',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        }).then((data) => {
                            location.reload();
                        })
                    },
                    error: function (data) {
                        Swal.fire({
                            position:'center',
                            title: 'Action Not Valid!',
                            icon: 'warning',
                            showConfirmButton: true,
                            // timer: 1500
                        }).then((data) => {
                            // location.reload();
                        })
                    }
                });
            }
        })
    });
</script>
{{-- End JS Delete Data --}}

{{-- JS Note Reject --}}
<script>
    $(document).on("click", "[data-name='note_reject']", function(e) {
        var id = $(this).attr("data-item");

        $.ajax({
            type: "POST",
            url: "{{route('show_log_bimbingan_mhs')}}",
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

{{-- JS Export PDF --}}
<script>
    $(document).on("click", "[data-name='exportpdf']", function(e) {
        $("[data-name='export_id_dospem']").val('').trigger("change");
        $("#modal_exportpdf").modal('show');
    });

    $(document).on("click", "[data-name='action_export']", function(e) {
        var id_mhs      = $("[data-name='export_id_mhs']").val();
        var id_dospem   = $("[data-name='export_id_dospem']").val();

        if(id_mhs === '' || id_dospem === ''){
            Swal.fire({
                position: 'center',
                title: 'Action Not Valid!',
                icon: 'warning',
                showConfirmButton: true,
                // timer: 1500
            }).then((data) => {
                // location.reload();
            })
        }else{
            var urlTemplate     = '{{route("showpdfmhslogbimbingan",["id_mhs"=>"idmhs","id_dospem"=>"iddospem"])}}';
            var replacements    = [
                                    {pattern:'iddospem', replacement:id_dospem},
                                    {pattern:'idmhs', replacement:id_mhs}
                                ];
            // var url         = urlTemplate.replace('kategoriid', kategori);
            replacements.forEach(function(replacement) {
                url = urlTemplate.replace(replacement.pattern, replacement.replacement);
            });

            // console.log(url);
            window.location.href = url;

        }
    });
</script>
{{-- End JS Export PDF --}}

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

    $(".select-2-export").select2({
        allowClear: false,
        width: '100%',
        dropdownParent: $("#modal_exportpdf")
    });


</script>
{{-- End Select2 --}}

@stop
