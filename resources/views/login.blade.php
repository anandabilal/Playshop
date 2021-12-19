@extends('layouts.main')

@section('container')
    <div class="loginContainer">
        <div class="loginHeader">
            <p>Login</p>
        </div>
        <div class="login">
            <form action="/login" method="post">
                @csrf
                <table>
                    {{-- E-Mail Address --}}
                    <tr>
                        <td align="right">E-Mail Address</td>
                        <td>
                            <input type="text" name="email_address" id="email_address" autofocus>
                        </td>
                    </tr>
                    {{-- Password --}}
                    <tr>
                        <td align="right">Password</td>
                        <td>
                            <input type="password" name="password" id="password">
                        </td>
                    </tr>
                    {{-- Remember Me --}}
                    <tr>
                        <td></td>
                        <td align="left">
                            <input type="checkbox" name="remember_me" id="remember_me">
                            <label for="remember_me"> Remember Me</label>
                        </td>
                    </tr>
                    {{-- Error --}}
                    @if ($errors->any())
                        <tr>
                            <td></td>
                            <td align="left">
                                <span class="error">{{ $errors->first() }}</span>
                            </td>
                        </tr>
                    @endif
                    {{-- Successful Registration --}}
                    @if (session()->has('success'))
                        <tr>
                            <td></td>
                            <td align="left">
                                <span class="success">{{ session('success') }}</span>
                            </td>
                        </tr>
                    @endif
                    {{-- Login --}}
                    <tr>
                        <td></td>
                        <td align="left">
                            <button type="submit">Login</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
@endsection
