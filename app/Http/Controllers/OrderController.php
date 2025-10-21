<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Room;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Tampilkan form pemesanan
     */
    public function index()
{
    $orders = Order::with('room')->latest()->paginate(5); // tampil 5 data per halaman
    return view('orders.index', compact('orders'));
}

    public function create()
    {
        $rooms = Room::all();
        return view('orders.create', compact('rooms'));
    }

    /**
     * Proses form berdasarkan tombol (hitung, simpan, cancel)
     */
    public function process(Request $request)
    {
        $action = $request->input('action');

        // Jika tombol Cancel ditekan
        if ($action === 'cancel') {
            return redirect()->route('orders.create');
        }

        // Validasi input (berlaku untuk hitung & simpan)
        $request->validate([
            'nama_pemesan'     => 'required|string',
            'jenis_kelamin'    => 'required|in:Laki-laki,Perempuan',
            'nomor_identitas'  => 'required|digits:16',
            'room_id'          => 'required|exists:rooms,id',
            'tanggal_pesan'    => 'required|date',
            'durasi_menginap'  => 'required|integer|min:1',
        ]);

        $room = Room::findOrFail($request->room_id);

        // Hitung harga dasar
        $harga = $room->price * $request->durasi_menginap;

        // Tambahan breakfast
        if ($request->has('breakfast') && $request->breakfast == 1) {
            $harga += 80000 * $request->durasi_menginap;
        }

        // Diskon 10% jika menginap lebih dari 3 hari
        if ($request->durasi_menginap > 3) {
            $harga = $harga - ($harga * 0.1);
        }

        // Jika tombol Hitung ditekan → tampilkan total di form
        if ($action === 'hitung') {
            return back()
                ->withInput()
                ->with('totalBayar', $harga);
        }

        // Jika tombol Simpan ditekan → simpan data pemesanan
        if ($action === 'simpan') {
            Order::create([
                'nama_pemesan'     => $request->nama_pemesan,
                'jenis_kelamin'    => $request->jenis_kelamin,
                'nomor_identitas'  => $request->nomor_identitas,
                'room_id'          => $request->room_id,    
                'tanggal_pesan'    => $request->tanggal_pesan,
                'durasi_menginap'  => $request->durasi_menginap,
                'breakfast'        => $request->has('breakfast'),
                'total_bayar'      => $harga,
            ]);

            return redirect()
                ->route('orders.create')
                ->with('success', 'Pemesanan berhasil disimpan!');
        }

        // Jika tidak ada action yang sesuai
        return back();
    }
}
