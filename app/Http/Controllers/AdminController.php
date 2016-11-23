<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Charts;
use App\Models\Product;

class AdminController extends Controller
{
    public function admin(){
		$chart = Charts::database(Product::all(),'line', 'highcharts')
			->setTitle('Products Charts')
			->setResponsive(false)
			->setElementLabel('Total Items')
			->setDimensions(1000,500)
			->groupBy('title');
		
		return view('admin.dashboard.index', ['chart' => $chart]);
	}
	
}
