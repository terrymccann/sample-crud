<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Contact;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $account = Account::create(['name' => 'Crudco Corporation']);

        User::factory()->create([
            'account_id' => $account->id,
            'first_name' => 'Terry',
            'last_name' => 'McCann',
            'email' => 'terry@samplecrud.com',
            'password' => 'secret',
            'owner' => true,
        ]);

        User::factory(10)->create(['account_id' => $account->id]);

        $organizations = Organization::factory(200)
            ->create(['account_id' => $account->id]);

        Contact::factory(200)
            ->create(['account_id' => $account->id])
            ->each(function ($contact) use ($organizations) {
                $contact->update(['organization_id' => $organizations->random()->id]);
            });
    }
}
