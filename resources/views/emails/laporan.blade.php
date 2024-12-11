<x-mail::message>
# Tiket Pengaduan WBS KFTD

<x-mail::panel>
    <div style="display: flex; justify-content: center; align-items: center; height: 100%;">
        {{ $tiket }}
    </div>
</x-mail::panel>

Pantau proses pengaduan kamu menggunakan no tiket diatas atau klik dibawah ini :

<x-mail::button :url="$url">
    Lihat Detail
</x-mail::button>

Thanks,<br>

{{ config('app.name') }}
</x-mail::message>
