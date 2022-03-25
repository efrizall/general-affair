// Flash data berhasil
const flashdata = $(".flash-data").data("flashdata");
if (flashdata) {
  Swal.fire({
    icon: "success",
    title: "Berhasil",
    text: flashdata,
  });
}

// Swal Hapus
$(".tombol-hapus").on("click", function (e) {
  e.preventDefault(); //menghilangkan aksi default
  const href = $(this).attr("href");
  Swal.fire({
    title: "Yakin ingin menghapus?",
    text: "Data ini tidak bisa dikembalikan lagi!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yakin, hapus!",
  }).then((result) => {
    if (result.isConfirmed) {
      console.log(href);
      //   document.location.href = href; //Memindahkan halaman ke href tombol
    }
  });
});

// Swal Setuju
$(".tombol-setuju").on("click", function (e) {
  e.preventDefault(); //menghilangkan aksi default
  const href = $(this).attr("href");
  Swal.fire({
    title: "Yakin ingin menyetujui?",
    text: "Permintaan ini akan disetujui!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Ya, setujui!",
  }).then((result) => {
    if (result.isConfirmed) {
      console.log(href);
      //   document.location.href = href; //Memindahkan halaman ke href tombol
    }
  });
});

// Swal tolak
$(".tombol-tolak").on("click", function (e) {
  e.preventDefault(); //menghilangkan aksi default
  const href = $(this).attr("href");
  Swal.fire({
    title: "Yakin tidak menyetujui?",
    text: "Permintaan ini tidak disetujui!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Ya, tidak setujui!",
  }).then((result) => {
    if (result.isConfirmed) {
      console.log(href);
      //   document.location.href = href; //Memindahkan halaman ke href tombol
    }
  });
});

// Ubah proses
$(document).ready(function () {
  // Untuk sunting
  $("#proses").on("show.bs.modal", function (event) {
    var div = $(event.relatedTarget); // Tombol dimana modal di tampilkan
    var modal = $(this);

    // Isi nilai pada field
    modal.find("#id").attr("value", div.data("id"));
  });
});
