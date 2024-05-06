<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ContactController extends Controller
{
    private function data()
    {
        if (!Cookie::has('contact'))
        {
            return [];
        }

        // Terima as JSON
        $data = Cookie::get('contact');
        $data = \json_decode($data);
        return $data;
    }

    public function View()
    {
        return \view('contact');
    }

    public function ActionContact(Request $request)
    {
        $data = $this->data();
        $d = [
            "name" => $request->input('name'),
            "email" => $request->input('email'),
            "phone" => $request->input('phone'),
            "message" => $request->input('message'),
        ];

        $data[] = $d;

        $data = \json_encode($data);
        $c = Cookie::make("contact", $data, 60*24*30);
        Cookie::queue($c);

        // dd($request->all());
        // dd(Cookie::get('contact'));
        return redirect()->back();
    }

    public function ContactList(Request $request)
    {
        dd($request->cookie('contact'));
    }
    public function ShowContactInfo()
    {
        // Retrieve the data from the cookie
        $contactData = json_decode(Cookie::get('contact'), true);
    
        return view('msg', compact('contactData'));
    }
    

    public function deleteContact(Request $request, $index)
    {
        $data = json_decode(Cookie::get('contact'), true);
    
        // If the index is valid, remove the contact from the array
        if ($index >= 0 && $index < count($data)) {
            array_splice($data, $index, 1);
        }
    
        // Save the updated data back to the cookie
        $data = \json_encode($data);
        $c = Cookie::make("contact", $data, 60*24*30);
        Cookie::queue($c);
    
        return redirect()->back();
    }
}