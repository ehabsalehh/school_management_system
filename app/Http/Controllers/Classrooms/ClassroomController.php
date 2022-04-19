<?php
namespace App\Http\Controllers\Classrooms;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\storedRequestedClassRoom;
use App\Interfaces\ClassroomRepositoryInterface;

class ClassroomController extends Controller
{
    protected $classroom;

    public function __construct(ClassroomRepositoryInterface $classroom)
    {
        $this->classroom = $classroom;
    }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {

      return $this->classroom->index();
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(storedRequestedClassRoom $request)
  {
    return $this->classroom->store($request);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request)
  {
    return $this->classroom->update($request);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request)
  {
    
    return $this->classroom->destroy($request);

  }
  public function delete_all(Request $request)
    {
        return $this->classroom->delete_all($request);

    }


    public function Filter_Classes(Request $request)
    {
        return $this->classroom->Filter_Classes($request);

    }

}

?>
