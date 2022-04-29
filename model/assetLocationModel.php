<?php  
	class assetLocation
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
        
		function checkExist($locationName)
		{
		
			$data=array();
            $sql = "SELECT `location` FROM asset_location WHERE `location`=?";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([$locationName]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
			if($data>0) return "1";
            else return "0"; 
		}
		
        public function fetch(){
            $data=array();
            $sql = "SELECT * FROM asset_location order by `id` asc";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			$data = $stmt->fetchAll();
			return $data;
        }
		
        function save($locationName){
			$addData=[];
			$addData=[
				'locationName'=>$locationName,
			];
            $sql = "INSERT INTO asset_location(`location`) 
			VALUES (:locationName)";
			$stmt = $this->db->prepare($sql);
			$stmt->execute($addData);
			if($stmt) return 1;
			else return 0;
		}

		function update($locationId,$locationName){
            $updateData=[];
			$updateData=[
				'locationId'=>$locationId,
				'locationName'=>$locationName
			];
			$sql = "UPDATE asset_location SET `location`=:locationName
			WHERE `id`=:locationId";
			$stmt = $this->db->prepare($sql);
			$stmt->execute($updateData);
			if($stmt) return 1;
			else return 0;
		}

		function delete($locationId)
		{
			$sql = "DELETE FROM asset_location WHERE `id`=?";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([$locationId]);
			if($stmt) return 1;
			else return 0;
		}
        
	}	
?>