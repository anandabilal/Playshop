@extends('layouts.main')

@section('container')
    <div class="tranHistDetContainer">
        <div class="tranHistDetHeader">
            <h1>Your Transaction at {{ $transaction->transaction_date }}</h1>
        </div>
        <div class="tranHistDet">
            <table>
                <tr>
                    <th>Game Image</th>
                    <th>Game Name</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
                @foreach ($transactionDetails as $transactionDetail)
                    <tr>
                        <td>
                            <img src="/images/{{ $transactionDetail->image }}" alt="{{ $transactionDetail->name }} image not found" width="250" height="250">
                        </td>
                        <td>{{ $transactionDetail->name }}</td>
                        <td>{{ $transactionDetail->quantity }}</td>
                        <td>$ {{ $transactionDetail->sub_total }}</td>
                    </tr> 
                @endforeach
                <tr>
                    <td  colspan="3"></td>
                    <td class="grandTotal">
                        Grand Total: $ {{ $grandTotal[0]->grand_total }}
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection
