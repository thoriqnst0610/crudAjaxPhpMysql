function menambahData() {
    const ajax = new XMLHttpRequest();
    ajax.open('POST', '../server/menambahData.php', true);
    // ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    // Mengambil nilai dari input form
    const nama = document.getElementById("nama").value;
    const alamat = document.getElementById("alamat").value;

    const file = document.getElementById("profil").files;
            const firstFile = file.item(0);
    // const profil = document.getElementById("profil").value;

    // Mempersiapkan data yang akan dikirim
    // const form = new URLSearchParams();
    const form = new FormData();
    form.append("nama", nama);
    form.append("alamat", alamat);
    form.append("profil", firstFile);
    // form.append("profil", profil);

    // Event listener ketika request selesai
    ajax.onload = function () {
        if (ajax.status === 200) {
            // Parsing respons JSON
            const data = JSON.parse(ajax.responseText);

            // Menampilkan alert jika data berhasil ditambahkan
            if (data.pesan) {

                alert(data.pesan);
                // Menutup modal menggunakan JavaScript murni (tanpa jQuery)
                var modal = document.getElementById('exampleModal');
                var modalInstance = bootstrap.Modal.getInstance(modal);

                // Tutup modal
                modalInstance.hide();
                tampilData();
                // const modal = new bootstrap.Modal(document.getElementById('exampleModal'));
                // modal.hide(); // Menutup modal setelah berhasil

                // alert(data.pesan); // Tampilkan alert sukses



            } else if (data.error) {
                alert("Error: " + data.error); // Tampilkan alert error jika ada
            }
        } else {
            alert("Error: " + ajax.statusText); // Menangani jika status bukan 200
        }
    };

    // Menangani jika ada masalah dengan jaringan
    ajax.onerror = function () {
        alert("Request gagal. Coba lagi."); // Tampilkan alert jika terjadi error jaringan
    };

    // Mengirimkan data form ke server
    ajax.send(form);
}
