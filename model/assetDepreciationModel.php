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
			
			$data=array();
			if($rbr == "") $rbr = 0;
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
		


      

        function save($description,$rbr){
			
			if($rbr == "")  $rbr =0; 
			$addData=[];
			$addData=[
				'description'=>$description,
				'rbr'=>$rbr

			];
            $sql = "INSERT INTO asset_depreciation(`description`,`rbr`) 
			VALUES (:description,:rbr)";
			$stmt = $this->db->prepare($sql);
			$stmt->execute($addData);
			if($stmt) return 1;
			else return 0;
		}

		function update($depreciationId,$description,$rbr){
            $updateData=[];
			$updateData=[
				'depreciationId'=>$depreciationId,
				'description'=>$description,
				'rbr'=>$rbr
			];
			$sql = "UPDATE asset_depreciation SET `description`=:description,`rbr`=:rbr
			WHERE `id`=:depreciationId";
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