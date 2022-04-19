<?php 

namespace App\Http\Controllers\Grades;
use App\Http\Controllers\Controller;
use App\Http\Requests\updatedRequestGrades;
use App\Http\Requests\storedRequestGrades;
use App\Interfaces\GradeRepositoryInterface;
use App\Models\Grade;
use App\Models\Classroom;

use Illuminate\Http\Request;


class GradeController extends Controller 
{
  protected $grade;
  public function __construct(GradeRepositoryInterface $grade)
  {
    $this->grade = $grade;
  }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    return $this->grade->index();  
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(storedRequestGrades $request)
  {
    return $this->grade->store($request);  
  
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(updatedRequestGrades $request)
  {
    return $this->grade->update($request);  
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request)
  {
    return $this->grade->destroy($request);  


  }
  
}

?>