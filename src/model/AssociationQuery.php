<?php 

namespace App\Model;

class AssociationQuery extends AbstractModel {

    /** @var ConducteurQuery*/
    private $_conducteurQuery;
    /** @var VehiculeQuery*/
    private $_vehiculeQuery;

    public function __construct(ConducteurQuery $conducteurQuery = null, VehiculeQuery $vehiculeQuery = null, array $tableFields = ['*'])
    {   
        parent::__construct('association_vehicule_conducteur', $tableFields);

        $this->_conducteurQuery = $conducteurQuery;
        $this->_vehiculeQuery = $vehiculeQuery;
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

        $associationObject = [];

        foreach($data as $associationData) {
            $objConducteur = $this->_conducteurQuery->findOne($associationData['id_conducteur']);
            $objVehicule = $this->_vehiculeQuery->findOne($associationData['id_vehicule']);
            var_dump( $objVehicule);

            

            $associationObject[] = new Association($associationData['id_association'], $objConducteur, $objVehicule);
            

        }

        return $associationObject;

        
    }


    public function createOne(int $idVehicule, int $idConducteur) : bool
    {
        $bdd = $this->getPdo();

        $query = $this->insertValues(
            ['id_vehicule', 'id_conducteur'],
            [':id_vehicule', ':id_conducteur']
        )->createPostQuery();

        $statement = $bdd->prepare($query);
        
        // futur : boucler sur l'array et le tableau associatif
        return $statement->execute([
            ':id_vehicule' => $idVehicule,
            ':id_conducteur' => $idConducteur
        ]);
    }
}


?>