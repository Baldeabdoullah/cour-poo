<?php

abstract class Humain
{

    public $nom;
    public $prenom;
    protected $age;

    public function __construct($prenom, $nom, $age)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        // on met la fnction setage qui vas faire la verification
        $this->setAge($age);
    }

    abstract public function travailler();

    public function setAge($age)
    {
        if (is_int($age) && $age >= 1 && $age <= 120) {
            $this->age = $age;
        } else {
            throw new Exception("l'age de l'employe doit etre un entier entre 1 et 120");
        }
    }

    public function getAge()
    {

        return $this->age;
    }
}

class Employe extends Humain
{


    public function travailler()
    {
        return "Je suis un emplolyer et je travaille";
    }



    // this-> represente la fonction dans laquelle on se trouve

    public function presentation()
    {
        var_dump("Salut je suis $this->prenom $this->nom et j'ai $this->age ans");
    }
}

class Patron extends Employe
{
    public $voiture;

    public function __construct($prenom, $nom, $age, $voiture)
    {
        // on appele le constructeur de la class precedante pour ne pas se repeter
        parent::__construct($prenom, $nom, $age);
        $this->voiture = $voiture;
    }

    public function travailler()
    {
        return "je suis le patron et je bosse aussi";
    }

    public function presentation()
    {
        var_dump("Bonjour je suis $this->prenom $this->nom et j'ai $this->age ans 
        et j'ai une $this->voiture");
    }


    public function rouler()
    {
        var_dump("bonjour, je roule avec ma $this->voiture !");
    }
}

$employe1 = new Employe("Lior", "Chamla", 32);
$employe2 = new Employe("Magali", "Perlin", 33);
$employe1->presentation();

$patron = new Patron("joseph", "Durand", 55, "mercedes");

$patron->presentation();
$patron->rouler();

class Etudiant extends Humain
{
    public function travailler()
    {
        return "je suis un etudiants et je revise";
    }
}

$etudiant = new Etudiant("ali", "kevin", 76);

faireTravailler($etudiant);
faireTravailler($employe1);
faireTravailler($patron);

function faireTravailler(Humain $objet)
{
    var_dump("travail en cours: {$objet->travailler()}");
}
