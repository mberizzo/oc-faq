<?php namespace Mberizzo\Faq\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMberizzoFaqCategories extends Migration
{
    public function up()
    {
        Schema::create('mberizzo_faq_categories', function($table)
        {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->string('description')->nullable();
            $table->string('icon');
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(1);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('mberizzo_faq_categories');
    }
}
