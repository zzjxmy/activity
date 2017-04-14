<?php

namespace App\Serializers;

use League\Fractal\Serializer\ArraySerializer;


class CustomSerializer extends ArraySerializer
{
    /**
     * 重新封装Dingo API返回的data，加入status_code和message
     *
     * @param string $resourceKey
     * @param array $data
     * @return array
     */
    public function collection($resourceKey, array $data)
    {
        return [
            'message' => '操作成功',
            'status_code' => 200,
            'data' => $data
        ];
    }

    public function item($resourceKey, array $data)
    {
        return [
            'message' => '操作成功',
            'status_code' => 200,
            'data' => $data
        ];
    }
}