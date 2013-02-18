<?php
class Personnage {
	private $_id;
	private $_nom;
	private $_vie;
	private $_force;

	//hydratation
	public function __construct(array $donnees){
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
	//methode
	public function taper(Personnage $p){
		$p->setVie($p->getVie()-$this->getForce());
		echo 'Il reste '.$p->getVie().' a '.$p->getNom();
	}

	//setter
	public function setId($id){
		if(is_int($id))
			$this->_id = $id;
	}
	public function setVie($vie){
		if(is_int($vie))
			$this->_vie = $vie;
	}
	public function setNom($nom){
			if(is_string($nom))
				$this->_nom = $nom;
	}
	public function setForce($force){
		if(is_int($force))
			$this->_force = $force;
	}

	//getter
	public function getId(){return $this->_id;}
	public function getNom(){return $this->_nom;}
	public function getVie(){return $this->_vie;}
	public function getForce(){return $this->_force;}
}
?>