<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ContactMessage extends Notification {
	use Queueable;

	private $fromEmail, $message;

	/**
	 * Create a new notification instance.
	 *
	 * @param $fromEmail
	 * @param $message
	 */
	public function __construct( $fromEmail, $message ) {
		$this->fromEmail = $fromEmail;
		$this->message   = $message;
	}

	/**
	 * Get the notification's delivery channels.
	 *
	 * @param  mixed $notifiable
	 *
	 * @return array
	 */
	public function via( $notifiable ) {
		return [ 'mail' ];
	}

	/**
	 * Get the mail representation of the notification.
	 *
	 * @param  mixed $notifiable
	 *
	 * @return \Illuminate\Notifications\Messages\MailMessage
	 */
	public function toMail( $notifiable ) {
		return ( new MailMessage )
			->subject( trans( 'mail.contact.subject', [], NULL, getLocale() ) )
			->line( trans( 'mail.contact.received', [], NULL, getLocale() ) )
			->line( $this->message )
			->line( trans( 'mail.contact.fromEmail', [], NULL, getLocale() ) . $this->fromEmail );
	}

	/**
	 * Get the array representation of the notification.
	 *
	 * @param  mixed $notifiable
	 *
	 * @return array
	 */
	public function toArray( $notifiable ) {
		return [
			//
		];
	}
}
