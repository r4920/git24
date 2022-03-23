<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->foreign('added_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
        });

        Schema::table('patients', function (Blueprint $table) {
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->foreign('added_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
        });

        Schema::table('notes', function (Blueprint $table) {
            $table->foreign('encounter_id')->references('id')->on('encounters')->onDelete('set null')->onUpdate('set null');
            $table->foreign('provider')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->foreign('added_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('set null')->onUpdate('set null');
            $table->foreign('order_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->foreign('added_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
        });

        Schema::table('enterprises', function (Blueprint $table) {
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->foreign('added_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
        });

        Schema::table('medications', function (Blueprint $table) {
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->foreign('added_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
        });

        Schema::table('departments', function (Blueprint $table) {
            $table->foreign('enterprise')->references('id')->on('enterprises')->onDelete('set null')->onUpdate('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->foreign('added_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
        });

        Schema::table('encounters', function (Blueprint $table) {
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('set null')->onUpdate('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->foreign('added_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
        });

        Schema::table('blogs', function (Blueprint $table) {
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->foreign('added_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
        });

        Schema::table('masters', function (Blueprint $table) {
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->foreign('added_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->foreign('added_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
        });

        Schema::table('appointment_slots', function (Blueprint $table) {
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->foreign('added_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
        });

        Schema::table('appointment_schedules', function (Blueprint $table) {
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->foreign('added_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
        });

        Schema::table('to_dos', function (Blueprint $table) {
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->foreign('added_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
        });

        Schema::table('chat_groups', function (Blueprint $table) {
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->foreign('added_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->foreign('added_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
        });

        Schema::table('plans', function (Blueprint $table) {
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->foreign('added_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
        });

        Schema::table('chat_messages', function (Blueprint $table) {
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->foreign('added_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
        });

        Schema::table('tasks', function (Blueprint $table) {
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->foreign('added_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
        });

        Schema::table('customers', function (Blueprint $table) {
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->foreign('added_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('added_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
        });
    }
}
