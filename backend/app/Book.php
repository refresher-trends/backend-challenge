<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
	protected $table = 'book';
	public $timestamps = false;
	protected $fillable = ['title', 'author', 'release_date', 'rating_information'];
}
