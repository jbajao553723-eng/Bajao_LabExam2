<?php

namespace App\Http\Controllers;

use App\Models\Rice;
use Illuminate\Http\Request;

class RiceController extends Controller
{
    public function index()
    {
        $rices = Rice::all();
        return view('rice.index', compact('rices'));
    }

    public function store(Request $request)
    {
        Rice::create($request->all());
        return redirect()->route('rice.index');
    }

    public function edit(Rice $rice)
    {
        return view('rice.edit', compact('rice'));
    }

    public function update(Request $request, $id)
    {
        Rice::find($id)->update($request->all());
        return redirect()->route('rice.index');
    }

    public function destroy($id)
    {
        Rice::destroy($id);
        return redirect()->route('rice.index');
    }
}
