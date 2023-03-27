<?php

namespace App\Http\Controllers;

// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// use Illuminate\Foundation\Bus\DispatchesJobs;
// use Illuminate\Foundation\Validation\ValidatesRequests;
// use Illuminate\Routing\Controller as BaseController;

use App\Http\Requests\GetArticlesRequest;
use App\Models\Article;
use App\Models\Tag;
use App\Models\ArticleTag;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class ArticleController extends Controller
{
    const NUM_ARTICLES_ON_PAGE = 10;

    public function allPosts(Request $request)
    {
        $validatedRequest = $request->validate([
            'symbol_code' => ['nullable'],
            'name' => ['nullable'],
            'tag' => ['nullable'],
        ]);

        $articles = Article::query();
        // $tag = Tag::query()->with(['articles']);

        if (isset($validatedRequest['symbol_code']) && $validatedRequest['symbol_code']) {
            $articles->bySymbolCode($validatedRequest['symbol_code']);
        }
        if (isset($validatedRequest['name']) && $validatedRequest['name']) {
            $articles->byPostName($validatedRequest['name']);
        }
        if (isset($validatedRequest['tag']) && $validatedRequest['tag']) {
            $articles->whereHas('tags', function (Builder $query) use($validatedRequest) {
                $query->where('name', $validatedRequest['tag']);
               })->get();
            // $articles->with(['tags' => function ($query) use($validatedRequest) {
            //     $query->where('name', $validatedRequest['tag']);
            // }]);
        }

        return view('articles', ['articles' => $articles->paginate(self::NUM_ARTICLES_ON_PAGE)->withQueryString()]);
    }

    public function detailPost(string $code)
    {
        $article = Article::with(['tags' => function ($query) {
            $query->orderBy('name', 'desc');
        }])->bySymbolCode($code)->first();

        return view('article', ['article' => $article]);
    }
}

 