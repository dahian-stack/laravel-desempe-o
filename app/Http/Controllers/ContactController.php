<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Campo trampa para reducir envíos automatizados.
        if ($request->filled('website')) {
            return redirect()->to(route('landing') . '#contacto')
                ->with('contact_success', '¡Gracias! Tu mensaje fue recibido.');
        }

        // Validación de los datos del formulario.
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:254'],
            'subject' => ['required', 'string', 'max:150'],
            'message' => ['required', 'string', 'max:5000'],
            'data_authorization' => ['accepted'],
        ], [
            'name.required' => 'Escribe tu nombre.',
            'email.required' => 'Escribe un correo electrónico válido.',
            'email.email' => 'Escribe un correo electrónico válido.',
            'subject.required' => 'Escribe el asunto de tu mensaje.',
            'message.required' => 'Escribe el mensaje que deseas enviar.',
            'data_authorization.accepted' => 'Debes autorizar el uso de tus datos para responder esta solicitud.',
        ]);

        try {
            // Obtener la API Key de Resend.
            $apiKey = config('services.resend.key');

            if (empty($apiKey)) {
                throw new \RuntimeException(
                    'No está configurada la API Key de Resend.'
                );
            }

            // Enviar el correo mediante la API HTTPS de Resend.
            $response = Http::withToken($apiKey)
                ->acceptJson()
                ->asJson()
                ->timeout(20)
                ->post('https://api.resend.com/emails', [
                    'from' => 'MEDIAPRO <contacto@send.imagenescreativas.online>',

                    'to' => [
                        'mediapro.contacto@gmail.com'
                    ],

                    'reply_to' => $data['email'],

                    'subject' => 'Nuevo contacto MEDIAPRO: ' . $data['subject'],

                    'html' => '
                        <h2>Nuevo mensaje desde MEDIAPRO</h2>

                        <p><strong>Nombre:</strong> ' . e($data['name']) . '</p>

                        <p><strong>Correo:</strong> ' . e($data['email']) . '</p>

                        <p><strong>Asunto:</strong> ' . e($data['subject']) . '</p>

                        <hr>

                        <h3>Mensaje:</h3>

                        <p>' . nl2br(e($data['message'])) . '</p>
                    ',

                    'text' =>
                        "Nuevo mensaje desde MEDIAPRO\n\n" .
                        "Nombre: {$data['name']}\n" .
                        "Correo: {$data['email']}\n" .
                        "Asunto: {$data['subject']}\n\n" .
                        "Mensaje:\n{$data['message']}",
                ]);

            // Comprobar si Resend aceptó el envío.
            if ($response->successful()) {

                Log::info(
                    'Mensaje de contacto de MEDIAPRO enviado mediante Resend.',
                    [
                        'resend_id' => $response->json('id'),
                    ]
                );

                return redirect()->to(route('landing') . '#contacto')
                    ->with(
                        'contact_success',
                        '¡Mensaje enviado! Gracias por escribir a MEDIAPRO.'
                    );
            }

            // Registrar los errores devueltos por Resend.
            Log::error(
                'Resend rechazó el mensaje de contacto de MEDIAPRO.',
                [
                    'status' => $response->status(),
                    'response' => $response->json(),
                ]
            );

            return redirect()->to(route('landing') . '#contacto')
                ->withInput($request->except('data_authorization'))
                ->with(
                    'contact_error',
                    'No pudimos enviar tu mensaje. Inténtalo nuevamente más tarde.'
                );

        } catch (\Throwable $exception) {

            // Registrar cualquier otro error.
            Log::error(
                'Error al enviar el formulario de contacto de MEDIAPRO.',
                [
                    'exception' => $exception->getMessage(),
                ]
            );

            return redirect()->to(route('landing') . '#contacto')
                ->withInput($request->except('data_authorization'))
                ->with(
                    'contact_error',
                    'No pudimos enviar tu mensaje en este momento. Inténtalo nuevamente más tarde.'
                );
        }
    }
}
