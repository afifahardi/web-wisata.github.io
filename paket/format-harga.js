<script>
function formatHarga(value) {
    // Menghapus semua karakter non-digit kecuali koma atau titik
    value = value.replace(/[^\d,]/g, '');
    
    // Mengganti koma dengan titik
    value = value.replace(/,/g, '.');
    
    // Memformat angka dengan dua desimal
    let parts = value.split('.');
    let integerPart = parts[0];
    let decimalPart = parts.length > 1 ? parts[1] : '';
    
    // Menambahkan pemisah ribuan
    integerPart = integerPart.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    
    // Menyusun kembali bagian integer dan desimal
    return integerPart + (decimalPart ? '.' + decimalPart : '');
}

document.getElementById('harga_paket').addEventListener('input', function() {
    this.value = formatHarga(this.value);
});
document.getElementById('harga_tambahan1').addEventListener('input', function() {
    this.value = formatHarga(this.value);
});
document.getElementById('harga_tambahan2').addEventListener('input', function() {
    this.value = formatHarga(this.value);
});
document.getElementById('harga_tambahan3').addEventListener('input', function() {
    this.value = formatHarga(this.value);
});
</script>
