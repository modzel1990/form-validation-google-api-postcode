<?php

namespace App\Http\Controllers;

use App\Models\DataCapture;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use JustSteveKing\LaravelPostcodes\Rules\Postcode;
use JustSteveKing\LaravelPostcodes\Service\PostcodeService;

class DataCaptureController extends Controller
{
    /**
     *
     */
    public function index()
    {
        return view('data-capture');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function store(Request $request)
    {
        /*
        Please note, you will need to run php artisan migrate command to create data_captures table

        Moreover, inside DataCapture model I've set it to be corresponding to specific table 'data_captures',
        I am not sure what structure you will use while testing, so either please remove that assignment from
        the DataCapture model, or make your table name to be 'data_captures'.

        */

        /* Validation */
        /* For the postcode I am using the following package https://github.com/JustSteveKing/LaravelPostcodes */
        $rules = [
            'first_name'                    => ['required', 'string'],
            'last_name'                     => ['required', 'string'],
            'postal_code'                   => ['required', 'string', new Postcode(resolve(PostcodeService::class))]
        ];

        $errorMsg = [
            'first_name.required'            => 'Please provide first name',
            'last_name.required'             => 'Please provide last name',
            'postal_code.required'           => 'Please provide valid post code',
        ];

        $validated = $request->validate($rules, $errorMsg);

        /* Make a call to google API to get necessary data based on postal code */
        $client = new Client();
        /* You will need your own GOOGLE_API_KEY - please add it in .env file - make sure that you have enable geocoding api in your google console */
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $validated['postal_code'] . "&key=" . env("GOOGLE_API_KEY", "error");

        $result = $client->post($url)->getBody();
        $json = json_decode($result);
        // Get latitude and longitude
        $coords = $json->results[0]->geometry->location;

        // Instantiate DataCapture Model
        $dataCapture = new DataCapture();
        /*
           There is no need for the '?? null' part as our validator would do the job, moreover in migration I've set the
           fields to be null by default, nevertheless I will leave it there as significance that if we would do
           validation differently or would not specify default value in db, this could be a good way
           to deal with empty values
        */
        $dataCapture->first_name = $validated['first_name'] ?? null;
        $dataCapture->last_name = $validated['last_name'] ?? null;
        $dataCapture->postal_code = $validated['postal_code'] ?? null;
        $dataCapture->longitude = $coords->lng ?? null;
        $dataCapture->latitude = $coords->lat ?? null;

        // Save data into DB
        $dataCapture->save();

        return redirect()->back()->withErrors(['success' => ['You have successfully submitted the form.']]);
    }
}
