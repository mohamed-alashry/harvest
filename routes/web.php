<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::group(['as' => 'admin.'], function () {
    Route::get('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
    Route::post('/postLogin', [App\Http\Controllers\AuthController::class, 'postLogin'])->name('postLogin');
    Route::post('logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

    Route::group(['middleware' => ['auth', 'permissionHandler']], function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::resource('employees', App\Http\Controllers\EmployeeController::class);
        Route::post('getJobs', [App\Http\Controllers\EmployeeController::class, 'getJobs'])->name('getJobs');

        Route::resource('leads', App\Http\Controllers\LeadController::class);
        Route::get('leadsAssign', [App\Http\Controllers\LeadController::class, 'leadsAssign'])->name('leads.leadsAssign');
        Route::get('onlineLeads', [App\Http\Controllers\LeadController::class, 'onlineLeads'])->name('leads.onlineLeads');

        Route::resource('branches', App\Http\Controllers\BranchController::class);

        Route::resource('offers', App\Http\Controllers\OfferController::class);

        Route::resource('trainingServices', App\Http\Controllers\TrainingServiceController::class);

        Route::resource('departments', App\Http\Controllers\DepartmentController::class);

        Route::resource('jobs', App\Http\Controllers\JobController::class);

        Route::resource('leadSources', App\Http\Controllers\LeadSourceController::class);

        Route::resource('knowChannels', App\Http\Controllers\KnowChannelController::class);

        Route::resource('roles', App\Http\Controllers\RoleController::class);
        Route::get('updatePermissions', [App\Http\Controllers\RoleController::class, 'updatePermissions'])->name('roles.updatePermissions');

        Route::resource('labels', App\Http\Controllers\LabelController::class);

        Route::resource('labelTypes', App\Http\Controllers\LabelTypeController::class);

        Route::resource('leadCases', App\Http\Controllers\LeadCaseController::class);
        Route::post('getLabelTypes', [App\Http\Controllers\LeadCaseController::class, 'getLabelTypes'])->name('getLabelTypes');
        Route::get('followup', [App\Http\Controllers\LeadCaseController::class, 'followup'])->name('leadCases.followup');

        Route::resource('rooms', App\Http\Controllers\RoomController::class);

        Route::resource('intervals', App\Http\Controllers\IntervalController::class);

        Route::resource('tracks', App\Http\Controllers\TrackController::class);

        Route::resource('customerJobs', App\Http\Controllers\CustomerJobController::class);

        Route::resource('universities', App\Http\Controllers\UniversityController::class);

        Route::resource('paymentPlans', App\Http\Controllers\PaymentPlanController::class);

        Route::resource('paymentMethods', App\Http\Controllers\PaymentMethodController::class);

        Route::resource('placementApplicants', App\Http\Controllers\PlacementApplicantController::class)->except(['create', 'store']);
        Route::get('applicants/sendMail/{id}', [App\Http\Controllers\PlacementApplicantController::class, 'sendMail'])->name('placementApplicants.sendMail');

        Route::resource('placementQuestions', App\Http\Controllers\PlacementQuestionController::class)->except(['store', 'update']);

        Route::resource('courses', App\Http\Controllers\CourseController::class)->except(['store', 'update']);

        Route::resource('timeframes', App\Http\Controllers\TimeframeController::class)->except(['store', 'update']);

        Route::resource('itemCategories', App\Http\Controllers\ItemCategoryController::class);

        Route::resource('serviceFees', App\Http\Controllers\ServiceFeeController::class)->except(['store', 'update']);

        Route::resource('extraItems', App\Http\Controllers\ExtraItemController::class)->except(['store', 'update']);

        Route::resource('disciplineCategories', App\Http\Controllers\DisciplineCategoryController::class);

        Route::resource('leadPayments', App\Http\Controllers\LeadPaymentController::class)->except(['store', 'update']);
        Route::get('paymentDiscount', [App\Http\Controllers\LeadPaymentController::class, 'paymentDiscount'])->name('leadPayments.paymentDiscount');

        Route::resource('customers', App\Http\Controllers\CustomerController::class);

        Route::resource('rounds', App\Http\Controllers\RoundController::class);

        Route::resource('subRounds', App\Http\Controllers\SubRoundController::class);

        Route::resource('groups', App\Http\Controllers\GroupController::class);

        Route::resource('groupStudents', App\Http\Controllers\GroupStudentController::class)->only(['show']);

        Route::resource('groupSessions', App\Http\Controllers\GroupSessionController::class)->except(['create', 'store', 'destroy']);

        Route::resource('groupSessionAttendances', App\Http\Controllers\GroupSessionAttendanceController::class)->except(['create', 'store', 'destroy']);

        Route::resource('makeupSessions', App\Http\Controllers\MakeupSessionController::class);

        Route::resource('questions', App\Http\Controllers\QuestionController::class);

        Route::resource('exams', App\Http\Controllers\ExamController::class);
    });
});


/*
|--------------------------------------------------------------------------
| Placement Test Routes
|--------------------------------------------------------------------------
*/

Route::get('/placement-test', App\Http\Livewire\PlacementTest\Index::class);
Route::get('/invoice/{id}', [App\Http\Controllers\HomeController::class, 'invoice'])->name('invoice');


/*
|--------------------------------------------------------------------------
| Builder Generator Routes
|--------------------------------------------------------------------------
*/

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file');
