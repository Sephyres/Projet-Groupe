<?php

//Mise en forme : !NomClasse!, !attribut!, Getter/Setters
class Utilisateur{
	
//Attributs, Getters Setters
private $_id_utilisateurs;
private $_login;
private $_mdp;
private $_mail;
private $_nom;
private $_prenom;
private $_role;
private $_pseudo;

/**
 * Get the value of _id_utilisateurs
 */ 
public function get_id_utilisateurs()
{
return $this->_id_utilisateurs;
}

/**
 * Set the value of _id_utilisateurs
 *
 * @return  self
 */ 
public function set_id_utilisateurs($_id_utilisateurs)
{
$this->_id_utilisateurs = $_id_utilisateurs;

return $this;
}

/**
 * Get the value of _login
 */ 
public function get_login()
{
return $this->_login;
}

/**
 * Set the value of _login
 *
 * @return  self
 */ 
public function set_login($_login)
{
$this->_login = $_login;

return $this;
}

/**
 * Get the value of _mdp
 */ 
public function get_mdp()
{
return $this->_mdp;
}

/**
 * Set the value of _mdp
 *
 * @return  self
 */ 
public function set_mdp($_mdp)
{
$this->_mdp = $_mdp;

return $this;
}

/**
 * Get the value of _mail
 */ 
public function get_mail()
{
return $this->_mail;
}

/**
 * Set the value of _mail
 *
 * @return  self
 */ 
public function set_mail($_mail)
{
$this->_mail = $_mail;

return $this;
}

/**
 * Get the value of _nom
 */ 
public function get_nom()
{
return $this->_nom;
}

/**
 * Set the value of _nom
 *
 * @return  self
 */ 
public function set_nom($_nom)
{
$this->_nom = $_nom;

return $this;
}

/**
 * Get the value of _prenom
 */ 
public function get_prenom()
{
return $this->_prenom;
}

/**
 * Set the value of _prenom
 *
 * @return  self
 */ 
public function set_prenom($_prenom)
{
$this->_prenom = $_prenom;

return $this;
}

/**
 * Get the value of _role
 */ 
public function get_role()
{
return $this->_role;
}

/**
 * Set the value of _role
 *
 * @return  self
 */ 
public function set_role($_role)
{
$this->_role = $_role;

return $this;
}

/**
 * Get the value of _pseudo
 */ 
public function get_pseudo()
{
return $this->_pseudo;
}

/**
 * Set the value of _pseudo
 *
 * @return  self
 */ 
public function set_pseudo($_pseudo)
{
$this->_pseudo = $_pseudo;

return $this;
}

	// Constructeur
	public function __construct(array $options = [])
	{ 
		if (!empty($options))
		{
			$this->hydrate($options);
		}
	}
	public function hydrate($data)
	{
		foreach ($data as $key => $value)
		{
			$method = 'set'.ucfirst($key);
			
			if (is_callable([$this, $method]))
			{
				$this->$method($value);
			}
		}
	}
}