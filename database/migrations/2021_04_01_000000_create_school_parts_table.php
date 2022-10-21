<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolPartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_parts', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->comment('id');
            $table->date('date_key')->comment('何年何月何日');
            $table->integer('part')->comment('何部');
            $table->integer('frame_num')->default(0)->comment('開講枠数');
            $table->integer('school_place')->comment('開講場所');
            $table->timestamp('created_at')->useCurrent()->comment('登録日時');
            $table->timestamp('updated_at')->default(DB::raw('current_timestamp on update current_timestamp'))->comment('更新日時');
            $table->softDeletes()->comment('削除日時');
            $table->index(['school_place', 'date_key', 'part'], 'school_parts_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school_parts');
    }
}
