<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        if (!Auth::check()){
            return redirect()->route('login')->withErrors([
                'email' => 'Please login to access the dashboard.',
            ])->onlyInput('email');
        }
        $users = User::get();
        return view('users')->with('userss',$users);
    }

    public function destroy(string $id)
    {
        $user = User::find($id);
        $file = public_path() . '/' . 'storage/' . $user->photo;
        try{
            if(File::exists($file)){
                File::delete($file);
                // $user->delete();
            }
        } catch(\Throwable $th){
            return redirect('users')->with('error', 'gagal hapus data');
        }
        return redirect('users')->with('success', 'berhasil hapus data');
    }

    public function edit ($id)
    {
        $user = User::findOrFail($id);
        return view('edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($request->hasFile('photo')) {
            // delete foto lama
            $oldPhoto = public_path('storage/'.$user->photo);

            if(File::exists($oldPhoto)) {
                File::delete($oldPhoto);
            }

            $path = $request->file('photo')->store('photos','public');
            $user->photo = $path;
        }
        
        $user->save();

        return redirect()->route('users.index')->with('success', 'Photo updated successfully');
    }

}