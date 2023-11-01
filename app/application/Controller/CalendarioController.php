<?php

namespace SmartSolucoes\Controller;

use SmartSolucoes\Libs\Helper;
use SmartSolucoes\Model\Calendario;

class CalendarioController
{
    public function index()
    {
        Helper::view('admin/calendario/index', []);
    }

    public function getCalendario()
    {
        $calendario = new Calendario();
        echo json_encode($calendario->findAll());
        exit;
    }

    public function store($param)
    {
        $data = [
            'start' => $param['start'],
            'end' => $param['end'],
            'is_completed' => 0,
            'title' => $param['title']
        ];

        $calendario = new Calendario();
        $calendario->store($data);

        json_encode(['success' => true]);
        exit;
    }

    public function update($param)
    {
        $calendario = new Calendario();

        $data = [
            'id' => $param['id'],
            'is_completed' => 0,
            'title' => $param['title']
        ];

        $calendario->update($data);

        json_encode(['success' => true]);
        exit;
    }

    public function delete($param)
    {
        $calendario = new Calendario();
        $calendario->destroy($param['id']);

        json_encode(['success' => true]);
        exit;
    }
}
