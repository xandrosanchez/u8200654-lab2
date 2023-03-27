<!DOCTYPE html>
<html>
<head>
    <title>!DOCTYPE</title>
    <meta charset="utf-8">
</head>
<body>
    @if ($errors->any())
        <div style="color:red">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('allPosts') }}" method="get">
        <input type="text" name="symbol_code" placeholder="Type symbol code">
        <input type="text" name="name" placeholder="Type name of post">
        <input type="text" name="tag" placeholder="Type name of tag">
        <button>Filter</button>
    </form>
    <div>
        @foreach($articles as $article)
            <ul>{{ $article->name }}</ul>
            <ul>{{ $article->symbol_code }}</ul>
            <ul>{{ $article->content }}</ul>
            <ul>{{ $article->date_time_create }}</ul> 
            <ul>{{ $article->author }}</ul> 
            <ul><a href="{{ route('detailPost', ['code' => $article->symbol_code]) }}">Подробнее</a></ul>
            <div>-----------------------</div>
        @endforeach
    </div>

    {{ $articles->links() }}
</body> 
</html>
