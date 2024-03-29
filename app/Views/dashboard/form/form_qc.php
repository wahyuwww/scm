<?= $this->include('template/navigation_bar'); ?>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Form Quality Control</h1>
    </div>

    <div class="card">
        <div class="card-header">
            <b>Form Quality Control</b>
        </div>
        <div class="card-body">
            <div>
                <label>Product : </label>
                <input type="text" name="product" id="product" class="form-control">
            </div>
            <div>
                <label>Supplier : </label>
                <input type="text" name="supplier" id="supplier" class="form-control">
            </div>
            <div>
                <label>Lots : </label>
                <input type="text" name="lots" id="lots" class="form-control">
            </div>
            <div>
                <label>Product : </label>
                <input type="text" name="product" id="product" class="form-control">
            </div>
            <div>
                <label>Produsen : </label>
                <input type="text" name="produsen" id="produsen" class="form-control">
            </div>
            <div>
                <label>COO : </label>
                <br/>
                <div class="form-check form-check-inline">
                    <input class="form-check-label" type="radio" name="coo" id="coo" value="ada">
                    <label class="form-check-label" for="coo">Ada</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-label" type="radio" name="coo" id="coo" value="tidak_ada">
                    <label class="form-check-label" for="coo">Tidak Ada</label>
                </div>
            </div>
            <div>
            <label>COA : </label>
                <br/>
                <div class="form-check form-check-inline">
                    <input class="form-check-label" type="radio" name="coa" id="coa" value="ada">
                    <label class="form-check-label" for="coa">Ada</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-label" type="radio" name="coa" id="coa" value="tidak_ada">
                    <label class="form-check-label" for="coa">Tidak Ada</label>
                </div>
            </div>
            <div>
            <label>Sertifikat Halal : </label>
                <br/>
                <div class="form-check form-check-inline">
                    <input class="form-check-label" type="radio" name="sertifikat_halal" id="sertifikat_halal" value="ada">
                    <label class="form-check-label" for="sertifikat_halal">Ada</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-label" type="radio" name="sertifikat_halal" id="sertifikat_halal" value="tidak_ada">
                    <label class="form-check-label" for="sertifikat_halal">Tidak Ada</label>
                </div>
            </div>
            <div>
                <label>UOM Sampling : </label>
                <select name="uom" id="uom" class="form-control">
                    <option value=""></option>
                </select>
            </div>
            <div>
                <label>Qty Sampling : </label>
                <input type="text" name="qty_sampling" id="qty_sampling" class="form-control">
            </div>
            <div>
                <label>Qty Reject : </label>
                <input type="text" name="qty_reject" id="qty_reject" class="form-control">
            </div>
            <div>
                <label>Qty GR : </label>
                <input type="text" name="qty_gr" id="qty_gr" class="form-control">
            </div>
            <div>
                <label>Package : </label>
                <input type="text" name="package" id="package" class="form-control">
            </div>
            <div>
                <label>Visual Organoleptik : </label>
                <input type="text" name="visual_organoleptik" id="visual_organoleptik" class="form-control">
            </div>
            <div>
                <label>Vehicle Desc : </label>
                <textarea name="vehicle_desc" id="vehicle_desc" cols="20" rows="10" class="form-control"></textarea>
            </div>
            <div>
                <label>QC Desc : </label>
                <input type="text" name="qc_desc" id="qc_desc" class="form-control">
            </div>
            <div>
                <label>Lots RM : </label>
                <input type="text" name="lots_rm" id="lots_rm" class="form-control">
            </div>
            <div>
                <label>Perform : </label>
                <input type="text" name="perform" id="perform" class="form-control">
            </div>
            <div>
                <label>QC Reject Desc : </label>
                <textarea name="qc_reject_desc" id="qc_reject_desc" cols="20" rows="10" class="form-control"></textarea>
            </div>
            <div>
                <label>Status : </label>
                <select name="status" id="status" class="form-control">
                    <option value=""></option>
                </select>
            </div>
            <br/>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-danger">Cancel</button>
        </div>
    </div>
</div>

<?= $this->include('template/footer'); ?>