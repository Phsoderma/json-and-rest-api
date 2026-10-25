<?php

namespace App\Http\Controllers;

use App\Models\Customer as ModelsCustomer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index() 
    {
        $customers = ModelsCustomer::all();

        return response()->json([
            'status' => 'success',
            'message' => 'Data customer berhasil diambil.',
            'data' => $customers
        ], 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
        ]);

        $customer = ModelsCustomer::create($validatedData);

        return response()->json([
            'status' => 'success',
            'message' => 'Data customer berhasil dibuat.',
            'data' => $customer
        ], 201);
    }

    public function show($id)
    {
        $customer = ModelsCustomer::findOrFail($id);

        return response()->json([
            'status' => 'success',
            'message' => 'Detail data customer ditemukan.',
            'data' => $customer
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $customer = ModelsCustomer::findOrFail($id);

        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
        ]);

        $customer->update($validatedData); 

        return response()->json([
            'status' => 'success',
            'message' => 'Data customer berhasil diperbarui.',
            'data' => $customer
        ], 200);
    }

    public function destroy($id)
    {
        $customer = ModelsCustomer::findOrFail($id);
        $customer->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data customer berhasil dihapus.',
            'data' => null
        ], 200);
    }
}