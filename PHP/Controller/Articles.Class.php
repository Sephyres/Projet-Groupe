<?php

//Mise en forme : !NomClasse!, !attribut!, Getter/Setters
class Articles{
	
//Attributs, Getters Setters
private $_id_articles;
private $_titre;
private $_contenu;
private $_date_article;

/**
 * Get the value of _id_articles
 */ 
public function get_id_articles()
{
return $this->_id_articles;
}

/**
 * Set the value of _id_articles
 *
 * @return  self
 */ 
public function set_id_articles($_id_articles)
{
$this->_id_articles = $_id_articles;

return $this;
}

/**
 * Get the value of _titre
 */ 
public function get_titre()
{
return $this->_titre;
}

/**
 * Set the value of _titre
 *
 * @return  self
 */ 
public function set_titre($_titre)
{
$this->_titre = $_titre;

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
 * Get the value of _date_article
 */ 
public function get_date_article()
{
return $this->_date_article;
}

/**
 * Set the value of _date_article
 *
 * @return  self
 */ 
public function set_date_article($_date_article)
{
$this->_date_article = $_date_article;

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