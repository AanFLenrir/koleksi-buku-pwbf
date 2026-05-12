<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
=======
use App\Models\Barang;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\MenuModel;
use App\Models\Role;
use App\Models\User;
use App\Models\VendorModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
>>>>>>> 6aa88fca2337b38beb9cbd5d5c8dfb68c97e36e8

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
=======
        // ==================== ROLE ====================
        $roles = [
            ['id_role' => 1, 'role' => 'administrator'],
            ['id_role' => 2, 'role' => 'client'],
            ['id_role' => 3, 'role' => 'vendor'],
            ['id_role' => 4, 'role' => 'customer']
        ];
        foreach ($roles as $role) {
            Role::create($role);
        }

        // ==================== USER ====================
        $users = [
            [
                'name' => 'admin DB',
                'email' => 'alanreceh28@gmail.com',
                'password' => password_hash('11223344', PASSWORD_DEFAULT),
                'id_role' => 1
            ],
            [
                'name' => 'Dimas Cake and Dessert Admin',
                'email' => 'dimasCakeAdmin@mail.com',
                'password' => password_hash('11223344', PASSWORD_DEFAULT),
                'id_role' => 3
            ],
            [
                'name' => 'Yunny Bakery',
                'email' => 'yunnyBakeryAdmin@mail.com',
                'password' => password_hash('11223344', PASSWORD_DEFAULT),
                'id_role' => 3
            ],
            [
                'name' => 'Donut Ranny',
                'email' => 'donutRannyAdmin@mail.com',
                'password' => password_hash('11223344', PASSWORD_DEFAULT),
                'id_role' => 3
            ],
            [
                'name' => 'Guest',
                'email' => 'guest@mail.com',
                'password' => password_hash('11223344', PASSWORD_DEFAULT),
                'id_role' => 4
            ],
        ];
        foreach ($users as $user) {
            User::factory()->create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
                'id_role' => $user['id_role']
            ]);
        }

        // ==================== KATEGORI ====================
        $kategories = [
            ['nama_kategori' => 'Novel', 'kode_kategori' => 'NV'],
            ['nama_kategori' => 'Biografi', 'kode_kategori' => 'BO'],
            ['nama_kategori' => 'Komik', 'kode_kategori' => 'KM'],
        ];
        foreach ($kategories as $kategori) {
            Kategori::create($kategori);
        }

        // ==================== BUKU (10 data) ====================
        $bukus = [
            ['kode_buku' => 'NV-01', 'judul' => 'Home Sweet Loan', 'pengarang' => 'Almira Bastari', 'idkategori' => 1],
            ['kode_buku' => 'BO-01', 'judul' => 'Mohammad Hatta, Untuk Negeriku', 'pengarang' => 'Taufik Abdullah', 'idkategori' => 2],
            ['kode_buku' => 'NV-02', 'judul' => 'Keajaiban Toko Kelontong Namiya', 'pengarang' => 'Keigo Higashino', 'idkategori' => 1],
            ['kode_buku' => 'NV-03', 'judul' => 'Laut Bercerita', 'pengarang' => 'Leila S. Chudori', 'idkategori' => 1],
            ['kode_buku' => 'NV-04', 'judul' => 'Pulang', 'pengarang' => 'Tere Liye', 'idkategori' => 1],
            ['kode_buku' => 'BO-02', 'judul' => 'Soekarno: Biografi Singkat', 'pengarang' => 'Cindy Adams', 'idkategori' => 2],
            ['kode_buku' => 'BO-03', 'judul' => 'Habibie & Ainun', 'pengarang' => 'Bacharuddin Jusuf Habibie', 'idkategori' => 2],
            ['kode_buku' => 'KO-01', 'judul' => 'Doraemon: Nobita dan Pulau Harta', 'pengarang' => 'Fujiko F. Fujio', 'idkategori' => 3],
            ['kode_buku' => 'KO-02', 'judul' => 'One Piece Vol.1', 'pengarang' => 'Eiichiro Oda', 'idkategori' => 3],
            ['kode_buku' => 'KO-03', 'judul' => 'Naruto: Misi Memulai', 'pengarang' => 'Masashi Kishimoto', 'idkategori' => 3],
        ];
        foreach ($bukus as $buku) {
            Buku::create($buku);
        }

        // ==================== BARANG (12 data dengan id_barang manual) ====================
        $barangs = [
            ['id_barang' => 'BRG001', 'nama' => 'Buku Tulis Sidu 38 Lembar', 'harga' => 4000],
            ['id_barang' => 'BRG002', 'nama' => 'Pulpen Pilot G2', 'harga' => 8500],
            ['id_barang' => 'BRG003', 'nama' => 'Pensil 2B Faber-Castell', 'harga' => 3000],
            ['id_barang' => 'BRG004', 'nama' => 'Penghapus Staedtler', 'harga' => 4500],
            ['id_barang' => 'BRG005', 'nama' => 'Penggaris 30 cm', 'harga' => 5000],
            ['id_barang' => 'BRG006', 'nama' => 'Spidol Snowman Permanent', 'harga' => 7000],
            ['id_barang' => 'BRG007', 'nama' => 'Stabilo Boss Original', 'harga' => 12000],
            ['id_barang' => 'BRG008', 'nama' => 'Map Plastik Folio', 'harga' => 3500],
            ['id_barang' => 'BRG009', 'nama' => 'Kertas HVS A4 80gsm (1 Rim)', 'harga' => 65000],
            ['id_barang' => 'BRG010', 'nama' => 'Binder A5', 'harga' => 25000],
            ['id_barang' => 'BRG011', 'nama' => 'Lem Kertas Fox', 'harga' => 6000],
            ['id_barang' => 'BRG012', 'nama' => 'Tipe-X Kenko', 'harga' => 7500],
        ];
        foreach ($barangs as $barang) {
            Barang::create($barang);
        }

        // ==================== VENDOR ====================
        $vendors = [
            ['nama_vendor' => 'Yunny Bakery', 'iduser' => 3],
            ['nama_vendor' => 'Dimas Cake and Dessert', 'iduser' => 2],
            ['nama_vendor' => 'Donut Ranny', 'iduser' => 4],
        ];
        foreach ($vendors as $vendor) {
            VendorModel::create($vendor);
        }

        // ==================== MENU ====================
        $menus = [
            ['nama_menu' => 'Roti Tawar', 'harga' => 15000, 'idvendor' => 1, 'path_gambar' => 'assets/images/menu_images/dimas_bakery/american-heritage-chocolate-vdx5hPQhXFk-unsplash.jpg'],
            ['nama_menu' => 'Croissant Butter', 'harga' => 13000, 'idvendor' => 1, 'path_gambar' => 'assets/images/menu_images/dimas_bakery/lore-schodts-8BNGxSAQd6M-unsplash.jpg'],
            ['nama_menu' => 'Roti Gandum', 'harga' => 13000, 'idvendor' => 1, 'path_gambar' => 'assets/images/menu_images/dimas_bakery/shayna-douglas-CQvFD9HrDyY-unsplash.jpg'],
            ['nama_menu' => 'Sourdough Bread', 'harga' => 25000, 'idvendor' => 1, 'path_gambar' => 'assets/images/menu_images/dimas_bakery/will-echols-P_l1bJQpQF0-unsplash.jpg'],
            ['nama_menu' => 'Tart Buah', 'harga' => 20000, 'idvendor' => 2, 'path_gambar' => 'assets/images/menu_images/ranny_donut/american-heritage-chocolate-vdx5hPQhXFk-unsplash.jpg'],
            ['nama_menu' => 'Lava Cake', 'harga' => 18000, 'idvendor' => 2, 'path_gambar' => 'assets/images/menu_images/ranny_donut/deva-williamson-tW0Ix_Ajg6Y-unsplash.jpg'],
            ['nama_menu' => 'Pudding Coklat', 'harga' => 12000, 'idvendor' => 2, 'path_gambar' => 'assets/images/menu_images/ranny_donut/kaouther-djouada-hcEDfkiVmMI-unsplash.jpg'],
            ['nama_menu' => 'Slice Black Forest', 'harga' => 22000, 'idvendor' => 2, 'path_gambar' => 'assets/images/menu_images/ranny_donut/renders-br-aDHbOYF5flE-unsplash.jpg'],
            ['nama_menu' => 'Donut Glazed', 'harga' => 8000, 'idvendor' => 3, 'path_gambar' => 'assets/images/menu_images/yunny_bakery/katie-rosario-QNyRp21hb5I-unsplash.jpg'],
        ];
        foreach ($menus as $menu) {
            MenuModel::create($menu);
        }
    }
}

