<div class="modal fade" id="modalDeleteDokter" tabindex="-1" aria-labelledby="modalDeleteDokterLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('dokter.destroy', $dokter->id_user) }}" method="post">
            @csrf
            @method('delete')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-6" id="modalDeleteDokterLabel">!!Data tidak bisa dikembalikan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Ingin menghapus data Dokter??</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <input type="hidden" name="id" id="id"> --}}
                    <button type="submit" class="btn btn-primary">Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>
