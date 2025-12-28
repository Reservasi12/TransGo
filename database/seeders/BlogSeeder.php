<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get admin user for author
        $adminUser = User::where('role', 'admin')->first();

        if (!$adminUser) {
            // If no admin user exists, create one
            $adminUser = User::create([
                'name' => 'Admin User',
                'email' => 'admin@transgo.test',
                'password' => bcrypt('password'),
                'phone' => '081234567890',
                'role' => 'admin',
                'is_active' => true,
            ]);
        }

        // Create sample blogs
        Blog::create([
            'title' => 'Tips Aman dan Nyaman Naik Transportasi Umum',
            'slug' => 'tips-aman-nyaman-naik-transportasi-umum',
            'content' => '<p>Transportasi umum adalah pilihan yang ekonomis dan ramah lingkungan. Namun, perjalanan dengan transportasi umum bisa jadi tidak nyaman jika tidak dilakukan dengan persiapan yang matang. Berikut beberapa tips agar perjalanan Anda aman dan nyaman:</p>

            <ul>
                <li>Periksa jadwal dan rute sebelum berangkat</li>
                <li>Bawa perlengkapan penting seperti air minum dan makanan ringan</li>
                <li>Gunakan masker dan hand sanitizer untuk menjaga kesehatan</li>
                <li>Jaga barang bawaan Anda dengan baik</li>
                <li>Pilih tempat duduk yang strategis dan aman</li>
            </ul>

            <p>Dengan persiapan yang matang, perjalanan dengan transportasi umum bisa menjadi pengalaman yang menyenangkan dan efisien.</p>',
            'excerpt' => 'Tips untuk perjalanan aman dan nyaman menggunakan transportasi umum',
            'author_id' => $adminUser->id,
            'category' => 'Tips & Tricks',
            'tags' => json_encode(['transportasi', 'safety', 'tips']),
            'is_published' => true,
            'published_at' => now()->subDays(5),
        ]);

        Blog::create([
            'title' => 'Destinasi Wisata Terpopuler Tahun Ini',
            'slug' => 'destinasi-wisata-terpopuler-tahun-ini',
            'content' => '<p>Menjelang akhir tahun, banyak wisatawan yang mulai merencanakan perjalanan liburan. Berikut adalah beberapa destinasi wisata terpopuler yang menjadi favorit wisatawan tahun ini:</p>

            <h3>Bali</h3>
            <p>Pulau Dewata tetap menjadi destinasi favorit dengan keindahan alam dan budayanya yang khas.</p>

            <h3>Yogyakarta</h3>
            <p>Kota pelajar ini menawarkan berbagai tempat wisata budaya dan kuliner yang lezat.</p>

            <h3>Lombok</h3>
            <p>Keindahan pantai dan gunungnya membuat Lombok menjadi alternatif destinasi wisata yang menarik.</p>',
            'excerpt' => 'Kumpulan destinasi wisata terpopuler yang menjadi favorit wisatawan',
            'author_id' => $adminUser->id,
            'category' => 'Travel',
            'tags' => json_encode(['wisata', 'destinasi', 'liburan']),
            'is_published' => true,
            'published_at' => now()->subDays(2),
        ]);

        Blog::create([
            'title' => 'Inovasi Terbaru di Industri Transportasi',
            'slug' => 'inovasi-terbaru-di-industri-transportasi',
            'content' => '<p>Industri transportasi terus berkembang dengan berbagai inovasi terbaru yang membuat perjalanan menjadi lebih efisien dan nyaman. Berikut beberapa inovasi yang sedang tren:</p>

            <h3>Transportasi Berbasis Aplikasi</h3>
            <p>Aplikasi pemesanan transportasi membuat perjalanan menjadi lebih mudah dan terencana.</p>

            <h3>Kendaraan Listrik</h3>
            <p>Untuk mengurangi emisi karbon dan menciptakan transportasi yang lebih ramah lingkungan.</p>

            <h3>Sistem Booking Online</h3>
            <p>Membantu pengguna merencanakan perjalanan dengan lebih baik dan menghindari antrean panjang.</p>',
            'excerpt' => 'Berbagai inovasi terbaru yang mengubah industri transportasi',
            'author_id' => $adminUser->id,
            'category' => 'Technology',
            'tags' => json_encode(['transportasi', 'inovasi', 'teknologi']),
            'is_published' => true,
            'published_at' => now()->subDays(1),
        ]);
    }
}
