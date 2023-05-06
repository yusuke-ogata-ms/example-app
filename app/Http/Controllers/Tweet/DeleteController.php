<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Tweet;
use App\Services\TweetService;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, TweetService $tweetService)
    {
        $tweetId = (int) $request->route('tweetId');

        if (!$tweetService->checkOwnTweet($request->user()->id, $tweetId)){
            throw new AccessDeniedHttpException();
        }

        $tweetService->deleteTweet($tweetId);

        // DB からの削除方法１：tweet の1カラムを取り出して削除する
        // $tweet = Tweet::where('id', $tweetId)->firstOrFail();
        // $tweet->delete();

        // DB からの削除方法２：直接主キーを指定して削除する
        // Tweet::destroy($tweetId);
        
        return redirect()
            ->route('tweet.index')
            ->with('feedback.success', "つぶやきを削除しました");
    }
}
