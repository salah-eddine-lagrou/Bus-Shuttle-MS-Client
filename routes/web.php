<?php

use App\Http\Controllers\AbonnementController;
use App\Http\Controllers\AcceuilController;
use App\Http\Controllers\DetailOffreController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserManagementController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\Tester;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\PourAbonnerController;
use App\Http\Controllers\PourAbonner2Controller;
use App\Http\Controllers\ReçuController;
use App\Http\Controllers\PourAbonner3Controller;
use App\Http\Controllers\VoirPlusController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PayPalPaymentController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

// Route::view('/', 'auth.register');

// Auth::routes();
// Route::get('/login', 'Auth\LoginController@showLoginForm')->name('logging');
// Route::get('/register', 'Auth\RegisterController@showRegisterForm')->name('registration');

//--------------------------------------

// Route::group(['prefix' => 'entreprise', 'middleware' => 'auth'], function () {
// Route::get('/profile', [Tester::class, 'profile'])->name('profile'); //name is for the route
// Route::get('/offres', [Tester::class, 'offres'])->name('offres'); //name is for the route
Route::get('/tables', [Tester::class, 'tables'])->name('tables'); //name is for the route
Route::get('/blank', [Tester::class, 'blank'])->name('blank'); //name is for the route
Route::get('/clients', [Tester::class, 'clients'])->name('clients'); //name is for the route
Route::get('/voyages', [Tester::class, 'voyages'])->name('voyages'); //name is for the route
Route::get('/commentaires', [Tester::class, 'commentaires'])->name('commentaires'); //name is for the route
Route::get('/comments', [Tester::class, 'comments'])->name('comments'); //name is for the route
Route::get('/abonnement', [Tester::class, 'abonnement'])->name('abonnement'); //name is for the route

// Route::get('/profile', function () {
//     $entreprise = auth()->user();
//     return view('template.profile', ['entreprise' => $entreprise]);
// })->name('profile');

//-----------------------------------------------
//mine
Route::get('/', [AcceuilController::class, 'acceuil']);
Route::get('/detail-offre/{id}', [VoirPlusController::class, 'detail'])->name('detail_offre');
Route::get('voirplus', function(){
    return view('voirplus');
});
Route::middleware('client')->group(function(){
    Route::post('/detail-offre/{id}/abonner', [AbonnementController::class, 'abonner'])->name('abonner');
    Route::get('/pourabonner/{id}', [PourAbonnerController::class, 'pourabonner'])->name('pourabonner');
    Route::post('/pourabonner/{abonnement}/payer', [PaiementController::class, 'store'])->name('payer');
    Route::get('/pourabonner2/{id_coupon}', [PourAbonner2Controller::class, 'pourabonner2'])->name('pourabonner2');    Route::get('/reçu', [ReçuController::class, 'reçu'])->name('reçu');
    Route::get('/generate-pdf', [PDFController::class, 'generatePDF']);
    Route::get('/registerC', [RegisterController::class, 'create']);
    Route::post('/registerC' , [RegisterController::class, 'store'])->name('registerC');
    //Route::post('page/user/profile',[UserManagementController::class,'profileStore'])->name('profile_user');
    Route::get('editProfile/{id}/', [HomeController::class,'editProfile'])->name('editProfile');
    Route::get('page/client/profile' , [HomeController::class,'clientProfile'])->name('page/client/profile');
    Route::put('/profile/update/{client}',[HomeController::class,'updateProfile'])->name('profileClient.update');
    Route::get('/profile/client/edit', [HomeController::class, 'editClientProfile'])->name('profileClient.edit');
    Route::post('/updateImage/{client}/update/', [HomeController::class, 'updateImage'])->name('updateImage');
    Route::get('RapportClientsPDF/{id_paiement}', [PDFController::class, 'RapportClientsPDF'])->name('RapportClientsPDF');
});



Route::get('/loginC' , [LoginController::class,'index'])->name('loginC');
Route::post('/check' , [LoginController::class, 'check'])->name('check');
Route::get('/logout' , [LoginController::class,'logout'])->name('logout');


//Route::get('/print', function () {
  //  return view('print');
//});
//paypal
Route::get('handle-payment', [PayPalPaymentController::class,'handlePayment'])->name('make.payment');
Route::get('cancel-payment', [PayPalPaymentController::class,'paymentCancel'])->name('cancel.payment');
Route::get('payment-success', [PayPalPaymentController::class,'paymentSuccess'])->name('success.payment');
// Route::middleware(['authEntreprise'])->get('/profile', function () {
//     $entreprise = auth()->user();
//     return view('template.profile', ['entreprise' => $entreprise]);
// })->name('profile');
// Route::put('/profile/{id}', [EntrepriseController::class, 'update'])->name('profile.update');
// Route::resource('entreprise', EntrepriseController::class);

Route::get('/profile', function () {
    $entreprise = auth()->user();
    return view('template.profile', ['entreprise' => $entreprise]);
})->name('profile');

Route::put('/profile/{id}', [EntrepriseController::class, 'update'])->name('profile.update');

Route::resource('entreprise', EntrepriseController::class);





Route::resource('abonnement', AbonnementController::class);

Route::get('/vehicules', function () {
    $entreprise = auth()->user();
    $id_entreprise = $entreprise->id;
    $vehicules = DB::table('vehicules')->where('id_entreprise', $id_entreprise)->get();
    return view('template.vehicules', [
        'vehicules' => $vehicules,
        'id_entreprise' => $id_entreprise, // add id_entreprise to the view data
    ]);
})->name('vehicule');

Route::resource('vehicule', VehiculeController::class);

Route::get('/offres', function () {
    if(auth()->user() == null){
        return redirect('loginC');
    }
    $jours = DB::table('jours')->get();
    $type_abonnements = DB::table('type_abonnements')->get();
    $image_offres = DB::table('image_offres')->get();
    $abonnements = DB::table('abonnements')->whereNotNull('id_offre')->get();
    $nbrAbonnements = DB::table('abonnements')->whereNotNull('id_offre')->count();
    $vehicules = DB::table('vehicules')->whereNull('id_abonnement')->get();
    $entreprise = auth()->user();
    $id_entreprise = $entreprise->id;
    return view('offres', [
        'jours' => $jours,
        'type_abonnements' => $type_abonnements,
        'id_entreprise' => $id_entreprise,
        'vehicules' => $vehicules,
        'image_offres' => $image_offres,
        'abonnements' => $abonnements,
        'nbrAbonnements' => $nbrAbonnements,
    ]);

})->name('offres');


