<div class="modal fade" id="modalDeleteJadwal" tabindex="-1" aria-labelledby="modalDeleteJadwalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('jpraktek.remove') }}" method="post">
            @csrf
            @method('delete')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-6" id="modalDeleteJadwalLabel">!!Data tidak bisa dikembalikan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Ingin menghapus data jadwal??</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="hidden" name="id_jadwal" id="id_jadwal">
                    <button type="submit" class="btn btn-primary">Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>
