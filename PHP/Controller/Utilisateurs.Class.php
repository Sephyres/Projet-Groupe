<?php

//Mise en forme : !NomClasse!, !attribut!, Getter/Setters
class Utilisateurs
{

	//Attributs, Getters Setters
	private $_idUtilisateur;
	private $_login;
	private $_mdp;
	private $_mail;
	private $_nom;
	private $_prenom;
	private $_role;
	private $_pseudo;

	// Constructeur
	public function __construct(array $options = [])
	{
		if (!empty($options)) {
			$this->hydrate($options);
		}
	}
	public function hydrate($data)
	{
		foreach ($data as $key => $value) {
			$method = 'set' . ucfirst($key);

			if (is_callable([$this, $method])) {
				$this->$method($value);
			}
		}
	}

	// Get the value of _idUtilisateur
	public function getIdUtilisateur()
	{
		return $this->_idUtilisateur;
	}

	// Set the value of _idUtilisateur
	public function setIdUtilisateur($_idUtilisateur)
	{
		$this->_idUtilisateur = $_idUtilisateur;
	}

	// Get the value of _login
	public function getLogin()
	{
		return $this->_login;
	}

	// Set the value of _login
	public function setLogin($_login)
	{
		$this->_login = $_login;
	}

	// Get the value of _mdp
	public function getMdp()
	{
		return $this->_mdp;
	}

	// Set the value of _mdp
	public function setMdp($_mdp)
	{
		$this->_mdp = $_mdp;
	}

	// Get the value of _mail
	public function getMail()
	{
		return $this->_mail;
	}

	// Set the value of _mail
	public function setMail($_mail)
	{
		$this->_mail = $_mail;
	}

	// Get the value of _nom
	public function getNom()
	{
		return $this->_nom;
	}

	// Set the value of _nom
	public function setNom($_nom)
	{
		$this->_nom = $_nom;
	}

	// Get the value of _prenom
	public function getPrenom()
	{
		return $this->_prenom;
	}

	// Set the value of _prenom
	public function setPrenom($_prenom)
	{
		$this->_prenom = $_prenom;
	}

	// Get the value of _role
	public function getRole()
	{
		return $this->_role;
	}

	// Set the value of _role
	public function setRole($_role)
	{
		$this->_role = $_role;
	}

	// Get the value of _pseudo
	public function getPseudo()
	{
		return $this->_pseudo;
	}

	// Set the value of _pseudo
	public function setPseudo($_pseudo)
	{
		$this->_pseudo = $_pseudo;
	}
}
