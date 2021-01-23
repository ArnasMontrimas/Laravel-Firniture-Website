<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Timesheet;
use Illuminate\Database\Eloquent\Builder;
use DB;
use DateTime;
use DateInterval;
use App\Services\ExcelData;
use App\Exports\TimesheetsExport;
use Maatwebsite\Excel\Facades\Excel;

class PagesController extends Controller
{
    public function index() {
        return view("pages.index");
    }

    public function home() {
        $products = Product::where('status', 'waiting')->paginate(6);
        return view("pages.home")->with('products', $products);
    }

    public function selectEmployeeProductForTimesheet() {

        //Get all employees that are currently working on something
        $employeesIds = Timesheet::whereHas('product', function(Builder $query) {
            $query->where('status', 'building');
        })
        ->select('employee_id')
        ->distinct()
        ->get();
        
        //Select the employees which are not the ones who are working on something
        $employees = DB::table('employees')->whereNotIn('id', $employeesIds->toArray())->where('type', 'production')->get();

        $products = DB::table('products')->whereRaw("status = 'waiting' AND id NOT IN (SELECT product_id FROM timesheets)")->get();

        //dd($employees);
        return view("pages.selectEmployeeProductForTimesheet", [
            'products' => $products,
            'employees' => $employees
        ]);
    }

    public function exportToExcel() {
        //Get minimum date
        $minDate = Timesheet::min("weekEnding");
        $maxDate = Timesheet::max("weekEnding");
        
        return view('pages.exportToExcel', 
            ["minDate" => $minDate, "maxDate" => $maxDate]
        );
    }


    private static function weeklyReport(Request $r) {
        $weeklyReport = $r->weeklyReport;

        if($weeklyReport != null || $weeklyReport != "" || $weeklyReport != false) {
            $minDate = Timesheet::min("weekEnding");
            $maxDate = Timesheet::max("weekEnding");
            
            $date1 = new DateTime($weeklyReport);
            $date2 = new DateTime($weeklyReport);

            if($weeklyReport == $minDate) $date2->add(new DateInterval('P7D'));
            if($weeklyReport == $maxDate) $date1->sub(new DateInterval('P7D'));
            else $date1->sub(new DateInterval('P7D'));


            $date1 = $date1->format("Y-m-d");
            $date2 = $date2->format("Y-m-d");
            
            $excelData = ExcelData::getExcelData($date1, $date2);
            return Excel::download(new TimesheetsExport($excelData), 'weeklyReport.xlsx');
        }
    }

    private static function monthlyReport(Request $r) {
        $monthlyReport = $r->monthlyReport;

        if($monthlyReport != null || $monthlyReport != "" || $monthlyReport != false) {
            $minDate = Timesheet::min("weekEnding");
            $maxDate = Timesheet::max("weekEnding");

            $date1 = new DateTime($monthlyReport);
            $date2 = new DateTime($monthlyReport);

            if($monthlyReport == substr($minDate, 0, 7)) $date2->add(new DateInterval('P1M'));
            if($monthlyReport == substr($maxDate, 0, 7)) $date1->sub(new DateInterval('P1M'));
            else $date1->sub(new DateInterval('P1M'));
            
            $date1 = $date1->format("Y-m-d");
            $date2 = $date2->format("Y-m-d");
            
            $excelData = ExcelData::getExcelData($date1, $date2);
            return Excel::download(new TimesheetsExport($excelData), 'monthlyReport.xlsx');
        }
    }

    private static function yearlyReport(Request $r) {
        $yearlyReport = $r->yearlyReport;

        if($yearlyReport != null || $yearlyReport != "" || $yearlyReport != false) {
            $minDate = Timesheet::min("weekEnding");
            $maxDate = Timesheet::max("weekEnding");

            $date1 = new DateTime($yearlyReport);
            $date2 = new DateTime($yearlyReport);

            if($yearlyReport == substr($minDate, 0, 4)) $date2->add(new DateInterval('P1Y'));
            if($yearlyReport == substr($maxDate, 0, 4)) $date1->sub(new DateInterval('P1Y'));
            else $date1->sub(new DateInterval('P1Y'));
            
            $date1 = $date1->format("Y-m-d");
            $date2 = $date2->format("Y-m-d");
            
            $excelData = ExcelData::getExcelData($date1, $date2);
            return Excel::download(new TimesheetsExport($excelData), 'yearlyReport.xlsx');
        }
    }

    private static function allTimeReport(Request $r) {
        $allTimeReport = $r->allTimeReport;

        if($allTimeReport == "on") {
            $minDate = Timesheet::min("weekEnding");
            $maxDate = Timesheet::max("weekEnding");

            $excelData = ExcelData::getExcelData($minDate, $maxDate);
            return Excel::download(new TimesheetsExport($excelData), 'allTimeReport.xlsx');  
        }
    }

    public function exportToExcelExcecution(Request $r) {
        $weeklyReport = $r->weeklyReport;
        $monthlyReport = $r->monthlyReport;
        $yearlyReport = $r->yearlyReport;
        $allTimeReport = $r->allTimeReport;
        
        if($weeklyReport != null || $weeklyReport != "" || $weeklyReport != false) {
            return PagesController::weeklyReport($r);
        }
        if($monthlyReport != null || $monthlyReport != "" || $monthlyReport != false) {
            return PagesController::monthlyReport($r);
        }
        if($yearlyReport != null || $yearlyReport != "" || $yearlyReport != false) {
            return PagesController::yearlyReport($r);
        }
        if($allTimeReport == "on") {
            return PagesController::allTimeReport($r);
        }
    }

}
