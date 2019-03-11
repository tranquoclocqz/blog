<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('table_setting')->insert([
        	['created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),'name'=>'web_title','value'=>'Trần Quốc Lộc - Laravel app'],
        	['created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),'name'=>'web_description','value'=>'Trần Quốc Lộc - Laravel app'],
        	['created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),'name'=>'seo_title','value'=>'Laravel app'],
        	['created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),'name'=>'seo_keyword','value'=>'Laravel app, Laravel, Tran Quoc Loc'],
        	['created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),'name'=>'seo_description','value'=>'Hello world, my first laravel app'],
        	['created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),'name'=>'code_head','value'=>'<script>var head = \'Code head\';</script>'],
        	['created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),'name'=>'code_body','value'=>'<script>var body = \'Code body\';</script>'],
        	['created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),'name'=>'code_footer','value'=>'<script>var footer = \'Code footer\';</script>'],
        	['created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),'name'=>'screenshot','value'=>'screenshot.png'],
        	['created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),'name'=>'logo','value'=>'logo.png'],
        	['created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),'name'=>'banner','value'=>'banner.png'],
        	['created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),'name'=>'hotline','value'=>'0909 000 000'],
        	['created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),'name'=>'phone','value'=>'0909 000 111'],
        	['created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),'name'=>'zalo','value'=>'0909 111 111'],
        	['created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),'name'=>'fanpage_facebook','value'=>'https://facebook.com/facebookvietnam'],
        	['created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),'name'=>'copyright','value'=>'Tran Quoc Loc'],
        	['created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),'name'=>'author','value'=>'Trần Quốc Lộc'],
        	['created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),'name'=>'address','value'=>'Công viên phần mềm Quang Trung'],
        	['created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),'name'=>'smtp','value'=>''],
        	['created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),'name'=>'mail_password','value'=>''],
        	['created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),'name'=>'mail','value'=>''],
        	['created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),'name'=>'mail_encryption','value'=>'TLS'],
        ]);
    }
}
