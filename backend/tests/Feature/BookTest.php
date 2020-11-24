<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookTest extends TestCase
{
	private const LOCAL_API_URL = 'http://127.0.0.1:8000/api/';
	private $mockId = 0;

    /**
     * A basic feature test example.
     *
     * @return void
     */


    public function testStore()
    {
    	$response = $this->json('POST', self::LOCAL_API_URL . 'book',
    	                        [
    	                        	'author' => 'Fawcet',
    	                        	'rating_information' => 'Livro muito interessante para o público de dados',
    	                        	'title' => 'Data Science para negócios'
    	                        ]);
    	$response->assertStatus(200);
    }

    public function testStoreAndShow() {
    	$response = $this->json('POST', self::LOCAL_API_URL . 'book',
    	                        [
    	                        	'author' => 'Fawcet',
    	                        	'rating_information' => 'Livro muito interessante para o público de dados',
    	                        	'title' => 'Data Science para negócios'
    	                        ]);
    	$response->assertStatus(200);
    	$this->mockId = $response->decodeResponseJson()['id'];
    	$response = $this->getJson(self::LOCAL_API_URL . 'book/' . $this->mockId);
    	$response->assertStatus(200);
    }

    public function testInvalidStore()
    {
    	$response = $this->json('POST', self::LOCAL_API_URL . 'book',
    	                        [
    	                        	'author' => 'Fawcet',
    	                        	'rating_information' => 'Livro muito interessante para o público de dados',
    	                        	'title' => ''
    	                        ]);
    	$response->assertStatus(422);
    }

    public function testStoreAndUpdate()
    {

    	$response = $this->json('POST', self::LOCAL_API_URL . 'book',
    	                        [
    	                        	'author' => 'Fawcet',
    	                        	'rating_information' => 'Livro muito interessante para o público de dados',
    	                        	'title' => 'Data Science para negócios'
    	                        ]);
    	$response->assertStatus(200);
    	$this->mockId = $response->decodeResponseJson()['id'];
    	$response = $this->putJson(self::LOCAL_API_URL . 'book/' . $this->mockId,
    	                           [
    	                           	'author' => 'Fawcet',
    	                           	'rating_information' => 'Livro muito interessante para o público de dados',
    	                           	'title' => 'Título novo'
    	                           ]);
    	$response->assertStatus(200);
    }

    public function testStoreAndDestroy()
    {
    	$response = $this->json('POST', self::LOCAL_API_URL . 'book',
    	                        [
    	                        	'author' => 'Fawcet',
    	                        	'rating_information' => 'Livro muito interessante para o público de dados',
    	                        	'title' => 'Data Science para negócios'
    	                        ]);
    	$response->assertStatus(200);
    	$this->mockId = $response->decodeResponseJson()['id'];
    	$response = $this->deleteJson(self::LOCAL_API_URL . 'book/' . $this->mockId);
    	$response->assertStatus(200);
    }

    public function testInvalidDelete() {
    	$response = $this->deleteJson(self::LOCAL_API_URL . 'book/-1');
    	$response->assertStatus(404);
    }
}