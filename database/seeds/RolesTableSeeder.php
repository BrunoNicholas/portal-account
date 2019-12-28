<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Permission;
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
        DB::table('permission_role');

        $owner = new Role();
		$owner->name         = 'super-admin';
		$owner->display_name = 'Super Administrator'; // optional
		$owner->description  = 'A technical administrator of the system with full rights'; // optional
		$owner->save();

		$admin = new Role();
		$admin->name         = 'admin';
		$admin->display_name = 'Administrator'; // optional
		$admin->description  = 'The business administrator with full system operation abilities'; // optional
		$admin->save();


        $role_co_admin = new Role();
        $role_co_admin->name = 'company-admin';
        $role_co_admin->display_name = 'Multi Account Holder';
        $role_co_admin->description = 'User who is owns more than one salons, shops or more.';
        $role_co_admin->save();

        $role_sa_admin = new Role();
        $role_sa_admin->name = 'salon-admin';
        $role_sa_admin->display_name = 'Single Salon Account Holder';
        $role_sa_admin->description = 'A user who manages a single salon account profile';
        $role_sa_admin->save();

        $role_sh_admin = new Role();
        $role_sh_admin->name = 'shop-admin';
        $role_sh_admin->display_name = 'Single Shop Account Holder';
        $role_sh_admin->description = 'A user who manages a shop single shop account';
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

        // attaching roles to super-admin
        $permissions = Permission::all();

        foreach ($permissions as $perm) {
            $owner->attachPermission($perm);
        }
        
    }
}
