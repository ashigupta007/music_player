<?php
	if(isset($_POST['action']) && $_POST['action'] == "fetch_emotion_based_data")
	{
		$data= $_POST['emotion_data'];
		$highest_value=0;
		$emotion_type='';

		foreach($data as $emotion_data)
		{
			if ($emotion_data['value'] > $highest_value) 
			{
				$highest_value = $emotion_data['value'];
				$emotion_type = $emotion_data['emotion'];
			}
		}

		$fetch_song = "SELECT * FROM songs WHERE emotion_type = '$emotion_type'";

		require('connect.php');

		if($result=mysqli_query($conn, $fetch_song))
		{
			$count=  mysqli_num_rows($result);
            if($count>0)
            {
            	while($row = mysqli_fetch_assoc($result))
            	{
            		$data_fetched[]= $row;
            	}
            }
            print json_encode($data_fetched);
		}

	}
	else if(isset($_POST['action']) && $_POST['action'] == "fetch_song_list")
	{
		$fetch_song = "SELECT * FROM songs ORDER BY upload_time DESC LIMIT 6";

		require('connect.php');

		if($result=mysqli_query($conn, $fetch_song))
		{
			$count =  mysqli_num_rows($result);
            if($count>0)
            {
            	while($row = mysqli_fetch_assoc($result))
            	{
            		$data_fetched[]= $row;
            	}
            }
            print json_encode($data_fetched);
		}
	}

	else if(isset($_POST['action']) && $_POST['action'] == "fetch_all_song_list")
	{
		$fetch_song = "SELECT * FROM songs ORDER BY upload_time DESC LIMIT 40";

		require('connect.php');

		if($result=mysqli_query($conn, $fetch_song))
		{
			$count =  mysqli_num_rows($result);
            if($count>0)
            {
            	while($row = mysqli_fetch_assoc($result))
            	{
            		$data_fetched[]= $row;
            	}
            }
            print json_encode($data_fetched);
		}
	}
?>