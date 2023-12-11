@component('mail::message')
    <p>Hello,{{ $user->name }}</p>
    <p>Klik link berikut untuk verifikasi alamat email!</p>
    <a href="{{ route('verification.verify', ['id' => $id, 'remember_token' => $remember_token])}}">Verifikasi akun</a>
@endcomponent