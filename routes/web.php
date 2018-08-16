<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

<<<<<<< HEAD
use App\User;
use Illuminate\Http\Request;
use App\Mail\EventRegistered;

Route::get('/', function () {
    return view('index');
});

Route::post('/register', function (Request $request) {
    //  If we have the email provided
    if (!empty($request->input('email'))) {
        // Get the user from the database
        $user = User::where('email', $request->input('email'))->first();

        //  If the user exists
        if (count($user)) {
            //  Find out if they have payed successfully before
            $hasTransactedBefore = $user->transactions->where('success_state', 1)->count();

            //  If they have paid
            if ($hasTransactedBefore != 0) {
                //  Notify the user
                $request->session()->flash('alert', array('You have already registered and paid for this event! Visit your email to verify. Thank you', 'success'));

                return back();
            }

            //  Go back and let the user know they have paid before
        } else {
            if ($request->input('abortRegistration') == '1') {
                //  Notify the user
                $request->session()->flash('alert', array('Registration with "'.$request->input('email').'" does not exist. Please re-enter the email you used when registering previously otherwise return to <a href="/">Registration</a>', 'success'));

                return back();
            } else {
                //  Create a new user
                $user = User::create($request->all());

                Mail::to($request->input('email'))->send(new EventRegistered($user));

                //Alert update success
                $request->session()->flash('alert', array('You have been registered successfully! Complete your application by paying for your seat', 'success'));
            }
        }

        if (count($user)) {
            $transaction = $user->transactions()->create([
                'user_id' => $user->id,
            ]);
            session(['user' => $user, 'transaction' => $transaction]);
        }

        return redirect('/payment-options');
    } else {
        $request->session()->flash('alert', array('Please register!', 'danger'));

        return redirect('/');
    }

    //Mail::to( $request->input('email_address'))->send(new EventRegistered($user));
    //} else {
        //$request->session()->flash('status','You have already Registered For this Event');
        // return view('welcome');
    //}
});

Route::get('/payment-options', function () {
    return view('payment');
});

Route::get('/paymentSuccessful', function () {
    return view('paymentSuccessful');
});

Route::get('/paymentUnSuccessful', function () {
    return view('paymentUnSuccessful');
=======
Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Route::get('/overview', function () {
    $jobcards = Auth::user()->companyBranch->jobcards()->paginate(5, ['*'], 'jobcards');
    $clientsCount = Auth::user()->companyBranch->company->clients->count();
    $contractorsCount = Auth::user()->companyBranch->company->contractors->count();
    $recentActivities = Auth::user()->companyBranch->company->recentActivities()->paginate(3, ['*'], 'activities');

    //return $recentActivities;
    $jobcardProcessSteps = Auth::user()->companyBranch->company->processForms->where('selected', 1)->where('type', 'jobcard')->first()->steps;

    return view('overview.index', compact('jobcards', 'clientsCount', 'contractorsCount', 'recentActivities', 'jobcardProcessSteps'));
})->middleware('auth');

Route::group(['prefix' => 'profiles',  'middleware' => 'auth'], function () {
    Route::get('/', 'UserController@index')->name('profiles');
    Route::post('/', 'UserController@store')->name('profile-store');
    Route::get('/{profile_id}', 'UserController@show')->name('profile-show');
    Route::put('/{profile_id}', 'UserController@update')->name('profile-update');
    Route::get('/{profile_id}/edit', 'UserController@edit');
    Route::delete('/{profile_id}/docs/{doc_id}', 'UserController@deleteDocument')->name('profile-doc-delete');
});

/*  JOBCARDS    create, edit, save, delete, display */
Route::group(['prefix' => 'jobcards',  'middleware' => 'auth'], function () {
    Route::get('/', 'JobcardController@index')->name('jobcards');
    Route::post('/', 'JobcardController@store')->name('jobcard-store');
    Route::get('/create', 'JobcardController@create')->name('jobcard-create');
    Route::get('/{jobcard_id}', 'JobcardController@show')->name('jobcard-show');
    Route::put('/{jobcard_id}', 'JobcardController@update')->name('jobcard-update');
    Route::delete('/{jobcard_id}', 'JobcardController@delete')->name('jobcard-delete');
    Route::put('/{jobcard_id}/progress', 'JobcardController@updateProgress')->name('jobcard-update-progress');
    //Route::get('/{jobcard_id}/edit', 'JobcardController@edit')->name('jobcard-edit');
    Route::get('/step/{step_id}', 'JobcardController@showStepJobcard')->name('show-step-jobcard');
    Route::get('/{jobcard_id}/download/pdf', 'JobcardController@downloadPdf')->name('jobcard-download-pdf');
    Route::delete('/{jobcard_id}/client/{client_id}', 'JobcardController@removeClient')->name('jobcard-remove-client');
    Route::put('/{jobcard_id}/contractors/{contractor_id}/selected', 'JobcardController@selectContractor')->name('jobcard-select-contractor');
    Route::delete('/{jobcard_id}/contractors/{contractor_id}/{pivot_id}', 'JobcardController@removeContractor')->name('jobcard-remove-contractor');

    /*  REMOVE THIS-> */
    /*  REMOVE THIS-> */
    Route::get('/jobcards/1/views/1', function () {
        return view('jobcard.views');
    });

    Route::get('/jobcards/1/viewers', function () {
        return view('jobcard.viewers');
    });

    Route::get('/jobcards/1/viewers/1', function () {
        return view('jobcard.viewer');
    });
    /*  <-REMOVE THIS */
    /*  <-REMOVE THIS */
});

/*  COMPANIES    create, edit, save, delete, display */
Route::group(['prefix' => 'companies',  'middleware' => 'auth'], function () {
    //Route::get('/', 'CompanyController@index')->name('companies');
    Route::post('/', 'CompanyController@store')->name('company-store');
    Route::get('/create', 'CompanyController@create')->name('company-create');
    //Route::get('/{company_id}', 'CompanyController@show')->name('company-show');
    Route::put('/{company_id}', 'CompanyController@update')->name('company-update');
    //Route::delete('/{company_id}', 'CompanyController@delete')->name('company-delete');
    Route::get('/{company_id}/edit', 'CompanyController@edit')->name('company-edit');
});

/*  TO BE TRASHED */
/*  TO BE TRASHED */
/*  TO BE TRASHED */
/*  TO BE TRASHED */
/*  TO BE TRASHED */
/*  TO BE TRASHED */

/*  CONTACTS    create, edit, save, delete, display */
Route::group(['prefix' => 'contacts',  'middleware' => 'auth'], function () {
    //Route::get('/', 'ContactController@index')->name('contacts');
    Route::post('/', 'ContactController@store')->name('contact-store');
    //Route::get('/create', 'ContactController@create')->name('contact-create');
    Route::get('/{contact_id}', 'ContactController@show')->name('contact-show');
    //Route::put('/{contact_id}', 'ContactController@update')->name('contact-update');
    //Route::delete('/{contact_id}', 'ContactController@delete')->name('contact-delete');
    //Route::get('/{contact_id}/edit', 'ContactController@edit')->name('contact-edit');
});

/*  CLIENTS    create, edit, save, delete, display */
Route::group(['prefix' => 'clients',  'middleware' => 'auth'], function () {
    Route::get('/', 'CompanyController@getClients')->name('clients');
    //Route::post('/', 'ClientController@store')->name('client-store');
    //Route::get('/create', 'ClientController@create')->name('client-create');
    Route::get('/{client_id}', 'CompanyController@showClient')->name('client-show');
    //Route::put('/{client_id}', 'ClientController@update')->name('client-update');
    //Route::delete('/{client_id}', 'ClientController@delete')->name('client-delete');
    //Route::get('/{client_id}/edit', 'ClientController@edit')->name('client-edit');
});

/*  CONTRACTORS    create, edit, save, delete, display */
Route::group(['prefix' => 'contractors',  'middleware' => 'auth'], function () {
    Route::get('/', 'CompanyController@getContractors')->name('contractors');
    //Route::post('/', 'ContractorController@store')->name('contractor-store');
    //Route::get('/create', 'ContractorController@create')->name('contractor-create');
    Route::get('/{contractor_id}', 'CompanyController@showContractor')->name('contractor-show');
    //Route::put('/{contractor_id}', 'ContractorController@update')->name('contractor-update');
    //Route::delete('/{contractor_id}', 'ContractorController@delete')->name('contractor-delete');
    //Route::get('/{contractor_id}/edit', 'ContractorController@edit')->name('contractor-edit');
});

Route::get('/contractors/gaborone', function () {
    return view('contractor.gaborone');
});

Route::get('/calendar', function () {
    $jobcards = App\jobcard::all();
    /*
    $caledar_data = $jobcards->map(function ($jobcard) {
        return [
            'id' => $jobcard->pluck('id')[0],
            'title' => $jobcard->pluck('title')[0],
            'description' => $jobcard->pluck('description')[0],
            'start' => $jobcard->pluck('start_date')[0],
            'end' => $jobcard->pluck('end_date')[0],
            'url' => '/jobcards/1'.$jobcard->pluck('id')[0],
        ];
    });
    */
    return view('calendar.index', compact('jobcards'));
>>>>>>> d0320244a16f691a5d0934a7b2fa14720f9c1278
});

Route::get('/emailtemplate', function () {
    return view('sendEmailTemplate');
});
