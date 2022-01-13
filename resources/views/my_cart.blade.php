@extends('layouts.main')

@section('container')
    <div class="myCartContainer">
        <div class="myCartHeader">
            <p>My Cart</p>
        </div>
        @foreach ($carts as $cart)
            <div class="myCart">
                @if (!$carts->isEmpty())
                    <div class="boxImage">
                        <img src="/images/{{ $cart->image }}" alt="{{ $cart->name }} image not found" width="250" height="250">
                    </div>
                    <form action="/my_cart/update_quantity/{{ $cart->cart_id }}" method="post">
                        @csrf
                        <table>
                            {{-- Name --}}
                            <tr>
                                <td colspan="2" align="left">
                                    <h3>{{ $cart->name }}</h3>
                                </td>
                            </tr>
                            {{-- Subtotal --}}
                            <tr>
                                <td align="right">Subtotal</td>
                                <td align="left">
                                    <p>$ {{ $cart->sub_total }}</p>
                                </td>
                            </tr>
                            {{-- Quantity --}}
                            <tr>
                                <td align="left">
                                    Quantity
                                </td>
                                <td align="left">
                                    <input type="number" name="quantity" id="quantity" value="{{ $cart->quantity }}">
                                </td>
                            </tr>
                            {{-- Error --}}
                            @if (session()->has('error' . $cart->cart_id))
                                <tr>
                                    <td></td>
                                    <td align="left">
                                        <span class="error">{{ session('error' . $cart->cart_id) }}</span>
                                    </td>
                                </tr>
                            @endif
                            {{-- Successful Update Quantity --}}
                            @if (session()->has('success' . $cart->cart_id))
                                <tr>
                                    <td></td>
                                    <td align="left">
                                        <span class="success">{{ session('success' . $cart->cart_id) }}</span>
                                    </td>
                                </tr>
                            @endif
                            {{-- Update Quantity --}}
                            <tr>
                                <td></td>
                                <td align="left">
                                    <button type="submit">Update Quantity</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                @endif
            </div> 
        @endforeach
        <div class="myCart">
            @if (!$carts->isEmpty())
                <table>
                    <tr>
                        <td align="right"><h3>Grand Total</h3></td>
                        <td align="left">
                            <p>$ {{ $grandTotal[0]->grand_total }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align="left">
                            <form action="/my_cart/checkout" method="post">
                                @csrf
                                <button type="submit">Checkout</button>
                            </form>
                        </td>
                    </tr>
                </table>
            @else
                Cart is empty.
            @endif
        </div>  
    </div>
@endsection
