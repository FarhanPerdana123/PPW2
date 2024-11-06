<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function index()
    {
        if(!Auth::check()){
            return redirect()->route('login')
                ->withErrors(['email' => 'Silahkan login terlebih dahulu untuk mengakses dashboard'])
                ->onlyInput('email');
        }
        $users = User::get();
        return view('users')->with('userss', $users);
    }

    public function destroy(string $id)
    {
        $user = User::find($id);
        $file = public_path().'/storage/'.$user->photo;
        if (!$user) {
            return redirect('users')->with('error', 'User tidak ditemukan');
        }
        try {

            if (File::exists($file)) {
                // dd($file);
                File::delete($file);
                $user->delete();
            }
            // dd($user);

        } catch (\Throwable $th) {
            return redirect('users')->with('error', 'Gagal menghapus data');
        }
        return redirect('users')->with('success', 'Data berhasil dihapus');
    }

    public function edit(string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect('users')->with('error', 'User tidak ditemukan');
        }
        return view('edit')->with('user', $user);
    }

    public function update(Request $request, string $id)
    {

        $user = User::find($id);
        if (!$user) {
            return redirect('users')->with('error', 'User tidak ditemukan');
        }

        $request->validate([
            'photo'     => 'image|nullable|max:1999',
        ]);

        if ($request->hasFile('photo')) {
            // Hapus file lama jika ada
            $oldFile = public_path('storage/'.$user->photo);
            if (File::exists($oldFile)) {
                File::delete($oldFile);
            }

            // Upload file baru
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('photo')->storeAs('photos', $filenameToStore, 'public');
            $user->photo = $path;
        }

        $user->save();

        return redirect('users')->with('success', 'Data berhasil diperbarui');
    }
}
