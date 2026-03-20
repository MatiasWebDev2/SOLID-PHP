<?php
declare(strict_types=1);

// Interface Segregation
# SmsService não é obrigado a implementar setSubject porque não faz sentido para o serviço

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

