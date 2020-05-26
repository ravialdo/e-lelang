// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
		"language": {
			"sProcessing" : "Sedang memproses..",
			"lengthMenu" : "Tampilkan _MENU_ data per halaman",
			"zeroRecords" : " Maaf data tidak tersedia",
			"info" : "Menampilkan _PAGE_ halaman dari _PAGES_",
			"infoEmpty" : "Tidak ada data yang tersedia",
			"infoFiltered" : "(difilter dari _MAX_ total data)",
			"sSearch" : "Cari",
			"oPaginate": {
				"sFirst" : "Pertama",
				"sPrevious" : "Sebelumnya",
				"sNext" : "Selanjutnya",
				"sLast" : "Terakhir"
			}
		}
   });
});
