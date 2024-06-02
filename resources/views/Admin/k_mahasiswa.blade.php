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
                            <span>List Mahasiswa</span>
                            <button type="button" class="btn btn-success" data-name="add">ADD Mahasiswa</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive mt-3">
                            <table class="table" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NIM</th>
                                        <th>NAME</th>
                                        <th>NO TLP</th>
                                        <th>EMAIL</th>
                                        <th>PASSWORD</th>
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
                                            <td>{{$val->nik}}</td>
                                            <td>{{$val->name}}</td>
                                            <td>{{$val->no_tlp}}</td>
                                            <td>{{$val->email}}</td>
                                            <td>*** *** ***</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-outline-info" data-name="edit" data-item="{{$val->id}}">
                                                    <i class='bx bx-edit me-0'></i>
                                                </button>

                                                <button type="button" class="btn btn-outline-danger" data-name="delete" data-item="{{$val->id}}">
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Mahasiswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-8">
                        <div class="card-style">
                            <div class="mb-3">
                                <label for="" class="form-label">NIM</label>
                                <input type="text" class="form-control" id="" placeholder="NIM" data-name="nik">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Name</label>
                                <input type="text" class="form-control" id="" placeholder="Name" data-name="name">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">No TLP</label>
                                <input type="text" class="form-control" id="" placeholder="No TLP" data-name="no_tlp">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Email</label>
                                <input type="text" class="form-control" id="" placeholder="Email" data-name="email">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Password</label>
                                <input type="password" class="form-control" id="" placeholder="Password" data-name="password">
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card-style">
                            <div class="card-foto">
                                <img src="{{ asset('assets/profile/default.jpg') }}" alt="user avatar" id="img_add">
                            </div>
                            <div class="input-type-file">
                                <input type="file" id="add_foto" name="add_foto" accept="image/*" />
                                <label for="add_foto">Choose File</label>
                            </div>
                            <input type="hidden" id="add_name_foto" data-name="foto">
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Mahasiswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-8">
                        <div class="card-style">
                            <div class="mb-3">
                                <label for="" class="form-label">NIM</label>
                                <input type="text" class="form-control" id="" placeholder="NIM" data-name="edit_nik">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Name</label>
                                <input type="text" class="form-control" id="" placeholder="Name" data-name="edit_name">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">No TLP</label>
                                <input type="text" class="form-control" id="" placeholder="No TLP" data-name="edit_no_tlp">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Email</label>
                                <input type="text" class="form-control" id="" placeholder="Email" data-name="edit_email">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Password</label>
                                <input type="password" class="form-control" id="" placeholder="Password" data-name="edit_password">
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card-style">
                            <div class="card-foto">
                                <img src="{{ asset('assets/profile/default.jpg') }}" alt="user avatar" id="img_edit">
                            </div>
                            <div class="input-type-file">
                                <input type="file" id="edit_foto" name="edit_foto" accept="image/*" />
                                <label for="edit_foto">Choose File</label>
                            </div>
                            <input type="hidden" id="edit_name_foto" data-name="edit_foto">
                            <input type="hidden" id="" data-name="edit_id">
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

{{-- JS Add Data --}}
<script>
    $(document).on("click", "[data-name='add']", function(e) {
        $("[data-name='name']").val('');
        $("[data-name='nik']").val('');
        $("[data-name='no_tlp']").val('');
        $("[data-name='email']").val('');
        $("[data-name='password']").val('');
        $("[data-name='foto']").val('');
        $("#modal_add").modal('show');
    });

    $(document).on("click", "[data-name='save_add']", function(e) {
        var role_id = 3;
        var nik     = $("[data-name='nik']").val();
        var name    = $("[data-name='name']").val();
        var no_tlp  = $("[data-name='no_tlp']").val();
        var email   = $("[data-name='email']").val();
        var password    = $("[data-name='password']").val();
        var photo   = $("[data-name='foto']").val();
        var ttd     = '-';

        if (photo === '') {
            var photo = 'default.jpg';
        } else {
            var photo = $("[data-name='foto']").val();
        }

        var data = {
            role_id : role_id,
            nik : nik,
            name : name,
            no_tlp : no_tlp,
            email : email,
            password : password,
            photo : photo,
            ttd : ttd
        };

        console.log(data);

        if (nik === '' || name === '' || no_tlp === '' || email === '' || password === '') {
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
                url: "{{route('add_users')}}",
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

    $("#add_foto").on("change", function(e) {
        var ext = $("#add_foto").val().split('.').pop().toLowerCase();
        // console.log(ext)
        if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Format image failed!'
            })
        } else {
            var uploadedFile = URL.createObjectURL(e.target.files[0]);
            $('#img_add').attr('src', uploadedFile);
            var photo = e.target.files[0];
            var formData = new FormData();
            formData.append('add_foto', photo);
            $.ajax({
                url: "{{route('actphoto')}}",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(res) {
                    // console.log(res);
                    $('#add_name_foto').val(res);
                }
            })

        }
    });
</script>
{{-- End JS Add Data --}}

{{-- JS Edit Data --}}
<script>
    $(document).on("click", "[data-name='edit']", function(e) {
        var id = $(this).attr("data-item");
        $.ajax({
            type: "POST",
            url: "{{ route('actshowusers') }}",
            data: {id: id},
            cache: false,
            success: function(data) {
                console.log(data);
                $("[data-name='edit_id']").val(data.id);
                $("[data-name='edit_name']").val(data.name);
                $("[data-name='edit_nik']").val(data.nik);
                $("[data-name='edit_no_tlp']").val(data.no_tlp);
                $("[data-name='edit_email']").val(data.email);
                $("[data-name='edit_password']").val(data.pass);
                $("[data-name='edit_foto']").val(data.foto);
                var show_foto = "{{ asset('assets/profile') }}/" + data.photo;
                $('#img_edit').attr('src', show_foto);
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
        var role_id = 3;
        var id      = $("[data-name='edit_id']").val();
        var nik     = $("[data-name='edit_nik']").val();
        var name    = $("[data-name='edit_name']").val();
        var no_tlp  = $("[data-name='edit_no_tlp']").val();
        var email   = $("[data-name='edit_email']").val();
        var password    = $("[data-name='edit_password']").val();
        var photo   = $("[data-name='edit_foto']").val();
        var ttd     = '-';
        var is_active = 1;

        if (photo === '') {
            var photo = 'default.jpg';
        } else {
            var photo = $("[data-name='edit_foto']").val();
        }

        var data = {
            id : id,
            role_id : role_id,
            nik : nik,
            name : name,
            no_tlp : no_tlp,
            email : email,
            password : password,
            photo : photo,
            ttd : ttd,
            is_active : is_active
        };

        console.log(data);

        if (nik === '' || name === '' || no_tlp === '' || email === '' || password === '') {
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
                url: "{{route('edit_users')}}",
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

    $("#edit_foto").on("change", function(e) {
        var ext = $("#edit_foto").val().split('.').pop().toLowerCase();
        // console.log(ext)
        if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Format image failed!'
            })
        } else {
            var uploadedFile = URL.createObjectURL(e.target.files[0]);
            $('#img_edit').attr('src', uploadedFile);
            var photo = e.target.files[0];
            var formData = new FormData();
            formData.append('add_foto', photo);
            $.ajax({
                url: "{{route('actphoto')}}",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(res) {
                    // console.log(res);
                    $('#edit_name_foto').val(res);
                }
            })

        }
    });
</script>
{{-- End JS Edit Data --}}

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
                    url: "{{ route('delete_users') }}",
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

{{-- JS Datatable --}}
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
{{-- End JS Datatable --}}


@stop