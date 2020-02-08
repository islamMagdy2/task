<?php

namespace App\Notifications;

use App\Companies;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CompanyAdded extends Notification
{
    use Queueable;
    protected $compnay;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Companies $compnay)
    {
        $this->compnay = $compnay;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('A new Company '.$this->compnay->name.' was added')
                    ->success()
                    ->line('A new Company was added successfully '.$this->compnay->name)
                    ->action('See Companies', url(route('companies')));
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
            //
        ];
    }
}
