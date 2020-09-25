<html>
<head>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <title>技術文書管理10</title>
</head>
<body>
<h1>技術文書管理</h1>

<form action="/" method="get">
<div>検索ワード：<input type="text" name="searchWord" value="@if(isset($searchWord)) {{$searchWord}} @endif"><input type="submit" value="検索する"></div>
</form>
@if(isset($cid))
<a href="{{ url('/') }}">絞り込み初期化</a>
@endif
<div><a href="{{url('documentAdd')}}">文書追加</a></div>
<table>
    @foreach ($documentList as $data)
        <tr><td>{{$data->registdate}}</td><td><a href="{{url('list/' .$data->cid)}}">{{$data->cname}}</a></td><td><a href="{{url('update/' .$data->did)}}">{{$data->title}}</a></td></tr>
    @endforeach
</table>
@if($documentList->isEmpty())
    <p>見つかりません</p>
@endif
</body>
</html>
