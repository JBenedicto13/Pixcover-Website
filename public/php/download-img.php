<?php
	if (!empty($_GET['file'])) {
		$filename = basename($_GET['file']);
		$filepath = 'images/'.$filename;

		if (!empty($filename) && file_exists($filepath)) {
			header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename='.$filename);
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));
            ob_clean();
            flush();
            
            readfile($filepath);
            exit;
		}
		else {
			echo "This file may have been removed.";
		}
	}

	require ("public-db.php");

    $txt_photoid = $_POST["photo_id"];

    $preview_result = mysqli_query($CON,"SELECT pu.idtblphotouploads, pu.photo_name, pu.creator_id, display_photo, ac.fname, ac.lname, pu.title, pu.tags, pu.location
    FROM tblphotouploads pu,tblaccounts ac,tbladdinfo ai
    WHERE ac.idtblaccounts = pu.creator_id AND pu.creator_id = ai.idtblaccounts AND pu.idtblphotouploads = ".$txt_photoid.";");

    while ($ROW = mysqli_fetch_array($preview_result)) {
?>

	<div class="col-md-5" style="overflow: hidden;">
        <img src="<?php echo 'accounts/photo_uploads/'.$ROW['photo_name']; ?>" style="height: 180px;">
    </div>
    <div class="col-md-6 ms-3 me-3">
        <div class="row">
            <p>Give <i><?php echo $ROW['fname']." ".$ROW['lname']; ?></i> small donation as a token of appreciation</p>
        </div>
        <div class="row">
            <div class="d-grid gap-2 d-md-block">
              <button class="btn btn-dark" type="button">Donate</button>
              <button class="btn btn-outline-dark" type="button">Follow</button>
            </div>
        </div>
        <div class="row mt-3">
            <button type="button" class="btn btn-secondary copy-btn">Photo by <?php echo $ROW['fname']." ".$ROW['lname']; ?><span class="badge"><i class="fa-regular fa-clone"></i></span></button>
        </div>
    </div>

<?php } ?>