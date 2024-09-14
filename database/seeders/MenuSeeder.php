<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::create([
            'name' => 'Dashboard',
            'on' => 'cms',
            'type' => 'item',
            'icon' => 'o-home',
            'route' => 'cms.dashboard',
            'ordering' => '1',
        ]);

        // Website Setting
        $admin = Menu::create([
            'name' => 'Management',
            'on' => 'cms',
            'type' => 'item',
            'icon' => 'o-cog',
            'route' => '#',
            'ordering' => '90',
        ]);
        $admin->menuChildren()->create([
            'name' => 'Menu',
            'icon' => 'o-bars-4',
            'route' => 'cms.management.menu',
            'ordering' => '1',
        ]);

        $admin->menuChildren()->create([
            'name' => 'Role',
            'icon' => 'o-lock-closed',
            'route' => 'cms.management.role',
            'ordering' => '2',
        ]);
        $admin->menuChildren()->create([
            'name' => 'User',
            'icon' => 'o-users',
            'route' => 'cms.management.user',
            'ordering' => '3',
        ]);
        $admin->menuChildren()->create([
            'name' => 'Setting',
            'icon' => 'o-cog',
            'route' => 'cms.management.general-setting',
            'ordering' => '4',
        ]);
        $admin->menuChildren()->create([
            'name' => 'Access Control',
            'icon' => 'o-key',
            'route' => 'cms.management.access-control',
            'ordering' => '5',
        ]);
    }
}
