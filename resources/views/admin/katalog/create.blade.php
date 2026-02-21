@extends('layouts.admin')

@section('content')
<style>
    /* CSS Tambahan biar kode di bawah gak penuh sama inline-style */
    .form-group { margin-bottom: 25px; }
    .label-custom { display: block; font-weight: 600; color: #64748b; margin-bottom: 8px; }
    .input-custom { 
        width: 100%; padding: 12px 15px; border-radius: 12px; outline: none; 
        transition: 0.3s; border: 1.5px solid #e2e8f0; font-family: inherit;
    }
    .input-custom:focus { border-color: #ff8e53; box-shadow: 0 0 0 3px rgba(255, 142, 83, 0.1); }
    .input-error { border-color: #ef4444 !important; }
    .error-text { color: #ef4444; font-size: 12px; margin-top: 5px; font-weight: 500; }
</style>

<div style="padding: 40px; background: #f4f7fe; min-height: 100vh;">
    <div style="max-width: 900px; margin: auto; background: white; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); padding: 40px;">
        
        <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 30px;">
            <div style="background: #ff8e53; padding: 10px; border-radius: 12px; color: white;">
                <i class="fas fa-plus fa-lg"></i>
            </div>
            <h2 style="font-weight: 700; color: #1e293b; margin: 0;">Tambah Produk Baru</h2>
        </div>

        <form action="{{ route('admin.katalog.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 25px;">
                <div class="form-group">
                    <label class="label-custom">Nama Produk</label>
                    <input type="text" name="nama_produk" value="{{ old('nama_produk') }}" placeholder="Masukkan nama produk..." required 
                        class="input-custom {{ $errors->has('nama_produk') ? 'input-error' : '' }}">
                    @error('nama_produk') <p class="error-text">{{ $message }}</p> @enderror
                </div>
                <div class="form-group">
                    <label class="label-custom">Harga (Rp)</label>
                    <input type="number" name="harga" value="{{ old('harga') }}" placeholder="Contoh: 150000" required 
                        class="input-custom {{ $errors->has('harga') ? 'input-error' : '' }}">
                    @error('harga') <p class="error-text">{{ $message }}</p> @enderror
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 25px;">
                <div class="form-group">
                    <label class="label-custom">Tipe Mesin</label>
                    <select name="engine_type" id="engineType" required class="input-custom">
                        <option value="bensin" {{ old('engine_type') == 'bensin' ? 'selected' : '' }}>Mobil Bensin</option>
                        <option value="diesel" {{ old('engine_type') == 'diesel' ? 'selected' : '' }}>Mobil Diesel</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="label-custom">Tipe Komponen</label>
                    <select name="component_type" id="componentType" required class="input-custom">
                        {{-- Diisi via JavaScript --}}
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="label-custom">Deskripsi Produk (Opsional)</label>
                <textarea name="deskripsi" placeholder="Tuliskan spesifikasi, bahan, atau deskripsi knalpot di sini..." rows="4" 
                    class="input-custom">{{ old('deskripsi') }}</textarea>
            </div>

            <div style="margin-bottom: 35px;">
                <label class="label-custom">Upload Gambar Produk</label>
                <div style="border: 2px dashed {{ $errors->has('gambar') ? '#ef4444' : '#cbd5e1' }}; border-radius: 15px; padding: 30px; text-align: center; background: #f8fafc; cursor: pointer; transition: 0.3s;"
                     onclick="document.getElementById('imgInput').click()" 
                     onmouseover="this.style.borderColor='#ff8e53'" onmouseout="this.style.borderColor='{{ $errors->has('gambar') ? '#ef4444' : '#cbd5e1' }}'">
                    <i class="fas fa-cloud-upload-alt fa-3x" style="color: #94a3b8; margin-bottom: 10px;"></i>
                    <p style="color: #64748b; margin: 0;">Klik untuk pilih foto produk</p>
                    <input type="file" name="gambar" id="imgInput" accept="image/*" hidden required>
                </div>
                @error('gambar') <p class="error-text">{{ $message }}</p> @enderror
                
                <div id="previewContainer" style="display: none; margin-top: 20px; text-align: center;">
                    <p style="font-weight: 600; color: #64748b; margin-bottom: 10px;">Preview Gambar:</p>
                    <img id="imgPreview" src="#" style="max-width: 100%; height: 250px; border-radius: 15px; object-fit: contain; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                </div>
            </div>

            <div style="display: flex; gap: 15px;">
                <button type="submit" style="flex: 2; background: #ff8e53; color: white; padding: 15px; border: none; border-radius: 12px; font-weight: 700; font-size: 16px; cursor: pointer; transition: 0.3s;"
                    onmouseover="this.style.background='#e67e45'" onmouseout="this.style.background='#ff8e53'">
                    Simpan Produk
                </button>
                <a href="{{ route('admin.katalog.index') }}" style="flex: 1; background: #f1f5f9; color: #64748b; text-align: center; text-decoration: none; padding: 15px; border-radius: 12px; font-weight: 600; display: flex; align-items: center; justify-content: center;">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    // 1. Preview Gambar
    document.getElementById('imgInput').onchange = evt => {
        const [file] = document.getElementById('imgInput').files
        if (file) {
            document.getElementById('previewContainer').style.display = 'block';
            document.getElementById('imgPreview').src = URL.createObjectURL(file)
        }
    }

    // 2. Dynamic Dropdown (Komponen Menyesuaikan Mesin)
    const engineTypeSelect = document.getElementById('engineType');
    const componentTypeSelect = document.getElementById('componentType');

    const componentsBensin = ['Downpipe', 'Header', 'Resonator', 'Muffler', 'Full Set'];
    const componentsDiesel = ['Downpipe', 'Frontpipe', 'Centerpipe', 'Resonator', 'Tailpipe', 'Full Set'];

    function updateComponentOptions() {
        const selectedEngine = engineTypeSelect.value;
        const oldComponent = "{{ old('component_type') }}"; // Tetap ingat pilihan lama kalau error
        
        componentTypeSelect.innerHTML = ''; 

        let activeComponents = selectedEngine === 'bensin' ? componentsBensin : componentsDiesel;

        activeComponents.forEach(komponen => {
            const option = document.createElement('option');
            option.value = komponen;
            option.textContent = komponen;
            if (komponen === oldComponent) {
                option.selected = true;
            }
            componentTypeSelect.appendChild(option);
        });
    }

    engineTypeSelect.addEventListener('change', updateComponentOptions);
    updateComponentOptions(); // Jalankan sekali saat halaman pertama kali dibuka
</script>
@endsection