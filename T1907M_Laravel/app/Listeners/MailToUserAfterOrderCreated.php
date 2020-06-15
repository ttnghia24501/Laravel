<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Mail\MailToUserAfterOrderCreate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MailToUserAfterOrderCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderCreated  $event
     * @return void
     */
    public function handle(OrderCreated $event)
    {
        $order = $event->order;
        $user = User::find($order->__get("user_id"));
        try{
            Mail::to($user->__get("email"))
                ->send(new MailToUserAfterOrderCreate($user));
        }catch(\Exception $exception){}
    }
}
