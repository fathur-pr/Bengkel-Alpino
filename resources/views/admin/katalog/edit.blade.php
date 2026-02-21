@extends('layouts.admin')

@section('content')
<div style="padding: 40px; background: #f4f7fe; min-height: 100vh;">
    <div style="max-width: 900px; margin: auto; background: white; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); padding: 40px;">
        <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 30px;">
            <div style="background: #3b82f6; padding: 10px; border-radius: 12px; color: white;">
                <i class="fas fa-edit fa-lg"></i>
            </div>
            <h2 style="font-weight: 700; color: #1e293b; margin: 0;">Edit Produk: {{ $product->nama_produk }}</h2>
        </div>

        <form action="{{ route('admin.katalog.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 25px; margin-bottom: 25px;">
                <div>
                    <label style="display: block; font-weight: 600; color: #64748b; margin-bottom: 8px;">Nama Produk</label>
                    <input type="text" name="nama_produk" value="{{ $product->nama_produk }}" required 
                        style="width: 100%; padding: 12px 15px; border: 1.5px solid #e2e8f0; border-radius: 12px; outline: none; transition: 0.3s;"
                        onfocus="this.style.borderColor='#3b82f6'" onblur="this.style.borderColor='#e2e8f0'">
                </div>
                <div>
                    <label style="display: block; font-weight: 600; color: #64748b; margin-bottom: 8px;">Harga (Rp)</label>
                    <input type="number" name="harga" value="{{ $product->harga }}" required 
                        style="width: 100%; padding: 12px 15px; border: 1.5px solid #e2e8f0; border-radius: 12px; outline: none; transition: 0.3s;"
                        onfocus="this.style.borderColor='#3b82f6'" onblur="this.style.borderColor='#e2e8f0'">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 25px; margin-bottom: 25px;">
                <div>
                    <label style="display: block; font-weight: 600; color: #64748b; margin-bottom: 8px;">Tipe Mesin</label>
                    <select name="engine_type" id="engineType" required style="width: 100%; padding: 12px 15px; border: 1.5px solid #e2e8f0; border-radius: 12px; background: white; outline: none; transition: 0.3s;" onfocus="this.style.borderColor='#3b82f6'" onblur="this.style.borderColor='#e2e8f0'">
                        <option value="bensin" {{ $product->engine_type == 'bensin' ? 'selected' : '' }}>Mobil Bensin</option>
                        <option value="diesel" {{ $product->engine_type == 'diesel' ? 'selected' : '' }}>Mobil Diesel</option>
                    </select>
                </div>
                <div>
                    <label style="display: block; font-weight: 600; color: #64748b; margin-bottom: 8px;">Tipe Komponen</label>
                    <select name="component_type" id="componentType" required style="width: 100%; padding: 12px 15px; border: 1.5px solid #e2e8f0; border-radius: 12px; background: white; outline: none; transition: 0.3s;" onfocus="this.style.borderColor='#3b82f6'" onblur="this.style.borderColor='#e2e8f0'">
                        </select>
                </div>
            </div>

            <div style="margin-bottom: 25px;">
                <label style="display: block; font-weight: 600; color: #64748b; margin-bottom: 8px;">Deskripsi Produk</label>
                <textarea name="deskripsi" rows="5" 
                    style="width: 100%; padding: 12px 15px; border: 1.5px solid #e2e8f0; border-radius: 12px; outline: none; font-family: inherit; resize: vertical; transition: 0.3s;"
                    onfocus="this.style.borderColor='#3b82f6'" onblur="this.style.borderColor='#e2e8f0'">{{ $product->deskripsi }}</textarea>
            </div>

            <div style="margin-bottom: 35px;">
                <label style="display: block; font-weight: 600; color: #64748b; margin-bottom: 8px;">Gambar Saat Ini (Upload baru jika ingin ganti)</label>
                
                @if($product->gambar)
                <div style="margin-bottom: 15px; text-align: center; background: #f8fafc; padding: 15px; border-radius: 15px; border: 1px solid #e2e8f0;">
                    <img src="{{ asset('storage/'.$product->gambar) }}" style="max-width: 100%; height: 200px; object-fit: contain; border-radius: 10px;">
                </div>
                @endif

                <div style="border: 2px dashed #cbd5e1; border-radius: 15px; padding: 20px; text-align: center; background: white; cursor: pointer; transition: 0.3s;"
                     onclick="document.getElementById('imgInput').click()" onmouseover="this.style.borderColor='#3b82f6'">
                    <i class="fas fa-camera fa-2x" style="color: #94a3b8; margin-bottom: 10px;"></i>
                    <p style="color: #64748b; margin: 0; font-size: 14px;">Klik untuk ganti foto</p>
                    <input type="file" name="gambar" id="imgInput" accept="image/*" hidden>
                </div>
                
                <div id="previewContainer" style="display: none; margin-top: 15px; text-align: center;">
                    <p style="font-weight: 600; color: #ef4444; margin-bottom: 10px;">Preview Gambar Baru:</p>
                    <img id="imgPreview" src="#" style="max-width: 100%; height: 200px; border-radius: 15px; object-fit: contain; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                </div>
            </div>

            <div style="display: flex; gap: 15px;">
                <button type="submit" style="flex: 2; background: #3b82f6; color: white; padding: 15px; border: none; border-radius: 12px; font-weight: 700; font-size: 16px; cursor: pointer; transition: 0.3s;"
                    onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 5px 15px rgba(59,130,246,0.3)'" onmouseout="this.style.transform='none'; this.style.boxShadow='none'">
                    Update Produk
                </button>
                <a href="{{ route('admin.katalog.index') }}" style="flex: 1; background: #f1f5f9; color: #64748b; text-align: center; text-decoration: none; padding: 15px; border-radius: 12px; font-weight: 600; transition: 0.3s;" onmouseover="this.style.background='#e2e8f0'" onmouseout="this.style.background='#f1f5f9'">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    // 1. Script Tampil Gambar Otomatis
    document.getElementById('imgInput').onchange = evt => {
        const [file] = document.getElementById('imgInput').files
        if (file) {
            document.getElementById('previewContainer').style.display = 'block';
            document.getElementById('imgPreview').src = URL.createObjectURL(file)
        }
    }

    // 2. Script Dynamic Dropdown (Komponen Menyesuaikan Mesin)
    const engineTypeSelect = document.getElementById('engineType');
    const componentTypeSelect = document.getElementById('componentType');
    
    // Ambil data komponen lama dari database (Biar pas mau diedit, datanya nggak hilang)
    const currentComponent = "{{ $product->component_type }}";

    const componentsBensin = ['Downpipe', 'Header', 'Resonator', 'Muffler', 'Full Set'];
    const componentsDiesel = ['Downpipe', 'Frontpipe', 'Centerpipe', 'Resonator', 'Tailpipe', 'Full Set'];

    function updateComponentOptions() {
        const selectedEngine = engineTypeSelect.value;
        componentTypeSelect.innerHTML = ''; 

        let activeComponents = selectedEngine === 'bensin' ? componentsBensin : componentsDiesel;

        activeComponents.forEach(komponen => {
            const option = document.createElement('option');
            option.value = komponen;
            option.textContent = komponen;
            
            // Logika Pintar: Kalau option ini sama dengan data dari database, pilih otomatis!
            if (komponen === currentComponent) {
                option.selected = true;
            }
            
            componentTypeSelect.appendChild(option);
        });
    }

    engineTypeSelect.addEventListener('change', updateComponentOptions);
    updateComponentOptions(); // Jalankan saat halaman dibuka
</script>
@endsection