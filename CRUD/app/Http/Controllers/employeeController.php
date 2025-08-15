<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employee;

class employeeController extends Controller
{
    public function index()
    {

        $read = employee::all();
        return view('index', ['data' => $read]);
    }



    public function create()
    {
        return view('create');
    }

    public function store(Request $req)
    {


        $data = $req->validate([

            'full_name' => "required",
            'contact_number' => 'required',
            'email' => 'required',
            'permanent_address' => 'required',
            'temporary_address' => 'required'


        ]);


        $newdata = employee::create($data);
        return redirect(route('employee.index'));
    }

    public function edit(employee $staff_id)
    {
        return view('edit', ['staff_id' => $staff_id]);
    }


    public function update(employee $staff_id, Request $req)
    {
        $data = $req->validate([

            'full_name' => "required",
            'contact_number' => 'required',
            'email' => 'required',
            'permanent_address' => 'required',
            'temporary_address' => 'required'


        ]);

        $staff_id->update($data);

        return redirect(route('employee.index'))->with('success', 'Product updated sucessfully');
    }


    public function delete(employee $staff_id)
    {
        $staff_id->delete();
        return redirect(route('employee.index'))->with('success', 'Deleted Sucessfully');
    }
}
