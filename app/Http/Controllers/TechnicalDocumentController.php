<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Category;

class TechnicalDocumentController extends Controller
{
    public function index(Request $request)
    {
        $searchmode = $request->query('searchmode');
//        $mode = $request->isMethod('POST');
//
//        if($mode && $mode == "add"){
//            dd('add');
//            $title = $request->input('title');
//            $body = $request->input('body');
//            $cid = $request->input('cid');
//            $registdate = date("Y/m/d");
//            $document = new Document();
//            $document->create(['title' => $title, 'body' => $body, 'cid' => $cid,'registdate' => $registdate]);
//            return redirect('/');
//        }elseif($mode && $mode == "edit"){
//            dd('edit');
//            $did = $request->input('did');
//            $title = $request->input('title');
//            $body = $request->input('body');
//            $cid = $request->input('cid');
//            $registdate = date("Y/m/d");
//
//            $document = new Document();
//            $document->where('did',$did)
//                ->update(['title' => $title, 'body' => $body, 'cid' => $cid,'registdate' => $registdate]);
//
//            return redirect('/');
//        }elseif($mode && $mode == "del"){
//            $did = $request->input('did');
//
//            $document = new Document();
//            $document->where('did',$did)
//                ->delete();
//
//            return redirect('/');
//        }

        $mode = $request->isMethod('POST');
        if($mode && $mode == "add"){
            $title = $request->input('title');
            $body = $request->input('body');
            $cid = $request->input('cid');
            $registdate = date("Y/m/d");

            $document = new Document();
            $document->create(['title' => $title, 'body' => $body, 'cid' => $cid,'registdate' => $registdate]);
        }
        $document = new Document();
        $documentList = $document
            ->join('category', 'document.cid', '=', 'category.cid')
            ->get();

//        if($searchmode && $searchmode == "search"){
//            $searchWord = $request->query('searchWord',"");
//
//            $document = new Document();
//            $documentList = $document
//                ->join('category', 'document.cid', '=', 'category.cid')
//                ->where('title','like','%' .$searchWord. '%')
//                ->get();
//
//        }else{
//            $document = new Document();
//            $documentList = $document
//                ->join('category', 'document.cid', '=', 'category.cid')
//                ->get();
//        }

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

    public function categorySet($mode,$cid)
    {
        $category = new Category();
        $categoryData = $category
            ->get();

        $categoryDtum = null;
        if($mode == 'edit'){
            $categoryDtum = $category
                ->find($cid);
        }

        return view('category.categorySet',['categoryData' => $categoryData,'categoryDtum' => $categoryDtum,'mode' => $mode]);
    }

    public function categoryAddExe(\App\Http\Requests\categoryRequest $request)
    {
        $cname = $request->input('cname');
        $explanation = $request->input('explanation');

        $category = new Category();
        $category->create(['cname' => $cname, 'explanation' => $explanation]);
        return redirect('categorySet/init/null');
    }

    public function categoryUpdExe(\App\Http\Requests\categoryRequest $request)
    {
        $cid = $request->input('cid');
        $cname = $request->input('cname');
        $explanation = $request->input('explanation');

        $category = new Category();
        $category->where('cid',$cid)
            ->update(['cname' => $cname, 'explanation' => $explanation]);

        return redirect('categorySet/init/null');
    }

    public function categoryDelExe($cid)
    {
        $category = new Category();
        $category->where('cid',$cid)
            ->delete();

        return redirect('categorySet/init/null');
    }

}
