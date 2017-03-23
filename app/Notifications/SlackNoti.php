<?php

namespace NewsGame\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Http\Request;

class SlackNoti extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toSlack($notifiable)
    {
        return (new SlackMessage)->content('Tienes un nuevo Mensaje')
        ->attachment(function($attachment){
            $attachment->title('Tienes un nuevo mensaje')->fields([
                'name'=>$this->request->name,
                'email'=>$this->request->email,
                'content'=>$this->request->comment,
                ]);
        });
    }

}
