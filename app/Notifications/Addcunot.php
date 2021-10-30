<?php

namespace App\Notifications;

use App\Model\Customer;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Addcunot extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $customer;
    public function __construct(Customer $customer)
    {
        $this->customer=$customer;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'data' =>'<div>

<i>Customer added: </i>
<strong>'.$this->customer->name.'</strong>
<br>
<i>To:</i>
<strong>'.$this->customer->Group->name.'</strong>
<br>
<i>By:</i>
<strong>'.$this->customer->User->name.'</strong>
</div>',
            'icon' => 'fa-user',
            'type' =>  'Customer',
             'customer_id' => $this->customer->id
        ];
    }
}
