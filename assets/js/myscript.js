const flashdata = $("#flash-data").data("flashdata");
const flashdata2 = $("#flash-data2").data("flashdata");
const flashdata3 = $("#flash-data3").data("flashdata");
const flashdata4 = $("#flash-data4").data("flashdata");
if (flashdata) {
	Swal.fire("Berhasil", "Akun berhasil dibuat! Silakan login", "success");
} else if (flashdata2) {
	Swal.fire("Gagal", flashdata2, "error");
} else if (flashdata3) {
	Swal.fire("Gagal", flashdata3, "error");
} else if (flashdata4) {
	Swal.fire("Berhasil", flashdata4, "success");
}
