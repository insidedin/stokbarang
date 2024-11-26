<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function dashboard()
    {
        return view ('admin.dashboard');
    }

    public function index()
    {
        $admins = Admin::all();
        return view ('admin.admin', compact('admins'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:8'
        ]);

        Admin::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.index')->with('success', 'Admin berhasil ditambahkan');
    }

    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $data = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:admins,email,'.$id,
        ]);

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $admin->update($data);

        return redirect()->route('admin.index')->with('success', 'Admin berhasil diperbarui');
    }

    public function destroy($id)
    {
        Admin::findOrFail($id)->delete();
        return redirect()->route('admin.index')->with('success', 'Admin berhasil dihapus');
    }
}
