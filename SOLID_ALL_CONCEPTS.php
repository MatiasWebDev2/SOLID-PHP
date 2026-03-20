<?php
declare(strict_types=1);

# Todos os conceitos do princípio solid são respeitados aqui:
# 1. SRP - Notifier não implementa lógica para enviar email ou sms
# 2. OCP - Posso adicionar novos serviços como: Whatsapp push sem alterar notifier
# 3. LSP - SMS não é forçado a implementar setSubject
# 4. ISP - interface HasSubject é usada somente quando necessário.
# 5. DIP - Notifier depende de Message interface e não de um serviço concreto.

interface Message {
    public function setRecipient(string $to): void;
    public function setContent(string $recipient): void;
    public function send(): void;
}

interface HasSubject {
    public function setSubject(string $subject): void;
}

class EmailService implements Message, HasSubject {
    public function setRecipient(string $to): void {/* Code... */}
    public function setContent(string $recipient): void {/* Code... */}
    public function send(): void {/* Code... */}
    public function setSubject(string $subject): void {/* Code... */}
}

class SmsService implements Message {
    public function setRecipient(string $to): void {/* Code... */}
    public function setContent(string $recipient): void {/* Code... */}
    public function send(): void {/* Code... */}
}

class Notifier {
    /** @var Message[] */
    private array $services = [];

    // OCP: Você pode adicionar novos serviços (Push, WhatsApp) sem alterar esta classe
    public function addService(Message $service): void {
        $this->services[] = $service;
    }

    public function notify(string $to, string $content, ?string $subject = null): void {
        foreach ($this->services as $service) {
            $service->setRecipient($to);
            $service->setContent($content);

            // LSP: Verificamos a interface específica sem quebrar o fluxo do SmsService
            if ($service instanceof HasSubject && $subject !== null) {
                $service->setSubject($subject);
            }

            $service->send();
        }
    }
}

$notifier = new Notifier();
$notifier->addService(new EmailService());
$notifier->addService(new SmsService());
$notifier->notify('matias@matias', 'Sr. Cliente...', 'Aviso importante');
