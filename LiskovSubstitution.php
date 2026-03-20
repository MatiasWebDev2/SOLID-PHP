<?php
declare(strict_types=1);

// Liskov Substitution
# Os comportamentos de EmailNotifier e SMSNotifier têm que ser consistentes. Posso usar qualquer um 
# e obterei o mesmo resultado. o método notify não deve realizar tarefas diferentes em suas 
# implementações concretas.

interface Notifier {
    public function notify($msg): void;
}

class SMSNotifier implements Notifier {

    public function notify($msg): void
    {
        throw new \Exception('Not implemented');
    }
}

class EmailNotifier implements Notifier {
    public function notify($msg): void
    {
        throw new \Exception('Not implemented');
    }
}

function notify(Notifier $n, string $msg) {
    $n->notify($msg);
}

notify(new SMSNotifier(), 'Sr. usuário...');
notify(new EmailNotifier(), 'Sr. usuário...');