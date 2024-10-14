<?php

namespace Tests\Feature;

use App\Models\Voucher;
use Database\Seeders\VoucherSeeder;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UuidTest extends TestCase
{
    protected function setUp(): void{
        parent::setUp();
            DB::delete("delete from vouchers");
    }

    public function testUuids(){
        $vouchers = new Voucher();
        $vouchers->name = "Sample Vouchers";
        // $vouchers->voucher_code = "12131312131213"; // jika ingin voucher code sebagai uuid
        $vouchers->save();

        self::assertNotNull($vouchers->id);
        self::assertNotNull($vouchers->voucher_code);
    }
    public function testSoftDelete(){
        $this->seed(VoucherSeeder::class);
        $voucher = Voucher::query()->where('name', 'Sample Voucher')->first();
        $voucher->delete();
        $voucher = Voucher::query()->where('name', 'Sample Voucher')->first();
        self::assertNull($voucher);
        $voucher = Voucher::withTrashed()->where('name', 'Sample Voucher')->first();
        self::assertNotNull($voucher);
    }
}
