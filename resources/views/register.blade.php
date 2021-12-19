@extends('layouts.main')

@section('container')
    <div class="registerContainer">
        <div class="registerHeader">
            <p>Register</p>
        </div>
        <div class="register">
            <form action="/register" method="post">
                @csrf
                <table>
                    {{-- Username --}}
                    <tr>
                        <td align="right">Username</td>
                        <td>
                            <input type="text" name="username" id="username" autofocus>
                        </td>
                    </tr>
                    {{-- E-Mail Address --}}
                    <tr>
                        <td align="right">E-Mail Address</td>
                        <td>
                            <input type="text" name="email_address" id="email_address">
                        </td>
                    </tr>
                    {{-- Password --}}
                    <tr>
                        <td align="right">Password</td>
                        <td>
                            <input type="password" name="password" id="password">
                        </td>
                    </tr>
                    {{-- Confirm Password --}}
                    <tr>
                        <td align="right">Confirm Password</td>
                        <td>
                            <input type="password" name="confirm_password" id="confirm_password">
                        </td>
                    </tr>
                    {{-- Address --}}
                    <tr>
                        <td align="right">Address</td>
                        <td>
                            <textarea name="address" id="address"></textarea>
                        </td>
                    </tr>
                    {{-- Gender --}}
                    <tr>
                        <td align="right">Gender</td>
                        <td align="left">
                            <input type="radio" name="gender" id="gender_male" value="Male">
                            <label for="gender_male">Male</label>
                            <input type="radio" name="gender" id="gender_female" value="Female">
                            <label for="gender_female">Female</label>
                        </td>
                    </tr>
                    {{-- Date of Birth --}}
                    <tr>
                        <td align="right">Date of Birth</td>
                        <td>
                            <input type="date" name="birth_date" id="birth_date">
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
                    {{-- Register --}}
                    <tr>
                        <td></td>
                        <td align="left">
                            <button type="submit">Register</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
@endsection
