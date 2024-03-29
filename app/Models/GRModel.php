<?php

namespace App\Models;

use CodeIgniter\Model;

class GRModel extends Model
{
    protected $table            = 'table_gr';
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

    public function BuatKodeBatch() {
        $this->db->select('RIGHT(table_gr.kode_batch,5) as kode_batch', false);
        $this->db->order_by('kode_batch','DESC');
        $this->db->limit(1);
        
        $query = $this->db->get('table_gr');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode_batch) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $kode_tampil = "KTB".$batas;
        return $kode_tampil;
    }

}
