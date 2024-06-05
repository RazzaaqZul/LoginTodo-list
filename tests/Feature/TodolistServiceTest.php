<?php

namespace Tests\Feature;

use App\Services\TodolistService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class TodolistServiceTest extends TestCase
{
    private TodolistService $todolistService;

    protected function setUp(): void 
    {
        parent::setUp();

        $this->todolistService = $this->app->make(TodolistService::class);
    }


    // Test TodolistServiceProvider
    public function testTodoListNotNull()
    {
        self::assertNotNull($this->todolistService);
    }

    public function testSaveTodo()
    {
        $this->todolistService->saveTodo("1","rajak");

        $todolist = Session::get("todolist");
        foreach ($todolist as $value){
            self::assertEquals("1", $value['id']);
            self::assertEquals("rajak", $value['todo']);
        }
    }


    // GET jika kosong
    public function testGetTodolistEmpty()
    {
        self::assertEquals([], $this->todolistService->getTodolist());
    }

    // GET jika tidak kosong
    public function testGetTodolistNotEmpty()
    {
        $expected = [[
            'id'=> '1',
            'todo'=> 'rajak',
        ],
        [
            'id'=> '2',
            'todo'=> 'zulkahfi',
        ]];

        $this->todolistService->saveTodo('1','rajak');
        $this->todolistService->saveTodo('2','zulkahfi');

        self::assertEquals($expected, $this->todolistService->getTodolist());
    }


    public function testRemoveTodo()
    {
        $this->todolistService->saveTodo('1','rajak');
        $this->todolistService->saveTodo('2','zulkahfi');

        self::assertEquals(2, sizeof($this->todolistService->getTodolist()));

        // hapus index yg tidak ada
        $this->todolistService->removeTodo('3');

        self::assertEquals(2, sizeof($this->todolistService->getTodolist()));

        // hapus index pertama
        $this->todolistService->removeTodo('1');

        self::assertEquals(1, sizeof($this->todolistService->getTodolist()));

        // hapus index kedua
        $this->todolistService->removeTodo('2');

        self::assertEquals(0, sizeof($this->todolistService->getTodolist()));

    }
}
