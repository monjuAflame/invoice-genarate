@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <tr>
                            <th>Invoice Date</th>
                            <th>Invoice Number</th>
                            <th>Customer</th>
                            <th>Total Amount</th>
                            <th></th>
                        </tr>
                        @foreach ($invoices as $item)
                            <tr>
                                <td>{{ $item->invoice_date }}</td>
                                <td>{{ $item->invoice_number }}</td>
                                <td>{{ $item->customer->name }}</td>
                                <td>{{ number_format($item->total_amount, 2) }}</td>
                                <td>
                                    <a href="{{ route('invoices.show', $item->id) }}" class="btn btn-sm btn-info">View invoice</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
