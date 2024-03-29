<?= $this->include('template/navigation_bar'); ?>


<title>Master BIN</title>

<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Master Bin</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>Lokasi Bin</th>
            <th>Nomor Rak</th>
            <th>Lokasi</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach ($data['master_bin'] as $key => $value) : ?>
            <tr>
                <td><?php echo $value['id']; ?></td>
                <td><?php echo $value['BIN']; ?></td>
                <td><?php echo $value['RACK']; ?></td>
                <td><?php echo $value['WAREHOUSE']; ?></td>
            </tr>
            <?php endforeach ?>
    </tbody>
</table>
    <div style="float: right">
    <?= $data['pager']->links('master_bin', 'bootstrap_pagination'); ?>
 
    </div>
</div>

<?= $this->include('template/footer'); ?>