<x-mail::message>
# {{ $sender }} komentar # {{ $tiket }} :

{{ $komentar }}.

<x-mail::button :url="$url">
Lihat Detail
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
