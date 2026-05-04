@extends('layouts.app')

@section('db-page-title', 'Pilih Wilayah')
@section('icon-page')
    <i class="fa-solid fa-map-location-dot"></i>
@endsection

@section('breadcrumb')
    <x-ui.breadcrumb-item>Pilih Wilayah</x-ui.breadcrumb-item>
@endsection

@section('content')
    <div class="container mt-1" style="padding-left:0">

        <a href="{{ route('show-wilayah-axios') }}" class="btn btn-primary mb-3">
            Pindah Metode Axios
        </a>

        <div class="card shadow mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Pilih Wilayah (AJAX)</h5>
            </div>

            <div class="card-body">
                <div class="mb-3 align-items-center">
                    <div class="row">
                        <label class="col-sm-3 col-form-label">Provinsi:</label>
                        <div class="col-sm-9">
                            <select id="select_provinsi" required>
                                <option value="0">-- Pilih Provinsi --</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-3 col-form-label">Kota:</label>
                        <div class="col-sm-9">
                            <select id="select_kota" required>
                                <option value="0">-- Pilih Provinsi Dahulu --</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-3 col-form-label">Kecamatan:</label>
                        <div class="col-sm-9">
                            <select id="select_kecamatan" required>
                                <option value="0">-- Pilih Kota Dahulu --</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-3 col-form-label">Kelurahan:</label>
                        <div class="col-sm-9">
                            <select id="select_kelurahan" required>
                                <option value="0">-- Pilih Kecamatan Dahulu --</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="button" id="kirim_wilayah" class="btn btn-success col-sm-3">
                            Kirim
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/slim-select@latest/dist/slimselect.js"></script>
@endpush

@push('script')
    <script>
        $(document).ready(function () {
            // Inisialisasi SlimSelect
            new SlimSelect({ select: '#select_provinsi' })
            new SlimSelect({ select: '#select_kota' })
            new SlimSelect({ select: '#select_kecamatan' })
            new SlimSelect({ select: '#select_kelurahan' })

            let wilayah_answer = {
                prov: {
                    id: '',
                    name: ''
                },
                kota: {
                    id: '',
                    name: ''
                },
                kecamatan: {
                    id: '',
                    name: ''
                },
                kelurahan: {
                    id: '',
                    name: ''
                },
            }

            let prov_select = $('#select_provinsi')
            let kota_select = $('#select_kota')
            let kecamatan_select = $('#select_kecamatan')
            let kelurahan_select = $('#select_kelurahan')

            // Load Provinsi
            $.ajax({
                url: "{{ route('get-provinsi') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function (response) {
                    let provinsi_list = response.data.provinsi
                    provinsi_list.forEach((p) => {
                        let opt = $("<option>", {
                            text: p.name,
                            value: p.id
                        })
                        opt.appendTo(prov_select)
                    })
                    prov_select.next().slim.update()
                },
                error: function (err) {
                    console.error(err)
                    Swal.fire('Error', 'Gagal memuat data provinsi', 'error')
                }
            })

            // Provinsi change
            prov_select.change(function (e) {
                if (this.value != '0') {
                    wilayah_answer.prov.id = this.value
                    wilayah_answer.prov.name = $(this).find(`option[value=${this.value}]`).text()
                }

                if (this.value == '0') {
                    let def_opt = $("<option>", {
                        text: '-- Pilih Provinsi Dahulu --',
                        value: '0'
                    })
                    kota_select.html(def_opt)
                    kota_select.next().slim.update()
                    return
                }

                let load_opt = $("<option>", {
                    text: '-- Loading... --',
                    value: '0'
                })
                kota_select.html(load_opt)
                kota_select.next().slim.update()

                $.ajax({
                    url: "{{ route('get-kota') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id_provinsi: this.value
                    },
                    success: function (response) {
                        let kota_list = response.data.kota
                        if (kota_list.length > 0) {
                            let def_opt = $("<option>", {
                                text: '-- Pilih Kota --',
                                value: '0'
                            })
                            kota_select.html(def_opt)

                            kota_list.forEach((k) => {
                                let opt = $("<option>", {
                                    text: k.name,
                                    value: k.id
                                })
                                opt.appendTo(kota_select)
                            })
                            kota_select.next().slim.update()
                        }
                    },
                    error: function (err) {
                        console.error(err)
                        Swal.fire('Error', 'Gagal memuat data kota', 'error')
                    }
                })
            })

            // Kota change
            kota_select.change(function (e) {
                if (this.value != '0') {
                    wilayah_answer.kota.id = this.value
                    wilayah_answer.kota.name = $(this).find(`option[value=${this.value}]`).text()
                }

                if (this.value == '0') {
                    let def_opt = $("<option>", {
                        text: '-- Pilih Kota Dahulu --',
                        value: '0'
                    })
                    kecamatan_select.html(def_opt)
                    kecamatan_select.next().slim.update()
                    return
                }

                let load_opt = $("<option>", {
                    text: '-- Loading... --',
                    value: '0'
                })
                kecamatan_select.html(load_opt)
                kecamatan_select.next().slim.update()

                $.ajax({
                    url: "{{ route('get-kecamatan') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id_kota: this.value
                    },
                    success: function (response) {
                        let kecamatan_list = response.data.kecamatan
                        if (kecamatan_list.length > 0) {
                            let def_opt = $("<option>", {
                                text: '-- Pilih Kecamatan --',
                                value: '0'
                            })
                            kecamatan_select.html(def_opt)

                            kecamatan_list.forEach((k) => {
                                let opt = $("<option>", {
                                    text: k.name,
                                    value: k.id
                                })
                                opt.appendTo(kecamatan_select)
                            })
                            kecamatan_select.next().slim.update()
                        }
                    },
                    error: function (err) {
                        console.error(err)
                        Swal.fire('Error', 'Gagal memuat data kecamatan', 'error')
                    }
                })
            })

            // Kecamatan change
            kecamatan_select.change(function (e) {
                if (this.value != '0') {
                    wilayah_answer.kecamatan.id = this.value
                    wilayah_answer.kecamatan.name = $(this).find(`option[value=${this.value}]`).text()
                }

                if (this.value == '0') {
                    let def_opt = $("<option>", {
                        text: '-- Pilih Kecamatan Dahulu --',
                        value: '0'
                    })
                    kelurahan_select.html(def_opt)
                    kelurahan_select.next().slim.update()
                    return
                }

                let load_opt = $("<option>", {
                    text: '-- Loading... --',
                    value: '0'
                })
                kelurahan_select.html(load_opt)
                kelurahan_select.next().slim.update()

                $.ajax({
                    url: "{{ route('get-kelurahan') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id_kecamatan: this.value
                    },
                    success: function (response) {
                        let kelurahan_list = response.data.kelurahan
                        if (kelurahan_list.length > 0) {
                            let def_opt = $("<option>", {
                                text: '-- Pilih Kelurahan --',
                                value: '0'
                            })
                            kelurahan_select.html(def_opt)

                            kelurahan_list.forEach((k) => {
                                let opt = $("<option>", {
                                    text: k.name,
                                    value: k.id
                                })
                                opt.appendTo(kelurahan_select)
                            })
                            kelurahan_select.next().slim.update()
                        }
                    },
                    error: function (err) {
                        console.error(err)
                        Swal.fire('Error', 'Gagal memuat data kelurahan', 'error')
                    }
                })
            })

            // Kelurahan change
            kelurahan_select.change(function (e) { 
                if (this.value != '0') {
                    wilayah_answer.kelurahan.id = this.value
                    wilayah_answer.kelurahan.name = $(this).find(`option[value=${this.value}]`).text()
                }
            })

            // Kirim button
            $('#kirim_wilayah').click(function (e) {
                e.preventDefault()

                console.log(wilayah_answer)
                Swal.fire({
                    title: "<strong>Your Answer</strong>",
                    icon: "success",
                    html: `
                        provinsi: ${wilayah_answer.prov.name || '(not chosen)'} <br>
                        kota: ${wilayah_answer.kota.name || '(not chosen)'} <br>
                        kecamatan: ${wilayah_answer.kecamatan.name || '(not chosen)'} <br>
                        kelurahan: ${wilayah_answer.kelurahan.name || '(not chosen)'} <br>
                    `,
                    showCloseButton: true,
                    focusConfirm: false,
                    confirmButtonText: `<i class="fa fa-thumbs-up"></i> Great!`,
                    confirmButtonAriaLabel: "Thumbs up, great!",
                })
            })
        });
    </script>
@endpush

@push('page_style')
    <link href="https://unpkg.com/slim-select@latest/dist/slimselect.css" rel="stylesheet">
@endpush