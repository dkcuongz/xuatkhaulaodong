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
            'name' => 'Tin tức',
            'slug' => 'tin-tuc',
            'has_child' => 1,
        ]);
        Categories::create([
            'parent_id' => 0,
            'name' => 'XKLĐ Nhật Bản',
            'slug' => 'xkld-nhat-ban',
            'has_child' => 1,
        ]);
        Categories::create([
            'parent_id' => 0,
            'name' => 'Du học Nhật Bản',
            'slug' => 'du-hoc',
            'has_child' => 1,
        ]);
        Categories::create([
            'parent_id' => 0,
            'name' => 'Học nghề',
            'slug' => 'hoc-nghe',
            'has_child' => 1,
        ]);
        Categories::create([
            'parent_id' => 0,
            'name' => 'Hỗ trợ',
            'slug' => 'ho-tro',
            'has_child' => 1,
        ]);
        Categories::create([
            'parent_id' => 0,
            'name' => 'Giới thiệu',
            'slug' => 'gioi-thieu',
            'has_child' => 0,
        ]);
        Categories::create([
            'parent_id' => 0,
            'name' => 'Chính sách',
            'slug' => 'chinh-sach',
            'has_child' => 0,
        ]);
        Categories::create([
            'parent_id' => 0,
            'name' => 'Liên hệ',
            'slug' => 'lien-he',
            'has_child' => 0,
        ]);
        Categories::create([
            'parent_id' => 1,
            'name' => 'Lịch thi tuyển',
            'slug' => 'lich-thi-tuyen',
            'has_child' => 0,
        ]);
        Categories::create([
            'parent_id' => 1,
            'name' => 'Tổ chức thi tuyển',
            'slug' => 'to-chuc-thi-tuyen',
            'has_child' => 0,
        ]);
        Categories::create([
            'parent_id' => 1,
            'name' => 'Thực tập sinh, lao động',
            'slug' => 'thuc-tap-sinh-lao-dong',
            'has_child' => 0,
        ]);
        Categories::create([
            'parent_id' => 2,
            'name' => 'Kỹ sư',
            'slug' => 'ky-su',
            'has_child' => 0,
        ]);
        Categories::create([
            'parent_id' => 2,
            'name' => 'Thực tập sinh',
            'slug' => 'thuc-tap-sinh',
            'has_child' => 0,
        ]);
        Categories::create([
            'parent_id' => 3,
            'name' => 'Học bổng',
            'slug' => 'hoc-bong',
            'has_child' => 0,
        ]);

        Categories::create([
            'parent_id' => 3,
            'name' => 'Không học bổng',
            'slug' => 'khong-hoc-bong',
            'has_child' => 0,
        ]);
        Categories::create([
            'parent_id' => 4,
            'name' => 'Pháp lý',
            'slug' => 'phap-ly',
            'has_child' => 0,
        ]);
        Categories::create([
            'parent_id' => 4,
            'name' => 'Vay vốn',
            'slug' => 'vay-von',
            'has_child' => 0,
        ]);
        Categories::create([
            'parent_id' => 4,
            'name' => 'Làm từ thiện',
            'slug' => 'lam-tu-thien',
            'has_child' => 0,
        ]);
        Categories::create([
            'parent_id' => 4,
            'name' => 'Thắc mắc, hỏi đáp',
            'slug' => 'thac-mac-hoi-dap',
            'has_child' => 0,
        ]);
    }
}
