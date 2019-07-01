<?php

//Mise en forme : !NomClasse!, !attribut!, Getter/Setters
class Forum{
	
//Attributs, Getters Setters
private $_id_forum;
private $_date_post;
private $_contenu;
private $_utilisateurs_id_utilisateurs;

/**
 * Get the value of _id_forum
 */ 
public function get_id_forum()
{
return $this->_id_forum;
}

/**
 * Set the value of _id_forum
 *
 * @return  self
 */ 
public function set_id_forum($_id_forum)
{
$this->_id_forum = $_id_forum;

return $this;
}

/**
 * Get the value of _date_post
 */ 
public function get_date_post()
{
return $this->_date_post;
}

/**
 * Set the value of _date_post
 *
 * @return  self
 */ 
public function set_date_post($_date_post)
{
$this->_date_post = $_date_post;

return $this;
}

/**
 * Get the value of _contenu
 */ 
public function get_contenu()
{
return $this->_contenu;
}

/**
 * Set the value of _contenu
 *
 * @return  self
 */ 
public function set_contenu($_contenu)
{
$this->_contenu = $_contenu;

return $this;
}

/**
 * Get the value of _utilisateurs_id_utilisateurs
 */ 
public function get_utilisateurs_id_utilisateurs()
{
return $this->_utilisateurs_id_utilisateurs;
}

/**
 * Set the value of _utilisateurs_id_utilisateurs
 *
 * @return  self
 */ 
public function set_utilisateurs_id_utilisateurs($_utilisateurs_id_utilisateurs)
{
$this->_utilisateurs_id_utilisateurs = $_utilisateurs_id_utilisateurs;

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