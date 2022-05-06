<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function redirectAccordingToRequest($request,string $responseStatus) {
        if($responseStatus == 'success'){
            $message='تمت العملية بنجاح';
        }else{
            $message='فشلت العملية';
        }

        if($request->has('create')){
            return redirect()->action([static::class,'index'])->with($responseStatus,$message);
        }else{
            return redirect()->back()->with($responseStatus,$message);
        }
    }
}
