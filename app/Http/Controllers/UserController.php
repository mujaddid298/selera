<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Makanan;
use App\Models\Paket;
use App\Models\User;
use App\Models\Pemesanan;
use App\Models\PemesananPaket;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{

    public function homenaik(Request $request)
    {
        $paketdata = Paket::all();

        $search = $request->input('search');
        $data = Makanan::where('jenis_makanan', '=', 'Menaikkan Berat Badan')
            ->where('id', 'LIKE', '%' . $search . '%')
            ->paginate(5);


        if ($data->count() > 0) {
            return view('user.homenaik', compact('paketdata', 'data'));
        } else {
            return redirect('/auth/login')->with('failed', 'Data not found');
        }
    }

    public function hometurun(Request $request)
    {
        $paketdata = Paket::all();

        $search = $request->input('search');

        $data = Makanan::where('jenis_makanan', '=', 'Menurunkan Berat Badan')
            ->where('id', 'LIKE', '%' . $search . '%')
            ->get();

        if ($data->count() > 0) {
            return view('user.hometurun', compact('paketdata', 'data'));
        } else {
            return redirect('/auth/login')->with('failed', 'Data not found');
        }
    }


    public function pembayaran(request $request)
    {
        return view('user.pembayaran');
    }
    public function pembayaranpaket(request $request)
    {
        return view('user.pembayaranpaket');
    }
    public function showOrderPage($id)
    {
        $makanan = Makanan::find($id);

        if (!$makanan) {
            abort(404); // Handle jika makanan tidak ditemukan
        }

        $user = auth()->user();

        // Menambahkan data user ke dalam $data
        $data = [
            'makanan' => $makanan,
            'user' => $user,
        ];

        return view('user.pembayaran', compact('data'));
    }

    public function showPaket($id)
    {
        $paket = Paket::find($id);
        if (!$paket) {
            abort(404);
        }
        $user = auth()->user();

        // Fetch the necessary data from your database or any other source
        $data = [
            'paket' => $paket,
            'user' => $user,
        ];

        // Pass the data to the view
        return view('user.pembayaranpaket', compact('data'));
    }
    public function postPemesanan(Request $request)
    {
        try {
            // Validate the request data
            $request->validate([
                'id' => 'required',
                'name' => 'required|string|max:255',
                'alamat' => 'required|string',
                'metode_pembayaran' => 'required|string',
                'bukti_pembayaran' => ($request->input('metode_pembayaran') === 'transfer_bank') ? 'required|image|mimes:jpeg,png,jpg,gif|max:2048' : '',
            ]);

            // Find the Makanan or throw a 404 error
            $makanan = Makanan::find($request->input('id'));

            if (!$makanan) {
                abort(404); // Handle if Makanan is not found
            }

            // Create a new Pemesanan instance
            $pemesanan = new Pemesanan([
                'makanan_id' => $makanan->id,
                'user_id' => auth()->user()->id,
                'name' => $request->input('name'),
                'alamat' => $request->input('alamat'),
                'metode_pembayaran' => $request->input('metode_pembayaran'),
                'status' => ($request->input('metode_pembayaran') === 'cod') ? 'Menunggu Pembayaran' : 'cod',
            ]);

            // Manage image upload if the payment method is 'transfer_bank'
            if ($request->input('metode_pembayaran') === 'transfer_bank' && $request->hasFile('bukti_pembayaran')) {
                $file = $request->file('bukti_pembayaran');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('images/', $filename);
                $pemesanan->bukti_pembayaran = $filename;
                $pemesanan->status = 'Telah Dibayar';
            }

            // Save the Pemesanan to the database
            $pemesanan->save();

            // Redirect to success page with a success message
            return redirect()->route('your.success.route')->with('success', 'Pesanan berhasil disimpan');
        } catch (\Exception $e) {
            // Handle exceptions (e.g., log, redirect, show an error page)
            return response()->view('errors.404', [], 404);
        }
    }


    public function storePemesanan(Request $request)
    {
        $userId = auth()->user()->id;
        $user = User::find($userId);

        // Use correct comparison in the if condition
        if ($request->input('metode_pembayaran') === 'cod') {
            $request->validate([
                'id' => 'required',
                'name' => 'required|string|max:255',
                'alamat' => 'required|string',
                'metode_pembayaran' => 'required|string',
            ]);

            $makananArray = $request->input('id');
            $makananIdString = implode(',', $makananArray);

            if (strlen($makananIdString) <= 255) {
                $pemesanan = new Pemesanan([
                    'makanan_id' => $makananIdString,
                    'user_id' => $userId,
                    'name' => $user->name,
                    'alamat' => $user->alamat,
                    'metode_pembayaran' => $request->input('metode_pembayaran'),
                    'status' => 'Menunggu Pembayaran', // Update status langsung di sini
                ]);

                $pemesanan->save();
            } else {
                // Handle kesalahan jika panjang string melebihi batas
                // (mungkin memotong, memberikan pesan kesalahan, atau tindakan lain sesuai kebutuhan)
            }
        } else {
            $request->validate([
                'id' => 'required',
                'name' => 'required|string|max:255',
                'alamat' => 'required|string',
                'metode_pembayaran' => 'required|string',
                'bukti_pembayaran' => ($request->input('metode_pembayaran') === 'transfer_bank') ? 'required|image|mimes:jpeg,png,jpg,gif|max:2048' : '',
            ]);

            $makananArray = $request->input('id');
            $makananIdString = implode(',', $makananArray);

            if (strlen($makananIdString) <= 255) {
                $pemesanan = new Pemesanan([
                    'makanan_id' => $makananIdString,
                    'user_id' => $userId,
                    'name' => $request->input('name'),
                    'alamat' => $request->input('alamat'),
                    'metode_pembayaran' => $request->input('metode_pembayaran'),
                    'bukti_pembayaran' => null,
                    'status' => 'Menunggu Pembayaran',
                ]);

                if ($request->input('metode_pembayaran') === 'transfer_bank' && $request->hasFile('bukti_pembayaran')) {
                    $file = $request->file('bukti_pembayaran');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '.' . $extension;
                    $file->move('images/', $filename);
                    $pemesanan->bukti_pembayaran = $filename;
                    $pemesanan->status = 'Menunggu Konfirmasi';
                }

                $pemesanan->save();
            } else {
                // Handle kesalahan jika panjang string melebihi batas
                // (mungkin memotong, memberikan pesan kesalahan, atau tindakan lain sesuai kebutuhan)
            }
        }

        // Redirect to the appropriate route based on the target
        $target = ($user->target == 'naik') ? 'naik' : 'turun';
        if ($target == 'naik') {
            return redirect()->route('user.homenaik')->with('success', 'Pesanan berhasil disimpan');
        } else {
            return redirect()->route('user.hometurun')->with('success', 'Pesanan berhasil disimpan');
        }
    }


    public function storePemesananPaket(Request $request, User $user)
    {
        // Validasi data dari formulir
        $request->validate([
            'id' => 'required',
            'name' => 'required|string',
            'alamat' => 'required|string',
            'no_hp' => 'required|string',
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Check if the associated paket (package) exists
        $paket = Paket::find($request->input('id'));

        if (!$paket) {
            // Handle the case where the package is not found
            return redirect()->back()->with('error', 'Invalid package selected.');
        }

        // Simpan data pemesanan
        $pemesanan = new PemesananPaket;
        $pemesanan->paket_id = $request->input('id');
        $pemesanan->user_id = auth()->user()->id;
        $pemesanan->name = $request->input('name');
        $pemesanan->alamat = $request->input('alamat');
        $pemesanan->no_hp = $request->input('no_hp');
        $pemesanan->jenis_paket = $paket->jenis_paket;
        $pemesanan->harga = $paket->harga;


        if ($request->hasFile('bukti_pembayaran')) {
            $fileName = $request->file('bukti_pembayaran')->store('uploads');
            $pemesanan->bukti_pembayaran = $fileName;
        } else {
            return redirect()->back()->with('error', 'Please upload a valid image file.');
        }

        // Set status berlangganan
        $pemesanan->status = 'Berlangganan';

        $pemesanan->save();

        // Mengambil target dari tabel users
        $userId = auth()->user()->id;
        $user = User::find($userId);
        $target = ($user->target == 'naik') ? 'naik' : 'turun';

        // Redirect ke halaman sukses dengan pesan
        if ($target == 'naik') {
            return redirect()->route('user.homenaik')->with('success', 'Pemesanan berhasil disimpan. Anda sekarang berlangganan.');
        } else {
            return redirect()->route('user.hometurun')->with('success', 'Pemesanan berhasil disimpan. Anda sekarang berlangganan.');
        }
    }


    public function profile(Request $request)
    {
        $user = auth()->user();
        $pemesanans = Pemesanan::where('user_id', $user->id)->get();
        $pemesananpakets = PemesananPaket::where('user_id', $user->id)->get();
        $makanan = Makanan::all();
        $paket = Paket::all();
        return view('user.profile', compact('user', 'pemesanans', 'paket', 'makanan', 'pemesananpakets'));
    }


    public function editProfile()
    {

        $user = auth()->user();
        return view('user.editprofile', compact('user'));
    }

    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns',
            'jenisKelamin' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'password' => 'required',
        ]);

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->jenis_kelamin = $request->jenisKelamin;
        $user->no_hp = $request->no_hp;
        $user->alamat = $request->alamat;
        $user->password = bcrypt($request->password);


        $user->save();

        return redirect()->route('user.profile')->with('success', 'Profile anda berhasil diubah.');
    }

    public function deleteUser($id)
    {

        $data = User::find($id);

        $data->delete();

        if ($data) {
            return redirect()->route('auth.login')->with('success', 'Akun telah di hapus!.');
        } else {
            return back()->with('failed', 'Gagal menghapus data!');
        }
    }

    public function keranjang()
    {
        return view('user.keranjang');
    }


    public function detailmakanan(Request $request)
    {
        $query = $request->get('search');
        $data = Makanan::when($query, function ($query) use ($request) {
            $query->where('nama_makanan', 'like', '%' . $request->search . '%')
                ->orWhere('jenis_makanan', 'like', '%' . $request->search . '%');
        })->get();

        return view('user.detailmakanan', compact('data'));
    }

    public function addToCart($id)
    {
        $makanan = Makanan::find($id);

        if (!$makanan) {
            return response()->json(['message' => 'Item not found'], 404);
        }

        // Menggunakan session untuk menyimpan keranjang belanja sementara
        $cart = Session::get('cart', []);

        // Cek apakah item sudah ada di keranjang
        if (array_key_exists($makanan->id, $cart)) {
            // Jika sudah ada, tambahkan jumlahnya
            $cart[$makanan->id]['quantity']++;
        } else {
            // Jika belum ada, tambahkan item baru ke keranjang
            $cart[$makanan->id] = [
                'id' => $makanan->id,
                'nama_makanan' => $makanan->nama_makanan,
                'harga' => $makanan->harga,
                'quantity' => 1,
                'foto' => $makanan->foto, // Menyertakan informasi foto di dalam data keranjang
            ];
        }

        // Simpan kembali keranjang belanja ke dalam session
        Session::put('cart', $cart);

        return response()->json(['message' => 'Item added to cart']);
    }


    public function pembayaranKeranjang(Request $request)
    {
        try {
            // Find the Makanan or throw a 404 error
            $user = auth()->user();

            // Get the selected items data from the query parameter
            $selectedItemsJson = $request->query('items');

            // Validate and decode the JSON string
            $selectedItems = json_decode(urldecode($selectedItemsJson), true);

            if (!is_array($selectedItems)) {
                throw new \InvalidArgumentException('Invalid selected items data.');
            }

            // Calculate the total price
            $totalPrice = collect($selectedItems)->sum('price');

            // Pass data to the payment 
            return view('user.pembayarankeranjang', [
                'user' => $user,
                'selectedItems' => $selectedItems,
                'totalPrice' => $totalPrice,
            ]);
        } catch (\Exception $e) {
            // Handle exceptions (e.g., log, redirect, show an error page)
            return response()->view('errors.404', [], 404);
        }
    }

    public function riwayatPemesanan()
    {
        $pemesanans = Pemesanan::all();
        // Ambil data pemesanan dari database, sesuai dengan logika bisnis Anda
        $pemesanans = Pemesanan::where('user_id', auth()->user()->id)->get();

        // Kirim data pemesanan ke view
        return view('user.profile', ['pemesanans' => $pemesanans]);
    }


    public function konfirmasiPembayaran($id)
    {
        // Find the Pemesanan by ID
        $pemesanan = Pemesanan::find($id);

        if (!$pemesanan) {
            // Handle case where Pemesanan is not found
            abort(404, 'Pemesanan not found');
        }

        // Perform logic to confirm the payment (update status, etc.)
        $pemesanan->status = 'Pembayaran Dikonfirmasi';
        $pemesanan->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Pembayaran berhasil dikonfirmasi.');
    }
}
