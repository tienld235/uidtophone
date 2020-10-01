<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Vnphone;
use PhpOffice\PhpSpreadsheet\IOFactory;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/vnphone/{id}', function (Request $request) {
    $phoneObj = Vnphone::where('uid',$request->id)->first();
    $message = $phoneObj !==null ? "Phone for $request->id" : "No matching!";
    $phone = $phoneObj !==null ? $phoneObj->phone : null;
    return [
        "message" => $message,
        "data" => $phone
    ];
});

Route::post("excel", function(Request $request) {
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
        $writer->save($path.$file->getClientOriginalName());

        return response()->download($path.$file->getClientOriginalName())->deleteFileAfterSend(true);;
    }
});

