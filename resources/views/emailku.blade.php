@component('mail::message')
# {{ $data['title'] }}

Kepada {{auth()->user()->name}}, status pendaftaran anda telah diupdate silahkan cek di website paragon.com

Terimakasih,<br>
{{ config('app.name') }}
@endcomponent