<?php

//Mise en forme : !NomClasse!, !attribut!, Getter/Setters


class !NomClasse!{
	
//Attributs, Getters Setters
 private $_!attribut!;


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

 // Get the value of _
 public function get!Attribut!()
 {
  return $this->_!attribut!;
 }

 // Set the value of _
 public function set!Attribut!($_!attribut!)
 {
  $this->_!attribut! = $_!attribut!;
 }
}