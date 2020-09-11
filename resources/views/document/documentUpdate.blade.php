<html>
<head>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <title>技術文書管理</title>
</head>
<body>
<h1>技術文書管理</h1>

<form action="documentUpdExe" method="post">
    {{ csrf_field() }}
    <div>タイトル：<input type="text" name="title" value="{{$document->title}}"></div>
    <div>本文：<textarea name="body">{{$document->body}}</textarea></div>
    <div>カテゴリ：
        <select name="cid">
            @foreach($categoryData as $data)
                @if($data->cid == $document->cid)
                    <option value="{{$data['cid']}}" selected>{{$data['cname']}}</option>
                @else
                    <option value="{{$data['cid']}}">{{$data['cname']}}</option>
                @endif
            @endforeach
        </select>
        <input type="submit" value="更新">
    </div>
</form>

</body>
</html>