function menghapusData(id){
    const yakin = confirm("Apakah Anda yakin ingin menghapus data ini?");
    if (yakin) {
        const ajax = new XMLHttpRequest();
        ajax.open('GET', `../server/menghapusData.php?id=${id}`);
    
        ajax.onload = function () {
            if (ajax.status === 200) {
                const json = JSON.parse(ajax.responseText); // Mengurai JSON yang diterima dari server
                tampilData();
                
    
                
            } else {
                console.error('Gagal mengambil data: ', ajax.statusText);
            }
        };
    
        ajax.onerror = function () {
            console.error('Terjadi kesalahan dalam permintaan AJAX');
        };
    
        ajax.send();
    } else {
       
    }
    

}