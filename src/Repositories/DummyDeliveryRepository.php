<?php

namespace App\Repositories;

use App\Contracts\Repositories\DeliveryRepository;

class DummyDeliveryRepository implements DeliveryRepository
{
    protected $id = 0;

    public function create($data)
    {
        $this->id += 1;

        $data['id'] = $this->id;

        return $data;
    }
}