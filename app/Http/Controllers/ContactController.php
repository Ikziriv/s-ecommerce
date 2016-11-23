<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Repo\ContactRepository;

use App\Http\Requests;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    /**
     * The UserRepository instance.
     *
     * @var App\Repositories\UserRepository
     */
    protected $contact_gestion;
    /**
     * Create a new UserController instance.
     *
     * @param  App\Repositories\ContactRepository $contact_gestion
     * @return void
     */
    public function __construct(
        ContactRepository $contact_gestion)
    {
        $this->contact_gestion = $contact_gestion;
		$this->middleware('ajax', ['only' => 'update']);
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @param  ContactRepository $contact_gestion
	 * @return Response
	 */
	public function index(
		ContactRepository $contact_gestion)
	{
		$messages = $contact_gestion->index();

		return view('admin.pages.contact.index', compact('messages'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('user.contact');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  App\Repositories\ContactRepository $contact_gestion
	 * @param  ContactRequest $request
	 * @return Response
	 */
	public function store(
		ContactRequest $request)
	{
		$this->contact_gestion->store($request->all());
        flash()->success('Success', 'Contact saved successfully');
		return redirect()->route('product.index');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  App\Repositories\ContactRepository $contact_gestion
	 * @param  Illuminate\Http\Request $request
	 * @param  int  $id
	 * @return Response
	 */
	public function update(
		ContactRepository $contact_gestion,
		Request $request, 		 
		$id)
	{
		$contact_gestion->update($request->input('seen'), $id);

		return response()->json(['statut' => 'ok']);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  App\Repositories\ContactRepository $contact_gestion
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Contact $contact)
	{
		$this->contact_gestion->destroyContact($contact);
        flash()->success('Success', 'Contact deleted successfully');
		return redirect('contact');
	}
}
