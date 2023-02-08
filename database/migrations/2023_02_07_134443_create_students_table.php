<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Course;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            // katılımcının hangi kursa kayıtlı olduğunu belirtmek için bir ilişki kuruyoruz.
            $table->foreignIdFor(Course::class);
            $table->string('name');
            // doğum tarihi boş olabilir.
            $table->date('birth_date')->nullable();
            // created_at ve updated_at kolonları otomatik olarak oluşturulur.
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
        Schema::dropIfExists('students');
    }
};
