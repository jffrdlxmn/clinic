<?php  
	class assetStatus
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
        

		function checkExist($statusName)
		{
			$data=array();
            $sql = "SELECT `status` FROM asset_status WHERE `status`=?";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([$statusName]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
			if($data>0) return "1";
            else return "0"; 
		}


        public function fetch(){
            $data=array();
            $sql = "SELECT * FROM asset_status order by `id` asc";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			$data = $stmt->fetchAll();
			return $data;
        }

        function save($statusName){
			$addData=[];
			$addData=[
				'statusName'=>$statusName,
			];
            $sql = "INSERT INTO asset_status(`status`) 
			VALUES (:statusName)";
			$stmt = $this->db->prepare($sql);
			$stmt->execute($addData);
			if($stmt) return 1;
			else return 0;
		}

		function update($statusId,$statusName){
            $updateData=[];
			$updateData=[
				'statusId'=>$statusId,
				'statusName'=>$statusName
			];
			$sql = "UPDATE asset_status SET `status`=:statusName
			WHERE `id`=:statusId";
			$stmt = $this->db->prepare($sql);
			$stmt->execute($updateData);
			if($stmt) return 1;
			else return 0;
		}

		function delete($statusId)
		{
			$sql = "DELETE FROM asset_status WHERE `id`=?";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([$statusId]);
			if($stmt) return 1;
			else return 0;
		}
        
	}	
?>