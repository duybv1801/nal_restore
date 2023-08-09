<?php

namespace App\Services;

use App\Repositories\SettingRepository;

class SettingService
{
    protected $settingRepository;

    public function __construct(SettingRepository $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    public function getAllSettings()
    {
        return $this->settingRepository->all();
    }


    public function create($data)
    {
        $this->settingRepository->create($data);
    }

    public function find($id)
    {
        return $this->settingRepository->find($id);
    }

    public function update($data, $id)
    {
        $this->settingRepository->update($data, $id);
    }

    public function delete($id)
    {
        $this->settingRepository->delete($id);
    }
}
