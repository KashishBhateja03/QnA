 <?php
include("config/config.php");


class QueryMaster{


public function select_data($con,$table,$field,$id,$orderby)
		{
		
			if((trim($field)!=NULL || trim($field)!='' ) || $field!='all')
				{
					$field = $field;
				}
			else
				{
					$field ="*";
				}
				
				// Check ID null or not
			if($id=='' || $id==NULL)
				{
					$where="" ;
				}
			else
				{
					$where=" WHERE ".$id."";
				}
				
				 // Check Order by null or not
			if($orderby=='' || $orderby==NULL)
				{
					$order="";
				}
			else
				{
		$order="ORDER BY ".$orderby."";
				}
				global $con;
				
		// Create Quiery
		$result = mysqli_query($con,"SELECT ".$field." FROM ".$table." ".$where." ".$order."");// mysqli Query Add
		
		
		try
			{
			  return $result;
			}
		catch(Exception $e)
			{
			  echo $e->message;
			}
		
		}

	public function insert_data($con,$table,$column)
	{
	 $value=implode("', '",$column);
	     $feild=implode("`, `",array_keys($column));
		 $result= mysqli_query($con,"INSERT INTO ".$table." (`".$feild."`) values('$value')");
		 
		try{
		$insert_id = mysqli_insert_id($con);
		//echo"<script>alert('fgfgdf');</script>";
		return $insert_id;
		}catch(Exception $e){
		  echo $e->message;
		  }
	
	}
	
	
	public function update_data($con,$table,$feild,$id){
		
		$sql = "UPDATE `".$table."` SET ".$feild." WHERE ".$id."";

		if (mysqli_query($con, $sql)) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . mysqli_error($con);
		}
		
		/*$query = " UPDATE `".$table."` SET ".$feild." WHERE ".$id."";
		$result = mysql_query($query);*/
		try{
		return true;
		}catch(Exceptiomn $e){
		  echo $e->message;
		}
	}
	
	public function delete_data($con,$table,$id){
		
		$sql = "DELETE FROM `".$table."`  WHERE ".$id."";

			if (mysqli_query($con, $sql)) {
				echo "Record deleted successfully";
			} else {
				echo "Error deleting record: " . mysqli_error($conn);
			}

		 /*$query = " DELETE FROM `".$table."`  WHERE ".$id."";
		$result = mysql_query($query);*/
		try{
		return true;
		}catch(Exceptiomn $e){
		  echo $e->message;
		}
	}
	
	
	
}


 class QueryMaster1{

 	public function select_data1($con,$field,$table,$id,$orderby)
		{
		
			if((trim($field)!=NULL || trim($field)!='' ) || $field!='all')
				{
					$field = $field;
				}
			else
				{
					$field ="*";
				}
				
				// Check ID null or not
			if($id=='' || $id==NULL)
				{
					$where="" ;
				}
			else
				{
					$where=" WHERE ".$id."";
				}
				
				 // Check Order by null or not
			if($orderby=='' || $orderby==NULL)
				{
					$order="";
				}
			else
				{
		$order="ORDER BY".$orderby."";
				}
				global $con;
				
		// Create Quiery
		$result = mysqli_query($con,"SELECT ".$field." FROM ".$table." ".$where." ".$order."");// mysqli Query Add
		
		
		try
			{
			  return $result;
			}
		catch(Exception $e)
			{
			  echo $e->message;
			}
		
		}
 }
?>
