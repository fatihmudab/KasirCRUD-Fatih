<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\DetailPenjualan;
use App\Models\Pelanggan;
use App\Models\penjualan;
use App\Models\Produk;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class AdminController extends Controller
{
    public function indexdashboard()
    {
        return view('layout.dashboard');
    }

    public function user()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function tambahUser()
    {
        return view('user.form');
    }

    public function simpanUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $data = $request->only('name', 'role', 'email', 'password');
        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return redirect()->route('user')->with('sukses', 'User berhasil ditambahkan.');
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('user.form', compact('user'));
        // $user = User::find($id);

        // if ($user) {
        //     return redirect()->route('user')->with('error', 'User not found');
        // }
        // return view('user.form', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $data = $request->only('name', 'role', 'email');

        if ($request->has('password')) {
            $data['password'] = bcrypt($request->input('password'));
        }

        $user = User::findOrFail($id);
        $user->update($data);

        return redirect()->route('user')->with('edit', 'Data user berhasil diperbarui.');
    }

    public function hapusUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user')->with('delete', 'User berhasil dihapus.');
    }

    public function penjualan()
    {
        $penjualans = Penjualan::all();
        return view('penjualan.index', compact('penjualans'));
    }

    public function tambahPenjualan()
    {
        $produks = Produk::all();
        return view('penjualan.form', compact('produks'));
    }

    public function simpanPenjualan(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telpon' => 'required',
            'tanggal_penjualan' => 'required',
            'produk_id' => 'required',
            'quantity' => 'required',
        ]);

        $pelanggan = Pelanggan::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telpon' => $request->no_telpon,
        ]);

        $penjualan = Penjualan::create([
            'pelanggan_id' => $pelanggan->id, // Menggunakan ID pelanggan yang baru saja dibuat
            'tanggal_penjualan' => $request->tanggal_penjualan,
        ]);

        $totalHarga = 0;
        for ($i = 0; $i < count($request->produk_id); $i++) {
            $produk = Produk::findOrFail($request->produk_id[$i]);
            $subtotal = $produk->harga * $request->quantity[$i];
            $detailPenjualan = DetailPenjualan::create([
                'penjualan_id' => $penjualan->id,
                'produk_id' => $request->produk_id[$i],
                'quantity' => $request->quantity[$i],
                'sub_total' => $subtotal,
            ]);

            $totalHarga += $subtotal;
        }

        $penjualan->update(['total_harga' => $totalHarga]); // Menyimpan total harga yang telah dihitung
        return redirect()->route('penjualan')->with('success-pj', 'Data penjualan berhasil disimpan.');
    }

    public function detailPenjualan($id)
    {
        $penjualan = DetailPenjualan::where('penjualan_id', $id)->get();
        return view('penjualan.show', compact('penjualan'));
    }

    public function produk()
    {
        $products = Produk::all();
        return view('produk.index', compact('products'));
    }

    public function tambahProduk()
    {
        return view('produk.form');
    }

    public function simpanProduk(Request $request)
    {
        $request->validate([
            'namaProduk' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $gambar = $request->file('gambar');
        $nama_gambar = Str::uuid() . '_' . $gambar->getClientOriginalName();
        $gambar->storeAs('public/gambar_produk', $nama_gambar);

        $product = new Produk();
        $product->namaProduk = $request->namaProduk;
        $product->harga = $request->harga;
        $product->stok = $request->stok;
        $product->gambar = $nama_gambar;
        $product->save();

        return redirect()->route('produk')->with('add-pj', 'Data produk berhasil ditambahkan.');
    }

    public function editrPoduk($id)
    {
        $product = Produk::findOrFail($id);
        return view('produk.form', compact('product'));
    }

    public function updateProduk(Request $request, $id)
    {
        $request->validate([
            'namaProduk' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ]);

        $product = Produk::findOrFail($id);
        $product->namaProduk = $request->namaProduk;
        $product->harga = $request->harga;
        $product->stok = $request->stok;
        $product->save();

        return redirect()->route('produk')->with('edit-pj', 'Berhasil diperbarui.');
    }

    public function produkStokEdit($id)
    {
        $stok = Produk::where('id', $id)->first();
        return view('admin.produk.stok-produk', ['stok' => $stok]);
    }

    public function produkStokUpdate(Request $request, $id)
    {
        $validated = $request->validate([
            'stok' => 'required',
        ]);

        $produk = Produk::findOrFail($id);
        $produk->update(['stok' => $request->stok]);
        return redirect('produk')->with('status', 'stok Updated Successfully.');
    }

    public function hapusProduk($id)
    {
        // Cari produk berdasarkan ID
        $product = Produk::findOrFail($id);

        // Hapus semua detail penjualan yang terkait dengan produk ini
        DetailPenjualan::where('produk_id', $id)->delete();

        $product->delete();

        return redirect()->route('produk')->with('delete-pj', 'Berhasil menghapus produk.');
    }

    public function cetakPDF()
    {
        $penjualan = Penjualan::with('produk')->get();

        $pdf = Pdf::loadView('penjualan.cetak_pdf', compact('penjualan'));
        return $pdf->download('laporan_penjualan.pdf');
    }
}
