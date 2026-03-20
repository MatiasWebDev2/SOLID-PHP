<?php
declare(strict_types=1);

// Inversão de dependência
# Pedido Service depende da interface IMailSender não de um serviço concreto.

interface IMailSender {
    public function send($message): void;
}

class AlphaMail implements IMailSender {
    public function send($message): void
    {
        // sending mail...'
    }
}

class PedidoService {
    private IMailSender $notificador;

    public function __construct(IMailSender $notificador)
    {
       $this->notificador = $notificador;
    }

}