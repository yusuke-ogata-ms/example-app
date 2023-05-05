@component('mail::message')
# 新しいユーザの追加

{{ $toUser->name }}さんこんにちは！

@component('mail::panel')
  新しく{{ $newUser->name }}さんが参加されましたよ！
@endcomponent

@component('mail::button', ['url' => route('tweet.index')])
  つぶやきを見にいく
@endcomponent

@endcomponent