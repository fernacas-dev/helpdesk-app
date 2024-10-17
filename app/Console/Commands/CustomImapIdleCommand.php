<?php

namespace App\Console\Commands;

use App\Models\Priority;
use App\Models\Status;
use App\Models\Team;
use App\Models\Ticket;
use App\Models\Category;
use App\Models\User;
use App\Models\Channel;
use Illuminate\Support\Facades\Log;
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
        $word = "SUPPORT:";
        $this->info("New message received 2: ".$message->subject);
        try{
            Log::info(strpos($message->subject, $word) !== false);
            if (strpos($message->subject, $word) !== false) {
                $this->createSupportTicket($message);
            } else {
                return;
            }
        }
        catch(\Exception $e){
            Log::error($e->getMessage());
        }
    }

    public function handle() {
        while (true) {
            $this->info("IDLE started");
            parent::handle();
            $this->info("IDLE ended");
        }
    }

    public function createSupportTicket(Message $message){

        $user = User::where('email', $message->getFrom()[0]->mail)->first();

        if(!$user) {
            $user = User::create([
                'name' => $message->getFrom()[0]->personal,
                'email' => $message->getFrom()[0]->mail,
                'password' => bcrypt('password'),
            ]);

            $user->setRole('only_customer');
        }

        $newStatus = Status::where('name', 'NEW')->first();
        $priority = Priority::where('name', 'MEDIUM')->first();
        $team = Team::where('name', 'Support')->first();
        $category = Category::where('name', 'default')->first();
        $channel = Channel::where('name', 'email_support')->first();

        Ticket::create([
            'title' => $message->subject,
            'description' => $message->getTextBody(),
            'status_id' => $newStatus->id,
            'priority_id' => $priority->id,
            'team_id' => $team->id,
            'category_id' => $category->id,
            'created_by' => $user->id,
            'channel_id' => $channel->id
        ]);
    }

}
