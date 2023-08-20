@extends("layouts.main")

@section("container")
    <div class="mt-3">
        <a href="/withdraw/add" type="button" class="btn btn-danger">Withdraw</a>
    </div>

    <div class="mt-4">
        <p>Withdraw</p>
        <table class="table table-bordered border-black">
            <thead>
                <tr>
                    <th>Order Id</th>
                    <th>Amount</th>
                    <th>Timestamp</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cash as $csh)
                    <tr>
                        <th>{{ $csh->orderId }}</th>
                        <td>Rp. {{ number_format($csh->amount, 2) }}</td>
                        <td>{{ $csh->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection