<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meja;  // Gunakan model Meja yang benar
use Illuminate\Http\RedirectResponse;

class MejaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        try {
            $mejas = Meja::all();
            return view('meja.index', ['mejas' => $mejas]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menampilkan data meja: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        try {
            return view('meja.create');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menampilkan form tambah meja: ' . $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nomor_meja' => 'required|string|max:100',
            ]);

            $meja = new Meja();
            $meja->nomor_meja = $request->input('nomor_meja');
            $meja->save();

            return redirect()->route('meja.index')->with('success', 'Data meja berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan data meja: ' . $e->getMessage());
        }
    }
}
