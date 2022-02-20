<?php
class Gebruiker
{
    // Properties
    public $voornaam;
    public $achternaam;
    public $email;
    public $straat;
    public $stad;
    public $postcode;
    public $telefoon;
    private $rol;

    //methods
    function __construct(
        $voornaam,
        $achternaam,
        $email,
        $straat,
        $stad,
        $postcode,
        $telefoon,
        $rol
    ) {
        $this->voornaam = $voornaam;
        $this->achternaam = $achternaam;
        $this->email = $email;
        $this->straat = $straat;
        $this->stad = $stad;
        $this->postcode = $postcode;
        $this->telefoon = $telefoon;
        $this->rol = $rol;
    }
    function __destruct()
    {
        echo "Naam {$this->voornaam} {$this->achternaam}
        <br>
        E-mail: {$this->email}
        <br>
        Adres: {$this->straat} {$this->postcode} {$this->stad}
        <br>
        Telefoon: {$this->telefoon}
        <br>
        Rol: {$this->rol}";
    }
}

$gebr = new Gebruiker(
    'Giovanni',
    'Vreeling',
    'giovannixrsx@gmail.com',
    'Voorofscheweg 36',
    'Boskoop',
    '2771MD',
    '0682773943',
    'admin'
);
?>
