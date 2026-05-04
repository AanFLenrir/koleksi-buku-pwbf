@extends('layouts.app')

@section('content')
<div class="container py-4">

<h3>Riwayat Transaksi</h3>

<table class="table table-bordered">
<thead>
<tr>
    <th>Kode</th>
    <th>Total</th>
    <th>Status</th>
    <th>QR</th>
</tr>
</thead>

<tbody>
@foreach($orders as $o)
<tr>
    <td>{{ $o->order_code }}</td>
    <td>Rp {{ number_format($o->total_amount) }}</td>
    <td>{{ $o->payment_status }}</td>
    <td>
        <img src="/qrcode/{{ $o->order_code }}"
             style="width:120px;height:120px;border:1px solid #000;border-radius:0;">
    </td>
</tr>
@endforeach
</tbody>

</table>

</div>
@endsection