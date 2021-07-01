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


        if($r->file('file_rb'))
        {
             $file_rb = $r->file('file_rb');
             $filename_rb = time() . '.' . $r->file('file_rb')->extension();
             $filePath_rb = public_path() . '/assets/pdf/';
             $file_rb->move($filePath_rb, $filename_rb);
       }
       if($r->file('file_fp'))
       {
            $file_fb = $r->file('file_fp');
            $filename_fb = time() . '.' . $r->file('file_fp')->extension();
            $filePath_fb = public_path() . '/assets/pdf/';
            $file_fb->move($filePath_fb, $filename_fb);
      }


      $path_rb = 'C:/xampp/htdocs/credit/public/assets/pdf/'.$filename_rb ;
      $path_fb = 'C:/xampp/htdocs/credit/public/assets/pdf/'.$filename_fb ;
      $result_rb = shell_exec("node C:/xampp/htdocs/credit/public/assets/js/apiocr.js pdf=".$path_rb);
      $result_fb = shell_exec("node C:/xampp/htdocs/credit/public/assets/js/apiocr.js pdf=".$path_fb);
      $new->Relev_banq =  $result_rb ;
      $new->fichie_paie = $result_fb  ;
        $new->save();
        return $new;
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

        }
        if($r->file('file_rv'))
        {
            $file_rv = $r->file('file_rv');
            $file_rvname = $r->rv. '.' . $r->file('file_rv')->extension();
            $file_rvPath = public_path() . '/assets/pdf/';
            $file_rv->move($file_rvPath, $file_rvname);

        }

        $path = 'C:/xampp/htdocs/credit/public/assets/pdf/'.$filename ;
        $path1 = 'C:/xampp/htdocs/credit/public/assets/pdf/'.$file_rvname ;
        //traitemen
          $result = shell_exec("node C:/xampp/htdocs/credit/public/assets/js/apiocr.js pdf=".$path);
          $result1 = shell_exec("node C:/xampp/htdocs/credit/public/assets/js/apiocr.js pdf=".$path1);

        //traitemen
        // $result = shell_exec("node ocr_main.js pdf=".$file);

     return  $result.'  <br/><br/><br/><br/><hr/><br/><br/>'.$result1 ;
   //   return   $r ;

    }

      public function t( )
      {
           $DocumentProcessorServiceClient = require('@google-cloud/documentai');

    }

}
