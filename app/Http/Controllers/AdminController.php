<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Makanan;
use App\Models\Paket;
use App\Models\Pemesanan;
use App\Models\PemesananPaket;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function unblockUser($id)
    {
        $user = User::find($id);

        if ($user) {
            // Tambahkan logika untuk membuka blokir akun sesuai kebutuhan
            $user->blokir = false; // Contoh: Menggunakan kolom 'blokir' sebagai penanda pembukaan blokir
            $user->save();

            return back()->with('success', 'Akun berhasil dibuka!');
        } else {
            return back()->with('failed', 'Gagal membuka blokir akun!');
        }
    }

    public function blokirUser($id)
    {
        $user = User::find($id);

        if ($user) {
            // Tambahkan logika pemblokiran akun sesuai kebutuhan
            $user->blokir = true; // Contoh: Menggunakan kolom 'blokir' sebagai penanda pemblokiran
            $user->save();

            return back()->with('success', 'Akun berhasil diblokir!');
        } else {
            return back()->with('failed', 'Gagal memblokir akun!');
        }
    }

    public function admin()
    {
        $data = User::paginate(10);

        return view('admin.admin', compact('data'));
    }
    public function tambah()
    {
        return view('admin.tambah');
    }

    public function postTambahAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns',
            'jenisKelamin' => 'required',
            'password' => 'required|min:8|max:20|confirmed',
            'alamat' => 'nullable',
            'target' => 'nullable',

        ]);
        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->level = 'admin';
        $user->jenis_kelamin = $request->jenisKelamin;
        $user->password = Hash::make($request->password);

        $user->save();

        if ($user) {
            return back()->with('success', 'Admin baru berhasil ditambahkan!');
        } else {
            return back()->with('failed', 'Gagal menambahkan admin baru!');
        }
    }

    public function editAdmin($id)
    {
        $data = User::find($id);
        return view('admin.edit', compact('data'));
    }
    public function postEditAdmin(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns',
            'jenisKelamin' => 'required',
        ]);

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->jenis_kelamin = $request->jenisKelamin;

        $user->save();
        if ($user) {
            return back()->with('success', 'Data admin berhasil di update!');
        } else {
            return back()->with('failed', 'Gagal mengupdate data admin!');
        }
    }
    public function deleteAdmin($id)
    {

        $data = User::find($id);

        $data->delete();

        if ($data) {
            return back()->with('success', 'Data berhasil di hapus!');
        } else {
            return back()->with('failed', 'Gagal menghapus data!');
        }
    }

    public function makanan(Request $request)
    {
        // Get all makanan data without filtering
        $data = Makanan::paginate(10);

        // Send the data to the 'admin.makanan' view
        return view('admin.makanan', compact('data'));
    }

    public function tambahMakanan()
    {
        // Menampilkan halaman tambah makanan
        return view('admin.tambahMakanan');
    }

    public function postTambahMakanan(Request $request)
    {
        // Validasi data yang diinputkan oleh pengguna
        $request->validate([
            'kode_makanan' => 'required',
            'jenis_makanan' => 'required',
            'nama_makanan' => 'required',
            'kalori' => 'required|numeric',
            'protein' => 'required|numeric',
            'lemak' => 'required|numeric',
            'karbohidrat' => 'required|numeric',
            'foto' => 'required|image|max:5120',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
        ]);

        // Membuat objek Makanan baru
        $makanan = new Makanan;

        // Mengisi properti-properti objek dengan data dari formulir
        $makanan->kode_makanan = $request->kode_makanan;
        $makanan->jenis_makanan = $request->jenis_makanan;
        $makanan->nama_makanan = $request->nama_makanan;
        $makanan->kalori = $request->kalori;
        $makanan->protein = $request->protein;
        $makanan->lemak = $request->lemak;
        $makanan->karbohidrat = $request->karbohidrat;
        $makanan->harga = $request->harga;
        $makanan->deskripsi = $request->deskripsi;

        // Mengelola unggahan gambar
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/', $filename);
            $makanan->foto = $filename;
        }

        // Menyimpan objek Makanan ke database
        $makanan->save();

        // Mengembalikan pesan ke halaman sebelumnya
        if ($makanan) {
            return back()->with('success', 'Makanan baru berhasil ditambahkan!');
        } else {
            return back()->with('failed', 'Data gagal ditambahkan!');
        }
    }
    public function editMakanan($id)
    {
        // Mengambil data makanan yang akan diedit berdasarkan ID
        $data = Makanan::find($id);

        // Menampilkan halaman edit makanan dengan data makanan yang dipilih
        return view('admin.editMakanan', compact('data'));
    }

    public function postEditMakanan(Request $request, $id)
    {
        // Validasi data yang diinputkan oleh pengguna untuk edit makanan
        $request->validate([
            'kode_makanan' => 'required',
            'jenis_makanan' => 'required',
            'nama_makanan' => 'required',
            'kalori' => 'required|numeric',
            'protein' => 'required|numeric',
            'lemak' => 'required|numeric',
            'karbohidrat' => 'required|numeric',
            'harga' => 'required|numeric',
            'foto' => 'image|max:5120', // Gambar opsional, ukuran maksimum 5MB
            'deskripsi' => 'required',
        ]);

        // Mengambil data makanan yang akan diedit berdasarkan ID
        $makanan = Makanan::find($id);

        // Mengisi properti-properti objek Makanan dengan data dari formulir edit
        $makanan->kode_makanan = $request->kode_makanan;
        $makanan->jenis_makanan = $request->jenis_makanan;
        $makanan->nama_makanan = $request->nama_makanan;
        $makanan->kalori = $request->kalori;
        $makanan->protein = $request->protein;
        $makanan->lemak = $request->lemak;
        $makanan->karbohidrat = $request->karbohidrat;
        $makanan->harga = $request->harga;
        $makanan->deskripsi = $request->deskripsi;

        // Mengelola unggahan gambar
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/', $filename);

            // Menghapus gambar lama jika ada
            $oldFilePath = public_path('images/') . $makanan->foto;
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }

            $makanan->foto = $filename;
        }

        // Menyimpan objek Makanan yang sudah diubah ke database
        $makanan->save();

        // Mengembalikan pesan ke halaman sebelumnya
        if ($makanan) {
            return redirect('/admin/makanan')->with('success', 'Makanan berhasil diupdate!');
        } else {
            return back()->with('failed', 'Makanan gagal diupdate!');
        }
    }

    public function hapusMakanan($id)
    {
        // Mengambil data makanan yang akan dihapus berdasarkan ID
        $makanan = Makanan::find($id);

        // Menghapus gambar yang terkait dengan makanan
        if ($makanan->foto) {
            $filePath = public_path('images/') . $makanan->foto;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        // Menghapus data makanan dari database
        $makanan->delete();

        // Mengembalikan pesan ke halaman sebelumnya
        if ($makanan) {
            return redirect('/admin/makanan')->with('success', 'Data makanan berhasil dihapus!');
        } else {
            return back()->with('failed', 'Gagal menghapus data makanan!');
        }
    }

    public function paket(Request $request)
    {
        // Get all makanan data without filtering
        $data = Paket::paginate(10);

        // Send the data to the 'admin.makanan' view
        return view('admin.paket', compact('data'));
    }
    public function tambahPaket()
    {
        $makanan = Makanan::all();
        return view('admin.tambahPaket', compact('makanan'));
    }

    public function postTambahPaket(Request $request)
    {
        // Validate user input data
        $request->validate([
            'jenis_paket' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kodeMakanan' => 'required|array',
            'kodeMakanan.*' => 'integer',
            'deskripsi' => 'required',
        ]);

        try {

            $totalHarga = 0;
            foreach ($request->kodeMakanan as $kodeMakanan) {
                $makanan = Makanan::find($kodeMakanan);
                if ($makanan) {
                    $totalHarga += $makanan->harga;
                }
            }

            $hitungharga = $totalHarga * 3;

            if ($request->jenis_paket === '2') {
                $paket2 = ($hitungharga * 10) / 100;
            } elseif ($request->jenis_paket === '3') {
                $paket3 = ($hitungharga * 20) / 100;
            } else {
            }

            $total = $hitungharga * $request->jenis_paket;

            // Create a new Paket object
            $paket = new Paket;
            // Fill the object properties with data from the form
            $paket->jenis_paket = $request->jenis_paket;
            $paket->harga = $total;

            // Manage image upload
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('images/', $filename);
                $paket->foto = $filename;
            }

            // Convert array to comma-separated string
            $kodeMakananString = implode(',', $request->kodeMakanan);
            $paket->kode_makanan = $kodeMakananString;

            $paket->deskripsi = $request->deskripsi;
            $paket->save();

            // Return a message to the previous page
            if ($paket) {
                return redirect('/admin/paket')->with('success', 'Data paket berhasil ditambahkan!');
            } else {
                return back()->with('failed', 'Gagal menambahkan data paket!');
            }
        } catch (\Exception $e) {
            // Log the exception to help diagnose the issue
            return back()->with('failed', 'Error: ' . $e->getMessage());
        }
    }


    public function editPaket($id)
    {
        // Ambil data paket berdasarkan ID
        $data = Paket::findOrFail($id);

        // Ambil daftar makanan sebagai options
        $makananOptions = Makanan::all();

        return view('admin.editPaket', compact('data', 'makananOptions'));
    }


    // ...

    public function postEditPaket(Request $request, $id)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'jenis_paket' => 'required|in:1,2,3',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kodeMakanan.*' => 'required|exists:makanan,id',
            'additionalKodeMakanan.*' => 'required|exists:makanan,id',
            'deskripsi' => 'required',
        ]);

        // Ambil data paket berdasarkan ID
        $paket = Paket::findOrFail($id);

        // Simpan data paket yang diperbarui
        $paket->jenis_paket = $request->input('jenis_paket');
        $paket->deskripsi = $request->input('deskripsi');

        // Cek apakah ada file foto yang diunggah
        if ($request->hasFile('foto')) {
            // Proses unggah foto
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);

            // Simpan nama file foto ke dalam database
            $paket->foto = $filename;
        }

        // Simpan paket
        $paket->save();

        // Sinkronkan makanan yang dipilih untuk paket
        $paket->makanan()->sync($request->input('kodeMakanan'));

        // Sinkronkan makanan tambahan untuk paket
        $paket->additionalMakanan()->sync($request->input('additionalKodeMakanan'));

        // Redirect atau lakukan tindakan lainnya setelah berhasil menyimpan
        return redirect()->route('/admin/paket')->with('success', 'Paket berhasil diperbarui!');
    }


    public function hapusPaket($id)
    {
        // Get the paket data to be deleted based on ID
        $paket = Paket::find($id);

        // Delete the image associated with the paket
        if ($paket->foto) {
            $filePath = public_path('images/') . $paket->foto;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        // Delete the paket data from the database
        $paket->delete();

        // Return a message to the previous page
        if ($paket) {
            return redirect('/admin/paket')->with('success', 'Data paket berhasil dihapus!');
        } else {
            return back()->with('failed', 'Gagal menghapus data paket!');
        }
    }

    public function pemesanan(Request $request)
    {
        $data = Pemesanan::paginate(5);

        //Fetch data from the user and makanan tables
        $dataPemesanan = DB::table('pemesanan')
            ->join('users', 'pemesanan.user_id', '=', 'users.id')
            ->join('makanan', 'pemesanan.makanan_id', '=', 'makanan.id')
            ->select(
                'pemesanan.id',
                'users.name as nama_pelanggan',
                'users.alamat',
                'makanan.nama_makanan',
                'makanan.harga',
                'pemesanan.bukti_pembayaran',
                'pemesanan.status'
            )
            ->get();

        // Pass the data to the view
        return view('admin.pemesanan', ['pemesanan' => $dataPemesanan]);
    }

    public function pemesananpaket()
    {
        $dataPemesananPaket = PemesananPaket::with(['user', 'paket'])->paginate(10);
        return view('admin.pemesananpaket', ['dataPemesananPaket' => $dataPemesananPaket]);
    }

    public function riwayatpemesanan(Request $request)
    {
        $data = Pemesanan::paginate(5);

        //Fetch data from the user and makanan tables
        $dataPemesanan = DB::table('pemesanan')
            ->join('users', 'pemesanan.user_id', '=', 'users.id')
            ->join('makanan', 'pemesanan.makanan_id', '=', 'makanan.id')
            ->select(
                'pemesanan.id',
                'users.name as nama_pelanggan',
                'users.alamat',
                'makanan.nama_makanan',
                'makanan.harga',
                'pemesanan.bukti_pembayaran',
                'pemesanan.status'
            )
            ->get();

        // Pass the data to the view
        return view('admin.riwayatpemesanan', ['pemesanan' => $dataPemesanan]);
    }
}
