<?php

class Articles
{

	//Attributs, Getters Setters
	private $_idArticle;
	private $_titre;
	private $_contenu;
	private $_dateArticle;


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

	// Get the value of _idArticle
	public function getIdArticle()
	{
		return $this->_idArticle;
	}

	// Set the value of _idArticle
	public function setIdArticle($_idArticle)
	{
		$this->_idArticle = $_idArticle;
	}

	// Get the value of _titre
	public function getTitre()
	{
		return $this->_titre;
	}

	// Set the value of _titre
	public function setTitre($_titre)
	{
		$this->_titre = $_titre;
	}

	// Get the value of _contenu
	public function getContenu()
	{
		return $this->_contenu;
	}

	// Set the value of _contenu
	public function setContenu($_contenu)
	{
		$this->_contenu = $_contenu;
	}

	// Get the value of _dateArticles
	public function getDateArticle()
	{
		return $this->_dateArticle;
	}

	// Set the value of _dateArticles
	public function setDateArticle($_dateArticle)
	{
		$this->_dateArticle = $_dateArticle;
	}
}
