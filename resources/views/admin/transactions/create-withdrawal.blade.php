@extends('layouts.main')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Withdraw</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Create Withdraw</li>
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
                    <h3 class="card-title">Create Withdraw</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                   <form method="POST" action="{{ route('withdrawal.create') }}">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="hidden" value="Withdraw" id="transaction_type" name="transaction_type" required>
                                    <input type="hidden" value="{{ auth()->id() }}" class="form-control" id="user_id" name="user_id"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="parent_id">Withdraw Amount</label>
                                    <input type="number" value="" class="form-control" id="amount" name="amount" required>
                                    @error('amount')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>

</section>
@endsection
