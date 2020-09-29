<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Vnphone;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\IOFactory;

class VnphoneController extends Controller
{
    function index() {
        return view("welcome");
    }

    function handleSubmit(){
        if (request()->has('uid_submit')) {
            $phoneObj = Vnphone::where('uid',request("user_id"))->first();
            $phone = $phoneObj !== null ? $phoneObj->phone : "No matching!";
            $class = $phoneObj !== null ? "primary" : "danger";
            return view("welcome", ["phone" => $phone, "uid" => request("user_id"), "class" => $class]);
        }

        if (request()->has('excel_submit')) {
            if (request()->hasFile('excel_file')) {
                $file = request()->file('excel_file');
                $path = public_path().'/uploads/';

                $file->move($path, $file->getClientOriginalName());
                $spreadsheet = IOFactory::load($path.$file->getClientOriginalName());

                $worksheet = $spreadsheet->getActiveSheet();
                $highestRow = $worksheet->getHighestRow();

                for ($row = 2; $row <= $highestRow; ++$row) {
                    $phoneObj =  Vnphone::where('uid',$worksheet->getCell('A'.$row)->getValue())->first();
                    $phone = $phoneObj !== null ? $phoneObj->phone : '';
                    $worksheet->getCell('B'.$row)->setValue($phone);
                }

                $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment; filename="'. $file->getClientOriginalName().'"');
                $writer->save('php://output');
                unlink($path.$file->getClientOriginalName());
            }
            return view("welcome");
        }
    }
}
