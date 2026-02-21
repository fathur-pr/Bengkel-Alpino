@extends('layouts.admin')

@section('content')
<div style="padding: 40px; background: #f8fafc; min-height: 100vh;">
    <div style="max-width: 800px; margin: auto; background: white; border-radius: 24px; padding: 40px; box-shadow: 0 10px 40px rgba(0,0,0,0.03);">
        <h2 style="font-weight: 800; color: #1e293b; margin-bottom: 30px;"><i class="fas fa-edit" style="color: #3b82f6;"></i> Edit Sejarah Alpino</h2>

        <form action="{{ route('admin.about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div style="margin-bottom: 25px;">
                <label style="display: block; font-weight: 600; color: #64748b; margin-bottom: 8px;">Judul Artikel</label>
                <input type="text" name="judul" value="{{ old('judul', $about->judul) }}" required 
                    style="width: 100%; padding: 12px; border: 1.5px solid #e2e8f0; border-radius: 12px; outline: none;">
            </div>

            <div style="margin-bottom: 25px;">
                <label style="display: block; font-weight: 600; color: #64748b; margin-bottom: 8px;">Deskripsi Lengkap</label>
                <textarea name="deskripsi" rows="6" required 
                    style="width: 100%; padding: 12px; border: 1.5px solid #e2e8f0; border-radius: 12px; outline: none; resize: vertical; font-family: inherit;">{{ old('deskripsi', $about->deskripsi) }}</textarea>
            </div>

            <div style="margin-bottom: 35px;">
                <label style="display: block; font-weight: 600; color: #64748b; margin-bottom: 8px;">Ganti Gambar (Opsional)</label>
                <div style="margin-bottom: 15px;">
                    <p style="font-size: 12px; color: #94a3b8; margin-bottom: 5px;">Gambar Saat Ini:</p>
                    <img src="{{ asset('storage/'.$about->gambar) }}" style="width: 150px; border-radius: 12px; border: 1px solid #e2e8f0; object-fit: cover;">
                </div>
                <input type="file" name="gambar" accept="image/*" style="display: block; margin-top: 10px; width: 100%; padding: 10px; border: 1px dashed #cbd5e1; border-radius: 10px; background: #f8fafc;">
            </div>

            <div style="display: flex; gap: 15px;">
                <button type="submit" style="flex: 2; background: #3b82f6; color: white; padding: 15px; border: none; border-radius: 12px; font-weight: 700; cursor: pointer;">
                    Update Perubahan
                </button>
                <a href="{{ route('admin.about.index') }}" style="flex: 1; background: #f1f5f9; color: #64748b; text-align: center; text-decoration: none; padding: 15px; border-radius: 12px; font-weight: 600;">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection