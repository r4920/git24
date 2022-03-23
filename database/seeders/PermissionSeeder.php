<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return  void
     */
    public function run()
    {
        $permissions = [
            'create_order_item',
            'read_order_item',
            'update_order_item',
            'delete_order_item',
            'create_patient',
            'read_patient',
            'update_patient',
            'delete_patient',
            'create_note',
            'read_note',
            'update_note',
            'delete_note',
            'create_order',
            'read_order',
            'update_order',
            'delete_order',
            'create_enterprise',
            'read_enterprise',
            'update_enterprise',
            'delete_enterprise',
            'create_medication',
            'read_medication',
            'update_medication',
            'delete_medication',
            'create_departments',
            'read_departments',
            'update_departments',
            'delete_departments',
            'create_encounter',
            'read_encounter',
            'update_encounter',
            'delete_encounter',
            'create_blog',
            'read_blog',
            'update_blog',
            'delete_blog',
            'create_master',
            'read_master',
            'update_master',
            'delete_master',
            'create_event',
            'read_event',
            'update_event',
            'delete_event',
            'create_appointment_slot',
            'read_appointment_slot',
            'update_appointment_slot',
            'delete_appointment_slot',
            'create_appointment_schedule',
            'read_appointment_schedule',
            'update_appointment_schedule',
            'delete_appointment_schedule',
            'create_to_do',
            'read_to_do',
            'update_to_do',
            'delete_to_do',
            'create_chat_group',
            'read_chat_group',
            'update_chat_group',
            'delete_chat_group',
            'create_comment',
            'read_comment',
            'update_comment',
            'delete_comment',
            'create_plan',
            'read_plan',
            'update_plan',
            'delete_plan',
            'create_chat_message',
            'read_chat_message',
            'update_chat_message',
            'delete_chat_message',
            'create_task',
            'read_task',
            'update_task',
            'delete_task',
            'create_customer',
            'read_customer',
            'update_customer',
            'delete_customer',
            'create_user',
            'read_user',
            'update_user',
            'delete_user',
            'manage_roles'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
