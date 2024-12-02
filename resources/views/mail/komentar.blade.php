<x-mail::message>
# {{ $sender }} menambahkan komentar :

{{ $komentar }}.

<x-mail::button :url="$url">
Lihat Detail
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
