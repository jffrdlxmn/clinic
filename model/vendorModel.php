<?php  
	class Vendor
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
        
		function checkExist($name)
		{
			
			$data=array();
			$sql = "SELECT * FROM vendor WHERE `name`=?";
			$stmt = $this->db->prepare($sql);
			$stmt->execute(array($name));
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
			if($data>0) return "1";
            else return "0"; 
		}
		
        public function fetch(){
            $data=array();
            $sql = "SELECT * FROM vendor order by `name` asc";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			$data = $stmt->fetchAll();
			return $data;
        }
		


        function save($name,$number,$website,$email){
			
			$history =date("Y-m-d H:i:s");
			$addData=[];
			$addData=[
				'name'=>$name,
				'number'=>$number,
				'website'=>$website,
				'email'=>$email,
				'history'=>$history,

			];
            $sql = "INSERT INTO vendor(`name`,`number`,`website`,`email`,`history`) 
			VALUES (:name,:number,:website,:email,:history )";
			$stmt = $this->db->prepare($sql);
			$stmt->execute($addData);
			if($stmt) return 1;
			else return 0;
		}

		function update($id,$name,$number,$website,$email){
			$history =date("Y-m-d H:i:s");
            $updateData=[];
			$updateData=[
				'id'=>$id,
				'name'=>$name,
				'number'=>$number,
				'website'=>$website,
				'email'=>$email,
				'history'=>$history,
			];
			$sql = "UPDATE users SET `name`=:name, `number`=:number,`website`=:website,`email`=:email,`history`=:history
			WHERE `id`=:id";
			$stmt = $this->db->prepare($sql);
			$stmt->execute($updateData);
			if($stmt) return 1;
			else return 0;
		}

		function delete($depreciationId)
		{
			$sql = "DELETE FROM asset_depreciation WHERE `id`=?";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([$depreciationId]);
			if($stmt) return 1;
			else return 0;
		}


	
        
	}	
?>