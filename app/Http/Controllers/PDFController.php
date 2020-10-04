<?php
namespace App\Http\Controllers;

require_once('/Users/miyamaruyuuki/TechnicalDocument/vendor/setasign/fpdi/src/Fpdi.php');
//require_once('FPDI/src/autoload.php');

use Illuminate\Http\Request;
//use PDF;

class PDFController extends Controller
{
//    public function index(){
//
//        $pdf = PDF::loadHTML('<h1>こんにちは</h1>');
//        $pdf = PDF::loadHTML('<h1>こんにちは</h1>');
//
//        return $pdf->setOption('encoding', 'utf-8')->inline();
//
//    }

    public function index()
    {
        /*
         * PDFの初期設定
         */
        $pdf = new Fpdi('L', 'mm', 'A4');

        // テンプレートPDFの設定
        $template_path = public_path('/Users/miyamaruyuuki/Desktop/納品書.pdf');
        $pdf->setSourceFile($template_path);

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetAutoPageBreak(false);
        $pdf->SetAutoPageBreak(false);
        $pdf->SetMargins(0, 0, 0);
        $pdf->addPage();

//        $font = new TCPDF_FONTS();

        //フォントの設定
//        $font_bold = $font->addTTFfont(storage_path('fonts/ipag.ufm'));
//        $pdf->setFont($font_bold, '', 30);
//
//        $page = $pdf->importPage(1);
//        $pdf->useTemplate($page);

        /*
         * PDFに表示するデータ
         */
        //ID
        $pdf->SetXY(100, 49);
        $pdf->Write(0, '1');

        //名前
        $pdf->SetXY(100, 61);
        $pdf->Write(1, 'やまだたろう');


        $pdf->output();

        return Redirect::back();
    }
}