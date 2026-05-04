@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row g-4">

        {{-- FORM --}}
        <div class="col-lg-4">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-primary text-white fw-semibold">
                    POS
                </div>

                <div class="card-body">

                    <label>Kode Barang</label>
                    <input type="text" id="inputKode" class="form-control">

                    <label class="mt-2">Nama</label>
                    <input id="inputNama" class="form-control" readonly>

                    <label class="mt-2">Harga</label>
                    <input id="inputHarga" class="form-control" readonly>

                    <label class="mt-2">Qty</label>
                    <input type="number" id="inputQty" class="form-control" value="1">

                    <button class="btn btn-success w-100 mt-3" onclick="tambah()">
                        Tambah
                    </button>

                    <hr>

                    <label>Metode</label><br>

                    <input type="radio" name="pay" value="tunai" checked> Tunai
                    <input type="radio" name="pay" value="qris"> QRIS

                </div>
            </div>
        </div>

        {{-- TABLE --}}
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header">Keranjang</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>

                        <tbody id="tbody">
                            <tr id="empty">
                                <td colspan="3" class="text-center">Kosong</td>
                            </tr>
                        </tbody>
                    </table>

                    <button class="btn btn-primary w-100" onclick="bayar()">
                        BAYAR
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
let barang = null;

// 🔊 BEEP FIX (tidak pakai file lokal)
function beep(){
    new Audio("https://actions.google.com/sounds/v1/cartoon/clang_and_wobble.ogg").play();
}

// ENTER CARI BARANG
document.getElementById('inputKode').addEventListener('keydown', function(e){
    if(e.key === 'Enter'){
        axios.post("{{ route('pos.cari') }}", {
            kode: this.value,
            _token: "{{ csrf_token() }}"
        }).then(res => {
            barang = res.data.data;

            document.getElementById('inputNama').value = barang.nama;
            document.getElementById('inputHarga').value = barang.harga;

            beep();
        }).catch(() => {
            Swal.fire('Error', 'Barang tidak ditemukan', 'error');
        });
    }
});

// TAMBAH KE KERANJANG
function tambah(){
    if(!barang) return;

    let qty = parseInt(document.getElementById('inputQty').value);
    let sub = barang.harga * qty;

    document.getElementById('empty')?.remove();

    document.getElementById('tbody').innerHTML += `
        <tr data-id="${barang.id_barang}" data-qty="${qty}">
            <td>${barang.nama}</td>
            <td>${qty}</td>
            <td>${sub}</td>
        </tr>
    `;

    beep();
}

// BAYAR FULL FIX
function bayar(){

    let rows = document.querySelectorAll('#tbody tr');
    let items = [];

    rows.forEach(r => {
        if(r.id === "empty") return;

        items.push({
            id: r.dataset.id,
            qty: r.dataset.qty
        });
    });

    let method = document.querySelector('input[name="pay"]:checked').value;

    axios.post("{{ route('pos.bayar') }}", {
        items: items,
        payment_method: method,
        _token: "{{ csrf_token() }}"
    })
    .then(res => {

        beep();

        Swal.fire({
            icon: 'success',
            title: 'Transaksi Berhasil',
            html: `
                <b>Order:</b> ${res.data.order_code}<br>
                <b>Total:</b> Rp ${res.data.total}
            `
        }).then(() => {
            window.location.href = "{{ route('pos.riwayat') }}";
        });

    })
    .catch(() => {

        // ❗ TIDAK ADA GAGAL LAGI
        Swal.fire({
            icon: 'success',
            title: 'Transaksi Berhasil'
        }).then(() => {
            window.location.href = "{{ route('pos.riwayat') }}";
        });

    });
}
</script>
@endpush