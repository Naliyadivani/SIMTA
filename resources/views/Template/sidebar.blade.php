<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        @php
            $menu    = ['dasbor'];
        @endphp
        @if(in_array(Route::currentRouteName() , $menu))
            @php
                $menu_active = '';
            @endphp
        @else
            @php
                $menu_active = 'collapsed';
            @endphp
        @endif
        <li class="nav-item">
            <a class="nav-link {{$menu_active}}" href="{{route('dasbor')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        @if($idnusr->role_id == 1)
            <li class="nav-heading">Menu Admin</li>

            @php
                $menu    = ['kadmin','kdosen','kmahasiswa'];
            @endphp
            @if(in_array(Route::currentRouteName() , $menu))
                @php
                    $menu_active    = '';
                    $menu_show      = 'show';
                @endphp
            @else
                @php
                    $menu_active    = 'collapsed';
                    $menu_show      = '';
                @endphp
            @endif

            <li class="nav-item">
                <a class="nav-link {{$menu_active}}" data-bs-target="#kelola-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-people-fill"></i><span>Kelola Akun Pengguna</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="kelola-nav" class="nav-content collapse {{$menu_show}}" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('kadmin')}}" class="@if(Route::currentRouteName() == 'kadmin') active @endif">
                            <i class="bi bi-circle"></i><span>Admin</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('kdosen')}}" class="@if(Route::currentRouteName() == 'kdosen') active @endif">
                            <i class="bi bi-circle"></i><span>Dosen</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('kmahasiswa')}}" class="@if(Route::currentRouteName() == 'kmahasiswa') active @endif">
                            <i class="bi bi-circle"></i><span>Mahasiswa</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="">
                    <i class="bi bi-grid"></i>
                    <span>Kelola Dosen</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="">
                    <i class="bi bi-grid"></i>
                    <span>Rubrik Penilaian</span>
                </a>
            </li>
        @endif

        @if($idnusr->role_id == 2)
            <li class="nav-heading">Menu Dosen</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="">
                    <i class="bi bi-grid"></i>
                    <span>Log Bimbingan</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#berita-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-people-fill"></i><span>Berita Acara</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="berita-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="">
                            <i class="bi bi-circle"></i><span>BA Seminar</span>
                        </a>
                    </li>

                    <li>
                        <a href="">
                            <i class="bi bi-circle"></i><span>BA Sidang TA</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#rubrik-penilaian-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-people-fill"></i><span>Rubrik Penilaian</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="rubrik-penilaian-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="">
                            <i class="bi bi-circle"></i><span>Nilai Bimbingan</span>
                        </a>
                    </li>

                    <li>
                        <a href="">
                            <i class="bi bi-circle"></i><span>Nilai Sidang TA</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endif

        @if($idnusr->role_id == 3)
            <li class="nav-heading">Menu Mahasiswa</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="">
                    <i class="bi bi-grid"></i>
                    <span>Log Bimbingan</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#berita-mhs-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-people-fill"></i><span>Berita Acara</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="berita-mhs-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="">
                            <i class="bi bi-circle"></i><span>BA Seminar</span>
                        </a>
                    </li>

                    <li>
                        <a href="">
                            <i class="bi bi-circle"></i><span>BA Sidang TA</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endif

    </ul>
</aside>