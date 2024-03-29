<?php

namespace App\Models;

use CodeIgniter\Model;

class GoodReceive extends Model
{
    protected $table            = 'table_gr';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'tanggal_barang_masuk',
        'nama_bahan',
        'nama_supplier',
        'batch',
        'nama_produsen',
        'coo',
        'coa',
        'upload_dokumen_halal',
        'sertifikat_halal',
        'label_halal',
        'satuan_berat',
        'qty_datang',
        'qty_po',
        'qty_sampling',
        'qty_reject',
        'qty_terima',
        'tipe_kemasan',
        'visual_organoleptik',
        'kondisi_kendaraan',
        'performa'
    ];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    
}
