<?php  
	class assetType
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
        
		function checkExist($typeName)
		{
		
			$data=array();
            $sql = "SELECT `type` FROM asset_type WHERE `type`=?";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([$typeName]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
			if($data>0) return "1";
            else return "0"; 
		}
		
        public function fetch(){
            $data=array();
            $sql = "SELECT * FROM asset_type order by `id` asc";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			$data = $stmt->fetchAll();
			return $data;
        }
		
        function save($typeName){
			$addData=[];
			
			$addData=[
				'typeName'=>$typeName,
			];
            $sql = "INSERT INTO asset_type(`type`) 
			VALUES (:typeName)";
			$stmt = $this->db->prepare($sql);
			$stmt->execute($addData);
			if($stmt) return 1;
			else return 0;
		}

		function update($typeId,$typeName){
            $updateData=[];
			$updateData=[
				'typeId'=>$typeId,
				'typeName'=>$typeName
			];
			$sql = "UPDATE asset_type SET `type`=:typeName
			WHERE `id`=:typeId";
			$stmt = $this->db->prepare($sql);
			$stmt->execute($updateData);
			if($stmt) return 1;
			else return 0;
		}

		function delete($typeId)
		{
			$sql = "DELETE FROM asset_type WHERE `id`=?";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([$typeId]);
			if($stmt) return 1;
			else return 0;
		}
        
	}	
?>