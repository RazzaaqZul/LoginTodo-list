<?php

namespace App\Services\Impl;

use App\Services\TodolistService;
use Illuminate\Support\Facades\Session;

class TodolistServiceImpl implements TodolistService
{
    public function saveTodo(string $id, string $todo): void
    {
        // check Jika tidak ada di session 
        if(!Session::exists("todolist")){
            // Jika belum, buat todolist
            Session::get("todolist", []);
        }

        // Tambahkan data
        Session::push("todolist", [
            "id"=> $id,
            "todo"=> $todo
        ]);
    }


    public function getTodolist(): array
    {
        // Jika ada ambil todolist
        // Jika tidak ada, isi array kosong
        return Session::get("todolist",[]);
    }

    public function removeTodo(string $todoId): void
    {
        $todolist = Session::get('todolist');

        // index => value
        // key => value
        // Index abaikan, kita ambil value-nya
        foreach($todolist as $index => $value){
            if($value['id'] == $todoId){
                // unset == hapus 
                unset($todolist[$index]);
                break;
            };
        }
        Session::put('todolist', $todolist);
    }
}