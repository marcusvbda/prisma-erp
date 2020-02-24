<?php

namespace App\Http\Resources;

use marcusvbda\vstack\Resource;
use marcusvbda\vstack\Fields\{
    Card,
    Text,
    BelongsTo
};
use Auth;

class Products extends Resource
{
    public $model = \App\Http\Models\Product::class;

    public function label()
    {
        return "Produtos";
    }

    public function singularLabel()
    {
        return "Produto";
    }

    public function icon()
    {
        return "el-icon-s-shop";
    }

    public function menu()
    {
        return "Cadastros";
    }

    public function menuIcon()
    {
        return "el-icon-document-add";
    }

    public function search()
    {
        return ["name"];
    }

    public function globallySearchable()
    {
        return true;
    }

    public function table()
    {
        $columns =  [
            "name" => ["label" => "Nome"],
        ];
        if (Auth::user()->hasRole(["super-admin"])) {
            $columns["tenant->name"] = ["label" => "Tenant", "sortable_index" => "tenant_id"];
        }
        return $columns;
    }

    public function fields()
    {
        $fields =  [
            new Text([
                "label" => "Nome",
                "field" => "name",
                "required" => true,
                "placeholder" => "Digite o nome aqui ...",
                "rules" => "required|max:255"
            ]),
        ];
        if (Auth::user()->hasRole(["super-admin"])) {
            $fields[] = new BelongsTo([
                "label" => "Tenant",
                "field" => "tenant_id",
                "model" => \App\Http\Models\Tenant::class,
                "rules" => "required"
            ]);
        }
        return [
            new Card("Informações", $fields)
        ];
    }

    public function canCreate()
    {
        return Auth::user()->hasRole(["super-admin", "admin"]);
    }

    public function canUpdate()
    {
        return Auth::user()->hasRole(["super-admin", "admin"]);
    }

    public function canDelete()
    {
        return Auth::user()->hasRole(["super-admin", "admin"]);
    }

    public function canCustomizeMetrics()
    {
        return false;
    }

    public function canImport()
    {
        return false;
    }

    public function canExport()
    {
        return false;
    }
}
