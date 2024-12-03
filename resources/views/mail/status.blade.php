<x-mail::message>
# Pembaruan Status

Status Pengaduan : {{ $status }}

Keterangan : {{ $keterangan }}

<x-mail::button :url="$url">
Lihat Detail
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
