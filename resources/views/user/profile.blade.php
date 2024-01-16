<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            margin-top: 20px;
            color: #1a202c;
            text-align: left;
            background-color: #e2e8f0;
        }

        .main-body {
            padding: 15px;
        }

        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col,
        .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }

        .mb-3,
        .my-3 {
            margin-bottom: 1rem !important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }

        .h-100 {
            height: 100% !important;
        }

        .shadow-none {
            box-shadow: none !important;
        }
    </style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="main-body">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Kembali</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                </ol>
            </nav>
            <div class="container ">
                @if (Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> {{ Session::get('success') }}
                </div>
                @endif

                @if (Session::get('failed'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal!</strong> {{ Session::get('failed') }}
                </div>
                @endif
            </div>
            <!-- /Breadcrumb -->

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        @csrf
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{ $user->jenis_kelamin === 'Laki-laki' ? asset('images/male.jpg') : asset('images/female.jpg') }}" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4>{{$user->name}}</h4>
                                    <p class="text-secondary mb-1">Pelanggan</p>
                                    <p class="text-muted font-size-sm">{{$user->alamat}}</p>
                                    <a class="btn btn-danger" href="/user/deleteUser/{{ $user->id }}">Hapus Akun</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            @csrf
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Nama</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$user->name}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Jenis Kelamin</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$user->jenis_kelamin}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$user->email}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">No Hp</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$user->no_hp}}
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Alamat</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$user->alamat}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn btn-info" href="{{ route ('user.editprofile')}}">Edit Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- resources/views/user/profile.blade.php -->


            </div>
            <div class="container">
                <div class="card mb-3 p-5">
                    <h3>Riwayat Pemesanan Paket:</h3>
                    <hr>
                    @if(isset($pemesananpakets) && $pemesananpakets->count() > 0)
                    @foreach($pemesananpakets->reverse() as $index => $pemesananpaket)
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="col-sm-3">
                                {{ $pemesananpaket->created_at }}
                            </div>
                            <div class="col-sm-6 text-secondary">
                                <table>
                                    <tr>
                                        <th>
                                            <p class="card-text">Pemesanan Paket {{ $index + 1 }}</p>
                                            <p class="card-text">Alamat :</p>
                                            <p class="card-text">Makanan :</p>
                                        </th>

                                        <td>
                                            <br>
                                            <p></p>
                                            <br>
                                            <p class="card-text"> {{ $pemesananpaket->alamat }}</p>
                                            <p class="card-text"> {{ $pemesananpaket->metode_pembayaran}}</p>
                                            <p class="card-text">
                                                <a href="#" data-toggle="modal" data-target="#makananModal{{ $pemesananpaket->id }}">Lihat Makanan</a>
                                            </p>

                                            <!-- Pilihan Makanan Modal -->
                                            <div class="modal fade" id="makananModal{{ $pemesananpaket->id }}" tabindex="-1" role="dialog" aria-labelledby="makananModalLabel{{ $pemesananpaket->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="makananModalLabel{{ $pemesananpaket->id }}">Makanan pada Pemesanan Paket {{ $index + 1 }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="card-text">
                                                                @php
                                                                $makanan_ids = explode(',', $pemesananpaket->paket->kode_makanan);
                                                                @endphp

                                                                @foreach($makanan_ids as $makanan_id)
                                                                @if($makanan_item = \App\Models\Makanan::find(trim($makanan_id)))
                                                                <span>{{ $makanan_item->nama_makanan }}</span>
                                                                <br>
                                                                @else
                                                                Makanan tidak ditemukan
                                                                <br>
                                                                @endif
                                                                @endforeach
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-sm-3">
                                <p class="card-text" style="color: {{ $pemesananpaket->status === 'Berlangganan' ? 'green' : 'inherit' }}">
                                    {{ $pemesananpaket->status }}
                                </p>
                            </div>
                        </div>
                        <hr>
                    </div>
                    @endforeach
                </div>
                @else
                <p>Tidak ada riwayat pemesanan paket.</p>
                @endif
            </div>

            <div class="container">
                <div class="card mb-3 p-5">
                    <h3>Riwayat Pemesanan:</h3>
                    <hr>

                    @php
                    $totalMenungguPembayaran = 0;
                    @endphp

                    @if(isset($pemesanans) && $pemesanans->count() > 0)
                    @foreach($pemesanans->reverse() as $index => $pemesanan)
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="col-sm-3">
                                {{ $pemesanan->created_at }}
                            </div>
                            <div class="col-sm-6 text-secondary">
                                <table>
                                    <tr>
                                        <th>
                                            <p class="card-text">Pemesanan {{ $index + 1 }}</p>

                                            <p class="card-text">Alamat :</p>
                                            <p class="card-text">Metode Pembayaran :</p>
                                            <p class="card-text">Makanan :</p>
                                        </th>

                                        <td>
                                            <br>
                                            <p></p>
                                            <p class="card-text"> {{ $pemesanan->alamat }}</p>
                                            <p class="card-text"> {{ $pemesanan->metode_pembayaran}}</p>
                                            <p class="card-text">
                                                @php
                                                $makanan_ids = explode(',', $pemesanan->makanan_id);
                                                @endphp
                                                @foreach($makanan_ids as $makanan_id)
                                                @if($makanan_item = \App\Models\Makanan::find(trim($makanan_id)))
                                                {{ $makanan_item->nama_makanan }}
                                                <br>
                                                @else
                                                Makanan tidak ditemukan
                                                <br>
                                                @endif
                                                @endforeach
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-sm-3">
                                <p class="card-text" style="color: {{ $pemesanan->status === 'Menunggu Pembayaran' ? 'red' : 'inherit' }}">
                                    {{ $pemesanan->status }}
                                    @if($pemesanan->status === 'Menunggu Pembayaran')
                                    @php
                                    $totalMenungguPembayaran++;
                                    @endphp
                                    @endif
                                </p>
                            </div>
                        </div>
                        <hr>
                    </div>
                    @endforeach

                    <div class="alert alert-info mt-3">
                        Total Pemesanan Menunggu Pembayaran: {{ $totalMenungguPembayaran }}
                    </div>

                    @else
                    <p>Tidak ada riwayat pemesanan.</p>
                    @endif
                </div>
            </div>




</body>
<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Add your custom scripts or links here if needed -->

</html>