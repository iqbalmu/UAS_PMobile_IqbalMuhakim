<div class="tab-pane fade p-2" id="navs-pills-rekam-medik" role="tabpanel">
    <h5 class="card-header mb-2">Rekam Medik</h5>
    <!-- Account -->
    <hr class="my-3" />
    <div class="card-body">
        <form action="" method="post">
            @csrf
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="pasien" class="form-label">Pasien</label>
                    <select id="pasien" class="select2 form-select" name="pasien" autofocus>
                        <option value="">Select Pasien</option>
                        <option value="en">English</option>
                        <option value="fr">French</option>
                        <option value="de">German</option>
                        <option value="pt">Portuguese</option>
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="nik" class="form-label">NIK</label>
                    <input class="form-control" type="text" id="nik" name="nik"
                        placeholder="11232321321241231" />
                </div>
                <div class="mb-3 col-md-6">
                    <label for="tinggi_badan" class="form-label">Tinggi Badan</label>
                    <input class="form-control" type="number" name="tinggi_badan" id="tinggi_badan" placeholder="65" />
                </div>
                <div class="mb-3 col-md-6">
                    <label for="berat_badan" class="form-label">Berat Badan</label>
                    <input class="form-control" type="number" name="berat_badan" id="berat_badan" placeholder="170" />
                </div>
                <div class="mb-3 col-md-6">
                    <label for="profesi" class="form-label">Profesi</label>
                    <input class="form-control" type="text" id="profesi" name="profesi" placeholder="Mahasiswa" />
                </div>
                <div class="mb-3 col-md-6">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Jl. jalan" />
                </div>
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
            </div>
        </form>
    </div>
    <!-- /Account -->
</div>
