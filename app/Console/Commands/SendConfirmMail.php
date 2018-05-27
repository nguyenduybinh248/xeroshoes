<?php

namespace App\Console\Commands;

use App\ConfirmEmail;
use App\Mail\Confirmed;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendConfirmMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send_confirm_emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send emails to confirm orders ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
	    $emails = ConfirmEmail::where('status','<',2)->where('attempt','<',5)->get();
	    if ($emails){
		    foreach ($emails as $email){
			    $order = $email->order;
			    Mail::to($order->email)->send(new Confirmed($order));
			    $attempt = $email->attempt + 1;
			    if (Mail::failures()) {
				    $email->update([
					    'status'=>1,
					    'attempt'=>$attempt
				    ]);
			    }
			    else{
				    $email->update([
					    'status'=>2,
					    'attempt'=>$attempt
				    ]);
			    }
		    }
	    }
	    $confirm_emails = ConfirmEmail::where('status','<',2)->where('attempt',5)->get();
	    $confirm_emails->update(['status'=>3]);
    }
}
