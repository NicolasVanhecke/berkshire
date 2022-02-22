<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\NewsletterMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\App;

class BaseController extends Controller
{

    public function newsletter(Request $request)
    {
        $locale = App::getLocale();
        $formMessage = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'question' => $request->question
        ];

        Mail::to( $request->email )->send( new NewsletterMail( $formMessage ) );

        if( $locale === 'en' ){
            $message = 'Your message has been sent. We will reach out to you within 2 days.';
        } else if( $locale === 'nl' ){
            $message = 'Uw bericht is verstuurd. Wij contacteren u binnen de 2 werkdagen.';
        }

        return redirect()->route( 'home', $locale )->with( 'success', $message );
    }

    public function setlocale( $locale ){
        if( ! in_array( $locale, [ 'en', 'nl' ] ) ){
            $locale = 'nl'; // fallback
        }

        App::setLocale( $locale );
        return redirect()->route( 'home', $locale );
    }
}
