<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('company.index');
    }
    public function employee(Request $request){
if($request->ajax()) {
$data = Employee::latest()->get();
return Datatables::of($data)
->addIndexColumn()
->addColumn('action', function($row){
$action=
'<a class="btn btn-info" id="edit-btn" data-id='.$row->id.'>Edit</a>
<a class="btn btn-success" id="delete-btn" data-id='.$row->id.'>Delete</a>';
return $action;
})
->addColumn('delete', function($row){
return 'Example';
})
->rawColumns(['action','delete'])
->make(true);
}
}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           Employee::updateOrCreate(['id' => $request->Employee_id],
                ['name' => $request->name, 'description' => $request->description]);        
   
        return response()->json(['success'=>'Employee saved successfully.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Employee = Employee::find($id);
        return response()->json($Employee);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       //Employee::find($id)->delete();     
       return response()->json(['message'=>'Employee deleted successfully.']);
    }
    function delete($id){
        if(Employee::find($id)->delete()){
            return response()->json(['message'=>"Record Deleted Successfully."]);
            return redirect('employee');
            employee();
        }
    }
}