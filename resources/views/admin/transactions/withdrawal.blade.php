@extends('layouts.main')
@section('styles')
<style>

</style>

@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>All Withdrawal Transactions</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">All transaction</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            @include('flash-message')

            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title">All Withdrawal Transactions</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Type</th>
                                <th scope="col">Transaction Amount</th>
                                <th scope="col">Fee</th>
                               <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $key => $transaction)
                            <tr>
                                <th scope="row">{{ $transactions->firstItem() + $key }}</th>
                                <td>{{ $transaction->transaction_type }}</td>
                               <td>{{ $transaction->amount }}</td>
                               <td>{{ $transaction->fee }}</td>
                               <td>{{ $transaction->date }}</td>
                                </tr>
                                @endforeach
                                <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                    <ul class="pagination pagination-month justify-content-center">
                        <li class="page-item">
                            <p class="text-center">Showing {{ $transactions->firstItem() }} to
                            {{ $transactions->lastItem() }} of {{ $transactions->total() }} entries</p>
                                {{$transactions->links('pagination::bootstrap-4')}}
                        </li>
                    </ul>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>

</section>
@endsection
