<?= $this->include('template/navigation_bar'); ?>

<title>Form Identitas Pallet</title>

<div class="container-fluid">

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Form Identitas Pallet</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<!-- Content Row -->
<div>


<div class="card">
<div class="card-header">
<b>Form Label Identitas Barang/Pallet</b>
</div>
<div class="card-body">
<form action="/submit_form_identitas_pallet" method="post">
<div>
<label>Nama Barang : </label>
<input type="text" name="nama_barang" class="form-control" placeholder="Masukkan Nama Baranng">
</div>
<div>
<label>Jumlah Barang : </label>
<input type="text" name="jumlah_barang" class="form-control" placeholder="Masukkan Jumlah Barang">
</div>
<div>
<label>Kode Produksi/Nomor Batch : </label>
<input type="text" name="kode_produksi" class="form-control" placeholder="Masukkan Kode Produksi">
</div>
<div>
<label>Tanggal Kedatangan : </label>
<input type="date" name="tanggal_kedatangan" class="form-control" placeholder="Masukkan Tanggal Kedatangan">
</div>
<div>
<label>Tanggal Kadaluarsa : </label>
<input type="date" name="tanggal_kadaluarsa" class="form-control" placeholder="Masukkan Tanggal Kadaluarsa">
</div>
<div>
<label>Nama Supplier : </label>
<input type="text" name="nama_supplier" class="form-control" placeholder="Masukkan Nama Supplier">
</div>
<div>
<label>Nama Petugas : </label>
<input type="text" name="nama_petugas" class="form-control" placeholder="Masukkan Nama Petugas">
</br>
<button class="btn btn-primary" type="submit">Submit</button>
<button class="btn btn-danger" type="reset">Cancel</button>
</form>
</div>
</div>
</div>

<?= $this->include('template/footer'); ?>