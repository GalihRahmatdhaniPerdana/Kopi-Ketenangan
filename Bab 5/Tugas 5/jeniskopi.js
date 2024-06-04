let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function () {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        };
        
        const dataForm = document.getElementById('dataForm');
        const popup = document.getElementById('popup');
        const overlay = document.getElementById('overlay');
    function togglePopup() {
        popup.style.display = 'block';
        overlay.style.display = 'block';
    }


    dataForm.addEventListener('submit', function(event) {
        const key = "dataKopi";
        event.preventDefault();
        
        const kopi = document.getElementById('kopi').value;
        const harga = document.getElementById('harga').value;

        // Membuat objek untuk data yang akan disimpan di local storage
        const newData = {
            kopi: kopi,
            harga: harga
        };

        // Ambil data yang telah disimpan sebelumnya
        let storedData = JSON.parse(localStorage.getItem(key)) || [];

        // Tambahkan data baru ke dalam array data yang telah ada
        storedData.push(newData);

        // Simpan kembali data ke local storage
        localStorage.setItem(key, JSON.stringify(storedData));

        // Tampilkan data terbaru di tabel
        displayData();

        // Tampilkan pesan sukses
        alert('Data berhasil disimpan di Local Storage.');

        // Tutup popup
        closePopup();

        // Reset nilai input
        document.getElementById('kopi').value = '';
        document.getElementById('harga').value = '';
    });

    function displayData() {
        const tableBody = document.getElementById('tableBody');
        tableBody.innerHTML = '';

        const storedData = JSON.parse(localStorage.getItem('dataKopi'));

        if (storedData) {
            storedData.forEach(function(data) {
                const row = document.createElement('tr');
                const jenisKopiCell = document.createElement('td');
                const hargaCell = document.createElement('td');
                const actionCell = document.createElement('td');

                jenisKopiCell.textContent = data.kopi;
                hargaCell.textContent = data.harga;
                actionCell.innerHTML = '<a href="#">Edit</a> | <a href="#">Hapus</a>';

                row.appendChild(jenisKopiCell);
                row.appendChild(hargaCell);
                row.appendChild(actionCell);

                tableBody.appendChild(row);
            });
        }
    }

    function closePopup() {
        popup.style.display = 'none';
        overlay.style.display = 'none';
    }

    // Panggil fungsi displayData saat halaman dimuat untuk pertama kali
    displayData();