<?php
namespace App\Interfaces;
interface SectionRepositoryInterface{
    public function index();
    public function store($request);
    public function update($request);
    // destroy Students
    public function destroy($request);
    public function getclasses($id);

}