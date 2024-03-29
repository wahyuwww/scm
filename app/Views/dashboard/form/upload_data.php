<?= $this->include('template/navigation_bar'); ?>

<title>Upload Data Excel To Database</title>

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Form Upload Data PO</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>

<!-- Content Row -->
<div>

<!-- Form Upload Data -->
    <div class="card">
        <div class="card-header">
            <b>Form Upload Data PO</b>
        </div>
        <div class="card-body">
            <form action="/upload_data_excel_to_database" method="POST" enctype="multipart/form-data">
                <input type="file" name="file_excel" class="form-control" placeholder="Upload Data Excel untuk data PO...">
                <br/>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-danger">Cancel</button>
        </div> 
    </div>


<?= $this->include('template/footer'); ?>