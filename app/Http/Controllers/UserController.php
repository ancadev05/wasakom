<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Laptop;
use App\Models\LaptopMerek;
use App\Models\LaptopTipe;
use App\Models\User;
use App\Models\LevelAkun;
use App\Models\Penyewaan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // menampilkan daftar user
    public function user()
    {
        $users = User::get();

        return view('users.user', compact('users'));
    }
    // menampilkan profil untuk setiap akun user
    public function profil()
    {
        $user = Auth::user();
        return view('users.user-profile', compact('user'));
    }
    // buat akun user
    public function usercreate()
    {
        $karyawans = Karyawan::get();
        $level_akun = LevelAkun::get();
        return view('users.user-create', compact(
            'level_akun', 'karyawans'
        ));
    }
    // store user
    public function userstore(Request $request)
    {
        $request->validate(
            [
                'karyawan_id' => 'required',
                'username' => 'required|unique:users,username',
                'password' => 'required',
                'level_akun_id' => 'required',
                'karyawan_id' => 'required'
            ]
        );

        $user = [
            'username' => $request->username,
            'password' => $request->password,
            'sandi' => $request->password,
            'level_akun_id' => $request->level_akun_id,
            'karyawan_id' => $request->karyawan_id,
        ];

        User::create($user);

        return redirect('/user');
    }
    // edit user
    public function useredit(string $id)
    {
        $karyawans = Karyawan::get();
        $level_akun = LevelAkun::get();
        $user = User::where('id', $id)->first();
        return view('users.user-edit', compact('user', 'level_akun', 'karyawans'));
    }
    // user update
    public function userupdate(Request $request, string $id)
    {
        $user = [
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'sandi' => $request->password,
            'level_akun_id' => $request->level_akun_id,
        ];
        User::where('id', $id)->update($user);
        return redirect('/user');
    }
    // hapus user
    public function userdelete(string $id)
    {
        // mengubah ke default user jika menghapus user sesuai tabel yang berelasi dengan tabel user
        $user_id = [
            'user_id' => 1,
        ];

        $user = User::where('id', $id)->first();

        LaptopMerek::where('user_id', $id)->update($user_id);
        LaptopTipe::where('user_id', $id)->update($user_id);
        Laptop::where('user_id', $id)->update($user_id);
        Penyewaan::where('user_id', $id)->update($user_id);

        // menghapus foto user
        Storage::delete('public/foto-user/' . $user->foto);

        User::where('id', $id)->delete();

        return redirect('/user');
    }

    // edit profil
    public function profileupdate(Request $request, string $id)
    {
        // queri ke tabel users
        $user = User::where('id', $id)->first();

        

        // Validasi gambar baru
        if ($request->hasFile('foto')) { // Jika ada gambar baru
            // Lakukan validasi
            $gambar_file = $request->file('foto'); // mengambil file dari form
            $gambar_nama = date('ymdhis') . '.' . $gambar_file->getClientOriginalExtension(); // penamaan file, antisipasi nama file double
            $gambar_file->storeAs('public/foto-user/', $gambar_nama); // memindahkan file ke folder public agar bisa diakses dengan nama yang unik
            // Hapus foto lama
            Storage::delete('public/foto-user/' . $request->foto_lama);
            // Masukkan namanya ke dalam database
            $data['foto'] = $gambar_nama;
            User::where('id', $id)->update($data);
        } else {
            $data['foto'] = $request->foto_lama;
        }

        
        // validasi username baru
        $request->validate([
            'username' => ['required', Rule::unique('users', 'username')->ignore($id)],
        ]);
       
        // validasi password baru
        if(Hash::check($request->password, $user->password)) {
            $request->validate([
                'password' => 'required',
            ]);

            $user = [
                'password' => Hash::make($request->renewpassword),
                'sandi' => $request->renewpassword,
            ];
            User::where('id', $id)->update($user);

            // return redirect('/profil');
        }
        // dd($request);
        

        $user = [
            'name' => $request->name,
            'username' => $request->username,
        ];

        User::where('id', $id)->update($user);

        return redirect('/profil');
    }
}
