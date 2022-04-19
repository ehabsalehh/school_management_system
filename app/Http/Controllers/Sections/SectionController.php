<?php
namespace App\Http\Controllers\Sections;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\storedRequestedSection;
use App\Interfaces\SectionRepositoryInterface;

class SectionController extends Controller
{
  protected $Section;
  public function __construct(SectionRepositoryInterface $Section)
  {
    $this->Section = $Section;
  }
   /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    return $this->Section->index();
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(storedRequestedSection $request)
  {

    return $this->Section->store($request);

  }
  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(storedRequestedSection $request)
  {
    return $this->Section->update($request);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(request $request)
  {

    return $this->Section->destroy($request);


  }

  public function getclasses($id)
    {
      return $this->Section->getclasses($id);
    }
}
