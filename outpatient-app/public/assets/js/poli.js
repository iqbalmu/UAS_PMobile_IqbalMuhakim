$(document).ready(function () {

    // Memperbarui konten modal jadwal
    $('#modalEditPoli').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Tombol yang memicu modal
        var id = button.data('id'); // Ekstrak informasi dari data-* atribut
        var nama = button.data('nama'); // Ekstrak informasi dari data-* atribut
        var deskripsi = button.data('deskripsi'); // Ekstrak informasi dari data-* atribut

        var modal = $(this);
        modal.find('#id').val(id);
        modal.find('#nama').val(nama);
        modal.find('#nama').text(nama);
        modal.find('#deskripsi').val(deskripsi);
        modal.find('#deskripsi').text(deskripsi);
    });

    // modal delete
    $('#modalDeletePoli').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');

        var modal = $(this);
        modal.find('#id').val(id);
    })
});
