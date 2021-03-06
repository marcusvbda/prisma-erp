<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Models\{Product};
use Illuminate\Http\Request;

class ApiController extends Controller
{
	protected $months = ["jan", "fev", "mar", "abr", "mai", "jun", "jul", "ago", "set", "out", "nov", "dez"];

	public function getData($type, Request $request)
	{
		return $this->{$type}($request);
	}

	protected function getProduct(Request $request)
	{
		return Product::where("type", $request["type"])->get();
	}
}