<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Order; 
use App\Models\Resep;

class HomeController extends Controller
{
    public function index()
    {
        
        $username = Auth::user()->name;
        // Mengirimkan data total produk ke tampilan
        return view('home',compact('username'));
    }

  
    public function profil()
    {
        
        $username = Auth::user()->name;
        // Mengirimkan data total produk ke tampilan
        return view('profil',compact('username'));
    }


   

    public function contact()
    {
       
        $username = Auth::user()->name;
        // Mengirimkan data total produk ke tampilan
        return view('contact',compact('username'));
    }

    public function course()
    {
       

        $username = Auth::user()->name;
        return view('course',compact('username'));
    }
// course
    public function coursegitar()
    {
        $username = Auth::user()->name;
        return view('course.gitar',compact('username'));
    }
    public function coursedrum()
    {
        $username = Auth::user()->name;
        return view('course.drum',compact('username'));
    }
    public function courseviolin()
    {
        $username = Auth::user()->name;
        return view('course.violin',compact('username'));
    }
    public function coursepiano()
    {
        $username = Auth::user()->name;
        return view('course.piano',compact('username'));
    }
//endcouser
    public function profile()
    {
        $username = Auth::user()->name;
  
        return view('profile',compact('username'));
    }

    public function cord()
    {
      
        $reseps = Resep::all();
        $username = Auth::user()->name;

        // Mengirimkan data total produk ke tampilan
        return view('cord', compact('reseps','username'));
    }

    // public function profil()
    // {
      
    //     $reseps = Resep::all();
    //     $username = Auth::user()->name;

    //     // Mengirimkan data total produk ke tampilan
    //     return view('profil', compact('reseps','username'));
    // }

    public function cordview($id)
    {
        $resep = Resep::find($id);
        $username = Auth::user()->name;

        if (!$resep) {
            // Handle the case where the resep item is not found
            return redirect()->back()->with('error', 'Resep not found');
        }

        return view('cordview', ['resep' => $resep ,'username' => $username]);
    }


    //HAlAMAN HALAMAN
    public function gitar()
    {

        $username = Auth::user()->name;
        return view('alatmusik.gitar',compact('username'));
    }
    public function piano()
    {
        $username = Auth::user()->name;

        return view('alatmusik.piano',compact('username'));
    }
    public function violin()
    {
        $username = Auth::user()->name;

        return view('alatmusik.violin',compact('username'));
    }
    public function drum()
    {

        $username = Auth::user()->name;
        return view('alatmusik.drum',compact('username'));
    }
    //END HALAMAN HALAMAN


    






    
    
}
