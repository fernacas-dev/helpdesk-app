<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Webklex\IMAP\Facades\Client;

use Illuminate\Support\Facades\Log;

class GetEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $this->readEmails();

    }



    public function readEmails()
    {
        $client = Client::account('default');
        $client->connect();

        $folder = $client->getFolder('INBOX');

        // Obtener los mensajes
        $messages = $folder->messages()->all()->limit($limit = 3, $page = 1)->get();

        foreach ($messages as $message) {
            echo "Asunto: " . $message->getSubject() . "\n";
            echo "De: " . $message->getFrom()[0]->mail . "\n";
            echo "Fecha: " . $message->getDate() . "\n";
            echo "Contenido: " . $message->getTextBody() . "\n";

            // Log::info('Asunto: ' . $message->getSubject());
            // Log::info('De: ' . $message->getFrom()[0]->mail);
            // Log::info('Fecha: ' . $message->getDate());
            // Log::info('Contenido: ' . $message->getTextBody());

            // Marcar el correo como leído
            // $message->setFlag('\\Seen');  // Agregar el flag SEEN
        }

        $client->disconnect();
    }

}
