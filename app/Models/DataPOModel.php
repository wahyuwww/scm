<?php

namespace App\Models;

use CodeIgniter\Model;

class DataPOModel extends Model
{
    protected $table            = 'table_po';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

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

    public function GetDataPOGR() {
        $query = $this->db->query('SELECT * FROM table_gr join master_supplier JOIN master_warehouse JOIN table_po 
        ON table_gr.supplier_id = master_supplier.id
        AND table_gr.po_id = table_po.po_id
        AND table_gr.warehouse_id = master_warehouse.warehouse_id
        ');
        return $query->getResultArray();
    }
}
