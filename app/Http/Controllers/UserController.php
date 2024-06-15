<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{

    public function callSession(Request $request)
    {
        return redirect()->back()->with('status', 'Berhasil memanggil sesi');
    }

     //halaman home
    public function home()
    {
        return view('home');
    }

    //halaman login
    public function login()
    {
        return view('login');
    }

    //proses login
    public function loginUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('login.page')
                ->withErrors($validator)
                ->withInput();
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();

            $user = Auth::user();
            if ($user->hasRole('admin')) {
                return redirect()->route('home.page', ['user' => $user->id]);
            } elseif ($user->hasRole('user')) {
                return redirect()->route('home.page');
            }
        } else {
            return redirect()->route('login.page')
                ->with('error', 'Login failed, email or password is incorrect');
        }
    }

    //halaman register
    public function register()
    {
        return view('register');
    }

    //proses register
    public function registerUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'gender' => 'required|in:male,female',
            'umur' => 'required|integer|min:1',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('register.page')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'umur' => $request->umur,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
        ]);

        // default role -> user (admin/user)
        $user->assignRole('user');

        if ($user) {
            return redirect()->route('register.page')
                ->with('success', 'User created successfully');
        } else {
            return redirect()->route('register.page')
                ->with('error', 'Failed to create user');
        }
    }

    //proses logout
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login.page');
    }

    //login google
    public function loginGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    //proses login google
    public function loginGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            Auth::login($existingUser);
        } else {
            $newUser = new User();
            $newUser->google_id = $user->id;
            $newUser->nama = $user->name;
            $newUser->email = $user->email;
            $newUser->password = Hash::make(Str::random(15));
            $newUser->gender = 'male';
            $newUser->umur = 25;
            $newUser->tgl_lahir = '1996-05-13';
            $newUser->alamat = 'Jakarta Selatan';
            $newUser->save();

            // assign role
            $newUser->assignRole('user');

            Auth::login($newUser);
        }

        return redirect()->route('home.page');
    }

    //Show Profile
    public function showProfile(Request $request, User $user)
    {
        // $user = Auth::user();
        // return view('profile', compact('user'));

        $user = User::find($user->id);
        // dd($user);
        //return view('profile', ['user' => $user]);
        return view('profile');
    }

    //Edit Profile
    public function editProfile()
    {
        return view('profileEdit');
    }

    // bookmark
    public function showBookmark()
    {
        return view('bookmark');
    }

    //catatan
    public function showCatatan()
    {
        return view('catatan');
    }

    //materi
    public function showMateri()
    {
        return view('materi');
    }

     //tentang
    public function showTentang()
    {
        return view('tentang');
    }

    // Upload file
    public function showUploadForm()
    {
        return view('profile.upload');
    }

    // Method to handle file upload
    public function uploadFile(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        $fileName = time() . '_' . $request->file->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

        return redirect()->route('profile.upload')->with('success', 'File uploaded successfully.');
    }

    // UserController.php

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // Validasi permintaan
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => ['nullable', 'confirmed', 'min:8'],
        ]);

        // Perbarui informasi pengguna
        $user->nama = $request->nama; // Ubah 'name' menjadi 'nama'
        $user->email = $request->email;

        // Perbarui password jika diberikan
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('profile.edit')->with('success', 'Profil berhasil diperbarui.');
    }

    //halaman admin
    public function getAdmin()
    {
        $users = User::all();
        return view('admin.adminPage', ['users' => $users]);
    }

    //form edit user pada halaman admin
    public function editUserAdmin(User $user)
        {
            return view('admin.editUserAdmin', ['user' => $user]);
        }

    //proses edit user pada halaman admin
    // public function updateUserAdmin(Request $request, User $user)
    // {
    //     $request->validate([
    //         'nama' => 'required|string|max:255',
    //         'email' => 'required|email|max:255|unique:users,email,' . $user->id,
    //         'gender' => 'required|in:male,female',
    //         'umur' => 'required|integer|min:0',
    //         'tgl_lahir' => 'required|date',
    //         'alamat' => 'required|string|max:500',
    //     ]);

    //     $user->update([
    //         'nama' => $request->nama,
    //         'email' => $request->email,
    //         'gender' => $request->gender,
    //         'umur' => $request->umur,
    //         'tgl_lahir' => $request->tgl_lahir,
    //         'alamat' => $request->alamat,
    //     ]);

    //     return redirect()->route('edit.user.admin', $user->id)->with('success', 'User updated successfully');
    // }

    public function updateUserAdmin(Request $request, User $user)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        'gender' => 'required|in:male,female',
        'umur' => 'required|integer|min:0',
        'tgl_lahir' => 'required|date',
        'alamat' => 'required|string|max:500',
        'role' => 'required|string|in:admin,user',
    ]);

    $user->update([
        'nama' => $request->nama,
        'email' => $request->email,
        'gender' => $request->gender,
        'umur' => $request->umur,
        'tgl_lahir' => $request->tgl_lahir,
        'alamat' => $request->alamat,
    ]);

    // Update role
    $user->syncRoles($request->role);

    return redirect()->route('update.user', $user->id)->with('success', 'User updated successfully');
}


    //fungsi delete user pada halaman admin
    public function deleteUserAdmin(User $user)
    {
        $user->delete();
        return redirect()->route('admin.page')->with('success', 'User deleted successfully');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        // Lakukan logika pencarian di sini, misalnya:
        $materi = Materi::where('title', 'LIKE', "%$query%")->get();
        
        return view('materi.index', compact('materi'));
    }

    public function create()
    {
        return view('catatan.create');
    }

    // Buat Catatan Baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required',
            'konten' => 'required',
        ]);

        // Simpan catatan baru ke database
        Catatan::create([
            'judul' => $request->judul,
            'konten' => $request->konten,
        ]);

        // Redirect ke halaman index atau halaman detail catatan
        return redirect()->route('catatan.index')->with('success', 'Catatan berhasil dibuat.');
    }

    // profile ke home
    public function index()
    {
        return view('home');
    }
}