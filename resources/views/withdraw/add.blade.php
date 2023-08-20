@extends("layouts.main")

@section("container")
<form action="/withdraw/add" method="post">
    @csrf

    <div class="col-3">
        <label for="amount" class="form-label">Amount</label>
        <input type="number" name="amount" is-invalid min=0 class="form-control" id="amount" placeholder="1.000.000">
        @error('amount')
            <div class="mt-2">
                <p class="text-danger">{{ $message }}</p>
            </div>
        @enderror
    </div>
    <div class="mt-3">
        <button type="submit" class="btn btn-danger">Withdraw</button>
    </div>
</form>
@endsection