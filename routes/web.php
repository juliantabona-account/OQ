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

Route::group(['prefix' => 'jobcards',  'middleware' => 'auth'], function () {
    /*
     *  Template Routes & Names for Index, Create, Store, Show, Edit, Update & Destroy
     *  Templates refer to the various mockups used to generate application forms & contract documments
     */
    Route::resource('/processForms', 'TemplateController', [
            'names' => [
                'index' => 'jobcard.processForm.index',
                'create' => 'jobcard.processForm.create',
                'store' => 'jobcard.processForm.store',
                'show' => 'jobcard.processForm.show',
                'edit' => 'jobcard.processForm.edit',
                'update' => 'jobcard.processForm.update',
                'destroy' => 'jobcard.processForm.destroy',
            ],
        ]);

    Route::group(['prefix' => 'processForms'], function () {
        //  create and update jobcard process form templates
        Route::put('/{processForm}/selected', 'TemplateController@selectTemplate')->name('jobcard-select-process-form');
        Route::get('create/{processForm}/step/2', 'TemplateController@createStep2')->name('jobcard.processForm.create.step2');
        Route::get('create/{processForm}/step/3', 'TemplateController@createStep3')->name('jobcard.processForm.create.step3');
        Route::get('create/{processForm}/step/4', 'TemplateController@createStep4')->name('jobcard.processForm.create.step4');
        Route::put('create/{processForm}/step/2', 'TemplateController@updateStep2')->name('jobcard.processForm.update.step2');
        Route::put('create/{processForm}/step/3', 'TemplateController@updateStep3')->name('jobcard.processForm.update.step3');
    });
});

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Route::get('/overview', function () {
    //  Lets assume
    $userHasBranch = false;
    $userHasCompany = false;
    //  Get the users branch
    $usersCompanyBranch = Auth::user()->companyBranch;
    //  If the user has been assigned a branch then get more data
    if ($usersCompanyBranch) {
        $userHasBranch = true;
        //  Get jobcards relating to the users branch
        $jobcards = $usersCompanyBranch->jobcards()->paginate(5, ['*'], 'jobcards');
        //  Get the branch parent company
        $usersCompany = $usersCompanyBranch->company;
        //  If the branch has been assigned to a parent company
        if ($usersCompany) {
            $userHasCompany = true;
            //  Get the total number of clients relating to the users company
            $clientsCount = $usersCompany->clients->count();
            //  Get the total number of contractors relating to the users company
            $contractorsCount = $usersCompany->contractors->count();
            //  Get all recent activities relating to the users company
            $recentActivities = $usersCompany->recentActivities()->paginate(3, ['*'], 'activities');
            //  return $recentActivities;
            $jobcardProcessSteps = $usersCompany->processForms->where('selected', 1)->where('type', 'jobcard')->first()->steps;
        }
    }

    return view('overview.index', compact('jobcards', 'clientsCount', 'contractorsCount', 'recentActivities', 'jobcardProcessSteps',
                                           'userHasBranch', 'userHasCompany'));
})->middleware('auth')->name('overview');

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
    //Route::post('/', 'ContactController@store')->name('contact-store');
    //Route::get('/create', 'ContactController@create')->name('contact-create');
    //Route::get('/{contact_id}', 'ContactController@show')->name('contact-show');
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
});

Route::get('/search', function () {
    return view('search.default');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
