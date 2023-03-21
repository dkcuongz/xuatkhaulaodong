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
            'has_post' => 0,
        ]);
        Categories::create([
            'parent_id' => 0,
            'name' => 'Giới thiệu',
            'slug' => 'gioi-thieu',
            'has_post' => 1,
        ]);
        Categories::create([
            'parent_id' => 0,
            'name' => 'Lao động nhật bản',
            'slug' => 'lao-dong-nhat-ban',
            'has_post' => 0,
        ]);
        Categories::create([
            'parent_id' => 3,
            'name' => 'Thực tập sinh',
            'slug' => 'thuc-tap-sinh',
            'has_post' => 1,
        ]);
        Categories::create([
            'parent_id' => 3,
            'name' => 'Kỹ thuật viên',
            'slug' => 'ky-thuat-vien',
            'has_post' => 1,
        ]);
        Categories::create([
            'parent_id' => 3,
            'name' => 'Thông tin đơn hàng',
            'slug' => 'thong-tin-don-hang',
            'has_post' => 1,
        ]);
        Categories::create([
            'parent_id' => 0,
            'name' => 'Hoạt động PTM',
            'slug' => 'hoat-dong-ptm',
            'has_post' => 0,
        ]);
        Categories::create([
            'parent_id' => 7,
            'name' => 'PTMTV',
            'slug' => 'ptmtv',
            'has_post' => 1,
        ]);
        Categories::create([
            'parent_id' => 7,
            'name' => 'Tin tức PTM',
            'slug' => 'tin-tức-ptm',
            'has_post' => 1,
        ]);
        Categories::create([
            'parent_id' => 0,
            'name' => 'Góc Nhật bản',
            'slug' => 'goc-nhat-ban',
            'has_post' => 1,
        ]);
        Categories::create([
            'parent_id' => 0,
            'name' => 'Liên hệ',
            'slug' => 'lien-he',
            'has_post' => 0,
        ]);

        Categories::create([
            'parent_id' => 10,
            'name' => 'Đăng ký tư vấn',
            'slug' => 'dang-ky-tu-van',
            'has_post' => 0,
        ]);
    }
}
