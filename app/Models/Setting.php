<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = 'settings';

    protected $fillable =[
        'website_name',
        'logo',
        'favicon',
       
        'meta_title',
        'meta_keyword',
        'meta_description',
        'description',
        


        // $table->string('website_name');
        // $table->string('logo');
        // $table->string('favicon')->nullable();
        // $table->text('description')->nullable();
        // $table->timestamps();

        // $table->string('meta_title');
        // $table->text('meta_keyword')->nullable();
        // $table->text('meta_description')->nullable();
    ];
}
