@extends('layouts.main')

@section('container')
    <div class="gameDetailContainer">
        <div class="gameDetailHeader">
            <p>Game Detail</p>
        </div>
        <div class="gameDetail">
            <div class="boxImage">
                <img src="/images/{{ $gameSelected->image }}" alt="{{ $gameSelected->name }} image not found" width="250" height="250">
            </div>
            <form action="/game_detail/add_to_cart/{{ $gameSelected->game_id }}" method="post">
                @csrf
                <table>
                    {{-- Name --}}
                    <tr>
                        <td colspan="2" align="left">
                            <h3>{{ $gameSelected->name }}</h3>
                        </td>
                    </tr>
                    {{-- Price --}}
                    <tr>
                        <td colspan="2" align="left">
                            <p>$ {{ $gameSelected->price }}</p>
                        </td>
                    </tr>
                    {{-- Description --}}
                    <tr>
                        <td colspan="2" align="left">
                            <p>{{ $gameSelected->description }}</p>
                        </td>
                    </tr>
                    {{-- Guest / Customer --}}
                    @if (auth()->user() == null || auth()->user()->role_id == 2)
                        {{-- Quantity --}}
                        <tr>
                            <td align="left">
                                Quantity
                            </td>
                            <td align="left">
                                <input type="number" name="quantity" id="quantity">
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
                        {{-- Successful Add to Cart --}}
                        @if (session()->has('success'))
                            <tr>
                                <td></td>
                                <td align="left">
                                    <span class="success">{{ session('success') }}</span>
                                </td>
                            </tr>
                        @endif
                        {{-- Add to Cart --}}
                        <tr>
                            <td></td>
                            <td align="left">
                                <button type="submit">Add to Cart</button>
                            </td>
                        </tr>
                    @endif
                </table>
            </form>
        </div>
    </div>
@endsection
