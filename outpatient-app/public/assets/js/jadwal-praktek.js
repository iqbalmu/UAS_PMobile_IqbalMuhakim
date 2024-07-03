$(document).ready(function () {

    // select-2 form
    $('#dokter').select2({
        dropdownParent: $('#modalJadwal')
    });
    $('#hari').select2({
        dropdownParent: $('#modalJadwal')
    });
    $('#select-hari').select2({
        dropdownParent: $('#modalEditJadwal')
    });

    // Memperbarui konten modal jadwal
    $('#modalEditJadwal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Tombol yang memicu modal
        var jadwalId = button.data('jadwal-id'); // Ekstrak informasi dari data-* atribut
        var dokterId = button.data('dokter-id'); // Ekstrak informasi dari data-* atribut
        var dokterName = button.data('dokter-name'); // Ekstrak informasi dari data-* atribut
        var hari = button.data('hari'); // Ekstrak informasi dari data-* atribut
        var startTime = button.data('start-time'); // Ekstrak informasi dari data-* atribut
        var endTime = button.data('end-time'); // Ekstrak informasi dari data-* atribut

        var modal = $(this);
        modal.find('#id_jadwal').val(jadwalId);
        modal.find('#select-dokter').val(dokterId);
        modal.find('#select-dokter').text(dokterName);
        modal.find('#select-hari').val(hari).trigger('change');
        modal.find('#mulai').val(startTime);
        modal.find('#selesai').val(endTime);

    });

    // modal delete
    $('#modalDeleteJadwal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var jadwalId = button.data('jadwal-id');

        var modal = $(this);
        modal.find('#id_jadwal').val(jadwalId);
    })
});
