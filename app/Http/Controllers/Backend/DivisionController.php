<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Division;

class DivisionController extends Controller
{
    public function index()
    {
        $divisions = Division::orderBy('priority_id', 'asc')->get();

        return view('backend.pages.divisions.index')->with('divisions', $divisions);
    }

    public function create()
    {
        return view('backend.pages.divisions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
       ]);

        $division = new Division;

        $division->name = $request->name;
        $division->priority_id = $request->priority_id;

        $division->save();

        session()->flash('message', 'division created Successfully');
        session()->flash('type', 'success');

        return redirect()->route('admin.divisions.create');

    }

    public function edit($id)
    {

        $division = Division::find($id);
        return view('backend.pages.divisions.edit', compact('division'));
    }

    public function update(Request $request, $id )
    {
        $request->validate([
            'name' => 'required',
       ]);

        $division = Division::find($id);

        $division->name = $request->name;
        $division->priority_id = $request->priority_id;
        $division->save();



        session()->flash('message', 'Division Updated Successfully');
        session()->flash('type', 'success');

        return redirect()->route('admin.divisions.index');

    }

    public function delete($id)
    {

        $division = Division::find($id);

        if(!is_null($division)){

            $division->delete();

            session()->flash('message', 'Category Delete Successfully');
            session()->flash('type', 'success');

            return redirect()->back();
      }

    }
}
