<html>
<head>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <title>技術文書管理</title>
</head>
<body>
<h1>技術文書管理</h1>
<table>
    @foreach ($categoryData as $data)
        <tr><td>{{$data->cname}}</td><td>{{$data->explanation}}</td></tr>
    @endforeach
</table>
<div><a href="{{url('categoryAdd')}}">追加</a></div>
</body>
</html>