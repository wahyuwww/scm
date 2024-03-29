<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GoodReceive;
use App\Models\IdentitasPallet;
use App\Models\MasterBin;
use App\Models\MasterSupplier;
use App\Models\ScheduleIncoming;
use App\Models\StatusInspeksi;
use App\Models\DataPOModel;
use App\Models\User;
use App\Models\GRModel;
use App\Models\WarehouseModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\RedirectResponse;


class ScmController extends BaseController
{


    protected $role;

    public function index()
    {
        return view('index');
    }
    protected function checkRole()
    {
        $this->role = session()->get('role');
        if (!$this->role) {
            $this->role = 'user';
        }
    }

    protected function restrictAccess($allowedRoles)
    {
        if (!in_array($this->role, $allowedRoles)) {
            return redirect()->to(base_url('/dashboard'));
        }
    }

    public function dashboard()
    {

        $isAdmin = session()->get('role') === 'admin';
        $role = session()->get('role');
      
        if ($isAdmin) {
            $data['message'] = "Welcome Admin!";
        } else {
            $data['message'] = "Welcome User!";
        }
        return view('dashboard/dashboard', ['role' => $role]);
    }


    public function formScheduleIncoming()
    {
        $this->restrictAccess(['admin']);

        return view('dashboard/form/form_schedule_incoming');
    }

    public function login()
    {
        $userModel = new User();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $data = $userModel->where('email', $email)->first();
        if ($data) {
            session()->set('role', $data['role']);

            return redirect()->to(base_url('/dashboard'));
        } else {
            return redirect()->to(base_url('/'));
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/'));
    }

    public function MasterBin()
    {
        $masterBin = new MasterBin();
        $data['master_bin'] = $masterBin->paginate(10, 'master_bin');
        $data['pager'] = $masterBin->pager;
        $role = session()->get('role');

        return view('dashboard/master_data/master_bin', [
            'data' => $data,
            'role' => $role
        ]);
    }

    public function MasterSupplier()
    {
        $masterSupplier =  new MasterSupplier();
        $data['master_supplier'] = $masterSupplier->paginate(10, 'master_supplier');
        $data['pager'] = $masterSupplier->pager;
        $role = session()->get('role');

        return view('dashboard/master_data/master_supplier', [
            'data' => $data,
            'role' => $role
        ]);
    }

    public function ListDataTablePO()
    {
        $dataPO = new DataPOModel();
        $data['master_po'] = $dataPO->paginate(10, 'master_po');
        $data['pager'] = $dataPO->pager;
        $role = session()->get('role');

        return view('dashboard/master_data/master_po', [
            'data' => $data,
            'role' => $role
        ]);
    }



    public function FormGoodReceive()
    {
        $dataPO = new DataPOModel();
        $data['master_po'] = $dataPO->findall();
        $role = session()->get('role');

        return view('dashboard/form/form_good_receive', [
            'data' => $data,
            'role' => $role
        ]);
    }

    public function FormIdentitasPallet()
    {
        $role = session()->get('role');
        return view('dashboard/form/form_identitas_pallet', [
            'role' => $role
        ]);
    }

    public function FormStatusInspeksi()
    {
        $role = session()->get('role');
        return view('dashboard/form/form_status_inspeksi', [
            'role' => $role
        ]);
    }

    public function InputDataScheduleIncoming()
    {
        $ScheduleIncoming = new ScheduleIncoming();
        $ScheduleIncoming->insert([
            'nomor_po' => $this->request->getPost('nomor_po'),
            'form_item' => $this->request->getPost('form_item'),
            'form_qty' => $this->request->getPost('form_qty'),
            'form_satuan_barang' => $this->request->getPost('form_satuan_barang'),
            'form_gudang_pengirim' => $this->request->getPost('form_gudang_pengirim'),
            'form_eta' => $this->request->getPost('form_eta')
        ]);

        return redirect()->to(base_url('form_schedule_incoming'));
    }

    public function InputDataGoodReceive()
    {
        $GoodReceive =  new GoodReceive();
        $GoodReceive->insert([
            'gr_id' => $this->request->getPost('gr_id'),
            'po_id' => $this->request->getPost('po_id'),
            'warehouse_id' => $this->request->getPost('warehouse_id'),
            'supplier_id' => $this->request->getPost('supplier_id'),
            'tanggal_po' => $this->request->getPost('tanggal_po'),
            'nomor_gr' => $this->request->getPost('nomor_gr'),
            'supplier' => $this->request->getPost('supplier'),
            'est_kirim' => $this->request->getPost('est_kirim'),
            'desc_gr' => $this->request->getPost('desc_gr'),
            'warehouse_id' => $this->request->getPost('warehouse_id'),
            'tanggal_gr' => $this->request->getPost('tanggal_gr'),
            'qty_po' => $this->request->getPost('qty_po'),
            'qty_dtg' => $this->request->getPost('qty_dtg'),
            'batch' => $this->request->getPost('batch'),
            'kode_batch' => $this->request->getPost('kode_batch'),
            'kode_prd' => $this->request->getPost('kode_prd')
        ]);

        // $uploadDokumenHalal->move('DokumenHalal', $randomNameUploadSertifikatHalal);
        return redirect()->to(base_url('form_good_receive'));
    }

    public function InputIdentitasPallet()
    {
        $identitasPallet = new IdentitasPallet();

        // $this->load->library('ciqrcode');

        $config['cacheable'] = true;
        $config['cachedir'] = './assets/';
        $config['errorlog'] = './assets/';
        $config['imagedir'] = './assets/images/';
        $config['quality'] = true;
        $config['size'] = '1024';
        $config['black'] = array(224, 255, 255);
        $config['white0'] = array(70, 130, 180);

        // $this->ciqrcode->initialize($config);

        $namaBarang =  $this->request->getPost('nama_barang');

        $image_name = $namaBarang . '.png';

        $params['data'] = $namaBarang;
        $params['level'] = 'H';
        $params['size'] = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $image_name;

        // $this->ciqrcode->generate($params);


        $identitasPallet->insert([
            'nama_barang' => $namaBarang,
            'jumlah_barang' => $this->request->getPost('jumlah_barang'),
            'kode_produksi' => $this->request->getPost('kode_produksi'),
            'tanggal_kedatangan' => $this->request->getPost('tanggal_kedatangan'),
            'tanggal_kadaluarsa' => $this->request->getPost('tanggal_kadaluarsa'),
            'nama_supplier' => $this->request->getPost('nama_supplier'),
            'nama_petugas' => $this->request->getPost('nama_petugas'),
            'qrcode' => $image_name
        ]);
        return redirect()->to(base_url('form_identitas_pallet'));
    }

    public function InputStatusInspeksi()
    {
        $statusInspeksi = new StatusInspeksi();
        $uploadFotoStatusInspeksi = $this->request->getFile('upload_foto_status_inspeksi');
        $randomNamaFotoStatusInspeksi = $uploadFotoStatusInspeksi->getRandomName();

        $statusInspeksi->insert([
            'nama_produk' => $this->request->getPost('nama_produk'),
            // 'supplier' => $this->request->getPost('supplier'),
            'receive_date' => $this->request->getPost('receive_date'),
            'expired_date' => $this->request->getPost('expired_date'),
            'jumlah' => $this->request->getPost('jumlah'),
            'tanggal_inspeksi' => $this->request->getPost('tanggal_inspeksi'),
            'upload_foto_status_inspeksi' => $randomNamaFotoStatusInspeksi,
            'status' => $this->request->getPost('status'),
        ]);
        $uploadFotoStatusInspeksi->move('UploadFotoStatusInspeksi', $randomNamaFotoStatusInspeksi);
        return redirect()->to(base_url('form_status_inspeksi'));
    }

    public function getDataSupplier()
    {
        $dataSupplier = new MasterSupplier();
        $data = $dataSupplier->findAll();
        return json_encode($data);
    }


    public function FormUploadFileToExcel()
    {
        $role = session()->get('role');
        return view('dashboard/form/upload_data', [
            'role' => $role
        ]);
    }

    public function uploadDataExcelToDatabase()
    {
        $fileExcel = $this->request->getFile('file_excel');
        $ext = $fileExcel->getClientExtension();
        if ($ext == 'xls') {
            $render = new \PhpOffice\PhpSpreadsheet\Render\Xls();
        } else {
            $render = new \PhpOffice\PhpSpreadsheet\Render\Xlsx();
        }
        $spreadsheet = $render->load($fileExcel);
        $data = $spreadsheet->getActiveSheet()->toArray();

        foreach ($data as $x => $row) {
            if (x == 0) {
                continue;
            }

            $data1 = $row[''];

            $db = \Config\Database::connect();

            $cekDataPO = $db->table('table_po')->getWhere(['id' => $id])->getResult();

            if (count($cekDataPO) > 0) {
                session()->setFlashdata('message', '');
            } else {
                $simpanData = [
                    'id' => $id
                ];
                $db->table('table_po')->insert($simpanData);
                session()->setFlashdata('message', 'Data Berhasil disimpan');
            }
        }
        return redirect()->to('/');
    }

    public function GetNomorPO()
    {
        $dataPO = new DataPOModel();
        $data =  $dataPO->findAll();
        return json_encode($data);
    }

    public function HalamanBIN()
    {
        $role = session()->get('role');
        return view('dashboard/bin_services/bin_location', ['role' => $role]);
    }

    public function FormBIN()
    {
        $role = session()->get('role');
        return view('dashboard/form/form_bin', ['role' => $role]);
    }

    public function FormQC()
    {
        $role = session()->get('role');
        return view('dashboard/form/form_qc', ['role' => $role]);
    }

    public function CariDataPO()
    {
        $tanggal_po_awal = $this->request->getPost('tanggal_po_awal');
        $tanggal_po_akhir = $this->request->getPost('tanggal_po_akhir');
        if (!empty($tanggal_po)) {
            $db = \Config\Database::connect();

            $builder = $db->table('table_po');
            $builder->where('tanggal_po >= ', $tanggal_po_awal);
            $builder->where('tanggal_po <= ', $tanggal_po_akhir);

            $query = $builder->get();

            $data['result'] = $query->getResult();
        } else {
            $data['result'] = [];
        }
        return view('dashboard/search_data/search_data_po', $data);
    }
}
