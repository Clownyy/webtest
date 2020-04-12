<section class="content-header">
	<section class="content">
		<div class="box">
			<div class="box-header">
				<div class="pull-right">
		        	<button class="btn btn-default" data-toggle="modal" data-target="#addCity"><i class="fa fa-plus"></i> Add City</button>
		    	</div>
		    </div>
			<div class="box-body table-responsive">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No.</th>
							<th>City Code</th>
							<th>City Name</th>
							<th>Province Name</th>
							<th>Detail</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=1; foreach($city as $cit): ?>
							<tr>
								<td><?=$i++?></td>
								<td><?=$cit->city_code?></td>
								<td><?=$cit->city_name?></td>
								<td><?=$cit->province->province_name?></td>
								<td>
			      					<button class="btn btn-sm btn-block btn-success" data-toggle="modal" data-target="#detailCity<?=$cit->id?>"><i class="fa fa-eye"></i> Detail</button>
			      				</td>
			      				<td class="text-center">
			      					<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editCity<?=$cit->id?>"><i class="fa fa-edit"></i> Edit</button>
			      					<a href="<?=base_url('city/deleteCity/'.$cit->id)?>" onclick="return confirm('are you sure want to delete this city?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
			      				</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</section>
</section>
<?php foreach($city as $cit): ?>
<div class="modal fade" id="detailCity<?=$cit->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <?=$cit->city_name?>
      </div>
      <div class="modal-body">
      	<div class="row">
      		<div class="col-md-12">
      			<h4>City data</h4>
      		</div>
      	</div>
        <div class="row custom">
          <div class="col-md-3">
            <label>City Code</label>
          </div>
          <div class="col-md-9">
            <label><b>: <?=$cit->city_code?></b></label>
          </div>
        </div>
        <div class="row custom">
          <div class="col-md-3">
            <label>City Name</label>
          </div>
          <div class="col-md-9">
            <label><b>: <?=$cit->city_name?></b></label>
          </div>
        </div>
        <div class="row custom">
        	<div class="col-md-12">
        		<h4>Province Data</h4>
        	</div>
        </div>
        <div class="row custom">
        	<div class="col-md-3">
        		<label>Province Code</label>
        	</div>
        	<div class="col-md-9">
        		<label><b>: <?=$cit->province->province_code?></b></label>
        	</div>
        </div>
        <div class="row custom">
        	<div class="col-md-3">
        		<label>Province Name</label>
        	</div>
        	<div class="col-md-9">
        		<label><b>: <?=$cit->province->province_name?></b></label>
        	</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>
<div class="modal fade" id="addCity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        Add New City
      </div>
      <form action="<?=base_url('city/insertCity')?>" method="post" onsubmit="return confirm('are you sure want add city?')">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-3">
              <label>City Code</label>
            </div>
            <div class="col-md-9">
              <input type="text" class="form-control" name="city_code" required>
            </div>
          </div>
          <div class="row custom">
            <div class="col-md-3">
              <label>City Name</label>
            </div>
            <div class="col-md-9">
              <input type="text" class="form-control" name="city_name" required>
            </div>
          </div>
          <div class="row custom">
          	<div class="col-md-3">
          		<label>Province</label>
          	</div>
          	<div class="col-md-9">
          		<select class="form-control" name="province_id">
          			<?php foreach($province as $pro): ?>
          				<option value="<?=$pro->id?>"><?=$pro->province_name?></option>
          			<?php endforeach ?>
          		</select>
          	</div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add City</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php foreach($city as $cit): ?>
<div class="modal fade" id="editCity<?=$cit->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        Update city <?=$cit->city_name?>
      </div>
      <form action="<?=base_url('city/updateCity')?>" method="post" onsubmit="return confirm('are you sure want to update this city?')">
      	<div class="modal-body">
	        <div class="row custom">
	          <div class="col-md-3">
	            <label>City Code</label>
	          </div>
	          <div class="col-md-9">
	          	<input type="hidden" value="<?=$cit->id?>" name="id">
	          	<input type="text" class="form-control" name="city_code" value="<?=$cit->city_code?>" required>
	          </div>
	        </div>
	        <div class="row custom">
	          <div class="col-md-3">
	            <label>City Name</label>
	          </div>
	          <div class="col-md-9">
	          	<input type="text" class="form-control" name="city_name" value="<?=$cit->city_name?>" required>
	          </div>
	        </div>
	        <div class="row custom">
	        	<div class="col-md-3">
	        		<label>Province</label>
	        	</div>
	        	<div class="col-md-9">
	        		<select class="form-control" name="province_id">
	        			<?php foreach($province as $pro): ?>
	        				<option value="<?=$pro->id?>"<?=$pro->id == $cit->province_id ? "selected" : null ?>><?=$pro->province_name?></option>
	        			<?php endforeach ?>
	        		</select>
	        	</div>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Update</button>
	      </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach ?>