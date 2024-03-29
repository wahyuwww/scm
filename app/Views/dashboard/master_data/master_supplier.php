<?= $this->include('template/navigation_bar'); ?>


<title>Master Supplier</title>

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">List Master Data Supplier</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>

<div>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Pemasok</th>
                <th>Nama Barang</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['master_supplier'] as $key => $value) : ?>
                <tr>
                <td><?php echo $value['id']; ?></td>
                <td><?php echo $value['kode']; ?></td>
                <td><?php echo $value['pemasok']; ?></td>
                <td><?php echo $value['nama_barang']; ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <div style="float: right">
<?= $data['pager']->links('master_supplier', 'bootstrap_pagination'); ?>
    </div>
</div>
</div>


<?= $this->include('template/footer'); ?>