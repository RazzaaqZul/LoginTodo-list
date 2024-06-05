<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodolistControllerTest extends TestCase
{

    // mencoba menambahkan todolist
  public function testTodolist()
  {
    $this->withSession([
        "user"=> "rajak",
        "todolist" => [
            [
                "id"=> 1,
                "todo"=> "rajak",
            ]
        ]
    ])->get('/todolist')
    ->assertSeeText('1')
    ->assertSeeText('rajak');
  }


  public function testAddFailed()
  {
    $this->withSession([
        "user"=>"rajak"
    ])->post("/todolist",[])
    ->assertSeeText("Todo is required");
  }

  public function testAddTodoSuccess()
  {
    $this->withSession([
        "user"=> "rajak"
        ])->post("/todolist",[
            "todo" => "zul"
        ])->assertSeeText("/todolist");
  }

  public function testRemoveTodolist()
  {
    $this->withSession([
        "user"=> "rajak",
        "todolist" => [
            [
                "id"=> 1,
                "todo"=> "rajak",
            ],
            [
                "id"=> 1,
                "todo"=> "rajak",
            ]
        ]
    ])->post('/todolist/1/delete')
    ->assertRedirect('/todolist');
    }
}
