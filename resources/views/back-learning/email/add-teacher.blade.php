<h2>Hallo, {{ $user->usr_name }}</h2>

<h4>Anda bisa masuk menggunakan akun di bawah di web {{ env('APP_URL') }}</h4>
<p>Alamat Email: {{ $user->usr_email }}</p>
<p>Kata Sandi : {{ $rand_password }}</p>