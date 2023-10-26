<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Member;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createMultipleMembers = [
            ["name"=> "Normal"],
            ["name"=> "Member"],
        ];
        Member::insert($createMultipleMembers);
    }
}
