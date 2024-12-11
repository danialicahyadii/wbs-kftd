<x-mail::message>
# Tiket Pengaduan WBS KFTD

<x-mail::panel>
{{ $tiket }}
</x-mail::panel>

Pantau proses pengaduan kamu menggunakan no tiket diatas atau klik dibawah ini :

<x-mail::button :url="$url">
    Lihat Detail
</x-mail::button>

Thanks,<br>

{{ config('app.name') }}
</x-mail::message>
