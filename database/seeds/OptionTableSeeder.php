<?php

use Illuminate\Database\Seeder;

class OptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('options')->insert([
            [
                'key' => 'text_footer',
                'value' => 'Sách không đơn thuần chỉ là những trang giấy mà trong đó còn chứa đựng một thế giới mà con người luôn khao khát được khám phá.',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'key' => 'banner',
                'value' => '1.jpg',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'key' => 'banner',
                'value' => '2.jpg',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'key' => 'banner-sach',
                'value' => 'banner-sach.png',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'key' => 'app',
                'value' => 'wsm_logo.png',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'key' => 'app',
                'value' => 'fask_logo.png',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'key' => 'app',
                'value' => 'fitm.png',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'key' => 'app',
                'value' => 'fclub_logo.png',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'key' => 'app',
                'value' => 'fgas_logo.png',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'key' => 'app',
                'value' => 'fsurvey_logo.png',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'key' => 'app',
                'value' => 'wsm_logo.png',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'key' => 'app-text',
                'value' => 'WSM',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'key' => 'app-text',
                'value' => 'FAsk',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'key' => 'app-text',
                'value' => 'FITM',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'key' => 'app-text',
                'value' => 'FClub',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'key' => 'app-text',
                'value' => 'FGas',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'key' => 'app-text',
                'value' => 'FSurvey',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'key' => 'app-text',
                'value' => 'Fbook',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'key' => 'text_banner',
                'value' => 'Fbook',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'key' => 'text_banner',
                'value' => 'PHP Education',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'key' => 'text_banner',
                'value' => 'We make it awesome!',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'key' => 'text_banner',
                'value' => 'Framgia',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'key' => 'contact',
                'value' => '84-4-3795-5417',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'key' => 'address',
                'value' => '13F Keangnam Landmark 72 Tower, Plot E6, Pham Hung Road, Nam Tu Liem, Ha Noi, Viet Nam.',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'key' => 'email',
                'value' => 'education@framgia.com',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
        ]);
    }
}
