<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Mail;
use Illuminate\Support\Facades\Validator;
use App\Models\HasFactory;
class ContactsController extends Controller
{
    //
    public function contactForm()
    {
        return view('index');
    }


    public function storeData(Request $request)
    { 

        $this->validate($request,[ 

                    'fname' => 'required',
                    'lname' => 'required',
                    'email' => 'required|email|unique:contacts',
                    'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                    'project' => 'required',
                    'classification' => 'required',
                    'issue' => 'required',
                    'description' => 'required',
                    'priority' => 'required',
                    'images' => 'required',
        ]); 
        if($request->hasfile('images'))
        {
            // storage images in folder 'images'
           foreach($request->file('images') as $image)
           {
               $name=$image->getClientOriginalName();
               $image->move(public_path().'/imageForm/', $name);  
               $images[] = $name;  
           }
        }

        $input = Contact::create($request->all());
        $contact_id = $input->id;
        $input->screen=json_encode($images);
        
        $input->save();
      



       //  Send mail to admin
       \Mail::send('mail', array(

        'fname' => $input->fname,
        'lname' => $input->lname,
        'email' => $input->email,
        'phone' => $input->phone,
        'project' => $input->project,
        'classification' => $input->classification,
        'issue' => $input->issue,
        'description' => $input->description,
        'priority' => $input->priority,
         'images'=>$input->screen,
    ), function($message) use ($input){
        $message->from($input->email);
        //ibtihal@nadsoft.net
        $message->to('hadeel.bm@nadsoft.net', 'Admin')->subject($input->issue);
        
    });
 

        return back()->with('success' , 'Contact Form Submit Successfully,We will receive an email from you^_^'); 

    } 



  }
               

              



