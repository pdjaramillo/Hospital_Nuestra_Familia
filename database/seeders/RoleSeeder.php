<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol1  = Role::create(['name' => 'Administrador']);
        $rol2  = Role::create(['name' => 'Cliente']);
        $rol3  = Role::create(['name' => 'Medico']);

        //Funcionalidades
        // ROL ADMIN
        Permission::create(['name' => 'admin.home'])->syncRoles([$rol1]);//menu
        Permission::create(['name' => 'admin.paciente'])->syncRoles([$rol1]);
        Permission::create(['name' => 'admin.clientes'])->syncRoles([$rol1]);
        Permission::create(['name' => 'admin.citas'])->syncRoles([$rol1]);
        Permission::create(['name' => 'admin.medicos'])->syncRoles([$rol1]);
        Permission::create(['name' => 'admin.crearmed'])->syncRoles([$rol1]);
        Permission::create(['name' => 'admin.editarmed'])->syncRoles([$rol1]);
        Permission::create(['name' => 'admin.eliminarmed'])->syncRoles([$rol1]);
        Permission::create(['name' => 'admin.asignarespe'])->syncRoles([$rol1]);
        Permission::create(['name' => 'admin.removerespe'])->syncRoles([$rol1]);
        Permission::create(['name' => 'admin.especialidades.index'])->syncRoles([$rol1]);
        Permission::create(['name' => 'admin.especialidades.create'])->syncRoles([$rol1]);
        Permission::create(['name' => 'admin.especialidades.edit'])->syncRoles([$rol1]);
        Permission::create(['name' => 'admin.especialidades.destroy'])->syncRoles([$rol1]);
        Permission::create(['name' => 'admin.especialidades.update'])->syncRoles([$rol1]);
        Permission::create(['name' => 'cancelarcita'])->syncRoles([$rol1]);
        Permission::create(['name' => 'cliente.crearcliente'])->syncRoles([$rol1]);
        Permission::create(['name' => 'cliente.editarcliente'])->syncRoles([$rol1]);
        Permission::create(['name' => 'cliente.eliminarcliente'])->syncRoles([$rol1]);
        Permission::create(['name' => 'cliente.asignarpaciente'])->syncRoles([$rol1]);
        Permission::create(['name' => 'cliente.removerpaciente'])->syncRoles([$rol1]);
        Permission::create(['name' => 'crearespe'])->syncRoles([$rol1]);
        Permission::create(['name' => 'editarespe'])->syncRoles([$rol1]);
        Permission::create(['name' => 'eliminarespe'])->syncRoles([$rol1]);
        Permission::create(['name' => 'paciente.eliminarpaciente'])->syncRoles([$rol1]);

        // ROL CLIENTE
        Permission::create(['name' => 'cliente.home'])->syncRoles([$rol2]);
        Permission::create(['name' => 'cliente.pacientescliente'])->syncRoles([$rol2]);
        Permission::create(['name' => 'cliente.citas'])->syncRoles([$rol2]);
        Permission::create(['name' => 'cliente.historial'])->syncRoles([$rol2]);
        Permission::create(['name' => 'cliente.pedidosmed'])->syncRoles([$rol2]);
        Permission::create(['name' => 'cliente.regpaciente'])->syncRoles([$rol2]);
        Permission::create(['name' => 'cliente.solicitarcancelarcita'])->syncRoles([$rol2]);

        // ROL MEDICO
        Permission::create(['name' => 'medico.home'])->syncRoles([$rol3]);
        Permission::create(['name' => 'medico.control'])->syncRoles([$rol3]);
        Permission::create(['name' => 'medico.infopaciente'])->syncRoles([$rol3]);
        Permission::create(['name' => 'medico.diagnostico'])->syncRoles([$rol3]);
        Permission::create(['name' => 'paciente.atencioncita'])->syncRoles([$rol3]);

        // Compartidas

        Permission::create(['name' => 'crearcita'])->syncRoles([$rol1,$rol2,$rol3]);
        Permission::create(['name' => 'editarcita'])->syncRoles([$rol1]);
        Permission::create(['name' => 'completarcita'])->syncRoles([$rol1,$rol3]);
        Permission::create(['name' => 'paciente.crearpaciente'])->syncRoles([$rol1,$rol2,$rol3]);
        Permission::create(['name' => 'paciente.editarpaciente'])->syncRoles([$rol1,$rol2,$rol3]);
        Permission::create(['name' => 'paciente.historial'])->syncRoles([$rol2,$rol3]);





 

    }
}
