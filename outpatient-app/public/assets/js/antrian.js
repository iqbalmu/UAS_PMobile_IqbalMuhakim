
$(document).ready(function () {
    $('#filter-tanggal').change(function() {
        $('#form-filter').submit()
    })

    $('#filter-poli').change(function() {
        $('#form-filter').submit()
    })

    // select-2 modal
    $('#pasien').select2({
        dropdownParent: $('#modalAntrian')
    });
    $('#poli').select2({
        dropdownParent: $('#modalAntrian')
    });

    // mengirim data ke modal
    // Ketika modal ditampilkan
    $('#modalUpdateStatus').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Tombol yang memicu modal
        var antrianId = button.data('antrian-id'); // Ekstrak informasi dari data-* atribut
        var pasien = button.data('nama-pasien'); // Ekstrak informasi dari data-* atribut
        // Memperbarui konten modal
        var modal = $(this);
        modal.find('#antrianId').val(antrianId);
        modal.find('#input-pasien').val(pasien);
        modal.find('.nomor').text(antrianId);
    });
});
