<?php

//Mise en forme : !NomClasse!, !attribut!, Getter/Setters
class Forum
{

	//Attributs, Getters Setters
	private $_idForum;
	private $_datePost;
	private $_contenu;
	private $_idUtilisateur;

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

	// Get the value of _idForum
	public function getIdForum()
	{
		return $this->_idForum;
	}

	// Set the value of _idForum
	public function setIdForum($_idForum)
	{
		$this->_idForum = $_idForum;
	}

	// Get the value of _datePost
	public function getDatePost()
	{
		return $this->_datePost;
	}

	// Set the value of _datePost
	public function setDatePost($_datePost)
	{
		$this->_datePost = $_datePost;
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
}
