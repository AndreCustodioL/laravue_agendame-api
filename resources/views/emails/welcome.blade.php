@extends('emails.layouts.default')

@section('content')
    <tr>
        <td class="wrapper">
            <p>Olá, {{$user->first_name}}!</p>
            <p>Seja bem-vindo ao {{config('app.name')}}</p>
            <p>Por favor, clique no botão abaixo para verificar sua conta.</p>
            <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                <tbody>
                    <tr>
                        <td align="left">
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td> <a href="http://htmlemail.io" target="_blank">Confirmar Conta</a> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p>Good luck! Hope it works.</p>
        </td>
    </tr>
@endsection