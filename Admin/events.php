<?php 
if(!isset($_GET['id'])){
?>

<div class="container-fluid">
	
	<div class="row">
	<div class="col-lg-12">
	<br>
			 <a href="index.php?page=events&id="><button class="btn btn-primary float-right btn-sm" id="new_event"><i class="fa fa-plus"></i> New Events/Activity</button></a>
	</div>
	</div>
	<br>
	<div class="row">
		<div class="card col-lg-12">
			<div class="card-body">
				<table class="table-striped table-bordered col-md-12">
			<thead>
				<tr>
					<th class="text-center" width="5%">#</th>
					<th class="text-center">Title</th>
					<th class="text-center" width="25%">Date</th>
					<th class="text-center" width="25%">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
 					include 'db_connect.php';
 					$events= $conn->query("SELECT * FROM events order by event_date asc");
 					$i = 1;
 					while($row= $events->fetch_assoc()):
				 ?>
				 <tr>
				 	<td>
				 		<?php echo $i++ ?>
				 	</td>
				 	<td>
				 		<?php echo $row['title'] ?>
				 	</td>
				 	<td>
				 		<?php echo date('d-F-Y', strtotime($row['event_date'])) ?>
				 	</td>
				 	<td>
				 		<center>
								<div class="btn-group">
								  <button type="button" class="btn btn-primary">Action</button>
								  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								    <span class="sr-only">Toggle Dropdown</span>
								  </button>
								  <div class="dropdown-menu">
								    <a class="dropdown-item edit_user" href="index.php?page=events&id=<?php echo $row['id'] ?>">Edit</a>
								    <div class="dropdown-divider"></div>
								    <a class="dropdown-item delete_event" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Delete</a>
								  </div>
								</div>
								</center>
				 	</td>
				 </tr>
				<?php endwhile; ?>
			</tbody>
		</table>
			</div>
		</div>
	</div>

</div>
<script>
	
$('.delete_event').click(function(){
		_conf("Are you sure to delete this event?","delete_event",[$(this).attr('data-id')])
	})
	function delete_event($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_event',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>

<?php }else{ ?>
<?php
include 'db_connect.php';
$qry = $conn->query("SELECT * from events WHERE id='".$_GET['id']."' limit 1");
if($qry->num_rows > 0){
	foreach($qry->fetch_array() as $k => $val){
		$meta[$k] = $val;
	}
}
 ?>
<div class="container-fluid">
	
	<div class="card col-lg-12">
		<div class="card-body">
			<form action="" id="manage-event">
				<h3>Events and Activity</h3>
				<div class="form-group">
					<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" />
					<label for="name" class="control-label">Events/Activity Date</label>
					<input type="date" class="form-control" id="name" name="date_event" value="<?php echo isset($meta['event_date']) ? $meta['event_date'] : '' ?>" required>
				</div>
				<div class="form-group">
					<label for="name" class="control-label">Events/Activity Title</label>
					<input type="text" class="form-control" id="name" name="title" value="<?php echo isset($meta['title']) ? $meta['title'] : '' ?>" required>
				</div>
				<div class="form-group">
					<label for="" class="control-label">Image Banner</label>
					<input type="file" class="form-control" name="img" onchange="displayImg(this,$(this))">
				</div>
				<div class="form-group">
					<img src="<?php echo isset($meta['img_path']) ? '../assets/img/'.$meta['img_path'] :'' ?>" alt="" id="cimg">
				</div>
				<div class="form-group">
					<label for="about" class="control-label">About Content</label>
					<textarea name="content" class="text-jqte"><?php echo isset($meta['content']) ? $meta['content'] : '' ?></textarea>

				</div>
				<hr>
				<center>
					<button class="btn btn-info btn-primary btn-block col-md-2">Save</button>
				</center>
			</form>
		</div>
	</div>
	<style>
	img#cimg{
		max-height: 10vh;
		max-width: 6vw;
	}
</style>

<script>
	function displayImg(input,_this) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
        	$('#cimg').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
	$('.text-jqte').jqte();

	$('#manage-event').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_events',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			error:err=>{
				console.log(err)
			},
			success:function(resp){
				if(resp == 1){
					alert_toast('Data successfully saved.','success')
					setTimeout(function(){
						location.reload()
					},1000)
				}
			}
		})

	})
</script>
<style>
	
</style>
</div>
<?php } ?>