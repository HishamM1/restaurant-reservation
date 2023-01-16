<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;

class TableController extends Controller
{
    public function index()
    {
        return view('tables', ['tables' => Table::all()]);
    }
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'capacity' => ['required', 'integer', 'min:1'],
            'location' => ['required', 'string'],
        ]);
        Table::create($attributes);
        return redirect()->route('tables');
    }


    public function addtable()
    {
        return view('addTable');
    }
    public function edit($id)
    {
        $table = Table::find($id);
        return view('editTable', ['table' => $table]);
    }
    public function update(Request $request, $id)
    {
        $attributes = $request->validate([
            'capacity' => ['required', 'integer', 'min:1'],
            'location' => ['required', 'string'],
        ]);
        Table::find($id)->update($attributes);
        return redirect()->route('tables');
    }

    public function destroy($id)
    {
        $table = Table::find($id);
        $table->delete();
        return redirect()->route('tables');
    }
}
