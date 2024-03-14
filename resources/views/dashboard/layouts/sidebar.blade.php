<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed{{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed{{ Request::is('dashboard/datausers*') ? 'active' : '' }}" href="/dashboard/datausers">
                <i class="bi bi-people-fill"></i>
                <span>Kelola User</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed{{ Request::is('dashboard/materis*') ? 'active' : '' }}" href="/dashboard/materis">
                <i class="bi bi-book-fill"></i>
                <span>Kelola Materi</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed{{ Request::is('dashboard/ruangans*') ? 'active' : '' }}" href="/dashboard/ruangans">
                <i class="bi bi-box-seam-fill"></i>
                <span>Kelola Kelas</span>
            </a>
        </li>
        <!--
        <li class="nav-item">
            <a class="nav-link " href="#">
                <i class="bi bi-code"></i>
                <span>Create Code</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="#">
                <i class="bi bi-check2-all"></i>
                <span>Absen</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="#">
                <i class="bi bi-card-checklist"></i>
                <span>Riwayat Absen</span>
            </a>
        </li> -->

        <!-- End Dashboard Nav -->



    </ul>

</aside>