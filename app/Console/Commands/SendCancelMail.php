<?php

namespace App\Console\Commands;

use App\CancelEmail;
use App\Mail\Cancel;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendCancelMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send_cancel_mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send mail to customer cancel order';

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
	    $emails = CancelEmail::where('status','<',2)->where('attempt','<',5)->get();
	    if ($emails){
		    foreach ($emails as $email){
			    $order = $email->order;
			    Mail::to($order->email)->send(new Cancel($email));
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
	    $cancel_emails = CancelEmail::where('status','<',2)->where('attempt',5)->get();
	    $cancel_emails->update(['status'=>3]);
    }
}
