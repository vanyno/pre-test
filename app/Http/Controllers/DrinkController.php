<?php

namespace App\Http\Controllers;
use App\Models\Drink;
use Illuminate\Http\Request;

class DrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
    //  * @return \Illuminate\Http\Response
     */
    public function index()
{
    $drinks = Drink::all(); // Ambil semua data minuman
    return view('drinks.index', compact('drinks')); // Pastikan 'drinks.index' adalah nama view yang benar
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('drinks.create'); // Pastikan nama view sudah benar
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    // Validasi input jika diperlukan
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
    ]);

    // Buat minuman baru
    Drink::create([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
    ]);

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('drinks.index')->with('success', 'Minuman berhasil ditambahkan!');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $drink = Drink::findOrFail($id); // Ambil minuman berdasarkan ID
        return view('drinks.edit', compact('drink')); // Pastikan 'drinks.edit' adalah nama view yang benar
    }
    
    public function update(Request $request, $id)
    {
        $drink = Drink::findOrFail($id);
        
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);
        
        // Update data minuman
        $drink->update($request->all());
    
        return redirect()->route('drinks.index')->with('success', 'Minuman berhasil diperbarui!');
    }
    public function destroy($id)
{
    $drink = Drink::findOrFail($id); // Ambil minuman berdasarkan ID
    $drink->delete(); // Hapus minuman

    return redirect()->route('drinks.index')->with('success', 'Minuman berhasil dihapus!');
}

}    
