<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LayoutController extends Controller
{
    public function index()
    {
        $jumlahData = Post::whereDate('updated_at', Carbon::today())
        ->where(function ($query) {
            $query->where(function ($subquery) {
                $subquery->where('approval_u_fauzan', 'TIDAK DISETUJUI')
                    ->orWhere('approval_u_fajri', 'TIDAK DISETUJUI')
                    ->orWhere('approval_u_febby', 'TIDAK DISETUJUI')
                    ->orWhere('approval_u_faruq', 'TIDAK DISETUJUI')
                    ->orWhere('categories_id', '3');
            })
            ->orWhere(function ($subquery) {
                $subquery->where('approval_u_fauzan', 'DISETUJUI')
                    ->where('approval_u_fajri', 'DISETUJUI')
                    ->where('approval_u_febby', 'DISETUJUI')
                    ->where('approval_u_faruq', 'DISETUJUI')
                    ->where('categories_id', '1');
            });
        })
        ->count();
        
        $jumlahData2 = Post::whereDate('updated_at', Carbon::today())
        ->where(function ($query) {
            $query->where(function ($subquery) {
                $subquery->where('approval_u_fauzan', 'DISETUJUI')
                    ->orWhere('approval_u_fajri', 'DISETUJUI')
                    ->orWhere('approval_u_febby', 'DISETUJUI')
                    ->orWhere('approval_u_faruq', 'DISETUJUI')
                    ->orWhere('categories_id', '1');
            })
            ->orWhere(function ($subquery) {
                $subquery->where('approval_u_fauzan', 'TIDAK DISETUJUI')
                    ->where('approval_u_fajri', 'TIDAK DISETUJUI')
                    ->where('approval_u_febby', 'TIDAK DISETUJUI')
                    ->where('approval_u_faruq', 'TIDAK DISETUJUI')
                    ->where('categories_id', '3');
            });
        })
        ->count();

       

        return view('home', compact('jumlahData', 'jumlahData2'));
    }
}
