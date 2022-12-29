<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (
                // Gate::allows('is-admin')
                Auth::user()->role == 'admin') {
                return $next($request);
            }
            abort(403, 'Anda tidak memiliki cukup hak akses!');
        })->except('index');
    }

    public function index()
    {
        $user = User::get();

        return view('admin.user.index', compact('user'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'role' => 'required',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => $request->input('role'),
        ]);

        if ($user) {
            return redirect()->route('user.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('user.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
        ]);
        $user = User::find($request->id);
        $user->update([
            'name' => $request->input('name'),
            'role' => $request->input('role'),
        ]);

        if ($user) {
            return redirect()->route('user.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('user.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function destroy($id)
    {
        $user = User::where('id', $id)->first();

        $user->delete();

        if ($user) {
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Dihapus!',
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data Gagal Dihapus!',
        ]);
    }
}
