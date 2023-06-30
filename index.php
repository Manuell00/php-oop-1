<?php

// Creo una classe : Movie
class Movie
{
    public $name;
    public $author;
    public $ticket_price;

    //   Utilizzo la funzione __construct da richiamare con new successivamente
    public function __construct($name, $author, $ticket_price)
    {

        // Assegnamo il valore del parametro $name all'attributo $name dell'oggetto corrente.
        // Facciamo lo stesso con i restanti attributi
        $this->name = $name;
        $this->author = $author;
        $this->ticket_price = $ticket_price;
    }
}

$movie_1 = new Movie("Avatar", "James Cameron", "10$");
var_dump($movie_1);
