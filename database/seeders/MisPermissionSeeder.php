<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class MisPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [

            // =====================
            // Manage Admin
            // =====================
            //sector
            'mis.admin.sector.add',
            'mis.admin.sector.view',
            'mis.admin.sector.edit',
            'mis.admin.sector.delete',
            //department
            'mis.admin.department.add',
            'mis.admin.department.view',
            'mis.admin.department.edit',
            'mis.admin.department.delete',
            //pia
            'mis.admin.pia.add',
            'mis.admin.pia.view',
            'mis.admin.pia.edit',
            'mis.admin.pia.delete',
            //role
            'mis.admin.role.add',
            'mis.admin.role.view',
            'mis.admin.role.edit',
            'mis.admin.role.delete',
            //user
            'mis.admin.user.add',
            'mis.admin.user.view',
            'mis.admin.user.edit',
            'mis.admin.user.delete',

            // =====================
            // Proposal
            // =====================
            'mis.proposal.add',
            'mis.proposal.view',
            'mis.proposal.edit',
            'mis.proposal.delete',
            'mis.proposal.approve-proposal-department-technical',
            'mis.proposal.approve-proposal-department-admin',
            'mis.proposal.approve-proposal-ombadc',

            // =====================
            // Project
            // =====================
            'mis.project.add',
            'mis.project.view',
            'mis.project.edit',
            'mis.project.delete',
            'mis.project.approve-project-department-technical',
            'mis.project.approve-project-department-admin',
            'mis.project.approve-project-ombadc',
            'mis.project.create-component',
            'mis.project.financial-progress',
            'mis.project.approve-project-closing-ombadc',

            // =====================
            // MPR
            // =====================
            'mis.mpr.entry.add',
            'mis.mpr.entry.view',
            'mis.mpr.entry.edit',
            'mis.mpr.entry.delete',
            'mis.mpr.approve-department-technical',
            'mis.mpr.approve-department-admin',
            'mis.mpr.approve-ombadc',

            // =====================
            // Funds
            // =====================
            'mis.fund.release-request-entry',
            'mis.fund.approve-release-department-technical',
            'mis.fund.approve-release-department-admin',
            'mis.fund.approve-release-ombadc',
            'mis.fund.manage-ombadc',

            // =====================
            // MIS Reports
            // =====================
            'mis.report.view-mpr',
            'mis.report.view-qpr',
            'mis.report.view-apr',
            'mis.report.fund-management',
            'mis.report.progress',

            // =====================
            // Dashboard
            // =====================
            'mis.dashboard.view',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                ['name' => $permission]
            );
        }

        // Create Role (Super Admin)
        $admin = Role::firstOrCreate(['name' => 'Super Admin']);
        $admin->syncPermissions(Permission::all());

        // Assign Role to User
        $user = User::find(1);
        $user->syncRoles($admin);
    }
}
