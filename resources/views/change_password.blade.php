@extends('layouts.main')

@section('container')
    <div class="changePasswordContainer">
        <div class="changePasswordHeader">
            <p>Change Password</p>
        </div>
        <div class="changePassword">
            <form action="/change_password" method="post">
                @csrf
                <table>
                    {{-- Current Password --}}
                    <tr>
                        <td align="right">Current Password</td>
                        <td>
                            <input type="password" name="current_password" id="current_password">
                        </td>
                    </tr>
                    {{-- New Password --}}
                    <tr>
                        <td align="right">New Password</td>
                        <td>
                            <input type="password" name="new_password" id="new_password">
                        </td>
                    </tr>
                    {{-- Confirm New Password --}}
                    <tr>
                        <td align="right">New Confirm Password</td>
                        <td>
                            <input type="password" name="new_confirm_password" id="new_confirm_password">
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
                    {{-- Update Password --}}
                    <tr>
                        <td></td>
                        <td align="left">
                            <button type="submit">Update Password</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
@endsection
