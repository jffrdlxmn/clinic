<?php  
	class User
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
        
		function checkExist($username)
		{
			
			$data=array();
			$sql = "SELECT * FROM users WHERE `username`=?";
			$stmt = $this->db->prepare($sql);
			$stmt->execute(array($username));
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
			if($data>0) return "1";
            else return "0"; 
		}
		
        public function fetch(){
            $data=array();
            $sql = "SELECT * FROM users order by `id` asc";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			$data = $stmt->fetchAll();
			return $data;
        }
		


      

        function save($username,$password){
			$password= md5($password);
			$addData=[];
			$addData=[
				'username'=>$username,
				'password'=>$password

			];
            $sql = "INSERT INTO users(`username`,`password`) 
			VALUES (:username,:password)";
			$stmt = $this->db->prepare($sql);
			$stmt->execute($addData);
			if($stmt) return 1;
			else return 0;
		}

		function update($id,$password){
			$password = md5($password);
            $updateData=[];
			$updateData=[
				'id'=>$id,
				'password'=>$password
			];
			$sql = "UPDATE users SET `password`=:password
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


		function login($username,$password)
		{

			$password = md5($password);

			$usernamedata=array();
			$usernameSql = "SELECT * FROM users WHERE `username`=? ";
			$usernameStmt = $this->db->prepare($usernameSql);
			$usernameStmt->execute(array($username));
            $usernamedata = $usernameStmt->fetch(PDO::FETCH_ASSOC);

			if($usernamedata>0)
			{
				$loginSql = "SELECT * FROM users WHERE `username`=? AND `password`=? ";
				$loginStmt = $this->db->prepare($loginSql);
				$loginStmt->execute(array($username,$password));
				$logindata = $loginStmt->fetch(PDO::FETCH_ASSOC);

				if($logindata > 0)
				{
					if($username == $logindata["username"])
					{
					
						if($password == $logindata["password"])
						{
							$_SESSION["id"] = $logindata["id"];
							$_SESSION["username"] = $logindata["username"];
							echo "1";
						}
						else{
							echo "Wrong password";
						}
					}
					else
					{
					return "Invalid Username";
					}
				}
				else{
					return  "Username and Password doest not match!";
				}

			}
			else{
                return  "Username does not exist!";
            }
			
       
			
		}
        
	}	
?>