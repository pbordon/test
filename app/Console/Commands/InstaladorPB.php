<?php

namespace App\Console\Commands;

use App\Models\Rol;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
 use Illuminate\Support\Str;

class InstaladorPB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:InstaladorPB';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cosas para instalar';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (!$this->verificar()) {
            $rol = $this->crearRolAdmin();
            $usuario = $this->crearUsuarioAdmin();
            $usuario->roles()->attach($rol);
            $this->info("Listo!");
            // ahora relacionarlo
            }else{
                $this->info("Ya esta creado el rol 1");
            }

    }

    private function verificar(){
        return Rol::find(1);
    }

    private function crearRolAdmin() {
        $rol = "Administrador";
        return Rol::create([
     //       'Rol_Id' => 1,
            'Rol_Descripcion' => $rol,
            'Rol_Observacion' => Str::substr($rol, 0, 5),
            'Rol_Activo' => 1]);
    }

    private function crearUsuarioAdmin(){
        return User::create([
            'name' => 'pbordon',
            'email' => 'pbordon@gmail.com',
            'password' => Hash::make('boro2013'),
            'USR_Codigo_SAM' => 'pbordon']);
    }

}
