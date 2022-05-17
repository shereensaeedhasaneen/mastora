<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Enums\SystemRoles;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $developer = User::query()->create([
            'name' => 'Developer',
            'email' => 'developer@example.com',
            'password' => Hash::make('12341234'),
            'user_type' => 5,
            'bank_branch_id' => 1,
            'created_at' => now(),
            'account_token' => bin2hex(openssl_random_pseudo_bytes(30)),
        ]);

        $superAdmin = User::query()->create([
            'name' => 'Admin',
            'user_type' => 5,
            'bank_branch_id' => 1,
            'email' => 'admin@example.com',
            'password' => Hash::make('admin@123'),
            'created_at' => now(),
            'creator_id' => $developer->id,
            'account_token' => bin2hex(openssl_random_pseudo_bytes(30)),
        ]);
        $admin = User::query()->create([
            'name' => 'account manger',
            'user_type' => 0,
            'bank_branch_id' => 1,
            'email' => 'lweissnat@example.net',
            'password' => Hash::make('w26$AWPK/$rCrP~D'),
            'created_at' => now(),
            'creator_id' => $developer->id,
            'account_token' => bin2hex(openssl_random_pseudo_bytes(30)),
        ]);

        $admin = User::query()->create([
            'name' => 'account manger aliob',
            'user_type' => 0,
            'bank_branch_id' => 2,
            'email' => 'lweissnataliob@example.net',
            'password' => Hash::make('w26$AWPK/$rCrP~D'),
            'created_at' => now(),
            'creator_id' => $developer->id,
            'account_token' => bin2hex(openssl_random_pseudo_bytes(30)),
        ]);
        $admin = User::query()->create([
            'name' => 'account manger2',
            'user_type' => 0,
            'bank_branch_id' => 1,
            'email' => 'lweissnat2@example.net',
            'password' => Hash::make('w26$AWPK/$rCrP~D'),
            'created_at' => now(),
            'creator_id' => $developer->id,
            'account_token' => bin2hex(openssl_random_pseudo_bytes(30)),
        ]);
        $admin = User::query()->create([
            'name' => 'partneer',
            'user_type' => 1,
            'bank_branch_id' => 1,
            'email' => 'pmurphy@example.com',
            'password' => Hash::make('w26$AWPK/$rCrP~D'),
            'created_at' => now(),
            'creator_id' => $developer->id,
            'account_token' => bin2hex(openssl_random_pseudo_bytes(30)),
        ]);
        $admin = User::query()->create([
            'name' => 'partneer aliob',
            'user_type' => 1,
            'bank_branch_id' => 2,
            'email' => 'pmurphyaliob@example.com',
            'password' => Hash::make('w26$AWPK/$rCrP~D'),
            'created_at' => now(),
            'creator_id' => $developer->id,
            'account_token' => bin2hex(openssl_random_pseudo_bytes(30)),
        ]);
         $admin = User::query()->create([
            'name' => 'partneer 2',
            'user_type' => 1,
            'bank_branch_id' => 1,
            'email' => 'pmurphy2@example.com',
            'password' => Hash::make('w26$AWPK/$rCrP~D'),
            'created_at' => now(),
            'creator_id' => $developer->id,
            'account_token' => bin2hex(openssl_random_pseudo_bytes(30)),
        ]);
        $admin = User::query()->create([
            'name' => 'Admin',
            'user_type' => 2,
            'bank_branch_id' => 1,
            'email' => 'vweber@example.net',
            'password' => Hash::make('w26$AWPK/$rCrP~D'),
            'created_at' => now(),
            'creator_id' => $developer->id,
            'account_token' => bin2hex(openssl_random_pseudo_bytes(30)),
        ]);
        $admin = User::query()->create([
            'name' => 'Admin aliob',
            'user_type' => 2,
            'bank_branch_id' => 2,
            'email' => 'vweberaliob@example.net',
            'password' => Hash::make('w26$AWPK/$rCrP~D'),
            'created_at' => now(),
            'creator_id' => $developer->id,
            'account_token' => bin2hex(openssl_random_pseudo_bytes(30)),
        ]);
        $admin = User::query()->create([
            'name' => 'center manger',
            'user_type' => 3,
            'bank_branch_id' => 1,
            'email' => 'timmy28@example.net',
            'password' => Hash::make('w26$AWPK/$rCrP~D'),
            'created_at' => now(),
            'creator_id' => $developer->id,
            'account_token' => bin2hex(openssl_random_pseudo_bytes(30)),
        ]);

        $admin = User::query()->create([
            'name' => 'account manger aliob 2',
            'user_type' => 0,
            'bank_branch_id' => 2,
            'email' => 'lweissnataliob2@example.net',
            'password' => Hash::make('w26$AWPK/$rCrP~D'),
            'created_at' => now(),
            'creator_id' => 1,
            'account_token' => bin2hex(openssl_random_pseudo_bytes(30)),
        ]);

        
        $admin = User::query()->create([
            'name' => 'partneer aliob2',
            'user_type' => 1,
            'bank_branch_id' => 2,
            'email' => 'pmurphyaliob2@example.com',
            'password' => Hash::make('w26$AWPK/$rCrP~D'),
            'created_at' => now(),
            'creator_id' => 1,
            'account_token' => bin2hex(openssl_random_pseudo_bytes(30)),
        ]);



        $superAdmin->assignRole(SystemRoles::SUPER_ADMIN);
        $developer->assignRole(SystemRoles::DEVELOPER);
    }
}
