<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Home Admin</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('tmp/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('tmp/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">

    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon mt-1 ">
                    <img src="{{asset('images/logo.png')}}" style="width: 145px;">
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route ('admin.dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data Manajer
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Data</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Kelola Data</h6>
                        <a class="collapse-item" href="{{ route ('admin.admin') }}">User</a>
                        <a class="collapse-item" href="{{ route ('admin.makanan') }}">Makanan</a>
                        <a class="collapse-item" href="{{ route ('admin.paket') }}">Paket</a>
                        <a class="collapse-item" href="{{ route ('admin.pemesanan') }}">Pemesanan Makanan</a>
                        <a class="collapse-item" href="{{ route ('admin.pemesananpaket') }}">Pemesanan Paket</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Pengaturan</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="{{ route('logout') }}">Logout</a>
                    </div>
                </div>
            </li>




        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>



                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle" src="{{asset('image/user.png')}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>

                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Cetak Laporan</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="container ">
                                @if (Session::get('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Berhasil!</strong> {{ Session::get('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif

                                @if (Session::get('failed'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Gagal!</strong> {{ Session::get('failed') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif
                            </div>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Edit Data Makanan</h6>
                                </div>
                                <div class="card-body">
                                    <form action="/postEditMakanan/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group mt-4">
                                            <label class="text-secondary mb-2">Kode Makanan</label>
                                            <input type="text" class="form-control border border-secondary form-control" name="kode_makanan" required value="{{ $data->kode_makanan }}">
                                            <span class="text-danger">
                                                @error('kodeMakanan')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group mt-1">
                                            <label class="text-secondary mb-2">Nama Makanan</label>
                                            <input type="text" class="form-control border border-secondary form-control" name="nama_makanan" required value="{{ $data->nama_makanan }}">
                                            <span class="text-danger">
                                                @error('namaMakanan')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group mt-1">
                                            <label class="text-secondary mb-2">Jenis Makanan</label>
                                            <select class="form-select" aria-label="Floating label select example" name="jenis_makanan">
                                                <option value="Menaikkan Berat Badan" {{ $data->jenis_makanan === 'Menaikkan Berat Badan' ? 'selected' : '' }}>
                                                    Menaikkan Berat Badan</option>
                                                <option value="Menurunkan Berat Badan" {{ $data->jenis_makanan === 'Menurunkan Berat Badan' ? 'selected' : '' }}>
                                                    Menurunkan Berat Badan</option>
                                            </select>
                                            <div class="form-group mt-1">
                                                <label class="text-secondary mb-2">Kalori</label>
                                                <input type="text" class="form-control border border-secondary form-control" name="kalori" required value="{{ $data->kalori }}">
                                                <span class="text-danger">
                                                    @error('kalori')
                                                    {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="form-group mt-1">
                                                <label class="text-secondary mb-2">Protein</label>
                                                <input type="text" class="form-control border border-secondary form-control" name="protein" required value="{{ $data->protein }}">
                                                <span class="text-danger">
                                                    @error('protein')
                                                    {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="form-group mt-1">
                                                <label class="text-secondary mb-2">Lemak</label>
                                                <input type="text" class="form-control border border-secondary form-control" name="lemak" required value="{{ $data->lemak }}">
                                                <span class="text-danger">
                                                    @error('lemak')
                                                    {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group mt-1">
                                            <label class="text-secondary mb-2">Karbohidrat</label>
                                            <input type="text" class="form-control border border-secondary form-control" name="karbohidrat" required value="{{ $data->karbohidrat }}">
                                            <span class="text-danger">
                                                @error('karbohidrat')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group mt-1">
                                            <label class="text-secondary mb-2">Foto Makanan</label>
                                            <input class="form-control mb-2" placeholder="Nama file lama: {{ $data->foto }}" disabled>
                                            <input class="form-control" type="file" name="foto">
                                            <div class="form-text">Maksimal ukuran gambar makanan 5MB</div>
                                            <img class="mt-3" style="width: 100px" src="{{ asset('/images/' . $data->foto) }}" alt="foto makanan">
                                        </div>
                                        <div class="form-group mt-1">
                                            <label class="text-secondary mb-2">Harga</label>
                                            <input type="text" class="form-control border border-secondary form-control" name="harga" required value="{{ $data->harga }}">
                                            <span class="text-danger">
                                                @error('harga')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group mt-1">
                                            <label class="text-secondary mb-2">Deskripsi</label>
                                            <textarea class="form-control" name="deskripsi" style="height: 250px" required>{{ $data->deskripsi }}</textarea>
                                            <span class="text-danger">
                                                @error('deskripsi')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-5">Update Data Makanan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- End of Content Wrapper -->

                </div>
            </div>
            <!-- End of Page Wrapper -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="col">
                        <p class="mb-2 text-center text-lg-start">Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script>. All Rights Reserved. <a>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="login.html">Logout</a>
                        </div>
                    </div>
                </div>
            </div>



            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <script href="{{ asset('tmp/js/sb-admin-2.min.css') }}"></script>
            <script href="{{ asset('tmp/vendor/jquery/jquery.min.js') }}"></script>
            <script href="{{ asset('tpm/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
            <script href="{{ asset('tmp/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
            <script href="{{ asset('tmp/vendor/chart.js/Chart.min.js') }}"></script>

</body>

</html>