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
            'name' => 'Trang Chủ',
            'slug' => 'trang-chu',
        ]);
        Categories::create([
            'parent_id' => 0,
            'name' => 'Giới thiệu',
            'slug' => 'gioi-thieu',
        ]);
        Categories::create([
            'parent_id' => 0,
            'name' => 'Lao động nhật bản',
            'slug' => 'lao-dong-nhat-ban',
        ]);
        Categories::create([
            'parent_id' => 3,
            'name' => 'Thực tập sinh',
            'slug' => 'thuc-tap-sinh',
        ]);
        Categories::create([
            'parent_id' => 3,
            'name' => 'Kỹ thuật viên',
            'slug' => 'ky-thuat-vien',
        ]);
        Categories::create([
            'parent_id' => 3,
            'name' => 'Thông tin đơn hàng',
            'slug' => 'thong-tin-don-hang',
        ]);
        Categories::create([
            'parent_id' => 0,
            'name' => 'Hoạt động',
            'slug' => 'hoat-dong',
        ]);
        Categories::create([
            'parent_id' => 7,
            'name' => 'Kinh nghiệm nội thất',
            'slug' => 'kinh-nghiem-noi-that',
        ]);
        Categories::create([
            'parent_id' => 7,
            'name' => 'Tin tức khác',
            'slug' => 'tin-tin-khac',
        ]);
        Categories::create([
            'parent_id' => 0,
            'name' => 'Góc Nhật bản',
            'slug' => 'goc-nhat-ban',
        ]);
        Categories::create([
            'parent_id' => 0,
            'name' => 'Liên hệ',
            'slug' => 'lien-he',
        ]);

        Categories::create([
            'parent_id' => 10,
            'name' => 'Đăng ký tư vấn',
            'slug' => 'dang-ky-tu-van',
        ]);
    }
}
