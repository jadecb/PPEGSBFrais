<?php

namespace Tests\Feature;

use App\Helpers\HelperDateFormat;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HelperFormatTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCanFindAndReplaceMonth()
    {
        $date = date('F Y',strtotime('2020-01-25'));
        $formatedDate = HelperDateFormat::replaceMonthToFR($date);
        self::assertStringContainsString('Janvier',$formatedDate);

        $date = date('F Y',strtotime('2020-12-25'));
        $formatedDate = HelperDateFormat::replaceMonthToFR($date);
        self::assertStringContainsString('Décembre',$formatedDate);

        $date = date('F Y',strtotime('2020-07-25'));
        $formatedDate = HelperDateFormat::replaceMonthToFR($date);
        self::assertStringContainsString('Juillet',$formatedDate);
    }
}
