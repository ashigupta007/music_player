<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
	<style type="text/css">
		body
		{
			padding:50px;
		}
		input
		{
			display: block;
			height: 30px;
			width: 200px;
			margin:10px;
		}
	</style>
</head>
<body>

	<h1>
		Upload A new Song in Database
	</h1>
	<form action="upload_song.php" method="POST" enctype="multipart/form-data">

		<input type="text" name="SongName" placeholder="Song Name" required><br><br>

		<input type="text" name="ArtistName" placeholder="Artist Name" required><br><br>

		<select name="emotion_type">
			<option value="NULL" selected>SONG TYPE</option>
			<option value="sad">Sad</option>
			<option value="happy">Happy</option>
			<option value="surprized">Surprized</option>
			<option value="angry">Angry</option>
		</select><br><br>

		Song Cover<input type="file" name="cover" placeholder="Song Cover" required><br><br>
	
		Song MP3<input type="file" name="song_mp3" placeholder="Song mp3" required><br><br>
		

		<button type="submit" name="submit">Upload Now</button>
	</form>

<?php
	if(isset($_POST['submit']))
	{
		$music_id= substr(md5(microtime()), 0, 15);
		$song_name=$_POST['SongName'];
		$artist_name = $_POST['ArtistName'];
		$emotion_type = $_POST['emotion_type'];

		$cover=$_FILES['cover']['tmp_name'];
		$song= $_FILES['song_mp3']['tmp_name'];

        $cover_url="images/".$music_id.".jpeg";
        $song_url ="musics/".$music_id.".mp3";
        $upload_time = time();

        require('connect.php');

        $add_song_query="INSERT INTO songs(song_id, song_name, artist, emotion_type, img_src, music_src, upload_time) VALUES('$music_id', '$song_name', '$artist_name', '$emotion_type', '$cover_url', '$song_url', '$upload_time')";
		
        if(mysqli_query($conn, $add_song_query))
        {
        	move_uploaded_file($cover, $cover_url);
        	move_uploaded_file($song, $song_url);
        	echo '<script>history.pushState({}, "", "")</script>';
        }
        else
        {
        	echo mysqli_error($conn);
        	echo "<h3>Not Added</h3>";
        }
	}

?>
</body>
</html>