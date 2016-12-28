<?php
// Cette entité déclare la classe Auteur du coté serveur de l'application
namespace ListeAuteurBundle\Entity;

/**
 * Auteur
 */
class Auteur
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $mail;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Auteur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Auteur
     */
    public function setMail($adresse)
    {
        $this->mail = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }
}

