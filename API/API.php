<?php
	class API{
		private $db_host;
		private $db_user;
		private $db_pass;
		private $db_name;
		private $connection;
		public function __construct(){
			$this->db_host = "localhost";
			$this->db_user = "root";
			$this->db_pass = "";
			$this->db_name = "eric_db";
			$this->connect();
		}
		public function connect(){
			$this->connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
			if($this->connection->connect_error){
				echo "Connection erorr!";
			}
		}
		public function close(){
			$this->connection->close();
		}
		public function tambahdata($nama, $email, $jeniskelamin, $isipesan){
		    try {
		        if($nama !== NULL && $email !== NULL && $jeniskelamin !== NULL && $isipesan !== NULL){
		            $insert_query = "INSERT INTO bukutamu (nama, email, jeniskelamin, isipesan) VALUES (?, ?, ?, ?)";
		            $prepare = $this->connection->prepare($insert_query);
		            
		            if (!$prepare) {
		                throw new Exception("Prepare statement failed: " . $this->connection->error);
		            }

		            $prepare->bind_param("ssss", $nama, $email, $jeniskelamin, $isipesan);

		            if(!$prepare->execute()){
		                throw new Exception("Execute statement failed: " . $prepare->error);
		            }

		            echo "<script>alert('Sukses Menambah Data')</script>";
		            $prepare->close();
		        } else {
		            throw new Exception("Error Null");
		        }
		    } catch (Exception $e) {
		        echo "<script>alert('Tidak Boleh Lebih Dari 1000 Karakter');</script>";
		    }
		}
		public function hapusdata($id){
			try{
				$delete_query = "DELETE FROM bukutamu WHERE id = ?";
				$stmt = $this->connection->prepare($delete_query);
				$stmt->bind_param("i", $id);
				if ($stmt->execute()) {
		            $response = array('result' => "Deleted data with ID: $id");
		            header('Content-Type: application/json');
		            echo json_encode($response);
		        }
		        else{
		            $response = array('error' => 'Error deleting data.');
		            header('Content-Type: application/json');
		            echo json_encode($response);
		        }
			}
			catch(Exception $e){
				echo "<script>alert(" . $e . ");</script>";
			}
		}
		public function tampildata(){
			$show_query = "SELECT * FROM bukutamu";
			$data = array();
			$proses = $this->connection->query($show_query);
			if($proses->num_rows>0){
				while ($row = $proses->fetch_assoc()) {
					$data[] = $row;
				}
			}
			return json_encode($data);
		}
		public function filter($teksnya){
			return htmlspecialchars($teksnya);
		}
	}
?>