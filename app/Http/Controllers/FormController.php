<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Form;

class FormController extends Controller
{
    /**
     * Display a listing of the prducts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = Form::all();

        return view('forms.index', compact('forms'));
    }

    /**
     * Show the step One Form for creating a new form.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStepOne(Request $request)
    {
        $form = $request->session()->get('form');

        return view('form.create-step-one', compact('form'));
    }

    /**
     * Post Request to store step1 info in session
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postCreateStepOne(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required|min:10|max:12',
            'surname' => 'required',
            'email' => 'unique:forms,email',
            'zgoda' => 'required|accepted'
        ]);

        $form = new Form();
        $form->fill($validatedData);
        $request->session()->put('form', $form);


        return redirect()->route('forms.create.step.two');
    }

    /**
     * Show the step One Form for creating a new form.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStepTwo(Request $request)
    {
        $form = $request->session()->get('form');

        return view('form.create-step-two', compact('form'));
    }

    /**
     * Show the step One Form for creating a new form.
     *
     * @return \Illuminate\Http\Response
     */
    public function postCreateStepTwo(Request $request)
    {

        $validatedData = $request->validate([
            'description' => 'required',
        ]);
        $form = $request->session()->get('form');
        $form->fill($validatedData);
        $request->session()->put('form', $form);

        $form = $request->session()->get('form');
        $form->save();

        return view('form.create-step-three', compact('form'));
    }
}