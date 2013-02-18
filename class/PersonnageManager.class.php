<?php
class PersonnageManager {
	private $_db;

	public function __construct($db){
		$this->setDb($db);
	}

	//methode
	public function add(Personnage $p){
		$q = $this->_db->prepare("INSERT INTO personnages (nom,vie,forcee) VALUES (:nom,:vie,:forcee)");
		$q->execute(array(':nom'=>$p->getNom(), ':vie'=>$p->getVie(), ':forcee'=>$p->getForce())) or die(print_r($q->errorInfo()));	
		echo "Le personnage à bien été ajouté !";
	}

	public function update(Personnage $p){
		$q = $this->_db->prepare("UPDATE personnages SET nom=:nom,vie=:vie,forcee=:forcee");
		$q->execute(array('nom'=>$p->getNom(), 'vie'=>$p->getVie(), 'forcee'=>$p->getForce())) or die(print_r($q->errorInfo()));	
		echo "Le personnage à bien été modifier";
	}

	public function delete(Personnage $perso){
		$q = $this->_db->exec("DELETE FROM personnages WHERE id=".$perso->getId());
	}

	public function get($id){
		$q = $this->_db->query("SELECT * FROM personnages WHERE id=".$id) or die(print_r($q->errorInfo()));	
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		
		return new Personnage($donnees);
	}

	public function getList(){
		$q = $this->_db->query("SELECT * FROM personnages ORDER BY nom");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
			$perso[] = new Personnage($donnees);
		}

		return $perso;

	}

	//setter
	public function setDb(PDO $db){
		$this->_db = $db;
	}
}
?>