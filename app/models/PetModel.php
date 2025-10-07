<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: PetModel
 * 
 * Automatically generated via CLI.
 */
class PetModel extends Model {
    protected $table = 'user';
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }
    public function page($q, $records_per_page = null, $page = null)
{
    if (is_null($page)) {
        return $this->db->table($this->table)
                        ->where_null('deleted_at')
                        ->get_all();
    } else {
        $query = $this->db->table($this->table);
        $query->where_null('deleted_at');

        // --- Search filter ---
        if (!empty($q)) {
            $query->group_start()
                  ->like('id', $q)
                  ->or_like('name', $q)
                  ->or_like('type', $q)
                  ->or_like('age', $q)
                  ->group_end();
        }

        $query->order_by('id', 'ASC');

        // --- Count total rows ---
        $countQuery = clone $query;
        $countResult = $countQuery->select_count('*', 'count')->get();

        if (is_array($countResult)) {
            // if result is array of one row
            $data['total_rows'] = $countResult[0]['count'] ?? 0;
        } else {
            // fallback for some database drivers
            $data['total_rows'] = $countResult['count'] ?? 0;
        }

        // --- Get paginated records ---
        $data['records'] = $query->pagination($records_per_page, $page)->get_all();

        return $data;
    }
}


public function restore($id)
    {
        return $this->db->table($this->table)
                        ->where($this->primary_key, $id)
                        ->update(['deleted_at' => null]);
    }

}