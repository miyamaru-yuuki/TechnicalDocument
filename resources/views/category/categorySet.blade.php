<html>
<head>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <title>技術文書管理</title>
</head>
<body>
<h1>技術文書管理</h1>
<table>
    @foreach ($categoryData as $data)
        <tr><td><a href="{{url('categorySet?mode=edit&cid=' .$data->cid)}}">{{$data->cname}}</a></td><td>{{$data->explanation}}</td></tr>
    @endforeach
</table>
@if($mode == "init")
    <div><a href="{{url('categorySet?mode=add')}}">追加</a></div>
@elseif($mode == "add")
    <form action="/categoryAddExe" method="post">
        {{ csrf_field() }}
    <div>カテゴリ名：<input type="text" name="cname"></div>
    <div>説明：<input type="text" name="explanation"></div>
        <div><input type="submit" value="追加"></div>
    </form>
@elseif($mode == "edit")
    <form action="/categoryUpdExe" method="post">
        {{ csrf_field() }}
        <div>カテゴリ名：<input type="text" name="cname" value="{{$categoryDtum->cname}}"></div>
        <div>説明：<input type="text" name="explanation" value="{{$categoryDtum->explanation}}"></div>
        <div><input type="hidden" name="cid" value="{{$categoryDtum->cid}}"></div>
        <div><input type="submit" value="更新"></div>
    </form>
    <form action="/categoryDelExe" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="cid" value="{{$categoryDtum->cid}}">
        <div><input type="submit" value="削除"></div>
    </form>
@endif
</body>
</html>