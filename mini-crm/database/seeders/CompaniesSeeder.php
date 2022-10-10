<?php

namespace Database\Seeders;

use App\Models\Companies;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Companies::insert([
            'name'=>'Shopee',
            'email'=>'help@support.shopee.co.id',
            'logo'=>'https://upload.wikimedia.org/wikipedia/commons/f/fe/Shopee.svg',
            'website'=>'https://shopee.co.id/'
        ]);
        Companies::insert([
            'name'=>'Tokopedia',
            'email'=>'pr@tokopedia.com',
            'logo'=>'https://jarisnk.com/wp-content/uploads/2019/10/Logo-Tokopedia.png',
            'website'=>'https://www.tokopedia.com/'
        ]);
        Companies::insert([
            'name'=>'Telkom Indonesia',
            'email'=>'corporate_comm@telkom.co.id',
            'logo'=>'https://www.telkom.co.id/data/image_upload/page/1594112773573_compress_PNG%20Logo%20Sekunder%20Telkom.png',
            'website'=>'corporate_comm@telkom.co.id'
        ]);
        Companies::insert([
            'name'=>'Pertamina',
            'email'=>'pcc135@pertamina.com',
            'logo'=>'https://www.pertamina.com/landing/images/logo.png',
            'website'=>'https://www.pertamina.com/'
        ]);
    }
}
