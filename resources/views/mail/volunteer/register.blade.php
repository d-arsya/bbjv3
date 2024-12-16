<x-mail::message>
# Introduction

Terimakasih telah menjadi volunteer BBJ
Berikut adalah kata sandi dari akunmu

## Email : {{ $email }}
## Password : {{ $password }}
<x-mail::button :url="config('app.url').'/login'">
Login
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
