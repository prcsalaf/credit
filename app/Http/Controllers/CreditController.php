<?php

namespace App\Http\Controllers;

use App\Models\Tbl_credit;
use App\Models\Tbl_Regle;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class CreditController extends Controller
{
    //
    public function add(Request $r)
    {
        $new = new Tbl_credit();

        $new->cin = $r->cin   ;
        $new->nom = $r->nom   ;
        $new->prenom = $r->prenom   ;
        $new->date_nes = $r->dateN   ;
        $new->montant = $r->montant    ;
        $new->monsualite = $r->monsualite   ;
        $new->projet = $r->projet    ;
        $new->duree = $r->duree    ;
        $new->credit_encour = $r->credit_encour    ;
        $new->nombre_pr = $r->nombre_pr    ;


        // if($r->file('file_pdf'))
        // {
        //     $file = $r->file('file_pdf');
        //     $filename = time() . '.' . $r->file('file_pdf')->extension();
        //     $filePath = public_path() . '/assets/pdf/';
        //     $file->move($filePath, $filename);
        // }

        // $new->save();
      return $r;
   //  return  redirect('/') ; //->action([CreditController::class, 'show']);
    }
    public function show()
    {
        $list = Tbl_credit::all();
        return  response()->json($list)  ;
    }

    public function OCRtst(Request $r){


        if($r->file('file'))
        {
            $file = $r->file('file');
            $filename = $r->cin. '.' . $r->file('file')->extension();
            $filePath = public_path() . '/assets/pdf/';
            $file->move($filePath, $filename);
            return  $r;
        }


     return  $r;



    }

      public function t( )
      {
           $DocumentProcessorServiceClient = require('@google-cloud/documentai');

    }

}
