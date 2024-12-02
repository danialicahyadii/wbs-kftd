<x-mail::message>
# Admin memperbarui status pengaduan :

{{ $status }}

{{ $keterangan }}

<x-mail::button :url="$url">
Lihat Detail
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
