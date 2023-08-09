<?php

namespace App\Repositories;

use App\Models\Setting;
use App\Repositories\BaseRepository;

class SettingRepository extends BaseRepository
{
    protected $fieldSearchable = [];

    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    public function model()
    {
        return Setting::class;
    }


    public function searchByConditions($search)
    {
        $query = $this->model;
        if (count($search)) {
            foreach ($search as $key => $value) {
                switch ($key) {
                    default:
                        $query = $query->where($key, $value);
                        break;
                }
            }
        }

        return $query->get();
    }
}
