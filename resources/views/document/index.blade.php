<html>
<head>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <title>技術文書管理</title>
</head>
<body>
<h1>技術文書管理</h1>
<form action="/" method="get">
<div>検索ワード：<input type="text" name="searchWord" value="{{$searchWord}}"><input type="submit" value="検索する"></div>
</form>
<div><a href="{{url('documentAdd')}}">文書追加</a></div>
<table>
    @foreach ($documentList as $data)
        <tr><td>{{$data->registdate}}</td><td><a href="{{url('list/' .$data->cid)}}">{{$data->cname}}</a></td><td><a href="{{url('update/' .$data->did)}}">{{$data->title}}</a></td></tr>
    @endforeach
</table>
</body>
</html>