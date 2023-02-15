<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Admin\Controllers\Dashboard;
use App\Models\Produk;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->title('Dashboard')
            ->row(Dashboard::title())
            ->row(function (Row $row) {
                
            $produk = Produk::where('status', 'Aktif')->get();
            
            foreach ($produk as $item)
            {
                $row->column(4, function (Column $column) use($item) {
                    
                    $column->append(Dashboard::produk($item));
                });
            }
        });
    }
}
