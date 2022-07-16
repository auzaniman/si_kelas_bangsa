<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_member', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->string('panggilan');
            $table->string('username')->unique();
            $table->string('email')->unique();

            $table->string('kelamin');
            $table->string('tempatlahir');
            $table->string('tanggallahir');

            $table->string('provinsi_ktp');
            $table->string('kota_ktp');
            $table->string('kecamatan_ktp');
            $table->string('desa_ktp');
            $table->string('provinsi_domisili')->nullable();
            $table->string('kota_domisili')->nullable();
            $table->string('kecamatan_domisili')->nullable();
            $table->string('desa_domisili')->nullable();

            $table->string('agama');
            $table->string('pendidikan');
            $table->string('pekerjaan');
            $table->string('keahlian');
            $table->string('minat');

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('address')->nullable();
            $table->string('phone_number')->unique();
            $table->string('no_wa')->unique();

            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();
            $table->string('tiktok')->nullable();

            $table->string('taupksdarimana')->nullable();

            $table->text('profile_photo_url')->nullable();
            $table->text('profile_photo_path')->nullable();

            $table->dateTime('baned_at')->nullable();
            $table->string('google_id')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
