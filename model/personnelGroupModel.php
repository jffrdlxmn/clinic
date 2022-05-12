<?php  
	class personnelGroup
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
        
		function checkExist($groupName)
		{
		
			$data=array();
            $sql = "SELECT `group` FROM personnel_group WHERE `group`=?";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([$groupName]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
			if($data>0) return "1";
            else return "0"; 
		}
		
        public function fetch(){
            $data=array();
            $sql = "SELECT * FROM personnel_group order by `id` asc";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			$data = $stmt->fetchAll();
			return $data;
        }
		


      

        function save($groupName){
			$addData=[];
			$addData=[
				'groupName'=>$groupName,
			];
            $sql = "INSERT INTO personnel_group(`group`) 
			VALUES (:groupName)";
			$stmt = $this->db->prepare($sql);
			$stmt->execute($addData);
			if($stmt) return 1;
			else return 0;
		}

		function update($groupId,$groupName){
            $updateData=[];
			$updateData=[
				'groupId'=>$groupId,
				'groupName'=>$groupName
			];
			$sql = "UPDATE personnel_group SET `group`=:groupName
			WHERE `id`=:groupId";
			$stmt = $this->db->prepare($sql);
			$stmt->execute($updateData);
			if($stmt) return 1;
			else return 0;
		}

		function delete($groupId)
		{
			$sql = "DELETE FROM personnel_group WHERE `id`=?";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([$groupId]);
			if($stmt) return 1;
			else return 0;
		}
        
	}	
?>