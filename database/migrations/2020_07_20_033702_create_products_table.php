<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('image')->nullable();
            $table->integer('price');
            $table->enum('color',['red','blue','white','black','pink','gold','bronze','silver']);
            $table->enum('ram',['1gb','2gb','3gb','4gb','6gb','8gb','12gb']);
            $table->enum('memory',['8gb','16gb','32gb','64gb','128gb','256gb','512gb']);
            $table->enum('promotion',['phukien','giam5','giam10']);
            $table->enum('speciality',['hot','new','no'])->default('new');
            $table->mediumText('description');
            $table->enum('warranty',['6thang','12thang','24thang'])->default('12thang');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('products');
    }
}
