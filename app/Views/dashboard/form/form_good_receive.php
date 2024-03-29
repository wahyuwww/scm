<?= $this->include('template/navigation_bar'); ?>

<title>Form Good Receive</title>

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Form Good Receive</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<!-- Content Row -->
<div>
    <div class="card">
        <div class="card-header">
            <b>Form Good Receive</b>
        </div>
        <div class="card-body">
            <form action="/submit_form_good_receive" method="POST">
                <div>
                    <label>Nomor PO : </label>
                    <select id="po_id" class="form-control" name="po_id">
                    <option value="" selected disabled>-- PILIH DATA PO ----</option>    
                    <?php foreach ($data['master_po'] as $data) : ?>
                        <option value="<?php echo $data['po_id'] ?>"><?php echo $data['nomor_po'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div>
                    <label>Tanggal PO : </label>
                    <input type="date" class="form-control" name="tanggal_po" id="tanggal_po">
                </div>
                <div>
                    <label>Nomor GR : </label>
                    <input type="text" name="gr_id" id="gr_id" class="form-control">
                </div>
                <div>
                    <label>Deskripsi GR : </label>
                    <textarea name="desc_gr" id="desc_gr" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div>
                    <label>Tanggal GR : </label>
                    <input type="date" name="tanggal_gr" id="tanggal_gr" class="form-control">
                </div>
                    <div>
                        <label>Warehouse : </label>
                        <input type="text" name="warehouse_id" id="warehouse_id" class="form-control">
                    </div>
                    <div>
                        <label>Supplier : </label>
                        <input type="text" name="supplier_id" id="supplier_id" class="form-control">
                    </div>
                <div>
                    <label>Estimasi Kirim : </label>
                    <input type="text" class="form-control" name="est_kirim" id="est_kirim">
                </div>
                <div>
                    <label>Qty PO : </label>
                    <input type="text" name="qty_po" id="qty_po" class="form-control">
                </div>
                <div>
                    <label>Qty Dtg : </label>
                    <input type="text" name="qty_dtg" id="qty_dtg" class="form-control">
                </div>
                <div>
                    <label>Batch : </label>
                    <input type="text" id="batch" name="batch" class="form-control">
                </div>
                <div>
                    <label>Kode Batch : </label>
                    <input type="text" class="form-control" id="kode_batch" name="kode_batch">
                </div>
                <div>
                    <label>Kode PRD : </label>
                    <input type="text" name="kode_prd" id="kode_prd" class="form-control">
                </div>
                <div>
                    <label>Expired Date : </label>
                    <input type="date" name="exp_date" id="exp_date" class="form-control">
                </div>
                <br/>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-danger">Cancel</button>
            </form>
            </div>
        </div>
    </div>
    
    <?= $this->include('template/footer'); ?>