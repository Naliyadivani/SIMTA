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
                            <span>List Kelola Dosen</span>
                            <button type="button" class="btn btn-success" data-name="add">KELOLA DOSEN</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive mt-3">
                            <table class="table" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA MAHASISWA</th>
                                        <th>PEMBIMBING 1</th>
                                        <th>PEMBIMBING 2</th>
                                        <th>PENGUJI 1</th>
                                        <th>PENGUJI 2</th>
                                        <th>PENGUJI 3</th>
                                        <th class="text-center">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach($arr as $key => $val)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$val['name_mhs']}}</td>
                                        <td>{{$val['name_dospem1']}}</td>
                                        <td>{{$val['name_dospem2']}}</td>
                                        <td>{{$val['name_dospej1']}}</td>
                                        <td>{{$val['name_dospej2']}}</td>
                                        <td>{{$val['name_dospej3']}}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-outline-info" data-name="edit" data-item="{{$val['id']}}">
                                                <i class='bx bx-edit me-0'></i>
                                            </button>

                                            <button type="button" class="btn btn-outline-danger" data-name="delete" data-item="{{$val['id']}}">
                                                <i class='bx bxs-trash me-0'></i>
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Kelola Dosen Pembimbing Dan Penguji</h1>
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

                            <h5 class="text-bold mb-0">Dosen Pembimbing</h5>
                            <hr class="mt-0">
                            <div class="mb-3">
                                <label for="" class="form-label">Dosen Pembimbing 1</label>
                                <select data-name="id_dospem_1" class="form-select select-2-add">
                                    <option value="">-- Select Dosen Pembimbing 1 --</option>
                                    @foreach ($dosen as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->nik }} - {{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Dosen Pembimbing 2</label>
                                <select data-name="id_dospem_2" class="form-select select-2-add">
                                    <option value="">-- Select Dosen Pembimbing 2 --</option>
                                    @foreach ($dosen as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->nik }} - {{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <h5 class="text-bold mb-0">Dosen Penguji</h5>
                            <hr class="mt-0">
                            <div class="mb-3">
                                <label for="" class="form-label">Dosen Penguji 1</label>
                                <select data-name="id_dospej_1" class="form-select select-2-add">
                                    <option value="">-- Select Dosen Penguji 1 --</option>
                                    @foreach ($dosen as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->nik }} - {{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Dosen Penguji 2</label>
                                <select data-name="id_dospej_2" class="form-select select-2-add">
                                    <option value="">-- Select Dosen Penguji 2 --</option>
                                    @foreach ($dosen as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->nik }} - {{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Dosen Penguji 3</label>
                                <select data-name="id_dospej_3" class="form-select select-2-add">
                                    <option value="">-- Select Dosen Penguji 3 --</option>
                                    @foreach ($dosen as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->nik }} - {{ $value->name }}</option>
                                    @endforeach
                                </select>
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

{{-- Modal Edit --}}
<div class="modal fade" id="modal_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Kelola Dosen Pembimbing Dan Penguji</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card-style">
                            <div class="mb-3">
                                <label for="" class="form-label">Pilih Mahasiswa</label>
                                <select data-name="edit_id_mhs" class="form-select select-2-edit">
                                    <option value="">-- Select Mahasiswa --</option>
                                    @foreach ($mhs as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->nik }} - {{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <h5 class="text-bold mb-0">Dosen Pembimbing</h5>
                            <hr class="mt-0">
                            <div class="mb-3">
                                <label for="" class="form-label">Dosen Pembimbing 1</label>
                                <select data-name="edit_id_dospem_1" class="form-select select-2-edit">
                                    <option value="">-- Select Dosen Pembimbing 1 --</option>
                                    @foreach ($dosen as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->nik }} - {{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Dosen Pembimbing 2</label>
                                <select data-name="edit_id_dospem_2" class="form-select select-2-edit">
                                    <option value="">-- Select Dosen Pembimbing 2 --</option>
                                    @foreach ($dosen as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->nik }} - {{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <h5 class="text-bold mb-0">Dosen Penguji</h5>
                            <hr class="mt-0">
                            <div class="mb-3">
                                <label for="" class="form-label">Dosen Penguji 1</label>
                                <select data-name="edit_id_dospej_1" class="form-select select-2-edit">
                                    <option value="">-- Select Dosen Penguji 1 --</option>
                                    @foreach ($dosen as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->nik }} - {{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Dosen Penguji 2</label>
                                <select data-name="edit_id_dospej_2" class="form-select select-2-edit">
                                    <option value="">-- Select Dosen Penguji 2 --</option>
                                    @foreach ($dosen as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->nik }} - {{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Dosen Penguji 3</label>
                                <select data-name="edit_id_dospej_3" class="form-select select-2-edit">
                                    <option value="">-- Select Dosen Penguji 3 --</option>
                                    @foreach ($dosen as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->nik }} - {{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" data-name="edit_id">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-name="save_edit">Save</button>
            </div>
        </div>
    </div>
</div>
{{-- End Modal Edit --}}

{{-- JS Add Kelola Dosen --}}
<script>
    $(document).on("click", "[data-name='add']", function(e) {
        $("[data-name='id_mhs']").val('').trigger("change");
        $("[data-name='id_dospem_1']").val('').trigger("change");
        $("[data-name='id_dospem_2']").val('').trigger("change");
        $("[data-name='id_dospej_1']").val('').trigger("change");
        $("[data-name='id_dospej_2']").val('').trigger("change");
        $("[data-name='id_dospej_3']").val('').trigger("change");

        $("#modal_add").modal('show');
    });

    $(document).on("click", "[data-name='save_add']", function(e) {
        var id_mhs      = $("[data-name='id_mhs']").val();
        var id_dospem_1 = $("[data-name='id_dospem_1']").val();
        var id_dospem_2 = $("[data-name='id_dospem_2']").val();
        var id_dospej_1 = $("[data-name='id_dospej_1']").val();
        var id_dospej_2 = $("[data-name='id_dospej_2']").val();
        var id_dospej_3 = $("[data-name='id_dospej_3']").val();

        var data = {
            id_mhs : id_mhs,
            id_dospem_1 : id_dospem_1,
            id_dospem_2 : id_dospem_2,
            id_dospej_1 : id_dospej_1,
            id_dospej_2 : id_dospej_2,
            id_dospej_3 : id_dospej_3
        };

        if(id_mhs === '' || id_dospem_1 === '' || id_dospej_1 === ''){
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
                url: "{{route('add_setting_dosen')}}",
                data: {data: data},
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
{{-- End JS Add Kelola Dosen --}}

{{-- Js Edit Kelola Data --}}
<script>
    $(document).on("click", "[data-name='edit']", function(e) {
        var id = $(this).attr("data-item");
        $.ajax({
            type: "POST",
            url: "{{ route('actshowkeloladospem') }}",
            data: {id: id},
            cache: false,
            success: function(data) {
                console.log(data);
                $("[data-name='edit_id']").val(data.id);
                $("[data-name='edit_id_mhs']").val(data.id_mhs).trigger("change");
                $("[data-name='edit_id_dospem_1']").val(data.id_dospem_1).trigger("change");
                $("[data-name='edit_id_dospem_2']").val(data.id_dospem_2).trigger("change");
                $("[data-name='edit_id_dospej_1']").val(data.id_dospej_1).trigger("change");
                $("[data-name='edit_id_dospej_2']").val(data.id_dospej_2).trigger("change");
                $("[data-name='edit_id_dospej_3']").val(data.id_dospej_3).trigger("change");

                $("#modal_edit").modal('show');
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

    $(document).on("click", "[data-name='save_edit']", function(e) {
        var id              = $("[data-name='edit_id']").val();
        var id_mhs          = $("[data-name='edit_id_mhs']").val();
        var id_dospem_1     = $("[data-name='edit_id_dospem_1']").val();
        var id_dospem_2     = $("[data-name='edit_id_dospem_2']").val();
        var id_dospej_1     = $("[data-name='edit_id_dospej_1']").val();
        var id_dospej_2     = $("[data-name='edit_id_dospej_2']").val();
        var id_dospej_3     = $("[data-name='edit_id_dospej_3']").val();

        var data = {
            id : id,
            id_mhs : id_mhs,
            id_dospem_1 : id_dospem_1,
            id_dospem_2 : id_dospem_2,
            id_dospej_1 : id_dospej_1,
            id_dospej_2 : id_dospej_2,
            id_dospej_3 : id_dospej_3
        }


        // console.log(data);

        if (id === '' || id_mhs === '' || id_dospem_1 === '' || id_dospej_1 === '') {
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
                url: "{{route('edit_kelola_dospem')}}",
                data: {data: data},
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
{{-- End Js Edit Kelola Data --}}

{{-- JS Datatable --}}
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
{{-- End JS Datatable --}}\

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