<?php

namespace App\Services;

use App\Models\Accounts;
use Exception;


class AccountsService
{

    function __construct()
    {
    }
    function index($criterio)
    {
        try {
            return Accounts::where(
                function ($query) use ($criterio) {
                    if (!empty($criterio['category'])) {
                        $query->Where('category', 'LIKE', '%' . $criterio['category'] . '%');
                    }
                    if (!empty($criterio['title'])) {
                        $query->Where('title', 'LIKE', '%' . $criterio['title'] . '%');
                    }
                    if (!empty($criterio['status'])) {
                        $query->Where('status', $criterio['status']);
                    }
                    if (!empty($criterio['status'])) {
                        $query->Where('status', $criterio['status']);
                    }
                    if (!empty($criterio['priceInitial']) && !empty($criterio['priceFainal'])) {
                        $query->Where('price', '>=', $criterio['priceInitial'])->Where('price', '<=', $criterio['priceFainal']);
                    }
                }
            )->get();
        } catch (Exception $e) {
            return $e;
        }
    }


}
