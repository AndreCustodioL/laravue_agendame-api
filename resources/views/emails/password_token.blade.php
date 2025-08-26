@extends('emails.layouts.default')

@section('content')
    <tr>
        <td class="wrapper">
            <p>Olá, {{$user->first_name}}!</p>
            <p>O seu token para resetar a senha é {{ $token}}</p>
            <p>Por favor, clique no botão abaixo para verificar sua conta.</p>
        </td>
    </tr>
@endsection