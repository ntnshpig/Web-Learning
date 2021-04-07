
<?php
    include "Model.php";

    class Heroes extends Model{
        private $id = null;
        public $name;
        public $description;
        public $race;
        public $class_role;

        public function __construct() {
            parent::__construct("heroes");
        }
        public function getId() {
            return $this->id;
        }
        public function setId($id) {
            $this->id = $id;
        }

        function find($id)  {
            if($this->db_new->getConnectionStatus() == true) {
                $output = $this->db_new->db_connection->query("SELECT * FROM $this->table WHERE id=$id");
                $arr = $output->fetch(PDO::FETCH_ASSOC);
                $this->id = $arr['id'];
                $this->name = $arr['name'];
                $this->description = $arr['description'];
                $this->race = $arr['race'];
                $this->class_role = $arr['class_role'];
            }
        }

        function save() {
            if ($this->db_new->getConnectionStatus() == true) {
                $output = $this->db_new->db_connection->query("SELECT id FROM " . $this->table . " WHERE id = " . $this->getId() . ";");
                $arr = $output->fetch(PDO::FETCH_ASSOC);
                $sql = null;
                if ($arr["id"]) {
                    $sql = "UPDATE heroes SET name=:name, description=:description, race=:race, class_role=:class_role  WHERE id=" . $this->getId();
                    $sth = $this->db_new->db_connection->prepare($sql);
                    $sth->execute(array(":name" => $this->name,
                                        ":description"  => $this->description,
                                        ":race" => $this->race,
                                        ":class_role" => $this->class_role));
                } else {
                    $sql = "INSERT INTO heroes (id, name, description, race, class_role) VALUES (:id, :name, :description, :race, :class_role)";
                    $sth = $this->db_new->db_connection->prepare($sql);
                    $sth->execute(array(":id" => $this->getId(),
                                        ":name" => $this->name,
                                        ":description"  => $this->description,
                                        ":race" => $this->race,
                                        ":class_role" => $this->class_role));
                }
            }
        }

        function delete(){
            if($this->db_new->getConnectionStatus() == true) {
                $output = $this->db_new->db_connection->query("SELECT id FROM " . $this->table . " WHERE id = " . $this->id . ";");
                $arr = $output->fetch(PDO::FETCH_ASSOC);
                if($arr['id']) {
                    $sql = $this->db_new->db_connection->exec("DELETE FROM $this->table WHERE id=$this->id;");
                    $this->id = NULL;
                    $this->name = NULL;
                    $this->description = NULL;
                    $this->race = NULL;
                    $this->class_role = NULL;
                }
            }
        }
    }

?>