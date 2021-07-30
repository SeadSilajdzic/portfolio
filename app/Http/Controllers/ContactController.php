<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.contacts.index', [
            'contacts' => Contact::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'bail|required|string',
            'email' => 'bail|required|email',
            'phone' => 'bail|required|string',
            'subject' => 'bail|required|string',
            'message' => 'bail|required|string|max:1000'
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->back()->withToastSuccess('Thank You for contacting me!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::onlyTrashed()->where('id', $id)->firstOrFail();
        $contact->forceDelete();

        return redirect()->back()->withToastError('Contact deleted');
    }

    public function trash(Contact $contact)
    {
        $contact->delete();

        return redirect()->back()->withToastWarn('Contact trashed');
    }

    public function restore($id)
    {
        $contact = Contact::onlyTrashed()->where('id', $id)->firstOrFail();
        $contact->restore();

        return redirect()->back()->withToastSuccess('Contact restored');
    }
}
