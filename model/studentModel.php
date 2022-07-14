<?php  
	class Student
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
        
		// function checkExist($program)
		// {
		
		// 	$data=array();
        //     $sql = "SELECT `program` FROM program WHERE `program`=?";
		// 	$stmt = $this->db->prepare($sql);
		// 	$stmt->execute([$program]);
        //     $data = $stmt->fetch(PDO::FETCH_ASSOC);
		// 	if($data>0) return "1";
        //     else return "0"; 
		// }
		
        public function fetch(){
            $data=array();
            $sql = "SELECT student.*,program FROM student 
			INNER JOIN program ON student.programId = program.id
			 order by `id` asc";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			$data = $stmt->fetchAll();
			return $data;
        }

        function save($name,$program,$studentCtrlNo){
			$addData=[];
			$addData=[
				'name'=>$name,
				'program'=>$program,
				'studentCtrlNo'=>$studentCtrlNo,
			];
            $sql = "INSERT INTO student(`fullname`,`programId`,`studentCtrlNo`)
			VALUES (:name,:program,:studentCtrlNo)";
			$stmt = $this->db->prepare($sql);
			$stmt->execute($addData);
			if($stmt) return 1;
			else return 0;
		}

		function update($id,$studentName,$programId){
            $updateData=[];
			$updateData=[
				'id'=>$id,
				'studentName'=>$studentName,
				'programId'=>$programId

			];
	
			$sql = "UPDATE student SET `fullname`=:studentName,`programId`=:programId
			WHERE `id`=:id";
			$stmt = $this->db->prepare($sql);
			$stmt->execute($updateData);
			if($stmt) return 1;
			else return 0;
		}

		function delete($studentId)
		{
			$sql = "DELETE FROM student WHERE `id`=?";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([$studentId]);
			if($stmt) return 1;
			else return 0;
		}

		public function getListOfStudents($program){
            $data=array();
            $sql = "SELECT student.*,program FROM student 
			INNER JOIN program ON student.programId = program.id
			where `program` =?
			order by `id` asc";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([$program]);
			$data = $stmt->fetchAll();
			return $data;
        }
        
	}	
?>