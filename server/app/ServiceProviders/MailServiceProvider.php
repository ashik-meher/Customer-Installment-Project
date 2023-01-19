<?php

namespace App\ServiceProviders;


class MailServiceProvider
{

    /**
     * Private Properties
     */

    private $receipient;

    private $subject;

    private $textMessage;

    /**
     * Instantiator
     */

    function __construct($receipient, $subject, $textMessage)
    {
        $this->receipient = $receipient;
        $this->subject = $subject;
        $this->textMessage = $textMessage;
    }

    /**
     * Private Method To Send Mail
     * On success it will return 1
     */

    public function sendMail()
    {

        $sent = mail($this->receipient, $this->subject, $this->textMessage);

        if ($sent == 1) {
            return true;
        }

        return false;
    }
}
