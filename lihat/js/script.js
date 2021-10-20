// Ambil elemen yang kita butuhkan
var keyword = document.getElementById('keyword');
var tombolcari = document.getElementById('tombolcari');
var container = document.getElementById('container');

// Tambahkan event ketika keyword ditulis
keyword.addEventListener('keyup', function() {

	//Buat objek AJAX
	var xhr = new XMLHttpRequest();

	// Cek kesiapan AJAX
	xhr.onreadystatechange = function() {
		if( xhr.readyState == 4 && xhr.status == 200 ) {
			container.innerHTML = xhr.responseText;
		}
	}

	// Eksekusi AJAX
	xhr.open('GET', 'ajax/mobil.php?keyword=' + keyword.value, true);
	xhr.send();







});