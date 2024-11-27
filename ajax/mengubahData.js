function mengubahData(id) {
    const ajax = new XMLHttpRequest();

    const param = new URLSearchParams();
    param.append("id", id);

    ajax.open('GET', `../server/mengambilSatuData.php?${param.toString()}`);
    ajax.onload = function () {
        if (ajax.status === 200) {
            const json = JSON.parse(ajax.responseText);
            json.forEach((item) => {
                // Update input fields with the received data
                document.getElementById("idEdit").value = item.id;
                document.getElementById("namaEdit").value = item.nama;
                document.getElementById("alamatEdit").value = item.alamat;
                document.getElementById("profilEdit").value = item.photo;

                // Display modal
                const modalUbah = document.getElementById("modalEdit");
                modalUbah.style.display = 'block';
            });
        }
    };
    ajax.send();
}


function menutupMoadal() {
    const modalUbah = document.getElementById("modalEdit");
    modalUbah.style.display = 'none';
}

function mengupdateData() {
    const ajax = new XMLHttpRequest();
    ajax.open('POST', '../server/mengubahData.php');

    // Set header sebelum mengirim data
    ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    ajax.onload = function () {
        if (ajax.status === 200) {
            const response = JSON.parse(ajax.responseText);

            if (response.error) {
                alert(response.error);
            } else {
                alert(response.pesan);
            }

            // Sembunyikan modal setelah berhasil update
            const modalUbah = document.getElementById("modalEdit");
            modalUbah.style.display = 'none';

            // Refresh tampilan data
            tampilData();
        }
    };

    // Siapkan data form untuk dikirim
    const form = new URLSearchParams();
    form.append("idEdit", document.getElementById("idEdit").value);
    form.append("namaEdit", document.getElementById("namaEdit").value);
    form.append("alamatEdit", document.getElementById("alamatEdit").value);
    form.append("profilEdit", document.getElementById("profilEdit").value);

    // Kirim data
    ajax.send(form.toString());
}
