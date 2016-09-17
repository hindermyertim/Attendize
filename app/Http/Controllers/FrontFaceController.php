<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Request;
use App\Http\Controllers\Controller;
use Newsletter;
use App\Http\Controllers\Input;
use Mail;
use App\Models\Event;
use Carbon\Carbon;
use Log;


class FrontFaceController extends Controller
{
    //protected $repo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        \Theme::set('inch');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $currentTime = Carbon::now();
        $events = Event::where('start_date', '>', $currentTime)
            ->defaultOrganizer()
            ->isLive()
            ->orderBy('start_date', 'desc')
            ->get();
        //dd(date('d', $events->first()->start_date));
        //\Log::debug('$latestEvent');
        //\Log::debug(print_r($events, true));
        $convertedTime =  $events->first()->start_date;
        $convertedTime->setTimezone('UTC');
        return view(\Theme::get().'/index' )->with('events', $events)->with('convertedTime', $convertedTime);
    }

    public function postMailChimp(Request $request)
    {
        $request = Request::all();
        if (Request::ajax($request))
        {
            $subscribe = Newsletter::subscribe($request['EMAIL'], ['FNAME' => $request['FNAME'], 'LNAME' => $request['LNAME']]);
            if(isset($subscribe['leid']))
            {
                return \Response::json(array(
                        'errors' => FALSE,
                        'message' => 'email submitted')
                );
            }
            return \Response::json(array(
                    'errors' => Newsletter::getLastError())
            );
        }
        return \Response::make('', 500);
    }

    public function emailContactUs(Request $request)
    {
        $request = Request::all();
        if (Request::ajax($request))
        {
            \Mail::send('email.blank',
                array(
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'messagebody' => $request['messagebody']
                ), function($message)
                {
                    $message->from('leftritesite@leftrite.com');
                    $message->to('contact@leftrite.com', 'LeftRite')->subject('New Message from our site!');
                });
            return \Response::json(array(
                    'errors' => FALSE,
                    'message' => 'email submitted')
            );
        }
    }
}
