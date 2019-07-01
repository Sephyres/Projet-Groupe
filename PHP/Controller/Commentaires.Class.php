<?php

//Mise en forme : !NomClasse!, !attribut!, Getter/Setters
class Commentaires{
	
//Attributs, Getters Setters
private $_id_commentaires;
private $_date;
private $_contenu;
private $_utilisateurs_id_utilisateurs;
private $_articles_id_articles;

/**
 * Get the value of _id_commentaires
 */ 
public function get_id_commentaires()
{
return $this->_id_commentaires;
}

/**
 * Set the value of _id_commentaires
 *
 * @return  self
 */ 
public function set_id_commentaires($_id_commentaires)
{
$this->_id_commentaires = $_id_commentaires;

return $this;
}

/**
 * Get the value of _date
 */ 
public function get_date()
{
return $this->_date;
}

/**
 * Set the value of _date
 *
 * @return  self
 */ 
public function set_date($_date)
{
$this->_date = $_date;

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

/**
 * Get the value of _articles_id_articles
 */ 
public function get_articles_id_articles()
{
return $this->_articles_id_articles;
}

/**
 * Set the value of _articles_id_articles
 *
 * @return  self
 */ 
public function set_articles_id_articles($_articles_id_articles)
{
$this->_articles_id_articles = $_articles_id_articles;

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