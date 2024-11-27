function menghapusElement() {

    const menampilkanData = document.getElementById("menampilkanData");
    while (menampilkanData.firstChild) {
        menampilkanData.removeChild(menampilkanData.firstChild);
    }

}

function tampilData() {

    menghapusElement();

    const ajax = new XMLHttpRequest();
    ajax.open('GET', '../server/menampilkanData.php');

    ajax.onload = function () {
        if (ajax.status === 200) {
            const json = JSON.parse(ajax.responseText); // Mengurai JSON yang diterima dari server
            const menampilkanData = document.getElementById("menampilkanData");

            // Pastikan dataManusia adalah array
            json.forEach((item, index) => {
                const search = document.getElementById("search").value.toLowerCase();
            
                // Pastikan untuk mencocokkan dengan field tertentu
                if (
                    item.nama.toLowerCase().includes(search) || 
                    item.alamat.toLowerCase().includes(search)
                ) {
                    const tr = document.createElement("tr");
            
                    // No
                    const tdNo = document.createElement("td");
                    tdNo.textContent = index + 1; // Menampilkan nomor urut
                    tr.appendChild(tdNo);
            
                    // Nama
                    const tdNama = document.createElement("td");
                    tdNama.textContent = item.nama; // Asumsikan data ada dalam field 'nama'
                    tr.appendChild(tdNama);
            
                    // Alamat
                    const tdAsal = document.createElement("td");
                    tdAsal.textContent = item.alamat; // Asumsikan data ada dalam field 'alamat'
                    tr.appendChild(tdAsal);
            
                    // Photo
                    const tdPhoto = document.createElement("td");
                    const imgPhoto = document.createElement("img");
                    imgPhoto.src = `/../upload/${item.photo}`; // Asumsikan data 'photo' adalah URL gambar
                    imgPhoto.alt = "Photo";
                    imgPhoto.style.width = "50px"; // Atur ukuran gambar
                    imgPhoto.style.height = "50px";
                    tdPhoto.appendChild(imgPhoto);
                    tr.appendChild(tdPhoto);
            
                    // Actions
                    const tdAction = document.createElement("td");
                    const btnHapus = document.createElement("button");
                    btnHapus.id = item.id;
                    btnHapus.textContent = "Hapus";
                    btnHapus.className = "btn btn-danger me-2";
                    btnHapus.onclick = function () {
                        menghapusData(item.id); // Mengirimkan id
                    };
            
                    const btnUbah = document.createElement("button");
                    btnUbah.id = item.id;
                    btnUbah.textContent = "Ubah";
                    btnUbah.className = "btn btn-primary";
                    btnUbah.onclick = function () {
                        mengubahData(item.id); // Mengirimkan id
                    };
            
                    tdAction.appendChild(btnHapus);
                    tdAction.appendChild(btnUbah);
                    tr.appendChild(tdAction);
            
                    // Menambahkan row baru ke dalam tabel
                    const menampilkanData = document.getElementById("menampilkanData"); // Pastikan elemen ini ada
                    menampilkanData.appendChild(tr);
                }
            });
            
        } else {
            console.error('Gagal mengambil data: ', ajax.statusText);
        }
    };

    ajax.onerror = function () {
        console.error('Terjadi kesalahan dalam permintaan AJAX');
    };

    ajax.send();

}

const searchInput = document.getElementById("search");

searchInput.onchange = function () {
    tampilData();
}

searchInput.onkeyup = function () {
    tampilData();
}

tampilData();