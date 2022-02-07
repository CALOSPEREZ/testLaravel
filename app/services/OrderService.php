<?php

namespace App\Services;

use App\Models\Orders;
use Exception;

class OrderService
{

    function __construct()
    {
    }
    function index($criterio)
    {
        try {
            return Orders::where(
                function ($query) use ($criterio) {
                    if (!empty($criterio['PaymentMethod'])) {
                        $query->Where('PaymentMethod', 'LIKE', '%' . $criterio['PaymentMethod'] . '%');
                    }
                    if (!empty($criterio['OrderAccount'])) {
                        $query->Where('OrderAccount', $criterio['status']);
                    }
                    if (!empty($criterio['totalInitial']) && !empty($criterio['totalFainal'])) {
                        $query->Where('price', '>=', $criterio['totalInitial'])->Where('price', '<=', $criterio['totalFainal']);
                    }
                }
            )->get();
        } catch (Exception $e) {
            return $e;
        }
    }
    function store($model)
    {
        try {
            return  Orders::create([
                "total" => $model["total"],
                "PaymentMethod" => $model["PaymentMethod"],
                "user_id" => $model["user_id"],
                "OrderAccount" => $model["OrderAccount"],
            ]);
        } catch (\Exception $e) {
            return $e;
        }
    }
}
