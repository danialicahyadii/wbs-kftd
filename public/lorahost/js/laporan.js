document.getElementById('anonymousCheckbox').addEventListener('change', function() {
    const nameInput = document.getElementById('nameInput');
    if (this.checked) {
        nameInput.value = 'Anonymous';  // Set name to 'Anonymous' if checked
        nameInput.readOnly = true;       // Make input read-only
    } else {
        nameInput.value = '';             // Clear the input if unchecked
        nameInput.readOnly = false;       // Make input editable again
    }
});

document.getElementById('nextButton').addEventListener('click', function() {

    const nama_pelapor = document.querySelector('input[name="nama_pelapor"]').value;
    const alamat_pelapor = document.querySelector('input[name="alamat_pelapor"]').value;
    const no_hp_pelapor = document.querySelector('input[name="no_hp_pelapor"]').value;
    const form = this.value;


    fetch('laporan', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: JSON.stringify({
            nama_pelapor: nama_pelapor,
            alamat_pelapor: alamat_pelapor,
            no_hp_pelapor: no_hp_pelapor,
            form: form
        }),
    })
    .then(response => {
        response.json();
    })
    .then(data => {
        console.log(data);
    })
    .catch(error => {
        console.error('Error:', error);
    });
    // Sembunyikan form pertama dan tampilkan form kedua
    // document.getElementById('form1').style.display = 'none';
    // document.getElementById('form2').style.display = 'block';
});
document.getElementById('backButton2').addEventListener('click', function() {

    // Kembali ke form pertama
    document.getElementById('form2').style.display = 'none';
    document.getElementById('form1').style.display = 'block';
});
document.getElementById('nextButton2').addEventListener('click', function() {
    const nama_terlapor = document.querySelector('input[name="nama_terlapor"]').value;
    const jabatan_terlapor = document.querySelector('input[name="jabatan_terlapor"]').value;
    const unit_terlapor = document.querySelector('input[name="unit_terlapor"]').value;
    const form = this.value;

    // Ambil semua input nama pihak terlibat
    const nama_pihak_terlibat = Array.from(document.querySelectorAll('input[name="nama_pihak_terlibat[]"]')).map(input => input.value);
    const unit_pihak_terlibat = Array.from(document.querySelectorAll('input[name="unit_pihak_terlibat[]"]')).map(input => input.value);

    fetch('laporan', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: JSON.stringify({
            nama_terlapor: nama_terlapor,
            jabatan_terlapor: jabatan_terlapor,
            unit_terlapor: unit_terlapor,
            nama_pihak_terlibat: nama_pihak_terlibat,
            unit_pihak_terlibat: unit_pihak_terlibat,
            form: form
        }),
    })
    .then(response => {
        response.json();
    })
    .then(data => {
        console.log(data);
    })
    .catch(error => {
        console.error('Error:', error);
    });

    // Simpan data dari form 2 (misal) jika ada
    document.getElementById('form2').style.display = 'none';
    document.getElementById('form3').style.display = 'block';
});
document.getElementById('backButton3').addEventListener('click', function() {
    document.getElementById('form3').style.display = 'none';
    document.getElementById('form2').style.display = 'block';
});
document.getElementById('nextButton3').addEventListener('click', function() {
    // Ambil semua input nama pihak terlibat
    const checkboxes = document.querySelectorAll('input[name="jenis_pelanggaran[]"]:checked');

    const jenis_pelanggaran = Array.from(checkboxes).map(checkbox => checkbox.value);

    const kronologi = document.querySelector('textarea[name="kronologi"]').value;
    const waktu_pelanggaran = document.querySelector('input[name="waktu_pelanggaran"]').value;
    const tempat_pelanggaran = document.querySelector('input[name="tempat_pelanggaran"]').value;
    const konsekuensi = document.querySelector('input[name="konsekuensi"]').value;
    const form = this.value;


    // Simpan data pihak terlibat sebagai JSON string
    // sessionStorage.setItem('jenis_pelanggaran', JSON.stringify(selectedViolations));

    fetch('laporan', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: JSON.stringify({
            kronologi: kronologi,
            waktu_pelanggaran: waktu_pelanggaran,
            tempat_pelanggaran: tempat_pelanggaran,
            konsekuensi: konsekuensi,
            jenis_pelanggaran: jenis_pelanggaran,
            form: form
        }),
    })
    .then(response => response.json())
    .then(data => console.log(data))
    .catch(error => console.error('Error:', error));

    document.getElementById('form3').style.display = 'none';
    document.getElementById('form4').style.display = 'block';
});
document.getElementById('backButton4').addEventListener('click', function() {
    document.getElementById('form4').style.display = 'none';
    document.getElementById('form3').style.display = 'block';
});
document.getElementById('formPersetujuan').addEventListener('change', function(){
    const submitButton = document.getElementById('submitButton');
    if(this.checked){
        submitButton.removeAttribute('disabled')
    }else{
        submitButton.setAttribute('disabled', 'true');
    }
})
// document.getElementById('submitButton').addEventListener('click', function() {
//     const nama_saksi = Array.from(document.querySelectorAll('input[name="nama_saksi[]"]')).map(input => input.value);
//     const unit_saksi = Array.from(document.querySelectorAll('input[name="unit_saksi[]"]')).map(input => input.value);
//     const fileInputs = document.querySelectorAll('input[name="bukti[]"]');
//     const informasi_lainnya = document.querySelector('input[name="informasi_lainnya"]').value;
//     const form = this.value;

//     const formData = new FormData();

//     formData.append('nama_saksi', JSON.stringify(nama_saksi)); // Mengonversi array ke JSON
//     formData.append('unit_saksi', JSON.stringify(unit_saksi)); // Mengonversi array ke JSON
//     formData.append('informasi_lainnya', informasi_lainnya);
//     formData.append('form', form);

//     fileInputs.forEach(input => {
//         if (input.files.length > 0) {
//             Array.from(input.files).forEach(file => {
//                 formData.append('bukti[]', file);
//             });
//         }
//     });
//     // Ambil data dari sessionStorage dan proses sesuai kebutuhan
//     // alert("Form selesai! Data: " + sessionStorage.getItem('nama_pelapor'));
//     // Bisa lakukan pengolahan lebih lanjut atau pengiriman data
//     fetch('laporan', {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/json',
//             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
//         },
//         body: formData,
//     })
//     .then(response => response.json())
//     .then(data => console.log(data))
//     .catch(error => console.error('Error:', error));
// });

