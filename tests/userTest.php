<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class userTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @test
     */
    public function testExample()
    {
    	$this->visit('/admin/store');
    }
}
