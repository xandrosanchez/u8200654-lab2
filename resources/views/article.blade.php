<html>
<head>
    <title>!DOCTYPE</title>
    <meta charset="utf-8">
</head>
<body>
    <div>
        <h1>Tags: </h1>
        @foreach($article->tags as $tags)
            <h3>{{$tags->name}}</h3>
            <div>-----------------------------</div>
        @endforeach
    </div>
    <div>
        <h1>Article: </h1>
        <ul>{{ $article->name }}</ul>
        <ul>{{ $article->symbol_code }}</ul>
        <ul>{{ $article->content }}</ul>
        <ul>{{ $article->date_time_create }}</ul> 
        <ul>{{ $article->author }}</ul> 
    </div>
</body> 
</html>
