<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class categoryCreate extends TestCase
{
    
   /**@test */
   public function categoryCreateTest(){

    $response = $this->get("admin/category/create");

    $response->assertStatus(200);

    $response->assertSee(Create);
    
   }

   public function categoryEditTest(){
      $response = $this->get("admin/category/edit/{id}");

      $response = assertStatus(200);
   }
}
