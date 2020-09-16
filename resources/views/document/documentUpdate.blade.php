<html>
<head>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <title>技術文書管理</title>
</head>
<body>
<h1>技術文書管理</h1>

<p>{{$errors->first('title')}}</p>
<p>{{$errors->first('body')}}</p>
<form action="/documentUpdExe" method="post">
    {{ csrf_field() }}
    <div>タイトル：<input type="text" name="title" value="{{$document->title}}"></div>
    <div>本文：<textarea name="body">{{$document->body}}</textarea></div>
    <div>カテゴリ：
        <select name="cid">
            @foreach($categoryData as $data)
                @if($data->cid == $document->cid)
                    {{$selected = ' selected'}}
                @else
                    {{$selected = ''}}
                @endif
                    <option value="{{$data['cid']}}"{{$selected}}>{{$data['cname']}}</option>
            @endforeach
        </select>
        <input type="submit" value="更新">
    </div>
    <input type="hidden" name="did" value="{{$document->did}}">
</form>

<div><a href="{{url('documentDelKakunin/' .$document->did)}}">削除</a></div>
<div><a href="{{url('categorySet?mode=init')}}">カテゴリ設定</a></div>
<a href="{{ url('/') }}">TOP</a>
</body>
</html>