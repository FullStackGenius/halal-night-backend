<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Mail\ContactUsMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contactUs(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'reason' => 'required|string',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        $name = $request->name;
        $email = $request->email;
        $reason = $request->reason;
        $subject = $request->subject;
        $messageContent = $request->message;

        try {

            Mail::to(env('MAIL_FROM_ADDRESS'))
                ->send(new ContactUsMail($name, $email, $reason, $subject, $messageContent));
            return  ApiResponse::success([], "Mail sent successfully.");
        } catch (\Exception $e) {

            \Log::error('Error sending contact us email: ' . $e->getMessage());

            return  ApiResponse::error('There was an error sending the email. Please try again later.', $e->getMessage());
        }
    }
}
