<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Mail;
use Auth;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function contact(){

        if(Auth::check()){

            return view('frontend.contact');

        }else{

            return redirect('/loginpage')->with('fail', "You Need To Login First!");

        }
    }

    public function contactUs(Request $request){

        if(Auth::check()){

            $validator = Validator::make($request->all(), [
                'name' => 'string|required|min:1',
                'email' => 'string|required|email|max:100|',
                'phone' => 'required',
                'subject' => 'required',
                'message' => 'required',
            ]);

            if ($validator->fails()) {

                return redirect()->back()->withErrors($validator)->withInput();

            }

            try{

                $contact = new Contact;
                $contact->name = $request->name;
                $contact->email = $request->email;
                $contact->phone = $request->phone;
                $contact->subject = $request->subject;
                $contact->message = $request->message;
                $contact->save();

                $data = [
                    'user_name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'subject' => $request->subject,
                    'emailMessage' => $request->message // Renamed variable
                ];

                Mail::send('backend.email.contactemail', $data, function($message) use ($data) {
                    $message->to('ahpin7762@gmail.com')
                    ->subject($data['subject']);
                });

                return back()->with('success','Your Contact has been successfully');

            }catch(e){

                return back()->with('fail', 'Failed to Contact. Please try again.');

            }

        }else{

            return redirect('/loginpage')->with('fail', "You Need To Login First!");

        }
    }

    public function allcontact(){

        $contacts = Contact::paginate(10);

        return view('backend.contact.usercontact',compact('contacts'));
    }

    public function mutlipledeletecontact(Request $request){

        $ids = json_decode($request->input('ids'));

        if (is_array($ids) && count($ids) > 0) {

            Contact::whereIn('id', $ids)->delete();

            return back()->with('success', 'Selected User Contacts have been deleted successfully!');

        } else {

            return back()->with('error', 'Invalid input. No User Contact were deleted.');
        }
    }
}
