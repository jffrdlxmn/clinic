<?php  
	class Program
	{
		private $host = 'localhost';
		private $username = "root";
		private $dbname = "clinic";
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
        
		function checkExist($program)
		{
		
			$data=array();
            $sql = "SELECT `program` FROM program WHERE `program`=?";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([$program]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
			if($data>0) return "1";
            else return "0"; 
		}
		
        public function fetch(){
            $data=array();
            $sql = "SELECT * FROM program order by `id` asc";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			$data = $stmt->fetchAll();
			return $data;
        }

        function save($program){
			$addData=[];
			$addData=[
				'program'=>$program,
			];
            $sql = "INSERT INTO program(`program`) 
			VALUES (:program)";
			$stmt = $this->db->prepare($sql);
			$stmt->execute($addData);
			if($stmt) return 1;
			else return 0;
		}

		function update($programId,$programName){
            $updateData=[];
			$updateData=[
				'programId'=>$programId,
				'programName'=>$programName
			];
			$sql = "UPDATE program SET `program`=:programName
			WHERE `id`=:programId";
			$stmt = $this->db->prepare($sql);
			$stmt->execute($updateData);
			if($stmt) return 1;
			else return 0;
		}

		function delete($programId)
		{
			$sql = "DELETE FROM program WHERE `id`=?";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([$programId]);
			if($stmt) return 1;
			else return 0;
		}
        
	}	
?>