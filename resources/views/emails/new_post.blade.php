<x-mail::message>
# New Post on {{ $site->url }}

Post Title: {{ $post->title }}

Post Body: {{ $post->description }}

enjoy,

{{ config('app.name') }}
</x-mail::message>