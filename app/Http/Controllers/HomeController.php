<?php

namespace App\Http\Controllers;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    public function index(){
        $totalUsers = User::count(); 
        $totalBarangKeluar = BarangKeluar::count();
    $totalBarangMasuk = BarangMasuk::count();
    $totalPesananBelumSelesai = DB::table('pesanan')->where('status', 'belum selesai')->count();
    $monthlySalesData = $this->getMonthlySalesData();

        return view('layouts.home', [
            
            'totalUsers' => $totalUsers,
            'totalBarangKeluar' => $totalBarangKeluar,
        'totalBarangMasuk' => $totalBarangMasuk,
        'totalPesananBelumSelesai' => $totalPesananBelumSelesai,
        'monthlySalesData' => $monthlySalesData, 
        ]);

      
}   
private function getMonthlySalesData()
{
   
    $monthlySalesData = Pesanan::select(DB::raw('MONTH(tanggal_pemesanan) as month'), DB::raw('COUNT(*) as count'))
        ->groupBy(DB::raw('MONTH(tanggal_pemesanan)'))
        ->get();

  
    $formattedData = [];
    foreach ($monthlySalesData as $item) {
        $formattedData[date('F', mktime(0, 0, 0, $item->month, 1))] = $item->count;
    }

    return $formattedData;
}

    public function dashboard()
    {
        return view('layouts.home'); 
    }
    public function cust(){
        return view('home');
    }
 
}
