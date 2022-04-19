<?php
namespace App\Interfaces;
interface ClassroomRepositoryInterface
{
   public function index();
   public function store($request);
   public function update($request);
   public function destroy($request);
   public function Filter_Classes($request);
   public function delete_all($request);
}
