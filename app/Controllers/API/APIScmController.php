<?php

namespace App\Controllers\API;

use App\Models\ScheduleIncoming;
use CodeIgniter\Controller;
use CodeIgniter\API\ResponseTrait;

class APIScmController extends Controller
{

    use ResponseTrait;

    public function index()
    {
        $dataSchedule = new ScheduleIncoming();
        $data['data_schedule'] =  $dataSchedule->findAll();
        return $this->respond($data);
    }

    public function GetDataPOAjax() {
        $dataPO = new DataPOModel();
        
    }
}
