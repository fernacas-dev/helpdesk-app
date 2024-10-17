<?php

namespace App\Console\Commands;

use Webklex\IMAP\Commands\ImapIdleCommand;
use Webklex\PHPIMAP\Message;

class CustomImapIdleCommand extends ImapIdleCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'custom:idle';

    protected $account = "default";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Callback used for the idle command and triggered for every new received message
     * @param Message $message
     */
    public function onNewMessage(Message $message){
        $this->info("New message received: ".$message->subject);
    }

    public function handle() {
        while (true) {
            $this->info("IDLE started");
            parent::handle();
            $this->info("IDLE ended");
        }

    }

}
