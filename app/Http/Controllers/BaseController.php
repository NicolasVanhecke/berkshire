<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\NewsletterMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\App;

class BaseController extends Controller
{
    /**
     * Handles the mailing of the newsletter form
     */
    public function newsletter(Request $request)
    {
        $locale = App::getLocale();
        $formMessage = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'question' => $request->question
        ];

        // Send mail
        Mail::to( $request->email )->send( new NewsletterMail( $formMessage ) );

        // Return the view with a success/error message to the user
        if( $locale === 'en' ){
            $message = 'Your message has been sent. We will reach out to you within 2 days.';
        } else if( $locale === 'nl' ){
            $message = 'Uw bericht is verstuurd. Wij contacteren u binnen de 2 werkdagen.';
        }

        return redirect()->route( 'home', $locale )->with( 'success', $message );
    }

    /**
     * Changes the language/local from client input
     */
    public function setlocale( $locale ){
        if( ! in_array( $locale, [ 'en', 'nl' ] ) ){
            $locale = 'nl'; // set fallback locale to nl
        }

        // Set locale with client input
        App::setLocale( $locale );
        return redirect()->route( 'home', $locale );
    }
}
