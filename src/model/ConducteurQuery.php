<?php 

namespace App\Model;

class ConducteurQuery extends AbstractModel
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

        $conducteurObject = [];
        foreach($data as $conducteurData) {
            $conducteurObject[] = new Conducteur ( 
                $conducteurData['id_conducteur'], $conducteurData['prenom'], $conducteurData['nom']
            );
        }

        return  $conducteurObject;
    }

    // futur : déplacer toutes les requêtes findOne, findAll, etc.. dans une logique à part qui gèrerait les requêtes pour toutes les classes
    public function findOne(int $id) : ?Conducteur
    {
        $bdd = $this->getPdo();

        $query = $this->where('id_conducteur', ':id')->createGetQuery();
        
        $statement = $bdd->prepare($query);
        $statement->execute([
            ':id' => $id
        ]);

        $conducteurData = $statement->fetch();

        if(!$conducteurData) {
            return null;
        }

        return new Conducteur( $conducteurData['id_conducteur'], $conducteurData['prenom'], $conducteurData['nom'] );
    }


    // futur : un array en parameters plutot que des string
    public function createOne(string $prenom, string $nom) : bool
    {
        $bdd = $this->getPdo();
        $query = $this->insertValues(['prenom', 'nom'], [':prenom', ':nom'])->createPostQuery();

        $statement = $bdd->prepare($query);

        // futur : boucler sur l'array et le tableau associatif
        return $statement->execute([
            ':prenom' => $prenom,
            ':nom' => $nom
        ]);
    }

    public function updateOne(int $id, string $prenom, string $nom) : bool
    {
        $bdd = $this->getPdo();

        // query UPDATE a externaliser dans abstractModel
        $query = 'UPDATE conducteur SET prenom=:prenom, nom=:nom WHERE id_conducteur = :id';
        $statement = $bdd->prepare($query);
        return $statement->execute([
            ':prenom' => $prenom,
            ':nom' => $nom,
            ':id' => $id
        ]);
    }

};

?>