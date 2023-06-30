<?php

// Creo la classe Ticket
class Ticket
{
    // Definisco gli attributi per la classe Ticket
    public $owner_name;
    public $owner_surname;
    public $year_of_birth;

    // Inserisco il costruttore
    public function __construct($owner_name, $owner_surname, $year_of_birth)
    {
        $this->owner_name = $owner_name;
        $this->owner_surname = $owner_surname;
        $this->year_of_birth = $year_of_birth;
    }
}

// Creo la classe Movie
class Movie
{
    // Attributi della classe Movie
    public $name;
    public $author;
    public $ticket;
    public $ticketNumber;

    // Contatore statico per tenere traccia del numero di istanze di Movie
    public static $counter = 0;

    // Costruttore della classe Movie
    public function __construct($name, $author, Ticket $ticket)
    {
        $this->name = $name;
        $this->author = $author;
        $this->ticket = $ticket;

        // Incremento del contatore e dopo assegno il valore del counter a ticketNumber
        self::$counter++;
        $this->ticketNumber = self::$counter;
    }

    // Metodo statico per ottenere l'anno corrente
    public static function getCurrentYear()
    {
        return intval(date('Y'));
    }

    // Metodo per ottenere la descrizione del film
    public function getDescription()
    {
        $price = $this->getPrice();
        return $this->name . " " . $this->author . " " . $price . " " . $this->ticketNumber;
    }

    // Metodo per ottenere il prezzo del biglietto
    public function getPrice()
    {
        $currentYear = self::getCurrentYear();
        $birthYear = $this->ticket->year_of_birth;
        $differenceYear = $currentYear - $birthYear;

        if ($differenceYear < 18) {
            return 5;
        } else if ($differenceYear > 70) {
            return 10;
        } else {
            return 15;
        }
    }
}

// Creazione delle istanze di Movie
$movie1 = new Movie('Avatar', 'James Cameron', new Ticket('Manuel', 'Caselli', 2010));
$movie2 = new Movie('Inception', 'Christopher Nolan', new Ticket('John', 'Doe', 1985));
$movie3 = new Movie('The Shawshank Redemption', 'Frank Darabont', new Ticket('Jane', 'Smith', 1992));

// Array per memorizzare le istanze di Movie
$movies = array($movie1, $movie2, $movie3);

// Ciclo sull'array e richiamo il metodo getDescription() per ogni istanza
foreach ($movies as $movie) {
    $description = $movie->getDescription();
    echo $description . "<br>";
}
