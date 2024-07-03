<div class="modal fade" id="modalDeleteApoteker" tabindex="-1" aria-labelledby="modalDeleteApotekerLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('apoteker.destroy', $user->id_user) }}" method="post">
            @csrf
            @method('delete')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-6" id="modalDeleteApotekerLabel">!!Data tidak bisa dikembalikan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Ingin menghapus data Apoteker??</h4>
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
