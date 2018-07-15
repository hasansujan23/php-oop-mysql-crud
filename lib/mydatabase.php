<?php 

/**
 * 
 */
class Database
{

	public $host = DB_HOST;
	public $user = DB_USER;
	public $pass = DB_PASS;
	public $dbname = DB_NAME;

	public $link;
	public $error;
	
	function __construct()
	{
		$this->getConnection();
	}

	private function getConnection(){
		$this->link=new mysqli($this->host,$this->user,$this->pass,$this->dbname);

		if(!$this->link){
			$this->error="Connection fail....!".$this->link->connect_error;
			return false;
		}
	}

	//Read data from database
	public function getData($query){
		$statement = $this->link->prepare($query);
		$statement->execute(); // Don't return any associative array.....
		$result=$statement->get_result(); //get_result() funtion use to collect associative result.....

		if($result->num_rows>0){
			return $result;
		}else{
			return false;
		}
	}

	public function insertData($id,$name,$email,$address){
		$stmt=$this->link->prepare("insert into t_student_info values(?,?,?,?)");
		$stmt->bind_param("ssss",$id,$name,$email,$address);
		$stmt->execute();
		$affectedRows=mysqli_affected_rows($this->link);

		if($affectedRows>0){
			return true;
		}else{
			return false;
		}
	}

		public function deleteData($id){
		$stmt=$this->link->prepare("delete from t_student_info where id=?");
		$stmt->bind_param("s",$id);
		$stmt->execute();
		$affectedRows=mysqli_affected_rows($this->link);

		if($affectedRows>0){
			return true;
		}else{
			return false;
		}
	}

	public function getStudentData($id){
		$statement = $this->link->prepare("select * from t_student_info where id=?");
		$statement->bind_param("s",$id);
		$statement->execute(); // Don't return any associative array.....
		$result=$statement->get_result(); //get_result() funtion use to collect associative result.....

		if($result->num_rows>0){
			return $result;
		}else{
			return false;
		}
	}

	public function updateStudentData($id,$name,$email,$address){
		$stmt=$this->link->prepare("update t_student_info set name=?,email=?,address=? where id=?");
		$stmt->bind_param("ssss",$name,$email,$address,$id);
		$stmt->execute();
		$affectedRows=mysqli_affected_rows($this->link);

		if($affectedRows>0){
			return true;
		}else{
			return false;
		}
	}
	// public function getData($query){
 //    $result=$this->link->query($query) or die($this->link->error.__LINE__);
 //    if($result->num_rows > 0){
 //      return $result;
 //    }else {
 //      return false;
 //    }
 //  }
}

 ?>