<?php

//Mise en forme : !NomClasse!, !attribut!, Getter/Setters
class Commentaires
{

	//Attributs, Getters Setters
	private $_idCommentaire;
	private $_dateCommentaire;
	private $_contenu;
	private $_idUtilisateur;
	private $_idArticle;

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


	// Get the value of _idCommentaire
	public function getIdCommentaire()
	{
		return $this->_idCommentaire;
	}

	// Set the value of _idCommentaire
	public function setIdCommentaire($_idCommentaire)
	{
		$this->_idCommentaire = $_idCommentaire;
	}

	// Get the value of _dateCommentaire
	public function getDateCommentaire()
	{
		return $this->_dateCommentaire;
	}

	// Set the value of _dateCommentaire
	public function setDateCommentaire($_dateCommentaire)
	{
		$this->_dateCommentaire = $_dateCommentaire;
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
}
