<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Supplier;
use App\Models\Pembelian;
use App\Models\Penjualan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use App\Http\Controllers\PieChart;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $kategori = Kategori::count();
        $produk = Produk::count();
        $supplier = Supplier::count();
        $member = Member::count();

        $tanggal_awal = date('Y-m-01');
        $tanggal_akhir = date('Y-m-d');

        $data_tanggal = array();
        $data_pendapatan = array();

        while (strtotime($tanggal_awal) <= strtotime($tanggal_akhir)) {
            $data_tanggal[] = (int) substr($tanggal_awal, 8, 2);

            $total_penjualan = Penjualan::where('created_at', 'LIKE', "%$tanggal_awal%")->sum('bayar');
            $total_pembelian = Pembelian::where('created_at', 'LIKE', "%$tanggal_awal%")->sum('bayar');
            $total_pengeluaran = Pengeluaran::where('created_at', 'LIKE', "%$tanggal_awal%")->sum('nominal');

            $pendapatan = $total_penjualan - $total_pembelian - $total_pengeluaran;
            $data_pendapatan[] += $pendapatan;


            $tanggal_awal = date('Y-m-d', strtotime("+1 day", strtotime($tanggal_awal)));
        }

        // $bulan_awal = date('Y-01');
        // $bulan_akhir = date('Y-m');

        // $data_bulan = array();
        // $data_pendapatan_bulan = array();

        // while (strtotime($bulan_awal) <= strtotime($bulan_akhir)) {
        //     $data_bulan[] = (int) substr($bulan_awal, 8, 2);

        //     $total_penjualan_bulan = Penjualan::where('created_at', 'LIKE', "%$bulan_awal%")->sum('bayar');
        //     $total_pembelian_bulan = Pembelian::where('created_at', 'LIKE', "%$bulan_awal%")->sum('bayar');
        //     $total_pengeluaran_bulan = Pengeluaran::where('created_at', 'LIKE', "%$bulan_awal%")->sum('nominal');

        //     $pendapatan_bulan = $total_penjualan_bulan - $total_pembelian_bulan - $total_pengeluaran_bulan;
        //     $data_pendapatan_bulan[] += $pendapatan_bulan;


        //     $bulan_awal = date('Y-m-d', strtotime("+1 month", strtotime($bulan_awal)));
        // }

        // dd($data_bulan, $data_pendapatan_bulan);
        // $tanggal_awal = date('Y-m-01');

        

        // dd('$data_penjualan', '$data_pembelian', ' $data_pengeluaran');

        // // bulat chart
        // $browsers = Produk::all();
        // $dataPoints = [];

        // foreach ($browsers as $browser) {
            
        //     $dataPoints[] = [
        //         "name" => $browser['nama_produk']
        //     ];
        // }
        // // dd($dataPoints);


        // donut chart
        
        // $data_produk = []; //label
        // $data_kategori = []; // value
        // $results = DB::table('produk')
        // ->join('kategori','produk.id_kategori','=','kategori.id_kategori')
        // ->get();
        // foreach ($results as $result) {
        //     $data_produk = $results->pluck('nama_produk')->toArray();
        //     $data_kategori = $results->pluck('nama_kategori')->toArray();
        // }
        
        
        // // dd($data_produk, $data_kategori);


        // auth
        if (auth()->user()->level == 1) {
            return view('admin.dashboard', compact('kategori', 'produk', 'supplier', 'member', 'tanggal_awal', 'tanggal_akhir', 'data_tanggal', 'data_pendapatan', ));
        } else {
            return view('kasir.dashboard');
        }
    }

    // public function piechart()
    // {
    //     // pie chart
    //     $browsers = Produk::all();
    //     $dataPoints = [];

    //     foreach ($browsers as $browser) {
            
    //         $dataPoints[] = [
    //             "name" => $browser['nama_produk'],
    //             "y" => floatval($browser['stok'])
    //         ];
    //     }

    //     return view("admin.dashboard", [
    //         "data" => json_encode($dataPoints)
    //     ]);
    // }

}
