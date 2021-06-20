<?php

namespace App\Http\Controllers;

use App\Models\Tbl_credit;
use App\Models\Tbl_Regle;
use Illuminate\Http\Request;

class CreditController extends Controller
{
    //
    public function add(Request $r)
    {
        $new = new Tbl_credit();



        $new->type = $r->type    ;
        $new->montant = $r->montant    ;
        $new->monsualite = $r->monsualite    ;
        $new->project = $r->project    ;
        $new->duree = $r->duree    ;
        $new->credit_encour = $r->credit_encour    ;
        $new->nombre_pr = $r->nombre_pr    ;


        if($r->file('file_pdf'))
        {
            $file = $r->file('file_pdf');
            $filename = time() . '.' . $r->file('file_pdf')->extension();
            $filePath = public_path() . '/assets/pdf/';
            $file->move($filePath, $filename);
        }

      $new->save();
//   return $new;
    return  redirect('/') ; //->action([CreditController::class, 'show']);
    }
    public function show()
    {
        $list = Tbl_credit::all();
        return  response()->json($list)  ;
    }

}