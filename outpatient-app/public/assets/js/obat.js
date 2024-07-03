// mengirim data ke modal
$(document).ready(function () {
    // Ketika modal ditampilkan
    $('#obatModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Tombol yang memicu modal
        var obatId = button.data('obat-id'); // Ekstrak informasi dari data-* atribut
        var obatName = button.data('obat-name'); // Ekstrak informasi dari data-* atribut
        // Memperbarui konten modal
        var modal = $(this);
        modal.find('#obatId').val(obatId);
        modal.find('.obat-name').text(obatName);
    });
});
