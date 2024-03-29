<?= $this->include('template/navigation_bar'); ?>

<title>Master Data PO</title>

<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Master Data PO</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModal"><i
            class="fas fa-search fa-sm text-white-50"></i> Cari Data Report</a>
</div>

<!-- modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cari Data Tanggal PO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/submit_search_data_po" method="post">
            <div>
                <label>Tanggal Awal : </label>
                <input type="text" name="tanggal_po_awal" id="tanggal_po_awal" class="form-control">
            </div>
            <div>
                <label>Tanggal Akhir : </label>
                <input type="text" name="tanggal_po_akhir" id="tanggal_po_akhr" class="form-control">
            </div>
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
</form>
    </div>
  </div>
</div>

<table class="table table-bordered table-striped">
    <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>Supplier</th>
            <th>Nomor PO</th>
            <th>Tanggal PO</th>
            <th>Estimasi Kirim</th>
            <th>Nama Barang</th>
            <th>Kuantitas</th>
            <th>Kuantitas Terproses</th>
            <th>Kuantitas Belum Terproses</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach ($data['master_po'] as $key => $value) : ?>
            <tr>
                <td><?php echo $value['po_id']; ?></td>
                <td><?php echo $value['pemasok']; ?></td>
                <td><?php echo $value['nomor_po']; ?></td>
                <td><?php echo $value['tanggal_po']; ?></td>
                <td><?php echo $value['tanggal_pengiriman']; ?></td>
                <td><?php echo $value['nama_barang']; ?> </td>
                <td><?php echo $value['kuantitas']; ?></td>
                <td><?php echo $value['kts_terproses']; ?></td>
                <td><?php echo $value['kts_belum_terp']; ?></td>
            </tr>
            <?php endforeach ?>
    </tbody>
</table>
    <div style="float: right">
<?= $data['pager']->links('master_po', 'bootstrap_pagination'); ?>
    </div>
    </div>

<?= $this->include('template/footer'); ?>