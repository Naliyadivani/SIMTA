<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="" class="logo d-flex align-items-center">
            <img src="{{asset('pictures/Logo_simta.png')}}" alt="">
            <span class="d-none d-lg-block fs-6 ps-3">Sistem Informasi <br>Monitoring Tugas Akhir </span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    <div class="search-bar">

    </div>

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="{{asset('assets/profile/'.$idnusr->photo)}}" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{ucwords($idnusr->name)}}</span>
                </a>

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{ucwords($idnusr->name)}}</h6>
                        <span>{{$idnusr->role_name}}</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="#" data-name="show_profile" data-item="{{$idnusr->id}}">
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{route('logout')}}">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                    </li>

                </ul>
            </li>

        </ul>
    </nav>

  </header>

  {{-- Modal Show Profile --}}
<div class="modal fade" id="modal_show_profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Profile</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                      <img src="{{asset('assets/profile/'.$idnusr->photo)}}" alt="Profile" class="rounded-circle w-100">
                      <h2>{{$idnusr->nik}} - {{ucwords($idnusr->name)}}</h2>
                      <h3>{{$idnusr->role_name}}</h3>
                    </div>
                </div>

                <div class="card-style">
                    <div class="card-foto">
                        <img src="{{asset('assets/ttd/'.$idnusr->ttd)}}" alt="user avatar" id="head_img_ttd">
                    </div>
                    <div class="input-type-file">
                        <input type="file" id="ttd_foto" name="ttd_foto" accept="image/*" />
                        <label for="ttd_foto">Choose File</label>
                    </div>
                    <input type="hidden" id="ttd_name_foto" data-name="ttd_foto">
                    <input type="hidden" data-name="id_upload_ttd" value="{{$idnusr->id}}">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                @if ($idnusr->role_id == 2)
                    <button type="button" class="btn btn-primary" data-name="save_ttd">Save</button>
                @endif
            </div>
        </div>
    </div>
</div>
{{-- End Modal Show Profile --}}

{{-- JS Show Profile --}}
<script>
    $(document).on("click", "[data-name='show_profile']", function(e) {
        $("#modal_show_profile").modal('show');
    });

    $(document).on("click", "[data-name='save_ttd']", function(e) {
        var id      = $("[data-name='id_upload_ttd']").val();
        var ttd     = $("[data-name='ttd_foto']").val();

        // console.log(data);

        if (id === '' || ttd === '') {
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
                url: "{{route('upload_ttd')}}",
                data: {id: id, ttd: ttd},
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

    $("#ttd_foto").on("change", function(e) {
        var ext = $("#ttd_foto").val().split('.').pop().toLowerCase();
        // console.log(ext)
        if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Format image failed!'
            })
        } else {
            var uploadedFile = URL.createObjectURL(e.target.files[0]);
            $('#head_img_ttd').attr('src', uploadedFile);
            var photo = e.target.files[0];
            var formData = new FormData();
            formData.append('add_ttd', photo);
            $.ajax({
                url: "{{route('actphoto')}}",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(res) {
                    // console.log(res);
                    $('#ttd_name_foto').val(res);
                }
            })

        }
    });
</script>
{{-- ENd JS Show Profile --}}
