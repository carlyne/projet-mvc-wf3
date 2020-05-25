<?php 

namespace App\Model;

class ConducteurQuery extends AbstractModel
{

    public function __construct(string $tableName, array $tableFields = ['*'])
    {   
        parent::__construct($tableName, $tableFields);
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

};

?>