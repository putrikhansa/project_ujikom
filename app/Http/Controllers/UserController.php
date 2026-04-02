<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // =====================
    // LIST USER (ADMIN & PETUGAS SAJA)
    // =====================
    public function index()
    {
        $users = User::whereIn('role', ['admin', 'petugas'])->get();
        return view('backend.user.index', compact('users'));
    }

    // =====================
    // FORM TAMBAH USER
    // =====================
    public function create()
    {
        return view('backend.user.create');
    }

    // =====================
    // SIMPAN USER BARU
    // =====================
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'role'     => 'required|in:admin,petugas', // ❌ siswa tidak dibuat di sini
            'no_hp'    => 'required|string|max:15',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'no_hp'    => $request->no_hp,
            'role'     => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('backend.user.index')
            ->with('success', 'User berhasil ditambahkan');
    }

    // =====================
    // FORM EDIT USER
    // =====================
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('backend.user.edit', compact('user'));
    }

    // =====================
    // UPDATE USER
    // =====================
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email',
            'role'     => 'required|in:admin,petugas,siswa', // ✅ lengkap
            'no_hp'    => 'required|string|max:15',
            'password' => 'nullable|min:6',
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
            'role'  => $request->role,
            'no_hp' => $request->no_hp,
        ]);

        if ($request->filled('password')) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->route('backend.user.index')
            ->with('success', 'User berhasil diperbarui');
    }

    // =====================
    // HAPUS USER
    // =====================
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->role === 'admin') {
            return back()->with('error', 'Admin tidak dapat dihapus');
        }

        $user->delete();

        return back()->with('success', 'User berhasil dihapus');
    }
}
