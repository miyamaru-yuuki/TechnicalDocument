<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Category;

class TechnicalDocumentController extends Controller
{
    public function index(Request $request)
    {
        $mode = $request->query('mode');
        if($mode && $mode == "search"){
            $searchWord = $request->query('searchWord',"");

            $document = new Document();
            $documentList = $document
                ->join('category', 'document.cid', '=', 'category.cid')
                ->where('title','like','%' .$searchWord. '%')
                ->get();

        }else{
            $document = new Document();
            $documentList = $document
                ->join('category', 'document.cid', '=', 'category.cid')
                ->get();
        }

        return view('document.index',['documentList' => $documentList]);
    }

    public function documentAddExe(Request $request)
    {
        $title = $request->input('title');
        $body = $request->input('body');
        $cid = $request->input('cid');
        $registdate = date("Y/m/d");
        $document = new Document();
        $document->create(['title' => $title, 'body' => $body, 'cid' => $cid,'registdate' => $registdate]);
        return redirect('/');
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

    public function documentAddKakunin(\App\Http\Requests\documentRequest $request)
    {
        $title = $request->input('title');
        $body = $request->input('body');
        $cid = $request->input('cid');

        $category = new Category();
        $category = $category
            ->find($cid);

        return view('document.documentAddKakunin', ['title' => $title, 'body' => $body, 'cid' => $cid,'category' => $category]);
    }

    public function update($did)
    {
        $document = new Document();
        $document = $document
            ->join('category', 'document.cid', '=', 'category.cid')
            ->where('document.did',$did)
            ->first();

        $category = new Category();
        $categoryData = $category
            ->get();

        return view('document.documentUpdate',['document' => $document,'categoryData' => $categoryData]);
    }

    public function documentUpdExe(\App\Http\Requests\documentRequest $request)
    {
        $did = $request->input('did');
        $title = $request->input('title');
        $body = $request->input('body');
        $cid = $request->input('cid');
        $registdate = date("Y/m/d");

        $document = new Document();
        $document->where('did',$did)
            ->update(['title' => $title, 'body' => $body, 'cid' => $cid,'registdate' => $registdate]);

        return redirect('/');
    }

    public function documentDelKakunin($did)
    {
        $document = new Document();
        $document = $document
            ->join('category', 'document.cid', '=', 'category.cid')
            ->find($did);

        return view('document.documentDelKakunin',['document' => $document]);
    }

    public function documentDelExe(Request $request)
    {
        $did = $request->input('did');

        $document = new Document();
        $document->where('did',$did)
            ->delete();

        return redirect('/');
    }

    public function categorySet($mode)
    {
        $category = new Category();
        $categoryData = $category
            ->get();

        return view('category.categorySet',['categoryData' => $categoryData,'mode' => $mode]);
    }

    public function categoryAddExe(\App\Http\Requests\categoryRequest $request)
    {
        $cname = $request->input('cname');
        $explanation = $request->input('explanation');

        $category = new Category();
        $category->create(['cname' => $cname, 'explanation' => $explanation]);
        return redirect('categorySet/init');
    }

    public function categoryUpdate($cid)
    {
        $mode = "edit";

        $category = new Category();
        $categoryData = $category
            ->get();
        $categoryDtum = $category
            ->find($cid);

        return view('category.categorySet',['categoryData' => $categoryData,'categoryDtum' => $categoryDtum,'mode' => $mode]);
    }

    public function categoryUpdExe(\App\Http\Requests\categoryRequest $request)
    {
        $cid = $request->input('cid');
        $cname = $request->input('cname');
        $explanation = $request->input('explanation');

        $category = new Category();
        $category->where('cid',$cid)
            ->update(['cname' => $cname, 'explanation' => $explanation]);

        return redirect('categorySet/init');
    }

    public function categoryDelExe($cid)
    {
        $category = new Category();
        $category->where('cid',$cid)
            ->delete();

        return redirect('categorySet/init');
    }

}
