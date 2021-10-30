<?php

namespace App\Http\Controllers\Academy;

use App\Model\Lesson;
use App\Model\Part;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Empty_;
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

class Part_cont extends Controller
{
    public function add(Request $request,$id)
    {
        if ($request->isMethod('post')) {
            $input=$request->all();
            $input['addby']=Auth::user()->id;
            $input['lesson_id']=$id;
            Part::create($input);
            $request->session()->flash('alert-success', __('User was successful added!'));
            return redirect()->back();
        } else {
            $arr['lessonid']=$id;
            return view('Academy.Part.Add_view',$arr);
        }
    }
    public function index($id)
    {
        //$user=Auth::user();
        $Lesson = Lesson::find($id);
        //dd($Lesson);
        //$addby=User::find($user->id);
        if(!is_null($Lesson->Part)) {
            $arr['Parts']=$Lesson->Part;
          //  dd($Lesson->Part);
        }
    else
        $arr['Parts']=array();
        $arr['Lessonid']=$id;
       // $this->getlins3('http://eritqaa.s3.eu-west-3.amazonaws.com/us.mp4');
        return view('Academy.Part.Index_view', $arr);
    }
    public function delete(Request $request, $id)
    {

        $Lesson = Part::find($id);
        $Lesson->delete();
        $request->session()->flash('alert-success', __('User was successful added!'));
        return redirect()->back();

    }
    public function update(Request $request, $id)
    {
        $Part = Part::find($id);

        if ($request->isMethod('post')) {

            $Part->update($request->all());
            $request->session()->flash('alert-success', __('User was successful update'));
            return redirect()->back();
        } else {
            $arr['Part'] = $Part;
            $arr['Lessonid']=$id;
            return view('Academy.Part.Update_view', $arr);
        }

    }
    public function view(Request $request, $id, $type)
    {

        $Part = Part::find($id);

        $arr['Part'] = $Part;
        return view('Academy.Part.View_view', $arr);

    }
    public function getlins3($s3FilePath){
        $BUCKET_NAME = 'eritqaa';
        $IAM_KEY = 'AKIAIRUWWY6W6WDCZFMA';
        $IAM_SECRET = '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';
        require '../vendor/autoload.php';

        // Get the access code
       // $accessCode = $_GET['c'];
//        $accessCode = strtoupper($accessCode);
//        $accessCode = trim($accessCode);
//        $accessCode = addslashes($accessCode);
//        $accessCode = htmlspecialchars($accessCode);
        // Connect to database


  // Get path from db
  $keyPath = $s3FilePath;

  // Get file
  try {
      $s3 = S3Client::factory(
          array(
              'credentials' => array(
                  'key' => $IAM_KEY,
                  'secret' => $IAM_SECRET
              ),
              'version' => 'latest',
              'region'  => 'us-east-2'
          )
      );
     // dd($s3);
      $result = $s3->getObject(array(
          'Bucket' => $BUCKET_NAME,
          'Key'    => $keyPath
      ));
dd($result);
      // Display it in the browser
      header("Content-Type: {$result['ContentType']}");
      header('Content-Disposition: filename="' . basename($keyPath) . '"');
      echo $result['Body'];
  } catch (Exception $e) {
      die("Error: " . $e->getMessage());
  }
    }
}
