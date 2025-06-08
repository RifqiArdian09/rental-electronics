<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('rentals', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->after('tool_id');
            $table->unsignedInteger('quantity')->default(1)->after('end_date');
        });
    }

    public function down(): void
    {
        Schema::table('rentals', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn(['user_id', 'quantity']);
        });
    }
};
