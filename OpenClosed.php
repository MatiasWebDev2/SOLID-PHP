<?php
declare(strict_types=1);

// Open Closed
# Se eu precisar adicionar um terceiro Provider de email ex. "GoggleProvider" eu não
# preciso alterar meu código cliente. 

interface IMailProvider {
    public function send(string $mensagem): void;
}

class SmtpProvider implements IMailProvider {
    public function send(string $mensagem): void {
        // Sending mensagem....
    }
}

class SendGridProvider implements IMailProvider {
    public function send(string $mensagem): void {
        // Sending mensagem...
    }
}


class NotificationCenter {
    private IMailProvider $mailService;

    public function __construct(IMailProvider $mailService)
    {
        $this->mailService = $mailService;
    }

    public function notifyUser(string $mensagem): void {
        $this->mailService->send($mensagem);
    }
}

$provider = new SmtpProvider();
$mailer = new NotificationCenter($provider);
$mailer->notifyUser('mensagem...');