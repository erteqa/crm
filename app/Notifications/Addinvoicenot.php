<?php

namespace App\Notifications;

use App\Model\Invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Addinvoicenot extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $invoice;
    public function __construct(Invoice $invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
//    public function toMail($notifiable)
//    {
//        return (new MailMessage)
//                    ->line('The introduction to the notification.')
//                    ->action('Notification Action', url('/'))
//                    ->line('Thank you for using our application!');
//    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'data' => '<div>

<i>Invoice added: </i>
<strong>' . $this->invoice->Customer->name . '</strong>
<br>
<i>Number:</i>
<strong>' . $this->invoice->tid . '</strong>
<br>
<i>By:</i>
<strong>' . $this->invoice->User->name . '</strong>
</div>',
            'icon' => 'fa-user',
            'type' => 'Invoice',
            'Invoice_id' => $this->invoice->id
        ];
    }
//    public function toArray($notifiable)
//    {
//        return [
//            'data' => '<div>
//
//<i>Invoice added: </i>
//<strong>' . $this->invoice->User->name . '</strong>
//<br>
//<i>To:</i>
//<strong>' . $this->invoice->tid . '</strong>
//<br>
//<i>By:</i>
//<strong>' . $this->invoice->Customer->name . '</strong>
//</div>',
//            'icon' => 'fa-user',
//            'type' => 'Invoice',
//            'Invoice_id' => $this->invoice->id
//        ];
//    }
    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage(
            [
                'data' => '<div>

<i>Invoice added: </i>
<strong>' . $this->invoice->User->name . '</strong>
<br>
<i>To:</i>
<strong>' . $this->invoice->tid . '</strong>
<br>
<i>By:</i>
<strong>' . $this->invoice->Customer->name . '</strong>
</div>',
                'icon' => 'fa-user',
                'type' => 'Invoice',
                'Invoice_id' => $this->invoice->id
        ]);
    }
}
