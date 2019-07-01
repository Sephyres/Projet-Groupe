<?php

//Mise en forme : !NomClasse!, !attribut!, Getter/Setters
class Utilisateur{
	
//Attributs, Getters Setters
private $_id;
private $_nom;
private $_prenom;
private $_email;
private $_login;
private $_password;
private $_role;

/**
 * Get the value of _id
 */ 
public function get_id()
{
return $this->_id;
}
/**
 * Set the value of _id
 *
 * @return  self
 */ 
public function set_id($_id)
{
$this->_id = $_id;
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
 * Get the value of _email
 */ 
public function get_email()
{
return $this->_email;
}
/**
 * Set the value of _email
 *
 * @return  self
 */ 
public function set_email($_email)
{
$this->_email = $_email;
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
 * Get the value of _password
 */ 
public function get_password()
{
return $this->_password;
}
/**
 * Set the value of _password
 *
 * @return  self
 */ 
public function set_password($_password)
{
$this->_password = $_password;
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