<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
    $permissions = [

        'Bills',
        'All Bills',
        'Paid Bills',
        'Partially Paid Bills',
        'Unpaid Bills',
        'Archive',
        'Reports',
        'Bills Reports',
        'Clients Reports',
        'Clients',
        'Clients Permissions',
        'Clients List',
        'Settings',
        'Products',
        'Sections',


        'Add Invoice',
        'Delete Invoice',
        'Export Excel',
        'Payment Status',
        'Edit Invoice',
        'Archive Invoice',
        'Print Invoice',
        'Add Attachment',
        'Delete Attachment',

        'Add Client',
        'Edit Client',
        'Delete Client',

        'Show Permission',
        'Add Permission',
        'Edit Permission',
        'Delete Permission',

        'Add Product',
        'Edit Product',
        'Delete Product',

        'Add Section',
        'Edit Section',
        'Delete Section',
        'Notifications',

];
foreach ($permissions as $permission) {
Permission::create(['name' => $permission]);
}
}
}
