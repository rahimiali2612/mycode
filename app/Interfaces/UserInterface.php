<?php

namespace App\Interfaces;

interface UserInterface
{
    public function index();

    public function update($request);
    
    public function updatePassword($request);

    public function show($id);

    public function delete($id);

    public function store($request);

    public function create();
}