<?php  
	class assetDepreciation
	{
		private $host = 'localhost';
		private $username = "root";
		private $dbname = "supply";
		private $password = "";
		private $connect;
			
		public function __construct(){
			if(!isset($this->db)){
				// Connect to the database
				try{
					$connect = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname, $this->username, $this->password);
					$connect -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$this->db = $connect;
				}catch(PDOException $e){
					die("Failed to connect with MySQL: " . $e->getMessage());
				}
			}
		}
        
		function checkExist($description,$rbr)
		{
			if($rbr == "") echo "alert('test')";
			$data=array();
            $sql = "SELECT * FROM asset_depreciation WHERE `description`=?  AND rbr =?";
			$stmt = $this->db->prepare($sql);
			$stmt->execute(array($description, $rbr));
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
			if($data>0) return "1";
            else return "0"; 
		}
		
        public function fetch(){
            $data=array();
            $sql = "SELECT * FROM asset_depreciation order by `id` asc";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			$data = $stmt->fetchAll();
			return $data;
        }
		


      

        function save($conditionName){
			$addData=[];
			$addData=[
				'conditionName'=>$conditionName,
			];
            $sql = "INSERT INTO asset_condition(`condition`) 
			VALUES (:conditionName)";
			$stmt = $this->db->prepare($sql);
			$stmt->execute($addData);
			if($stmt) return 1;
			else return 0;
		}

		function update($conditionId,$conditionName){
            $updateData=[];
			$updateData=[
				'conditionId'=>$conditionId,
				'conditionName'=>$conditionName
			];
			$sql = "UPDATE asset_condition SET `condition`=:conditionName
			WHERE `id`=:conditionId";
			$stmt = $this->db->prepare($sql);
			$stmt->execute($updateData);
			if($stmt) return 1;
			else return 0;
		}

		function delete($conditionId)
		{
			$sql = "DELETE FROM asset_condition WHERE `id`=?";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([$conditionId]);
			if($stmt) return 1;
			else return 0;
		}
        
	}	
?>