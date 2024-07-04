<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\Ad;
use Illuminate\Support\Facades\DB;

class AdController extends Controller
{

    public function search(Request $request){
        $sh = $request->input('search');
    
        $query = Ad::where('title', 'like', "%$sh%")
                    ->orWhere('description', 'like', "%$sh%");
    
        if ($request->input('sort') === 'asc') {
            $query->orderBy('created_at', 'asc');
        }
        else if ($request->input('sort') === 'pm') {
            $query->orderBy('price', 'asc');
        }
        else if ($request->input('sort') === 'pp') {
            $query->orderBy('price', 'desc');
        }
        else{
            $query->orderBy('created_at', 'desc');
        }
    
        $ads = $query->paginate(3);
    
        return view('res', compact('ads'));
    }
    

    public function edit(Ad $ad)
    {
        return view('edit', compact('ad'));
    }

    public function update(Request $request, Ad $ad)
    {
        $ad->title = $request->title;
        $ad->description = $request->description;
        $ad->price = $request->price;
        $ad->save();

        return redirect()->route('dashboard');
    }


    public function destroy(Ad $ad)
    {
        $ad->delete();

        return redirect()->route('dashboard');
    }

    public function annonces(){
        $ads = DB::table('ads')->orderBy('created_at', 'DESC') -> paginate(2);
        return view('dashboard',compact('ads'));
    }

    public function create(){
        return view('create');
    }

    public function store(request $request){
        $ad = new Ad();
        $ad->title = $request->titre; 
        $ad->description = $request->description;
        $ad->price = $request->prix;
        if ($request->pic1 !== null) {
            $ad->pic1 = $request->pic1;
        }
        else{
            $ad->pic1 = 0;
        }
        if ($request->pic2 !== null) {
            $ad->pic2 = $request->pic2;
        }
        else{
            $ad->pic2 = 0;
        }
        if ($request->pic3 !== null) {
            $ad->pic3 = $request->pic3;
        }
        else{
            $ad->pic3 = 0;
        }
        $ad->user_id = auth()->user()->id;
        $ad->save();

        return redirect()->route('dashboard');
    }
}
