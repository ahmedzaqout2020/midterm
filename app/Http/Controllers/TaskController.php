<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ContactValidation;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contacts.index')->with([
            'contacts'=>Contact::all()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.store_edit')->with(
            ['contact'=>null]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactValidation $request)
    {
       
        $contect=new Contact();
        $contect->user_name=$request->username;
        $contect->user_email=$request->useremail;
        $contect->user_phone=$request->userphone;
       $contect->save();
       session()->flash('success','Contact is store');
        return redirect(route('contacts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //dd($contact);

       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('contacts.store_edit')->with(
            ['contact'=>$contact]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactValidation $request, $id)
    {  
        
        $contact = Contact::find($id);

        $contact->user_name=$request->username;
        $contact->user_email=$request->useremail;
        $contact->user_phone=$request->userphone;
        $contact->save();
        session()->flash('success','Contact is Update');

        return redirect(route('contacts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
    $contact->delete();
    return redirect(route('contacts.index'));


    }
}
