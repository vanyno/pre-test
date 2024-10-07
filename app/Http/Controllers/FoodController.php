<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Category;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index()
    {
        $foods = Food::with('category')->get();
        return view('foods.index', compact('foods'));
    }

    public function create()
{
    return view('foods.create'); // Mengarahkan ke view create
}

public function store(Request $request)
{
    // Validasi data
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
    ]);

    // Buat makanan baru
    Food::create([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
    ]);

    // Kembalikan ke halaman indeks dengan pesan sukses
    return redirect()->route('foods.index')->with('success', 'Makanan berhasil ditambahkan.');
}


public function edit($id)
{
    $food = Food::findOrFail($id); // Ambil data makanan berdasarkan ID
    return view('foods.edit', compact('food')); // Kembalikan view edit dengan data makanan
}

public function update(Request $request, $id)
{
    // Validasi data
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
    ]);

    // Temukan makanan yang ingin diupdate
    $food = Food::findOrFail($id);

    // Update data makanan
    $food->update([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
    ]);

    // Kembalikan ke halaman indeks dengan pesan sukses
    return redirect()->route('foods.index')->with('success', 'Makanan berhasil diperbarui.');
}


    public function destroy(Food $food)
    {
        $food->delete();
        return redirect()->route('foods.index');
    }
}

