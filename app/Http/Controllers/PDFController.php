<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use setasign\Fpdi;
use TCPDF_FONTS;

class PDFController extends Controller
{
    public function tcpdf()
    {
        $pdf = new Fpdi\TcpdfFpdi();

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage();

        // テンプレートPDFファイル読み込み
        $pdf->setSourceFile(resource_path('pdf/template_01.pdf'));
        $page = $pdf->importPage(1);
        $pdf->useTemplate($page);

        // フォント
        $font = new TCPDF_FONTS();

        // フォント：源真ゴシック
        $font_1 = $font->addTTFfont( resource_path('fonts/GenShinGothic-Medium.ttf') );
        $pdf->SetFont($font_1 , '', 10,'',true);

        $name = '山田太郎';
        $name2 = '前田正太';

        //名前
        $pdf->SetXY(63, 17);
        $pdf->Write(1, $name);

        //2ページ目
        $pdf->AddPage();
        $page = $pdf->importPage(2);
        $pdf->useTemplate($page);

        //名前(2ページ目)
        $pdf->SetXY(63, 17);
        $pdf->Write(1, $name2);


        $pdf->Output("output.pdf", "I");
    }
}