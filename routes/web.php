<?php

<<<<<<< HEAD
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BarcodeReaderController; // ← Praktikum 1
use App\Http\Controllers\VendorScanController;    // ← Praktikum 2

// =====================
// AUTH
// =====================
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('google.callback');
Route::get('/verifikasi-otp', function () {
    return view('auth.otp');
})->name('otp.form');
Route::post('/verifikasi-otp', [AuthController::class, 'verifyOtp'])->name('otp.verify');

// =====================
// PROTECTED ROUTES
// =====================
Route::middleware('auth')->group(function () {

    Route::get('/', fn() => redirect()->route('dashboard'));
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/profile', fn() => view('profile'))->name('profile');

    // -------------------------
    // Barang
    // -------------------------
    Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
    Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');
    Route::put('/barang/{barang}', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('/barang/{barang}', [BarangController::class, 'destroy'])->name('barang.destroy');
    Route::post('/barang/cetak-pdf', [BarangController::class, 'cetakPdf'])->name('barang.cetakPdf');
    Route::post('/barang/cetak-pdf-barcode', [BarangController::class, 'cetakPdfBarcode'])->name('barang.cetakPdfBarcode');

    // -------------------------
    // Kategori
    // -------------------------
    Route::resource('kategori', KategoriController::class)->except('show');

    // -------------------------
    // Buku
    // -------------------------
    Route::resource('buku', BukuController::class)->except('show');

    // -------------------------
    // POS
    // -------------------------
    Route::get('/pos', [PosController::class, 'index'])->name('pos.index');
    Route::post('/pos/bayar', [PosController::class, 'bayar'])->name('pos.bayar');
    Route::post('/pos/cari-barang', [PosController::class, 'cariBarang'])->name('pos.cari');
    Route::get('/pos/riwayat', [PosController::class, 'riwayat'])->name('pos.riwayat');

    // -------------------------
    // QR Code Generator (inline, dari modul sebelumnya)
    // -------------------------
    Route::get('/qrcode/{order_code}', function ($order_code) {
        return response(
            \SimpleSoftwareIO\QrCode\Facades\QrCode::size(200)->generate($order_code)
        )->header('Content-Type', 'image/svg+xml');
    })->name('qrcode.generate');

    // -------------------------
    // PDF
    // -------------------------
    Route::get('/pdf/sertifikat', [PdfController::class, 'sertifikat'])->name('pdf.sertifikat');
    Route::get('/pdf/undangan', [PdfController::class, 'undangan'])->name('pdf.undangan');

    // -------------------------
    // Customer (SC3 - Modul Kamera)
    // -------------------------
    Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('/customer/tambah-1', [CustomerController::class, 'create1'])->name('customer.create1');
    Route::post('/customer/tambah-1', [CustomerController::class, 'store1'])->name('customer.store1');
    Route::get('/customer/tambah-2', [CustomerController::class, 'create2'])->name('customer.create2');
    Route::post('/customer/tambah-2', [CustomerController::class, 'store2'])->name('customer.store2');

    // -------------------------
    // Barcode Reader (Praktikum 1)
    // -------------------------
    // Halaman scan barcode dari label tag harga
    Route::get('/barcode-reader', [BarcodeReaderController::class, 'index'])->name('barcode.reader');
    // API: cari barang berdasarkan kode yang dibaca barcode
    Route::get('/barcode-reader/cari/{kode}', [BarcodeReaderController::class, 'cariBarang'])->name('barcode.cari');

    // -------------------------
    // QR Code Reader - Customer (Praktikum 2)
    // -------------------------
    // Halaman sukses pembayaran + generate & simpan QR code
    Route::get('/pos/sukses/{id_pesanan}', [PosController::class, 'paymentSuccess'])->name('pos.sukses');
    // Halaman untuk customer mengakses kembali QR code pesanannya kapan saja
    Route::get('/pesanan/{id}/qrcode', [PosController::class, 'lihatQrCode'])->name('pesanan.qrcode');

    // -------------------------
    // QR Code Reader - Vendor (Praktikum 2)
    // -------------------------
    // Halaman scan QR code dari customer
    Route::get('/vendor/scan-qr', [VendorScanController::class, 'index'])->name('vendor.scan');
    // API: cek detail pesanan berdasarkan id_pesanan dari QR code
    Route::get('/vendor/scan-qr/cek/{id_pesanan}', [VendorScanController::class, 'cekPesanan'])->name('vendor.cekPesanan');

    // -------------------------
    // JS Demo Pages
    // -------------------------
    Route::view('/js-select', 'js.select')->name('js.select');
    Route::view('/js-tabel-biasa', 'js.tabel_biasa')->name('js.tabel_biasa');
    Route::view('/js-tabel-datatables', 'js.tabel_datatables')->name('js.tabel_datatables');
    Route::view('/js-wilayah-ajax', 'js.wilayah_ajax')->name('js.wilayah_ajax');
    Route::view('/js-wilayah-axios', 'js.wilayah_axios')->name('js.wilayah_axios');

    // -------------------------
    // Wilayah API
    // -------------------------
    Route::get('/api/provinsi', [WilayahController::class, 'provinsi'])->name('api.provinsi');
    Route::get('/api/kota/{id}', [WilayahController::class, 'kota'])->name('api.kota');
    Route::get('/api/kecamatan/{id}', [WilayahController::class, 'kecamatan'])->name('api.kecamatan');
    Route::get('/api/kelurahan/{id}', [WilayahController::class, 'kelurahan'])->name('api.kelurahan');

});

// =====================
// MIDTRANS WEBHOOK (tanpa auth & tanpa CSRF)
// =====================
Route::post('/midtrans/webhook', [PosController::class, 'webhook'])->name('midtrans.webhook');
=======
use App\Http\Controllers\{
    BarangController,
    CartController,
    DocumentController,
    GoogleController,
    HomeController,
    MarketVendorController,
    MenuController,
    OtpController,
    PaymentController,
    PenjualanController,
    WilayahController,
    BukuController,
    CategoryController
};
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'landingPage'])->name('landing-page');
Route::get('/products', [HomeController::class, 'productsPage'])->name('products-page');
Route::get('/store/{id}', [HomeController::class, 'storeShow'])->name('store-show');
Route::get('/products/filter', [MenuController::class, 'filterMenu'])->name('api-products-filter');
Route::get('/checkout/status/{orderId}', [PaymentController::class, 'checkStatus'])->name('checkout.status');
Route::get('/cart', [HomeController::class, 'cartShow'])->name('cart-show');
Route::post('/cart', [CartController::class, 'cartPost'])->name('cart-post');
Route::put('/cart', [CartController::class, 'cartUpdateByArray'])->name('cart-put');

Route::get('/checkout', [PaymentController::class, 'goCheckOut'])->name('checkout-show');
Route::post('/checkout/save', [PaymentController::class, 'saveOrder'])->name('checkout-save');
Route::get('/checkout/sukses/{id}', [PaymentController::class, 'suksesShow'])->name('checkout-sukses');
Route::get('/checkout/gagal', [PaymentController::class, 'errorCheckout'])->name('checkout-error');

/*
|--------------------------------------------------------------------------
| Google OAuth Routes
|--------------------------------------------------------------------------
*/
Route::get('/auth/google', [GoogleController::class, 'redirect'])->name('google-login-redirect');
Route::get('/auth/google/callback', [GoogleController::class, 'callback'])->name('google-login-callback');

/*
|--------------------------------------------------------------------------
| OTP Verification (Protected)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/verify-otp', [OtpController::class, 'show'])->name('verify-otp-show');
    Route::post('/verify-otp', [OtpController::class, 'verify'])->name('verify-otp');
});

/*
|--------------------------------------------------------------------------
| Admin Routes (any admin)
|--------------------------------------------------------------------------
*/
Route::middleware('isAnyAdmin')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
});

/*
|--------------------------------------------------------------------------
| Vendor Routes (vendor admin)
|--------------------------------------------------------------------------
*/
Route::middleware('isVendorAdmin')->group(function () {
    Route::get('/store', [HomeController::class, 'storeVendorShow'])->name('store-vendor-show');
    Route::get('/orders', [HomeController::class, 'ordersVendorShow'])->name('orders-vendor-show');
    
    Route::get('/products-vendor', [HomeController::class, 'productsVendorShow'])->name('products-vendor-show');
    Route::get('/products/edit/{id}', [HomeController::class, 'productsVendorEdit'])->name('products-vendor-edit');
    Route::get('/products/add', [HomeController::class, 'productsVendorAdd'])->name('products-vendor-add');

    Route::patch('/products/edit/{id}', [MarketVendorController::class, 'productsVendorPatch'])->name('products-vendor-patch');
    Route::put('/products/add', [MarketVendorController::class, 'productsVendorPut'])->name('products-vendor-put');
    Route::delete('/products/delete/{id}', [MarketVendorController::class, 'productsVendorDelete'])->name('products-vendor-delete');
});

/*
|--------------------------------------------------------------------------
| Administrator Routes
|--------------------------------------------------------------------------
*/
Route::middleware('isAdministrator')->group(function () {
    // Books
    Route::get('/books', [HomeController::class, 'book'])->name('book');
    Route::get('/books/add', [HomeController::class, 'addBook'])->name('add-book');
    Route::get('/books/edit/{id}', [HomeController::class, 'editBook'])->name('edit-book');
    Route::post('/books/add', [BukuController::class, 'createBuku'])->name('create-book');
    Route::patch('/books/edit', [BukuController::class, 'updateBuku'])->name('update-book');
    Route::delete('/books/delete/{id}', [BukuController::class, 'deleteBuku'])->name('delete-book');

    // Book Categories
    Route::get('/book-categories', [HomeController::class, 'bookCategories'])->name('book-categories');
    Route::post('/book-categories/add', [CategoryController::class, 'createCategory'])->name('create-book-categories');
    Route::patch('/book-categories/edit', [CategoryController::class, 'editCategory'])->name('edit-book-categories');
    Route::delete('/book-categories/delete/{id}', [CategoryController::class, 'deleteCategory'])->name('delete-book-categories');
    Route::get('/book-categories/get/{id}', [CategoryController::class, 'getCategoryByID'])->name('get-book-categories');

    // Documents
    Route::get('/document', [HomeController::class, 'createDocument'])->name('create-document');
    Route::get('/document/generate/certificate', [HomeController::class, 'createCertificate'])->name('create-certificate');
    Route::post('/document/generate/certificate', [DocumentController::class, 'generateCertificate'])->name('generate-certificate');
    Route::get('/document/generate/invitation', [HomeController::class, 'createInvitation'])->name('create-invitation');
    Route::post('/document/generate/invitation', [DocumentController::class, 'generateInvitation'])->name('generate-invitation');

    // Barang
    Route::get('/barang', [HomeController::class, 'showBarang'])->name('show-barang');
    Route::get('/barang/edit/{id}', [HomeController::class, 'editBarang'])->name('edit-barang');
    Route::patch('/barang/edit', [BarangController::class, 'updateBarang'])->name('api-edit-barang');
    Route::get('/barang/add', [HomeController::class, 'addBarang'])->name('add-barang');
    Route::post('/barang/add', [BarangController::class, 'createBarang'])->name('api-add-barang');
    Route::delete('/barang/delete', [BarangController::class, 'deleteBarang'])->name('api-delete-barang');

    Route::post('/barang/cetak-label', [BarangController::class, 'cetakLabelShow'])->name('cetak-labelBarang-preview');
    Route::post('/barang/cetak-label-final', [DocumentController::class, 'generateLabels'])->name('cetak-labelBarang-final');
    Route::post('/barang/get', [BarangController::class, 'getBarang'])->name('get-barang');
    
    // Demo JQuery Routes
    Route::get('/barang-v2', [HomeController::class, 'showBarangV2'])->name('show-barang-v2');
    Route::get('/barang-v2-datatable', [HomeController::class, 'showBarangV2Datatable'])->name('show-barang-v2-datatable');
    Route::get('/daftar-kota', [HomeController::class, 'daftarKotaShow'])->name('show-kota');
    
    // Demo AJAX Axios Routes
    Route::get('/wilayah', [HomeController::class, 'wilayahShow'])->name('show-wilayah');
    Route::get('/wilayah-axios', [HomeController::class, 'wilayahShowAxios'])->name('show-wilayah-axios');
    Route::get('/pos', [HomeController::class, 'POSShow'])->name('show-POS');
    Route::get('/pos-axios', [HomeController::class, 'POSShowAxios'])->name('show-POS-axios');
    
    // POS Penjualan Routes
    Route::post('/post-penjualan', [PenjualanController::class, 'storePenjualan'])->name('post-penjualan');
    
    // API Routes for Wilayah (AJAX with POST)
    Route::post('/api/get-provinsi', [WilayahController::class, 'getProvinsi'])->name('get-provinsi');
    Route::post('/api/get-kota', [WilayahController::class, 'getKota'])->name('get-kota');
    Route::post('/api/get-kecamatan', [WilayahController::class, 'getKecamatan'])->name('get-kecamatan');
    Route::post('/api/get-kelurahan', [WilayahController::class, 'getKelurahan'])->name('get-kelurahan');
});

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Auth::routes(['reset' => false]);
>>>>>>> 6aa88fca2337b38beb9cbd5d5c8dfb68c97e36e8
