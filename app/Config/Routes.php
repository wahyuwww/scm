<?php

use App\Controllers\API\APIScmController;
use App\Controllers\ScmController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


 
// $routes->get('/', 'Home::index');

    //route login
$routes->get('/', [ScmController::class,'index']);
$routes->post('/submit_login', [ScmController::class,'Login']);

    //route dashboard beserta menu-menu yang ada di dalam nya
$routes->get('/dashboard', [ScmController::class,'dashboard']);
$routes->get('/master_bin', [ScmController::class,'MasterBin']);
$routes->get('/master_supplier', [ScmController::class,'MasterSupplier']);
$routes->get('/master_data_po',[ScmController::class,'ListDataTablePO']);
$routes->get('/bin_location', [ScmController::class,'HalamanBIN']);

    //routes get form
$routes->get('/form_schedule_incoming',[ScmController::class,'FormScheduleIncoming']);
$routes->get('/form_good_receive',[ScmController::class,'FormGoodReceive']);
$routes->get('/form_identitas_pallet',[ScmController::class,'FormIdentitasPallet']);
$routes->get('/form_status_inspeksi',[ScmController::class,'FormStatusInspeksi']);
$routes->get('/form_upload_data',[ScmController::class,'FormUploadFileToExcel']);
$routes->get('/form_bin', [ScmController::class,'FormBIN']);
$routes->get('/form_qc', [ScmController::class,'FormQC']);


    //form post
$routes->POST('/submit_form_schedule_incoming', [ScmController::class, 'InputDataScheduleIncoming']);
$routes->POST('/submit_form_good_receive', [ScmController::class, 'InputDataGoodReceive']);
$routes->POST('/submit_form_identitas_pallet', [ScmController::class, 'InputIdentitasPallet']);
$routes->POST('/submit_form_status_inspeksi', [ScmController::class, 'InputStatusInspeksi']);

    //get data ajax
$routes->get('/get_data_supplier', [ScmController::class,'getDataSupplier']);
$routes->get('/get_data_po', [ScmController::class,'GetNomorPO']);
$routes->get('/logout', [ScmController::class,'Logout']);

    //REST API Routes
$routes->get("/get_data",[APIScmController::class, 'index']);

    //upload data excel to database
$routes->post('/upload_data_excel_to_database', [ScmController::class,'uploadDataExcelToDatabase']);

    //get search data
$routes->post('/submit_search_data_po', [ScmController::class,'CariDataPO']);