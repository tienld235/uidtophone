<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Vnphone;

class VnphoneController extends Controller
{
    public function showAll() {
        return view("welcome");
    }

    public function searchByUid(){
        return view("welcome", ["phone" => Vnphone::where('uid',request("user_id"))->first()]);
    }
}
