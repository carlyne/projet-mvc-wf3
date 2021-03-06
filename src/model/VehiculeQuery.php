<?php 

namespace App\Model;

class VehiculeQuery extends AbstractModel
{

    public function __construct(string $tableName, array $tableFields = ['*'])
    {   
        parent::__construct($tableName, $tableFields);
    }

    public function findAll() : ?array 
    {
        $bdd = $this->getPdo();
        $query = $this->createGetQuery();
        $statement = $bdd->prepare($query);
        $statement->execute();

        $data = $statement->fetchAll();

        if(!$data) {
            return [];
        };

        $vehiculeObject = [];
        foreach($data as $vehiculeData) {
            $vehiculeObject[] = new Vehicule ( 
                $vehiculeData['id_vehicule'], $vehiculeData['marque'], $vehiculeData['modele'], $vehiculeData['couleur'], $vehiculeData['immatriculation']
            );
        }

        return $vehiculeObject;
    }

    // futur : déplacer toutes les requêtes findOne, findAll, etc.. dans une logique à part qui gèrerait les requêtes pour toutes les classes
    public function findOne(int $id) : ?Vehicule
    {
        $bdd = $this->getPdo();

        $query = $this->where('id_vehicule', ':id')->createGetQuery();
        
        $statement = $bdd->prepare($query);
        $statement->execute([
            ':id' => $id
        ]);

        $vehiculeData = $statement->fetch();

        if(!$vehiculeData) {
            return null;
        }

        return new Vehicule( $vehiculeData['id_vehicule'], $vehiculeData['marque'], $vehiculeData['modele'], $vehiculeData['couleur'], $vehiculeData['immatriculation']);
    }

    // futur : un array en parameters plutot que des string
    public function createOne(string $marque, string $modele, string $couleur, string $immatriculation) : bool
    {
        $bdd = $this->getPdo();

        $query = $this->insertValues(
            ['marque', 'modele', 'couleur', 'immatriculation'],
            [':marque', ':modele', ':couleur', ':immatriculation']
        )->createPostQuery();

        $statement = $bdd->prepare($query);
        
        // futur : boucler sur l'array et le tableau associatif
        return $statement->execute([
            ':marque' => $marque,
            ':modele' => $modele,
            ':couleur' => $couleur,
            ':immatriculation' => $immatriculation
        ]);
    }

    public function updateOne(int $id, string $marque, string $modele, string $couleur, string $immatriculation) : bool
    {
        $bdd = $this->getPdo();

        // query UPDATE a externaliser dans abstractModel
        $query = 'UPDATE vehicule SET marque=:marque, modele=:modele, couleur = :couleur, immatriculation = :immatriculation WHERE id_vehicule = :id';
        $statement = $bdd->prepare($query);
        return $statement->execute([
            ':marque' => $marque,
            ':modele' => $modele,
            ':couleur' => $couleur,
            ':immatriculation' => $immatriculation,
            ':id' => $id
        ]);
    }

};
