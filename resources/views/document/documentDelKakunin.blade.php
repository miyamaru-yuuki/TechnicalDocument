<html>
<head>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <title>技術文書管理</title>
</head>
<body>
<h1>技術文書管理</h1>

<p>タイトル:{{$document->title}}</p>
<p id="body">本文：{{$document->body}}</p>
<p>カテゴリ：{{$document->cname}}</p>
<p>削除してよいですか？</p>

<form action="/documentDelExe" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="did" value="{{$document->did}}">
    <input type="hidden" name="mode" value="del">
    <input type="submit" value="OK">
</form>

</body>
</html>