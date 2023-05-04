<?php

namespace App\Http\Controllers\Tweet\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Tweet;
use App\Services\TweetService;
// 存在しないtweetを選択したときの404画面
// use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, TweetService $tweetService)
    {
        $tweetId = (int) $request->route('tweetId');

        if (!$tweetService->checkOwnTweet($request->user()->id, $tweetId)) {
            throw new AccessDeniedHttpException();
        }

        // 書き方１：null チェックして例外を出す
        // $tweet = Tweet::where('id', $tweetId)->first();
        // if (is_null($tweet)) {
        //     throw new NotFoundHttpException('存在しないつぶやきです');
        // }
        // dd($tweet)

        // 書き方２：firstOrFail() を使う
        $tweet = Tweet::where('id', $tweetId)->firstOrFail();
        // dump($tweet);

        return view('tweet.update')->with('tweet', $tweet);
    }
}
