@extends('layouts.main')

@section('container')
    <div class="tranHistContainer">
        <div class="tranHistHeader">
            <h1>Your Transaction History</h1>
            <div class="tranHist">
                @if ($transactions->isEmpty())
                    <div class="tranHistContent">
                        <p>No transaction.</p>
                    </div>
                @else
                    @foreach ($transactions as $transaction)
                        <div class="tranHistContent">
                            <a class="detailButton" href="/transaction_history_detail/{{ $transaction->transaction_id }}">Transaction at {{ $transaction->transaction_date }}</a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
