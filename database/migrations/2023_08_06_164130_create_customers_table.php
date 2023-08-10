<?php

use App\Domain\Customer\Models\Customer;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function down(): void
    {
        Schema::dropIfExists(Customer::TABLE);
    }

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(Customer::TABLE, function (Blueprint $table) {
            $table->uuid('uuid')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('username');
            $table->string('gender');
            $table->string('country');
            $table->string('city');
            $table->string('phone');
            $table->string('password');
            $table->timestamps();
            $table->softDeletes();
            $table->primary('uuid');
            if (\app()->runningUnitTests() === false) {
                $table->fullText('email', Customer::SEARCHABLE_INDEX_EMAIL);
            }
        });
    }
};
