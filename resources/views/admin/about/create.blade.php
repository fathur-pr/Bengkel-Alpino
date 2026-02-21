@extends('layouts.admin')

@section('content')
<div style="padding: 40px; background: #f8fafc; min-height: 100vh;">
    <div style="max-width: 800px; margin: auto; background: white; border-radius: 24px; padding: 40px; box-shadow: 0 10px 40px rgba(0,0,0,0.03);">
        <h2 style="font-weight: 800; color: #1e293b; margin-bottom: 30px;"><i class="fas fa-plus-circle" style="color: #ff8e53;"></i> Tambah Profil Baru</h2>

        <form action="{{ route('admin.about.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div style="margin-bottom: 25px;">
                <label style="display: block; font-weight: 600; color: #64748b; margin-bottom: 8px;">Judul Artikel / Profil</label>
                <input type="text" name="judul" value="{{ old('judul') }}" required placeholder="Contoh: Sejarah Berdirinya Alpino"
                    style="width: 100%; padding: 12px; border: 1.5px solid #e2e8f0; border-radius: 12px; outline: none; transition: 0.3s;" onfocus="this.style.borderColor='#ff8e53'" onblur="this.style.borderColor='#e2e8f0'">
                @error('judul') <p style="color: #ef4444; font-size: 12px; margin-top: 5px;">{{ $message }}</p> @enderror
            </div>

            <div style="margin-bottom: 25px;">
                <label style="display: block; font-weight: 600; color: #64748b; margin-bottom: 8px;">Isi Deskripsi / Sejarah</label>
                <textarea name="deskripsi" rows="6" required placeholder="Tuliskan cerita tentang bengkel Alpino..."
                    style="width: 100%; padding: 12px; border: 1.5px solid #e2e8f0; border-radius: 12px; outline: none; resize: vertical; font-family: inherit; transition: 0.3s;" onfocus="this.style.borderColor='#ff8e53'" onblur="this.style.borderColor='#e2e8f0'">{{ old('deskripsi') }}</textarea>
                @error('deskripsi') <p style="color: #ef4444; font-size: 12px; margin-top: 5px;">{{ $message }}</p> @enderror
            </div>

            <div style="margin-bottom: 35px;">
                <label style="display: block; font-weight: 600; color: #64748b; margin-bottom: 8px;">Upload Gambar (Opsional)</label>
                <input type="file" name="gambar" accept="image/*" style="display: block; margin-top: 10px; width: 100%; padding: 10px; border: 1px dashed #cbd5e1; border-radius: 10px; background: #f8fafc;">
                @error('gambar') <p style="color: #ef4444; font-size: 12px; margin-top: 5px;">{{ $message }}</p> @enderror
            </div>

            <div style="display: flex; gap: 15px;">
                <button type="submit" style="flex: 2; background: #ff8e53; color: white; padding: 15px; border: none; border-radius: 12px; font-weight: 700; cursor: pointer;">
                    Simpan Profil Baru
                </button>
                <a href="{{ route('admin.about.index') }}" style="flex: 1; background: #f1f5f9; color: #64748b; text-align: center; text-decoration: none; padding: 15px; border-radius: 12px; font-weight: 600;">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection