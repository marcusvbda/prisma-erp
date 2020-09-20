<?php

namespace App\Http\Filters\Sales;

use App\User;
use  marcusvbda\vstack\Filter;

class SalesByUser extends Filter
{

    public $component   = "select-filter";
    public $label       = "Responsável";
    public $placeholder = "";
    public $index = "sales_by_user";

    public function __construct()
    {
        foreach (User::get() as $row) {
            $this->options[] = (object) ["value" =>  strval($row->id), "label" => $row->name];
        }
        parent::__construct();
    }

    public function apply($query, $value)
    {
        return $query->where("sales.user_id", $value);
    }
}
