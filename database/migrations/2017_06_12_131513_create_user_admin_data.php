<?php

use Illuminate\Database\Migrations\Migration;
use CodeFlix\Models\User as User;

class CreateUserAdminData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $model = \CodeFlix\Models\User::create([
            'name'      => env('ADMIN_DEFAULT_NAME', 'Administrator'),
            'email'     => env('ADMIN_DEFAULT_EMAIL', 'admin@user.com'),
            'password'  => bcrypt(env('ADMIN_DEFAULT_PASSWORD', 'secret')),
            'role'      => \CodeFlix\Models\User::ROLE_ADMIN
        ]);
        $model->verified = true;
        $model->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table = (new User())->getTable();
        \DB::table($table)
            ->where('email', '=', env('ADMIN_DEFAULT_EMAIL', 'admin@user.com'))
            ->delete();
    }
}
