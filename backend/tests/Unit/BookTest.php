<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use DateTime;
use App\Book;

class BookTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testFillData()
    {
    	$date = new DateTime();
    	$book = new Book();
    	$book->title = 'Data Science para negócios';
    	$book->author = 'Provost & Fawcet';
    	$book->release_date = $date->format('Y-m-d H:i:s');
    	$this->assertEquals($book->title, 'Data Science para negócios');
    }
}
