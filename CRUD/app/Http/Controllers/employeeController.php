<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\StoreDesignationRequest;
use App\Http\Requests\StoreDetailsRequest;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\StoreUploadRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Requests\StoreAttendenceRequest;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EmployeesImport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\employee;
use App\Models\designation;
use App\Models\department;
use App\Models\detail;
use App\Models\Attendence;



class EmployeeController extends Controller
{
    public function home()
    {
        return view('crud.home');
    }
    public function index()

    {
        if (auth::check()) {

            //used to link department and designatio table and get all data.
            $read = Employee::with(['department', 'designation'])->paginate(10);
            return view('crud.index', ['data' => $read]);
        } else {
            return redirect(route('login'))->with('error', "Login First!!");
        }
    }

    public function create()
    {
        // all is used to get all data of particular model
        $data = department::all();
        $dataa = designation::all();
        return view('crud.create', ['data' => $data, 'dataa' => $dataa]);
    }

    public function store(StoreEmployeeRequest $req)
    {

        $data = $req->validated();
        // create is used  to add all the data directly to the model
        $newdata = employee::create($data);
        return redirect(route('employee.index'))->with('success', 'Employee Added Sucessfully!!!');
    }

    public function edit(employee $staff_id)
    {
        return view('crud.edit', ['staff_id' => $staff_id]);
    }
    public function update(employee $staff_id, UpdateEmployeeRequest $req)
    {
        $data = $req->validate();

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
    public function dep_update(department $dep_id, StoreDepartmentRequest $req)
    {
        $data = $req->validated();

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

    public function store_dep(StoreDepartmentRequest $req)
    {
        $req->validated();
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

    public function desig_update(designation $desig_id, StoreDesignationRequest $req)
    {
        $data = $req->validated();

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
    public function store_desig(StoreDesignationRequest $req)
    {
        $req->validated();

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
    public function upload_store(StoreUploadRequest $req)
    {
        $req->validated();
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

        return view('crud.show_detail.details', ['staff_id' => $staff_id, 'employee' => $employee]);
    }
    public function detail_store(StoreDetailsRequest $req, $emp_id)
    {
        $req->validated();
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
    public function attendence_show( $emp_id)

        {
        $alldata =employee::find($emp_id);

        
            $data=attendence::where('emp_id',$emp_id)->get();


        return view('crud.show_detail.attendence',['name'=>$alldata->full_name,'data'=>$data,'emp_id'=>$emp_id]);
    }
    public function attendence_create($emp_id)
    {
        return view('crud.show_detail.create_attend',['emp_id'=>$emp_id]);
    }

     public function attendence_store(StoreAttendenceRequest $req ,$emp_id)
    {
           $req->validated();
        $id=$req->emp_id;
        $date=$req->date;
        

        //firstorcreate is used to insert data only after checkiing either it exists in db or not,
        //if exists, then additonal data is inserted and if not all data is inserted with our choice

            attendence::UpdateorCreate(
                ['emp_id'=>$id,'date'=>$date],
                ['check_in'=>$req->check_in,'check_out'=>$req->check_out ]
            );
        
       
           return redirect(route('attendence.show',['emp_id'=>$emp_id]))->with('success','Attendence Added Successfully!!');

    }

}