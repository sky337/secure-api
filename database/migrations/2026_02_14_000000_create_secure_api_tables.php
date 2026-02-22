<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $row) {
            $row->id();
            $row->string('name');
            $row->string('slug')->unique();
            $row->timestamps();
        });

        Schema::create('permissions', function (Blueprint $row) {
            $row->id();
            $row->string('name');
            $row->string('slug')->unique();
            $row->timestamps();
        });

        Schema::create('role_permission', function (Blueprint $row) {
            $row->foreignId('role_id')->constrained()->onDelete('cascade');
            $row->foreignId('permission_id')->constrained()->onDelete('cascade');
            $row->primary(['role_id', 'permission_id']);
        });

        Schema::create('user_role', function (Blueprint $row) {
            $row->foreignId('user_id')->onDelete('cascade');
            $row->foreignId('role_id')->constrained()->onDelete('cascade');
            $row->primary(['user_id', 'role_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('role_user');
        Schema::dropIfExists('permission_role');
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('roles');
    }
};
