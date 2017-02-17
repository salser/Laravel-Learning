<?php

namespace Gazatem\Glog\Http\Controllers;

use Illuminate\Routing\Controller as Controller;
use Gazatem\Glog\Model\MySql\Log as MySqlLogger;
use Gazatem\Glog\Model\MongoDb\Log as MongoDbLogger;
use Illuminate\Http\Request;

class GlogController extends Controller
{
    public function index(Request $request)
    {

        $start_date = $request->get('start_date', null);
        $end_date = $request->get('end_date', null);

        $level = $request->get('level', null);
        $message = $request->get('message', null);

        if (config('glog.db_connection') == 'mongodb'){
            $logger = new MongoDbLogger;
        }else{
            $logger = new MySqlLogger;
        }

        $logs = $logger->
            where(function ($query) use ($start_date){
                    if ($start_date != null){
                        $query->whereRaw("DATE(created_at) >= DATE('$start_date')");
                    }
                })

                ->where(function ($query) use ($end_date){
                    if ($end_date != null){
                        $query->whereRaw("DATE(created_at) <= DATE('$end_date')");
                    }
                })

                ->where(function ($query) use ($level){
                    if ($level != null){
                        $query->where("level_name" ,$level);
                    }
                })

                ->where(function ($query) use ($message){
                    if ($message != null){
                        $query->where("message" ,$message);
                    }
                })
                ->orderBy('created_at', 'desc')->paginate(100);


        $translations = config('glog.translations');
        $levels = config('glog.levels');
        $channels = config('glog.channels');

        $labels = ['EMERGENCY' => 'danger' , 'ALERT' => 'danger', 'CRITICAL' => 'yellow', 'ERROR' => 'danger', 'WARNING'=> 'warning', 'NOTICE'=> 'default', 'INFO'=> 'info', 'DEBUG'=> 'success'];

        return view('glog::index', compact('logs', 'translations', 'levels', 'level', 'message', 'start_date', 'end_date', 'channels', 'labels'));
    }
}