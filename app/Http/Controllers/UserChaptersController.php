<?php

namespace App\Http\Controllers;

use App\Chapter;
use Auth;
use Intervention\Image\Facades\Image;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Nullable;

class UserChaptersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view($id)
    {
      $chapter = Chapter::find($id);

      $pathToFile = 'C:/Users/Administrator/Bookflix/storage/app/public/'. $chapter->archivo;

      return response()->file($pathToFile);
    }
}    
