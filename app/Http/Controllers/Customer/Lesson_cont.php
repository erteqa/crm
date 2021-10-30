<?php

namespace App\Http\Controllers\Customer;

use App\Model\CounterCorse;
use App\Model\Course;
use App\Model\Lesson;
use App\Model\Part;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Lesson_cont extends Controller
{

    /**
     * Lesson_cont constructor.
     */
    public function __construct()
    {
        if (!auth()->guard('customer')->user()) {
            return redirect(route('Customer.login'));
        }
    }
//              echo 'Hello World!<br>';
//$today0 = date("m-d-Y H:i:s");
//$today0  = str_replace('-', '/', $today0 );
//$today =  date("m-d-Y H:i:s",strtotime($today0."+72 hours" ) );
//$to=strtotime( $today0,"+72 hours");
//$to=date("m-d-Y H:i:s", $to);
//$today1 = date("06-19-2019 10:11:10");
//echo  $today .'<br>';
//echo  $today1 .'<br>';
//if($today>$today1)
//echo  'True' .'<br>';
//else
//echo  'False' .'<br>'
//echo  'False' .'<br>'
    public function index(Request $request, $id)
    {
        if (!auth()->guard('customer')->user()) {
            return redirect(route('Customer.login'));
        }
//        $today = date("m-d-Y H:i:s",strtotime( "+72 hours" ) );
//        $today1 = date("06-19-2019 10:11:10");
        $today = date("Y-m-d H:i:s");
        //    dd($today);
        $user = auth()->guard('customer')->user();
        $Course = Course::find($id);
        //dd($Course);
        $lesson = null;
        if (!$user->hasAnyPermission([$Course->title])) {
            $request->session()->flash('alert-danger', __('You dont have permasion'));
            return redirect()->back();
        }

        $lessontimer = CounterCorse::where('customer_id', $user->id)->where('course_id', $id)->get();
       //dd($lessontimer[0]);
        if (count($lessontimer) == 0) {
            //dd('dafawef');
            $lesson = Lesson::where('course_id', $id)->first();
            if (is_null($lesson)) {
                $input = array(
                    'customer_id' => $user->id,
                    'course_id' => intval($id),
                    'lesson_id' => $lesson->id,
                    'date' => $today,
                );
                CounterCorse::create($input);
            }
        } else {
            $openlesson = $lessontimer[0]->date;
            $openlesson = str_replace('-', '/', $openlesson);
            $time=24;
            if(!is_null($lesson) )
                $time=$lesson->timeshow;
            $openlesson = date("Y-m-d H:i:s", strtotime($openlesson . "+ ".$time." hours"));
            $today = date("Y-m-d H:i:s");
            if ($openlesson < $today) {
                $lesson = Lesson::where('id', '>', $lessontimer[0]->lesson_id)->where('course_id',intval($id))->get()->first();
                if (is_null($lesson) ) {
                    $lesson = Lesson::where('course_id',intval($id))->get()->last();
                }
                $input = array(
                    'lesson_id' => $lesson->id,
                    'date' => $today,
                );
                $lessontimer[0]->update($input);
            } else {
                $lesson = Lesson::find($lessontimer[0]->lesson_id);
            }
        }
        if (is_null($lesson)) {
            $arr['Parts'] = array();
        } else {
            $arr['Parts'] = $lesson->Part;
        }

        $arr['Lesson'] = $lesson;
        $ss='[
    {
        "id" : 0,
        "name" : "Devstories from google",
        "source" : "https://www.html5rocks.com/en/tutorials/video/basics/devstories.mp4",
        "duration" : "4:34",
        "img" : "https://lonelyplanetstatic.imgix.net/op-video-sync/images/production/p-5810396717001-brightcove-when-to-go-to-the-azores-20180726-050333.jpg?w=160&h=90&sharp=10&q=50"
    },{
       "id" : 1,
        "name" : "Vida marina - Oceano",
        "source" : "http://mirrors.standaloneinstaller.com/video-sample/jellyfish-25-mbps-hd-hevc.mp4",
        "duration" : "4:34",
        "img" : "https://lonelyplanetstatic.imgix.net/op-video-sync/images/production/p-5810396717001-brightcove-when-to-go-to-the-azores-20180726-050333.jpg?w=160&h=90&sharp=10&q=50"   
    },{
        "id":2,
        "name" : "Profundidades del oceano",
        "source" : "https://eritqaa.s3.eu-west-3.amazonaws.com/us.mp4",
        "duration" : "1:34",
        "img" : "https://lonelyplanetstatic.imgix.net/op-video-sync/images/production/p-5810396717001-brightcove-when-to-go-to-the-azores-20180726-050333.jpg?w=160&h=90&sharp=10&q=50"
    },{
        "id": 3,
        "name" : "Lo angeles timelapse",
        "source" : "http://thenewcode.com/assets/videos/downtown-los-angeles.mp4",
        "duration" : "3:34",
        "img" : "https://lonelyplanetstatic.imgix.net/op-video-sync/images/production/p-5810396717001-brightcove-when-to-go-to-the-azores-20180726-050333.jpg?w=160&h=90&sharp=10&q=50"
    },{
        "id" : 4,
        "name" : "Panasonic test video HD",
        "source" : "http://mirrors.standaloneinstaller.com/video-sample/Panasonic_HDC_TM_700_P_50i.mp4",
        "duration" : "2:34",
        "img" : "https://lonelyplanetstatic.imgix.net/op-video-sync/images/production/p-5810396717001-brightcove-when-to-go-to-the-azores-20180726-050333.jpg?w=160&h=90&sharp=10&q=50"
    }]';
//        $dd=json_decode($ss, true);
//          $ff=  json_encode($dd);
       $arr['video']=json_decode($ss, true);
    //  dd(json_decode($ss, true));
        return view('Customer.Lesson.Index', $arr);
    }
}
