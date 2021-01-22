<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TimesheetRequest;
use Illuminate\Database\Eloquent\Builder;
use App\Timesheet;
use App\Joborder;
use App\Product;

class TimesheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Retrieves all timesheets which contain joborder id and where the status column inside the joborder table does not equal completed
        $timesheets = Timesheet::whereHas('joborder', function(Builder $query) {
            $query->where('status', '!=', 'completed');
        })
        ->where('status', 'new')
        ->get();

        return view('pages.timesheets.index')->with('timesheets', $timesheets);
    }

    /**
     * Show the form for creating a new resource.
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $product = $request->input('product');
        $employee = $request->input('employee');
        $weekEnding = $request->input('date');

        if($employee == null || $product == null) {
            //TODO::RETURN BACK WITH ERRORS
            return back();
        }
        else {
            return view("pages.timesheets.create", [
                'product' => $product,
                'employee' => $employee,
                'weekEnding' => $weekEnding
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Requests\TimesheetRequest  $request
     * @param int $productId
     * @param int $employeeId
     * @param int $weekEnding
     * @return \Illuminate\Http\Response
     */
    public function store(TimesheetRequest $request, $productId, $employeeId, $weekEnding)
    {
        $timesheetStatus = "new";
        //Check the status of completion for the product
        if($request->input('status') == null) {
            $status = 'building';
        }
        else {
            $status = 'completed';
            $timesheetStatus = 'completed';
        }
        //Set the Product status to building
        $product = Product::findOrFail($productId); 
        $product->status = $status;
        $product->save();

        //When timesheet is create generate a new Joborder associated with the newly created timesheet
        $joborder = new Joborder();
        //Generate a unique number for the joborder
        $joborder->joborder = uniqid();
        $joborder->status = $status;
        $joborder->save();

        //Get the id of the newly created joborder which will be assigned to the timesheet created
        $joborderId = Joborder::select('id')->max('id');

        //Create a new timesheet and assign values
        $timesheet = new Timesheet();
        $timesheet->product_id = $productId;
        $timesheet->employee_id = $employeeId;
        $timesheet->joborder_id = $joborderId;
        $timesheet->monday = $request->input('monday');
        $timesheet->tuesday = $request->input('tuesday');
        $timesheet->wednesday = $request->input('wednesday');
        $timesheet->thursday = $request->input('thursday');
        $timesheet->friday = $request->input('friday');
        $timesheet->saturday = $request->input('saturday');
        $timesheet->status = $timesheetStatus;
        $timesheet->weekEnding = $weekEnding;
        $timesheet->save();

        return redirect("home")->with('success', 'Timesheet Created Successfuly');
    }


    /**
     * Display Update form for resource.
     * 
     * @param  App\Requests\Timesheet  $timesheet
     * @return \Illuminate\Http\Response
     */
    public function edit(Timesheet $timesheet) {
        return view('pages.timesheets.edit')->with('timesheet', $timesheet);
    }


    /**
     * Continues a timesheet that has not yet been completed
     * 
     * @param App\Requests\TimesheetRequest $request
     * @param App\Timesheet $timesheet
     * @return \Illuminate\Http\Response
     */
    public function update(TimesheetRequest $request, Timesheet $timesheet) {
        $productId = $timesheet->product->id;
        $employeeId = $timesheet->employee->id;
        $joborderId = $timesheet->joborder->id;

        //Change that status of the timesheet thats being continued to old
        $timesheet->status = 'old';
        $timesheet->save();

        //Check the status of completion for the product
        if($request->input('status') == null) {
            $status = 'building';
            $timesheetStatus = 'new';
        }
        else {
            $timesheetStatus = 'completed';
            $status = 'completed';
        }
        //Set the Product status depending if completed or not
        $product = Product::findOrFail($productId); 
        $product->status = $status;
        $product->save();

        //Set the joborder status depending if completed or not
        $joborder = Joborder::findOrFail($joborderId);
        $joborder->status = $status;
        $joborder->save();

        //Create a new timesheet that is a continuation of an old one
        $timesheet = new Timesheet();
        $timesheet->product_id = $productId;
        $timesheet->employee_id = $employeeId;
        $timesheet->joborder_id = $joborderId;
        $timesheet->monday = $request->input('monday');
        $timesheet->tuesday = $request->input('tuesday');
        $timesheet->wednesday = $request->input('wednesday');
        $timesheet->thursday = $request->input('thursday');
        $timesheet->friday = $request->input('friday');
        $timesheet->saturday = $request->input('saturday');
        $timesheet->status = $timesheetStatus;
        //Make sure the continued timesheets date is not less than the previos timesheet
        if($request->input('date') < $timesheet->weekEnding) {
            return redirect('timesheets');
        }
        else {
            $timesheet->weekEnding = $request->input('date');
            $timesheet->save();
        }

        return redirect('timesheets');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

}