<?php

namespace Model\Entity;


class Utilisateur extends BaseEntity{

    private $nomUtilisateur;
    private $prenomUtilisateur;
    private $emailUtilisateur;
    private $mdpUtilisateur;
    private $dateNaissanceUtilisateur;
    private $telephoneUtilisateur;
    private $sexeUtilisateur;
    private $roleUtilisateur;



    public function getNomUtilisateur() {

        return $this->nomUtilisateur;

    }

    public function setNomUtilisateur($nomUtilisateur) {

        $this->nomUtilisateur = $nomUtilisateur;

    }

    public function getPrenomUtilisateur() {

        return $this->prenomUtilisateur;

    }

    public function setPrenomUtilisateur($prenomUtilisateur){

        $this->prenomUtilisateur = $prenomUtilisateur;

    }

    public function getEmailUtilisateur() {

        return $this->emailUtilisateur;

    }

    public function setEmailUtilisateur($emailUtilisateur) {

        $this->emailUtilisateur = $emailUtilisateur;

    }

    public function getMdpUtilisateur() {

        return $this->mdpUtilisateur;

    }

    public function setMdpUtilisateur($mdpUtilisateur) {

        $this->mdpUtilisateur = $mdpUtilisateur;

    }

    public function getDateNaissanceUtilisateur() {

        return $this->dateNaissanceUtilisateur;

    }

    public function setDateNaissanceUtilisateur($dateNaissanceUtilisateur) {

        $this->dateNaissanceUtilisateur = $dateNaissanceUtilisateur;

    }

    public function getTelephoneUtilisateur() {

        return $this->telephoneUtilisateur;

    }

    public function setTelephoneUtilisateur($telephoneUtilisateur) {

        $this->telephoneUtilisateur = $telephoneUtilisateur;

    }

    public function getSexeUtilisateur() {

        return $this->sexeUtilisateur;

    }

    public function setSexeUtilisateur($sexeUtilisateur) {

        $this->sexeUtilisateur = $sexeUtilisateur;

    }



    /**
     * Get the value of roleUtilisateur
     */ 
    public function getRoleUtilisateur()
    {
        return $this->roleUtilisateur;
    }

    /**
     * Set the value of roleUtilisateur
     *
     * @return  self
     */ 
    public function setRoleUtilisateur($roleUtilisateur)
    {
        $this->roleUtilisateur = $roleUtilisateur !== null ? $roleUtilisateur : ROLE_USER;

        return $this;
    }

}