<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EmployeesImport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\employee;
use App\Models\designation;
use App\Models\department;
use App\Models\detail;


class employeeController extends Controller
{
    public function home()
    {
        return view('crud.home');
    }
    public function index()

    {
        if (auth::check()) {
            $read = Employee::with(['department', 'designation'])->paginate(10);
            return view('crud.index', ['data' => $read]);
        } else {
            return redirect(route('login'))->with('error', "Login First!!");
        }
    }

    public function create()
    {
        $data = department::all();
        $dataa = designation::all();
        return view('crud.create', ['data' => $data, 'dataa' => $dataa]);
    }

    public function store(Request $req)
    {

        $data = $req->validate([

            'full_name' => "required|min:4",
            'contact_number' => 'required|digits:10',
            'email' => 'required|email',
            'permanent_address' => 'required',
            'temporary_address' => 'required',
            'dep_id' => 'required|exists:departments,dep_id',
            'desig_id' => 'required|exists:designations,desig_id'
        ]);
        $newdata = employee::create($data);
        return redirect(route('employee.index'))->with('success', 'Employee Added Sucessfully!!!');
    }

    public function edit(employee $staff_id)
    {
        return view('crud.edit', ['staff_id' => $staff_id]);
    }
    public function update(employee $staff_id, Request $req)
    {
        $data = $req->validate([

            'full_name' => "required",
            'contact_number' => 'required|digits:10',
            'email' => 'required|email',
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

    //Departments
    public function dep()
    {
        $data = department::all();
        // $dats=designation::all();
        return view('crud.dep', ['data' => $data]);
    }

    public function edit_dep(department $dep_id)
    {
        return view('crud.edit_dep', ['dep_id' => $dep_id]);
    }
    public function dep_update(department $dep_id, Request $req)
    {
        $data = $req->validate([

            'dep_name' => "required",
            // 'contact_number' => 'required',
            // 'email' => 'required',
            // 'permanent_address' => 'required',
            // 'temporary_address' => 'required'
        ]);

        $dep_id->update($data);

        return redirect(route('employee.dep'))->with('success', 'Department updated sucessfully');
    }
    public function dep_delete(department $dep_id)
    {
        $dep_id->delete();
        return redirect(route('employee.dep'))->with('success', 'Deleted Sucessfully');
    }
    public function create_dep()
    {
        return view('crud.create_dep');
    }

    public function store_dep(Request $req)
    {
        $req->validate([
            'dep_name' => 'required|unique:departments,dep_name',
            // 'desig_name'=>'required|unique:designations,desig_name'
        ]);
        department::create([
            'dep_name' => $req->dep_name
        ]);

        // designation::create([
        //     'desig_name' => $req->desig_name
        // ]);
        return redirect(route('employee.dep'))->with('success', 'Department Added Sucessfully!!');
    }

    //Designation 
    public function desig()
    {
        $data = designation::all();
        // $dats=designation::all();
        return view('crud.desig', ['data' => $data]);
    }

    public function edit_desig(designation $desig_id)
    {
        return view('crud.edit_desig', ['desig_id' => $desig_id]);
    }

    public function desig_update(designation $desig_id, Request $req)
    {
        $data = $req->validate([

            'desig_name' => "required",
            // 'contact_number' => 'required',
            // 'email' => 'required',
            // 'permanent_address' => 'required',
            // 'temporary_address' => 'required'
        ]);

        $desig_id->update($data);

        return redirect(route('employee.desig'))->with('success', 'Designation updated sucessfully');
    }
    public function desig_delete(designation $desig_id)
    {
        $desig_id->delete();
        return redirect(route('employee.desig'))->with('success', 'Deleted Sucessfully');
    }
    public function create_desig()
    {
        return view('crud.create_desig');
    }
    public function store_desig(Request $req)
    {
        $req->validate([
            'desig_name' => 'required|unique:designations,desig_name',
            // 'desig_name'=>'required|unique:designations,desig_name'
        ]);

        designation::create([
            'desig_name' => $req->desig_name
        ]);
        return redirect(route('employee.desig'))->with('success', 'Designation Added Sucessfully!!');
    }

    //file upload

    public function upload_create()
    {
        return view('crud.create_upload');
    }
    public function upload_store(Request $req)
    {
        $req->validate([
            'file' => 'required|file|mimes:xlsx,csv,xls|max:2048',
        ]);
        try {

            Excel::import(new EmployeesImport, $req->file('file'));
            return redirect(route('employee.index'))->with('success', 'File uploaded Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    //Details

    public function details(employee $staff_id)
    {
        $employee = $staff_id->load('details');

        return view('crud.details', ['staff_id' => $staff_id, 'employee' => $employee]);
    }
    public function detail_store(Request $req, $emp_id)
    {
        $req->validate([
            'emerg_contact' => 'nullable|string|digits:10',
            'emerg_number' => 'nullable|string|max:255',
            'relation' => 'nullable|string',
            'blood_group' => 'string'
        ]);
        detail::create(
            [
                'emp_id' => $emp_id,
                'emerg_contact' => $req->emerg_contact,
                'emerg_name' => $req->emerg_name,
                'relation' => $req->relation,
                'blood_group' => $req->blood_group
            ]
        );
        return redirect()->route('employee.details', ['staff_id' => $emp_id])
            ->with('success', 'Details added successfully!');
    }


    public function detail_delete(detail $det_id)
    {
        $det_id->delete();
        return redirect(route('employee.details'))->with('success', 'Deleted Sucessfully');
    }
}
