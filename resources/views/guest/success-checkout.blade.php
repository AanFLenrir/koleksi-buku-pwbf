@extends('layouts.guest')
@section('title', 'Pesanan Berhasil - Purpily Dessert')

@section('content')
    <div class="row pt-2 pb-5 justify-content-center">
        <div class="col-lg-6 col-md-8 text-center bg-white p-5 rounded-4 shadow-sm">
            <i class="fa-solid fa-circle-check text-success" style="font-size: 5rem;"></i>
            <h2 class="fw-bold mt-4 text-primary">Yeay! Pesanan Berhasil</h2>
            <p class="text-muted fs-5 mb-4">Terima kasih, <strong>{{ $pesanan->nama }}</strong>. Pesanan Anda akan segera diproses.</p>

            <div class="card border-0 bg-light rounded-3 text-start mb-4">
                <div class="card-body p-4">
                    <h5 class="fw-bold border-bottom pb-3 mb-3 text-dark">Rincian Pesanan</h5>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-secondary fw-semibold">Order ID</span>
                        <span class="fw-bold text-dark">{{ $pesanan->order_id }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-secondary fw-semibold">Nomor Meja</span>
                        <span class="fw-bold text-dark">Meja {{ $pesanan->nomor_meja }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-secondary fw-semibold">Metode Pembayaran</span>
                        <span class="fw-bold text-dark text-uppercase">{{ $pesanan->metode_bayar }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-secondary fw-semibold">Status Bayar</span>
                        <span id="statusBadge" class="badge bg-warning text-dark">Pending</span>
                    </div>
                    @if($pesanan->catatan)
                    <div class="d-flex justify-content-between mb-2 mt-3 pt-2 border-top">
                        <span class="text-secondary fw-semibold">Catatan</span>
                        <span class="text-dark fst-italic">{{ $pesanan->catatan }}</span>
                    </div>
                    @endif
                    <hr>
                    <div class="d-flex justify-content-between">
                        <span class="fw-bold fs-5">Total</span>
                        <span class="fw-bold fs-4 text-primary">Rp {{ number_format($pesanan->total, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>

            <button id="checkStatusBtn" class="btn btn-info rounded-pill py-3 px-4 fw-bold w-100 fs-5 mb-2">
                <i class="fa-regular fa-clock me-2"></i>Check Status Pembayaran
            </button>

            <a href="{{ route('products-page') }}" class="btn btn-primary rounded-pill py-3 px-4 fw-bold w-100 fs-5">
                Kembali ke Menu
            </a>
            <p class="text-muted small mt-3">Otomatis kembali dalam <span id="countdown">5</span> detik...</p>
        </div>
    </div>
@endsection

@push('script')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    let seconds = 5;
    const interval = setInterval(() => {
        seconds--;
        $('#countdown').text(seconds);
        if (seconds <= 0) {
            clearInterval(interval);
            window.location.href = '/products';
        }
    }, 1000);

    $('#checkStatusBtn').click(function() {
        let orderId = '{{ $pesanan->order_id }}';
        $.ajax({
            url: '/checkout/status/' + orderId,
            method: 'GET',
            success: function(res) {
                if (res.success) {
                    let status = res.status;
                    let message = '';
                    let badgeClass = '';
                    if (status === 'settlement') {
                        message = '✅ Pembayaran berhasil!';
                        $('#statusBadge').text('Lunas').removeClass('bg-warning').addClass('bg-success');
                    } else if (status === 'pending') {
                        message = '⏳ Pembayaran pending, selesaikan pembayaran.';
                    } else if (status === 'expire') {
                        message = '❌ Pembayaran expired.';
                        $('#statusBadge').text('Expired').removeClass('bg-warning').addClass('bg-danger');
                    } else {
                        message = 'Status: ' + status;
                    }
                    Swal.fire('Info', message, 'info');
                } else {
                    Swal.fire('Error', res.message, 'error');
                }
            },
            error: function() {
                Swal.fire('Gagal', 'Tidak dapat mengambil status.', 'error');
            }
        });
    });
</script>
@endpush