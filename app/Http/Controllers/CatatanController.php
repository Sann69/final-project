<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Catatan;

class CatatanController extends Controller
{
    public function showCatatan(Request $request)
    {
        // Menggunakan paginate untuk membatasi jumlah catatan per halaman
        $catatan = Catatan::paginate(9); // Sesuaikan jumlah paginasi sesuai kebutuhan
        return view('catatan.catatan', compact('catatan'));
    }

    public function showCatatanSaya(Request $request)
    {
        // Menggunakan paginate untuk membatasi jumlah catatan per halaman
        $catatan = Catatan::where('user_id', Auth::id())->paginate(9);
        return view('catatan.catatan', compact('catatan'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $catatan = Catatan::where('judul', 'LIKE', "%$query%")->paginate(10); // Sesuaikan jumlah paginasi sesuai kebutuhan
        return view('catatan.catatan', compact('catatan'));
    }

    public function createCatatan()
    {
        return view('catatan.create');
    }

    public function storeCatatan(Request $request)
{
    $request->validate([
        'judul' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'file' => 'required|mimes:pdf,doc,docx,pptx,png,jpg,jpeg,zip,rar|max:10240', // Max 10MB
        'gambar' => 'nullable|mimes:png,jpg,jpeg|max:2048', // Max 2MB
    ]);

    // Simpan file catatan
    $filePath = $request->file('file')->store('public/catatan_files');
    $fileName = basename($filePath);

    // Simpan file gambar (jika ada)
    $gambarName = null;
    if ($request->hasFile('gambar')) {
        $gambarPath = $request->file('gambar')->store('public/gambar_files');
        $gambarName = basename($gambarPath);
    }

    Catatan::create([
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
        'file' => $fileName, // Simpan hanya nama file
        'gambar' => $gambarName, // Simpan hanya nama file gambar (jika ada)
        'user_id' => Auth::id(),
    ]);

    return redirect()->route('catatan.show')->with('success', 'Catatan berhasil ditambahkan!');
}

    public function showDetail($id)
    {
        // Hanya menampilkan detail catatan yang dimiliki oleh user yang sedang login
        $catatan = Catatan::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('catatan.detail', compact('catatan'));
    }

    public function download($id)
{
    $catatan = Catatan::findOrFail($id);
    $filePath = storage_path('app/public/catatan_files/' . $catatan->file);

    if (file_exists($filePath)) {
        return response()->download($filePath);
    } else {
        return redirect()->back()->with('error', 'File tidak ditemukan.');
    }
}

//Menghapus catatan
public function destroy($id)
{
    $catatan = Catatan::findOrFail($id);

    // Cek apakah pengguna yang sedang login adalah pemilik catatan atau admin
    if ($catatan->user_id == Auth::id() || Auth::user()->hasRole('admin')) {
        // Hapus file dari storage
        Storage::delete('public/catatan_files/' . $catatan->file);

        // Hapus catatan dari database
        $catatan->delete();

        return redirect()->route('catatan.show')->with('success', 'Catatan berhasil dihapus.');
    } else {
        return redirect()->route('catatan.show')->with('error', 'Anda tidak memiliki izin untuk menghapus catatan ini.');
    }
}

//menuju form edit
public function edit($id)
{
    $catatan = Catatan::findOrFail($id);
    return view('catatan.edit', compact('catatan'));
}

//proses edit
public function update(Request $request, $id)
{
    $request->validate([
        'judul' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'file' => 'nullable|mimes:pdf,doc,docx,pptx,png,jpg,jpeg,zip,rar|max:10240',
        'gambar' => 'nullable|mimes:png,jpg,jpeg|max:1024',
    ]);

    $catatan = Catatan::findOrFail($id);

    if ($request->hasFile('file')) {
        if ($catatan->file) {
            Storage::disk('public')->delete('files/' . $catatan->file);
        }
        $file = $request->file('file');
        $filePath = 'files/' . uniqid() . '.' . $file->getClientOriginalExtension();
        Storage::disk('public')->put($filePath, file_get_contents($file));
        $catatan->file = basename($filePath);
    }

    if ($request->hasFile('gambar')) {
        if ($catatan->gambar) {
            Storage::disk('public')->delete('gambar_files/' . $catatan->gambar);
        }
        $gambar = $request->file('gambar');
        $gambarPath = 'gambar_files/' . uniqid() . '.' . $gambar->getClientOriginalExtension();
        Storage::disk('public')->put($gambarPath, file_get_contents($gambar));
        $catatan->gambar = basename($gambarPath);
    }

    $catatan->judul = $request->judul;
    $catatan->deskripsi = $request->deskripsi;
    $catatan->save();

    return redirect()->route('catatan.show')->with('success', 'Catatan berhasil diperbarui');
}


}
