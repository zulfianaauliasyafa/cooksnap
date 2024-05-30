<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Resep;
use Illuminate\Http\Request;

class ResepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reseps = Resep::all();
        $username = Auth::user()->name;
        return view('resep.index', compact('reseps','username'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $username = Auth::user()->name;
        $reseps = Resep::all();
        return view('resep.create',compact('reseps','username'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_musik' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'lirik' => 'nullable|string',
            'link' => 'nullable|string|max:255',
        ]);

        $resep = new Resep([
            'nama_musik' => $request->nama_musik,
            'level' => $request->level,
            'lirik' => $request->lirik,
            'link' => $request->link,
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $resep->image = 'images/'.$imageName;
        }

        $resep->save();

        return redirect()->route('reseps.index')->with('success', 'Resep created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resep  $resep
     * @return \Illuminate\Http\Response
     */
    protected function show(Resep $resep)
    {
        $username = Auth::user()->name;
        $reseps = Resep::all();
        return view('resep.show', compact('resep','username'));
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resep  $resep
     * @return \Illuminate\Http\Response
     */
    public function edit(Resep $resep)
    {
        $username = Auth::user()->name;
        $reseps = Resep::all();
        return view('resep.edit', compact('resep','username'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resep  $resep
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resep $resep)
    {
        $request->validate([
            'nama_musik' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'lirik' => 'nullable|string',
            'link' => 'nullable|string|max:255',
        ]);

        $resep->nama_musik = $request->nama_musik;
        $resep->level = $request->level;
        $resep->lirik = $request->lirik;
        $resep->link = $request->link;

        if ($request->hasFile('image')) {
            // Delete the old image
            if ($resep->image && file_exists(public_path($resep->image))) {
                unlink(public_path($resep->image));
            }

            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $resep->image = 'images/'.$imageName;
        }

        $resep->save();

        return redirect()->route('reseps.index')->with('success', 'Resep updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resep  $resep
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resep $resep)
    {
        if ($resep->image && file_exists(public_path($resep->image))) {
            unlink(public_path($resep->image));
        }

        $resep->delete();

        return redirect()->route('reseps.index')->with('success', 'Resep deleted successfully.');
    }
}
