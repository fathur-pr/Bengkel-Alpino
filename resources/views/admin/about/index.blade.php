@extends('layouts.admin')

@section('content')
<div style="padding: 40px; background: #f8fafc; min-height: 100vh;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px;">
        <div>
            <h1 style="font-weight: 800; color: #1e293b; margin: 0; font-size: 28px;">Tentang Alpino Jakarta</h1>
            <p style="color: #64748b; margin-top: 5px;">Kelola narasi sejarah dan profil bengkel yang tampil di halaman utama.</p>
        </div>
        {{-- TOMBOL TAMBAH BARU (TIDAK DIUBAH) --}}
        <a href="{{ route('admin.about.create') }}" style="background: #ff8e53; color: white; padding: 12px 25px; border-radius: 12px; text-decoration: none; font-weight: 700; display: flex; align-items: center; gap: 10px; box-shadow: 0 10px 20px rgba(255,142,83,0.3); transition: 0.3s;" onmouseover="this.style.transform='translateY(-3px)'" onmouseout="this.style.transform='none'">
            <i class="fas fa-plus"></i> Tambah Profil
        </a>
    </div>

    @if(session('success'))
    <div style="background: #dcfce7; color: #15803d; padding: 15px 25px; border-radius: 14px; margin-bottom: 30px; display: flex; align-items: center; gap: 12px; border: 1px solid #bbf7d0;">
        <i class="fas fa-check-circle fa-lg"></i> <span style="font-weight: 600;">{{ session('success') }}</span>
    </div>
    @endif

    <div style="display: grid; grid-template-columns: 1fr; gap: 30px;">
        @forelse($abouts as $about)
        <div style="background: white; border-radius: 24px; padding: 40px; box-shadow: 0 10px 40px rgba(0,0,0,0.03); display: flex; gap: 40px; align-items: flex-start; border: 1px solid #f1f5f9;">
            <div style="flex-shrink: 0;">
                <img src="{{ asset('storage/'.$about->gambar) }}" alt="Gambar Profil" style="width: 300px; height: 200px; object-fit: cover; border-radius: 20px; box-shadow: 0 10px 20px rgba(0,0,0,0.05); background: #f1f5f9;">
            </div>
            <div style="flex-grow: 1;">
                <h2 style="font-weight: 800; color: #1e293b; margin-bottom: 15px;">{{ $about->judul }}</h2>
                <p style="color: #64748b; line-height: 1.8; margin-bottom: 25px;">{{ $about->deskripsi }}</p>
                
                <div style="display: flex; gap: 15px;">
                    {{-- TOMBOL EDIT (TIDAK DIUBAH) --}}
                    <a href="{{ route('admin.about.edit', $about->id) }}" style="background: #eff6ff; color: #3b82f6; padding: 10px 20px; border-radius: 10px; text-decoration: none; font-weight: 700; display: inline-flex; align-items: center; gap: 8px; transition: 0.3s;">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    
                    {{-- TOMBOL HAPUS (HANYA INI YANG DIMODIFIKASI UNTUK POPUP BARU) --}}
                    <form action="{{ route('admin.about.destroy', $about->id) }}" method="POST" id="deleteForm-{{ $about->id }}">
                        @csrf @method('DELETE')
                        <button type="button" onclick="hapusProfil({{ $about->id }})" style="background: #fef2f2; color: #ef4444; padding: 10px 20px; border-radius: 10px; border: none; font-weight: 700; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; transition: 0.3s;">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div style="background: white; border-radius: 24px; padding: 50px; text-align: center; border: 1px dashed #cbd5e1;">
            <i class="fas fa-file-alt" style="font-size: 50px; color: #cbd5e1; margin-bottom: 15px;"></i>
            <p style="color: #64748b;">Belum ada artikel sejarah atau profil yang ditambahkan.</p>
        </div>
        @endforelse
    </div>
</div>

{{-- SCRIPT POPUP KEREN (HANYA DITAMBAHKAN DI BAWAH SINI) --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function hapusProfil(id) {
        Swal.fire({
            title: 'Bongkar Data? 🛠️',
            text: "Profil ini akan dihapus permanen dari garasi. Tarikan gak bisa di-undo loh!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',     // Merah untuk hapus
            cancelButtonColor: '#64748b',      // Abu-abu untuk batal
            confirmButtonText: '<i class="fas fa-fire"></i> Ya, Gas Hapus!',
            cancelButtonText: '<i class="fas fa-hand-paper"></i> Rem Dulu',
            background: '#1e293b',             // Warna background gelap (Dark Mode khas Admin)
            color: '#f8fafc',                  // Teks putih
            iconColor: '#ff8e53'               // Warna Ikon Oranye Alpino
        }).then((result) => {
            if (result.isConfirmed) {
                // Eksekusi form hapus jika tombol 'Gas Hapus' diklik
                document.getElementById('deleteForm-' + id).submit();
            }
        })
    }
</script>
@endsection