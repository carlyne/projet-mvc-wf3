<?php 

namespace App\Model;
use PDO;

class ConducteurQuery extends AbstractModel
{

    public function __construct(string $tableName, array $tableFields = ['*'])
    {   
        parent::__construct($tableName, $tableFields);
    }

    public function createOne(string $prenom, string $nom) : bool
    {
        $bdd = $this->getPdo();
        $query = $this->insertValues(['prenom', 'nom'], [':prenom', ':nom'])->createPostQuery();

        $statement = $bdd->prepare($query);

        return $statement->execute([
            ':prenom' => $prenom,
            ':nom' => $nom
        ]);
    }

};

?>