<?php  
	class personnelTitle
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
        
		function checkExist($titleName)
		{
		
			$data=array();
            $sql = "SELECT `title` FROM personnel_title WHERE `title`=?";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([$titleName]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
			if($data>0) return "1";
            else return "0"; 
		}
		
        public function fetch(){
            $data=array();
            $sql = "SELECT * FROM personnel_title order by `title` asc";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			$data = $stmt->fetchAll();
			return $data;
        }
		


      

        function save($titleName){
			$addData=[];
			$addData=[
				'titleName'=>$titleName,
			];
            $sql = "INSERT INTO personnel_title(`title`) 
			VALUES (:titleName)";
			$stmt = $this->db->prepare($sql);
			$stmt->execute($addData);
			if($stmt) return 1;
			else return 0;
		}

		function update($titleId,$titleName){
            $updateData=[];
			$updateData=[
				'titleId'=>$titleId,
				'titleName'=>$titleName
			];
			$sql = "UPDATE personnel_title SET `title`=:titleName
			WHERE `id`=:titleId";
			$stmt = $this->db->prepare($sql);
			$stmt->execute($updateData);
			if($stmt) return 1;
			else return 0;
		}

		function delete($titleId)
		{
			$sql = "DELETE FROM personnel_title WHERE `id`=?";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([$titleId]);
			if($stmt) return 1;
			else return 0;
		}
        
	}	
?>