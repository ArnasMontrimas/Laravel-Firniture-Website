<?php

namespace App\Services;

use DB;

class ExcelData {
    public static function getExcelData($date1, $date2) {
        $excelData = DB::select('SELECT 
            p.id as "Product ID", 
            p.name as "Product Name", 
            p.type as "Product Category", 
            t.employee_id as "Employee ID", 
            p.build_time as "Estimated Build Time", 
            sum((t.monday + t.tuesday + t.wednesday + t.thursday + t.friday + t.saturday)) as "Actual Build Time", 
            p.selling_price as "Product Selling Price",
            round((((e.salary/52)/48) * sum((t.monday + t.tuesday + t.wednesday + t.thursday + t.friday + t.saturday))), 2) as "Cost To Build",
            round((p.selling_price - (((e.salary/52)/48) * sum((t.monday + t.tuesday + t.wednesday + t.thursday + t.friday + t.saturday)))), 2) as "Net Profit"
            FROM products p, timesheets t, employees e 
            WHERE t.product_id = p.id 
            AND t.employee_id = e.id
            AND t.weekEnding BETWEEN ? AND ? AND p.status = ? 
            GROUP BY p.id, p.name, p.type, t.employee_id, p.build_time, p.selling_price, e.salary',
        [$date1, $date2, 'completed']);

        if($excelData != null) {
            return $excelData;   
        }
    }

}