<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// option2: Cacades\View を利用して呼び出し
// use Illuminate\Support\Facades\View;

// option3: Factory をインジェクションして呼び出し
// use Illuminate\View\Factory;

// seeder で生成したダミーのつぶやきを表示する
use App\Models\Tweet;

// Service コンテナ
use App\Services\TweetService;

class IndexController extends Controller
{
    /**
     * html ファイルの呼び出し
     * resources\views\tweet\index.blade.php を配置する
     */
    // option1: view ヘルパー関数でhtmlを呼び出し
    // public function __invoke(Request $request)
    // {
    // // option1.1: view 関数の引数で呼び出し
    // //     return view('tweet.index', ['name' => 'laravel']);
    
    // // option1.2: view はwith関数で引数を渡すことができる
    // // with はメソッドチェーンでいくつも呼び出せる
    // //      return view('tweet.index')
    // //         ->with('name', 'withで引数を追加');
    // }
    
    // option2: Facades\View を利用して呼び出し
    // public function __invoke(Request $request)
    // {
    //     return View::make('tweet.index', ['name' => 'Facades を利用して呼び出し']);
    // }

    // option3: Factory をインジェクションして呼び出し
    // public function __invoke(Request $request, Factory $factory)
    // {
    //     return $factory->make('tweet.index', ['name' => 'Factory で呼び出し']);
    // }

    // seeder で生成したダミーのつぶやきを表示する
    public function __invoke(Request $request, TweetService $tweetService)
    {
        //$tweets = Tweet::all();
        //dd($tweets);
        
        // Service コンテナ前
        // $tweets = Tweet::orderBy('created_at', 'DESC')->get();

        // Service コンテナ化
        $tweets = $tweetService->getTweets();

        // dump($tweets);
        // app(\App\Exceptions\Handler::class)->render(request(), throw new \Error('dump report.'));

        return view('tweet.index')
            ->with('tweets', $tweets);
    }


}
