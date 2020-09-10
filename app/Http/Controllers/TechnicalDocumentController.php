<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Category;

class TechnicalDocumentController extends Controller
{
    public function index()
    {
        $document = new Document();
        $documentList = $document
            ->join('category', 'document.cid', '=', 'category.cid')
            ->get();

        return view('document.index',['documentList' => $documentList]);
    }

    public function list($cid)
    {
        $document = new Document();
        $documentList = $document
            ->join('category', 'document.cid', '=', 'category.cid')
            ->where('document.cid',$cid)
            ->get();

        return view('document.index',['documentList' => $documentList]);
    }

    public function documentAdd()
    {
        $category = new Category();
        $categoryData = $category
            ->get();

        return view('document.documentAdd',['categoryData' => $categoryData]);
    }

    public function documentAddKakunin(Request $request)
    {
        $title = $request->input('title');
        $body = $request->input('body');
        $cid = $request->input('cid');

        $category = new Category();
        $category = $category
            ->find($cid);

        return view('document.documentAddKakunin', ['title' => $title, 'body' => $body, 'cid' => $cid,'category' => $category]);
    }
}
