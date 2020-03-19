<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Category;
use App\Link;
use Notification;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;



class SubmissionController extends Controller
{
    public function submitResources(Request $request) {
        
        if(!$request->resources){
            return redirect()->back(); 
        }

        // get the message
        $message = "```{$request->resources}```";

        //tell who sent it
        $message.="\n _-$request->name, email: $request->email _";

        $this->sendSlackMessage("Resource Submission", $message); 

        return redirect()->back();    
            
    }

    public function sendSlackMessage($title, $message) {
            $url = env('SLACK_SUBMISSION_HOOK', null);
            if(!$url) return response()->json(['message'=>'disabled'],404);
            $client = new Client(); //GuzzleHttp\Client
            $result = $client->post($url, ['body' => json_encode(
            [
                'attachments'=>[[
                    "pretext"=>$title,
                    "text"=>$message,
                    ]]
                ])]);
    }
     
}
