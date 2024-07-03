
$(document).ready(function () {
    $('#filter-tanggal').change(function() {
        $('#form-filter').submit()
    })

    // mengirim data ke modal
    // Ketika modal ditampilkan
    $('#modalPembayaran').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Tombol yang memicu modal
        var idPembayaran = button.data('id'); // Ekstrak informasi dari data-* atribut
        var mrn = button.data('mrn'); // Ekstrak informasi dari data-* atribut
        var harga = button.data('harga'); // Ekstrak informasi dari data-* atribut
        // Memperbarui konten modal
        var modal = $(this);
        modal.find('#id_pembayaran').val(idPembayaran);
        modal.find('#mrn').val(mrn);
        modal.find('#harga').val(harga);
    });
});
