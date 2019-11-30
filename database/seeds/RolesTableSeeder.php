<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $owner = new Role();
		$owner->name         = 'company-owner';
		$owner->display_name = 'Company Owner'; // optional
		$owner->description  = 'User is the owner of a company project'; // optional
		$owner->save();

		$admin = new Role();
		$admin->name         = 'admin';
		$admin->display_name = 'User Administrator'; // optional
		$admin->description  = 'User is allowed to manage and edit other users'; // optional
		$admin->save();


        $role_co_admin = new Role();
        $role_co_admin->name = 'company-admin';
        $role_co_admin->display_name = 'Company Admin';
        $role_co_admin->description = 'User who is an administrator of a company';
        $role_co_admin->save();

        $role_sa_admin = new Role();
        $role_sa_admin->name = 'salon-admin';
        $role_sa_admin->display_name = 'Salon Administrator';
        $role_sa_admin->description = 'A user who manages a salon account under a company';
        $role_sa_admin->save();

        $role_sh_admin = new Role();
        $role_sh_admin->name = 'shop-admin';
        $role_sh_admin->display_name = 'Shop Administrator';
        $role_sh_admin->description = 'A user who manages a shop account under a company';
        $role_sh_admin->save();
        //
        $role_editor = new Role();
        $role_editor->name = 'attendant';
        $role_editor->display_name = 'Attendant';
        $role_editor->description = 'A user who is provides salon or shop services to clients';
        $role_editor->save();

        $role_user = new Role();
        $role_user->name = 'client';
        $role_user->display_name = 'Client';
        $role_user->description = 'A user signed up with a client account to ' . config('app.name');
        $role_user->save();

        $role_guest = new Role();
        $role_guest->name = 'guest';
        $role_guest->display_name = 'Guest User';
        $role_guest->description = 'A user reviewing the system';
        $role_guest->save();
    }
}
