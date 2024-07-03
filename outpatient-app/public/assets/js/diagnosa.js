// select-2 form
$(document).ready(function () {
    // $('#pasien').select2();
    // $('.select-obat').select2({
    //     theme: 'bootstrap-5'
    // });

    // clone input resep obat
    $('#add-input').click(() => {
        const newInputResep = $('#input-resep .row:first').clone()
        newInputResep.find('input').val("")
        $('#input-resep').append(newInputResep)
    })

    // remove last group input resep
    $('#remove-input').click(() => {
        const inputResep = $('#input-resep .row')
        if(inputResep.length > 1) {
            inputResep.last().remove()
        }
    })
});

