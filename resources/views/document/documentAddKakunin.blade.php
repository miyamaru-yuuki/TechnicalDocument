<html>
<head>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <title>技術文書管理</title>
</head>
<body>
<h1>技術文書管理</h1>
<p>タイトル:{{$title}}</p>
<p id="body">本文：{{$body}}</p>
<p>カテゴリ：{{$category['cname']}}</p>
<p>この内容で登録しますか？？</p>

<form action="documentAddExe" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="title" value="{{$title}}">
    <input type="hidden" name="body" value="{{$body}}">
    <input type="hidden" name="cid" value="{{$cid}}">
    <input type="submit" value="OK">
</form>

</body>
</html>