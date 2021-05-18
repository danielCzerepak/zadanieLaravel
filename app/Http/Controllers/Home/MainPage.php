<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class MainPage extends Controller
{
    public function __invoke()
    {
        return view('home.main');

        DB::table('genres')->truncate();
        //DB::table('genres')->delete();

        DB::table('genres')->insert(
            [
                'name' => 'RPG',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        );

        DB::table('genres')->insert(
            [
                [
                    'name' => 'Adventure',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'name' => 'FPS',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]
            ]
        );

        DB::table('genres')->insertOrIgnore(
            [
                [
                    'id' => 1,
                    'name' => 'Adventure 1',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'id' => 11,
                    'name' => 'Adventure',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'id' => 14,
                    'name' => 'Sport',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'id' => 12,
                    'name' => 'FPS',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]
            ]
        );

        DB::table('genres')->insert(
            [
                'name' => 'TPP',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        );

        $id = DB::table('genres')->insertGetId(
            [
                'name' => 'Sim',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        );

        DB::table('genres')
            ->where('id', 14)
            ->update(['name' => 'Strategy']);


        DB::table('genres')
            ->where('id', 14)
            ->delete();
    }
}
