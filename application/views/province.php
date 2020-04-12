<section class="content-header"></section>
<section class="content">
	<div class="box">
		<div class="box-header">
			<div class="pull-right">
		        <button class="btn btn-default" data-toggle="modal" data-target="#addProvince"><i class="fa fa-plus"></i> Add Province</button>
		    </div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No.</th>
						<th>Province Code</th>
						<th>Province Name</th>
						<th>Country Name</th>
						<th>Detail</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
					foreach($province as $pro):?>
						<tr>
							<td><?=$i++?></td>
							<td><?=$pro->province_code?></td>
							<td><?=$pro->province_name?></td>
							<td><?=$pro->country->country_name?></td>
							<td>
      					<button class="btn btn-sm btn-block btn-success" data-toggle="modal" data-target="#detailProvince<?=$pro->id?>"><i class="fa fa-eye"></i> Detail</button>
      				</td>
      				<td class="text-center">
      					<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editProvince<?=$pro->id?>"><i class="fa fa-edit"></i> Edit</button>
      					<a href="<?=base_url('province/deleteProvince/'.$pro->id)?>" onclick="return confirm('are you sure want to delete this province?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
      				</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</section>
<?php foreach($province as $pro): ?>
<div class="modal fade" id="detailProvince<?=$pro->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <?=$pro->province_name?>
      </div>
      <div class="modal-body">
      	<div class="row">
      		<div class="col-md-12">
      			<h4>Province data</h4>
      		</div>
      	</div>
        <div class="row custom">
          <div class="col-md-3">
            <label>Province Code</label>
          </div>
          <div class="col-md-9">
            <label><b>: <?=$pro->province_code?></b></label>
          </div>
        </div>
        <div class="row custom">
          <div class="col-md-3">
            <label>Province Name</label>
          </div>
          <div class="col-md-9">
            <label><b>: <?=$pro->province_name?></b></label>
          </div>
        </div>
        <div class="row custom">
        	<div class="col-md-12">
        		<h4>Country Data</h4>
        	</div>
        </div>
        <div class="row custom">
        	<div class="col-md-3">
        		<label>Country Code</label>
        	</div>
        	<div class="col-md-9">
        		<label><b>: <?=$pro->country->country_code?></b></label>
        	</div>
        </div>
        <div class="row custom">
        	<div class="col-md-3">
        		<label>Country Name</label>
        	</div>
        	<div class="col-md-9">
        		<label><b>: <?=$pro->country->country_name?></b></label>
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
<?php foreach($province as $pro): ?>
<div class="modal fade" id="editProvince<?=$pro->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        Update Province <?=$pro->province_name?>
      </div>
      <form action="<?=base_url('province/updateProvince')?>" method="post" onsubmit="return confirm('are you sure want to update this province?')">
      	<div class="modal-body">
	        <div class="row custom">
	          <div class="col-md-3">
	            <label>Province Code</label>
	          </div>
	          <div class="col-md-9">
	          	<input type="hidden" value="<?=$pro->id?>" name="id">
	          	<input type="text" class="form-control" name="province_code" value="<?=$pro->province_code?>" required>
	          </div>
	        </div>
	        <div class="row custom">
	          <div class="col-md-3">
	            <label>Province Name</label>
	          </div>
	          <div class="col-md-9">
	          	<input type="text" class="form-control" name="province_name" value="<?=$pro->province_name?>" required>
	          </div>
	        </div>
	        <div class="row custom">
	        	<div class="col-md-3">
	        		<label>Country</label>
	        	</div>
	        	<div class="col-md-9">
	        		<select class="form-control" name="country_id">
	        			<?php foreach($country as $c): ?>
	        				<option value="<?=$c->id?>"<?=$c->id == $pro->country_id ? "selected" : null ?>><?=$c->country_name?></option>
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
<div class="modal fade" id="addProvince" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        Add New Province
      </div>
      <form action="<?=base_url('province/insertProvince')?>" method="post" onsubmit="return confirm('are you sure want add province?')">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-3">
              <label>Province Code</label>
            </div>
            <div class="col-md-9">
              <input type="text" class="form-control" name="province_code" required>
            </div>
          </div>
          <div class="row custom">
            <div class="col-md-3">
              <label>Province Name</label>
            </div>
            <div class="col-md-9">
              <input type="text" class="form-control" name="province_name" required>
            </div>
          </div>
          <div class="row custom">
          	<div class="col-md-3">
          		<label>Country</label>
          	</div>
          	<div class="col-md-9">
          		<select class="form-control" name="country_id">
          			<?php foreach($country as $c): ?>
          				<option value="<?=$c->id?>"><?=$c->country_name?></option>
          			<?php endforeach ?>
          		</select>
          	</div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add Province</button>
        </div>
      </form>
    </div>
  </div>
</div>