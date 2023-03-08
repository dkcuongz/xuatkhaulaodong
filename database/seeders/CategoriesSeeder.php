<?php

namespace Database\Seeders;

use App\Entities\Categories;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();
        Categories::create([
            'parent_id' => 0,
            'name' => 'TRANG CHỦ',
            'slug' => 'trang-chu',
            'has_child' => 0
        ]);
        Categories::create([
            'parent_id' => 0,
            'name' => 'SẢN PHẨM',
            'slug' => 'san-pham',
            'has_child' => 1
        ]);
        Categories::create([
            'parent_id' => 0,
            'name' => 'HỆ THỐNG VN VHOME',
            'slug' => 'he-thong-vn-vhome',
            'has_child' => 0
        ]);
        Categories::create([
            'parent_id' => 0,
            'name' => 'PHẢN HỒI KHÁCH HÀNG',
            'slug' => 'phan-hoi-khach-hang',
            'has_child' => 0
        ]);
        Categories::create([
            'parent_id' => 0,
            'name' => 'TIN TỨC',
            'slug' => 'tin-tuc',
            'has_child' => 1
        ]);
        Categories::create([
            'parent_id' => 5,
            'name' => 'Hoạt động của VN VHome',
            'slug' => 'hoat-dong-cua-vn-vhome',
            'has_child' => 0
        ]);
        Categories::create([
            'parent_id' => 5,
            'name' => 'Ưu đãi, chính sách',
            'slug' => 'uu-dai-chinh-sach',
            'has_child' => 0
        ]);
        Categories::create([
            'parent_id' => 5,
            'name' => 'Kinh nghiệm nội thất',
            'slug' => 'kinh-nghiem-noi-that',
            'has_child' => 0
        ]);
        Categories::create([
            'parent_id' => 5,
            'name' => 'Tin tức khác',
            'slug' => 'tin-tin-khac',
            'has_child' => 0
        ]);
    }
}
