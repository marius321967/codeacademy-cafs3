@extends('app')

@section('content')
  <p>Hello, here are the current exchange rates</p>

  <table class="table">
    <thead>
      <tr>
        <th>Symbol</th>
        <th>Rate</th>
      </tr>
    </thead>
    <tbody>

      @foreach ($exchangeRates as $exchangeRate)
      <tr>
        <th>{{ $exchangeRate->symbol }}</th>
        <th>{{ $exchangeRate->rate }}</th>
      </tr>
      @endforeach

    </tbody>
  </table>

@endsection