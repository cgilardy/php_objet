<?php
class Membre { 
	private $_id;
	private $_pseudo;
	private $_passe;
	private $_rang;


	//constructeur
	public function __construct(array $donnees){
		echo 'yes';
		foreach ($donnees as $key => $value)
		{
			$method = 'set'.ucfirst($key);
		    // Si le setter correspondant existe.
		    if (method_exists($this, $method))
		    {
		      // On appelle le setter.
		      $this->$method($value);
		    }
		}
	}

	//getter
	public function getId(){return $this->_id;}
	public function getPseudo(){return $this->_pseudo;}
	public function getPasse(){return $this->_passe;}
	public function getRang(){return $this->_rang;}

	//setter

	public function setId($id){
		if(is_int($id))
			$this->_id = $id;
	}

	public function setPseudo($pseudo){
			$this->_pseudo = $pseudo;
	}

	public function setPasse($passe){
		$this->_passe = $passe;
	}

	public function setRang($rang){
		$this->_rang = $rang;
	}

}
?>