<html>
<head>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <title>技術文書管理</title>
</head>
<body>
<h1>技術文書管理</h1>
<form action="/documentAddKakunin" method="post">
    {{ csrf_field() }}
<div>タイトル：<input type="text" name="title"></div>
<div>本文：<textarea name="body"></textarea></div>
<div>カテゴリ：
    <select name="cid">
        @foreach($categoryData as $data)
            <option value="{{$data['cid']}}">{{$data['cname']}}</option>
        @endforeach
    </select>
    <input type="submit" value="登録">
</div>
</form>
<a href="{{ url('/') }}">TOP</a>
</body>
</html>