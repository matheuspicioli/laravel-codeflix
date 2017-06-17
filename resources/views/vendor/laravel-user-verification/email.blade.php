<h3>{{ config('app.name') }}</h3>
<p>Sua conta na plataforma foi gerada</p>
<p>
    <a href="{{ $link = route('email-verification.check', $user->verification_token) . '?email=' . urlencode($user->email) }}">clique aqui para ativa-la</a>
</p>

<p>
    Obs.: Não responda à este e-mail, ele é gerado automaticamente
</p>