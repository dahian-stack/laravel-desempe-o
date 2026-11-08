<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Throwable;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Campo trampa para reducir envíos automatizados.
        if ($request->filled('website')) {
            return redirect()->to(route('landing') . '#contacto')
                ->with('contact_success', '¡Gracias! Tu mensaje fue recibido.');
        }

        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:254'],
            'subject' => ['required', 'string', 'max:150'],
            'message' => ['required', 'string', 'max:5000'],
            'data_authorization' => ['accepted'],
        ], [
            'name.required' => 'Escribe tu nombre.',
            'email.required' => 'Escribe tu correo electrónico.',
            'email.email' => 'Escribe un correo electrónico válido.',
            'subject.required' => 'Escribe el asunto de tu mensaje.',
            'message.required' => 'Escribe el mensaje que deseas enviar.',
            'data_authorization.accepted' => 'Debes autorizar el uso de tus datos para responder esta solicitud.',
        ]);

        try {
            Mail::raw(
                "Nuevo mensaje desde el formulario de MEDIAPRO\n\n" .
                "Nombre: {$data['name']}\n" .
                "Correo: {$data['email']}\n" .
                "Asunto: {$data['subject']}\n\n" .
                "Mensaje:\n{$data['message']}\n",
                function ($mail) use ($data) {
                    $mail->to('mediapro.contacto@gmail.com')
                        ->replyTo($data['email'], $data['name'])
                        ->subject('Nuevo contacto MEDIAPRO: ' . $data['subject']);
                }
            );

            return redirect()->to(route('landing') . '#contacto')
                ->with('contact_success', '¡Mensaje enviado! Gracias por escribir a MEDIAPRO.');
        } catch (Throwable $exception) {
            Log::error('No fue posible enviar el formulario de contacto de MEDIAPRO.', [
                'exception' => $exception->getMessage(),
            ]);

            return redirect()->to(route('landing') . '#contacto')
                ->withInput($request->except('data_authorization'))
                ->with('contact_error', 'No pudimos enviar tu mensaje en este momento. Inténtalo nuevamente más tarde o escríbenos directamente al correo.');
        }
    }
}
