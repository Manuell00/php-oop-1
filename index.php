<?php

// Creo la classe Ticket
class Ticket
{

    // Definisco gli attributi per la classe Ticket
    public $owner_name;
    public $owner_surname;
    public $year_of_birth;

    // Inserisco construct
    public function __construct($owner_name, $owner_surname, $year_of_birth)
    {
        $this->owner_name = $owner_name;
        $this->owner_surname = $owner_surname;
        $this->year_of_birth = $year_of_birth;
    }
}


// Creo una classe : Movie
class Movie
{
    // ATTRIBUTI classe Movie
    public $name;
    public $author;
    public $ticket;

    // Inserisco un metodo static
    public static $ticketCounter = 0;


    // METODO COSTRUTTORE :
    // Inserisco un istanza della classe Ticket che rappresenta lo specifico ticket per quel Movie
    public function __construct($name, $author, Ticket $ticket)
    {

        // Assegnamo il valore del parametro name all'attributo $name dell'oggetto corrente.
        // Facciamo lo stesso con i restanti attributi
        $this->name = $name;
        $this->author = $author;
        $this->ticket = $ticket;

        // Incremento il numero di biglietti per ogni istanza
        self::$ticketCounter++;
    }

    // METODI STATICI:
    public static function getCurrentYear()
    {
        $currentYear = intval(date('Y'));
        return $currentYear;
    }

    // METODI GENERALI :

    public function getDescription()
    {
        // Definisco in una variabile il metodo in modo da poterlo utilizzare nella concatenazione
        $price = $this->getPrice();


        return $this->name . " " . $this->author . " " . $price;
    }


    public function getPrice()
    {
        // Creo una variabile per l'anno corrente
        $currentYear =  $this->getCurrentYear();

        // Creo una variabile per il valore dell'anno di nascita
        $birthYear = $this->ticket->year_of_birth;

        // Creo una variabile contenente la sottrazione dei due per capire l'età
        $differenceYear = $currentYear - $birthYear;

        // Verfico prezzo ticket a seconda dell'età
        if ($this->ticket->$differenceYear < 18) {
            return 5;
        } else if ($this->ticket->$differenceYear > 70) {
            return 10;
        } else {
            return 15;
        }
    }
}



// Creazione istanza(oggetto)
$movie_1 = new Movie('Avatar', 'James Cameron', new Ticket('Manuel', 'Caselli', 2000));

// Richiamo la funzione description sull'istanza $movie_1
$description = $movie_1->getDescription();
echo $description;
