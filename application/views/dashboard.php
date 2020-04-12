<section class="content-header"></section>
<section class="content">
  <div class="box">
    <div class="box-header">
      <div class="pull-right">
        <button class="btn btn-default" data-toggle="modal" data-target="#addCountry"><i class="fa fa-plus"></i> Add Country</button>
      </div>
    </div>
    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped" id="tableAll">
        <thead>
          <tr>
            <th>No.</th>
            <th>Country Code</th>
            <th>Country Name</th>
            <th>Detail</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $i = 1;
          foreach($country as $c){ ?>
          <tr>
            <td><?=$i++?></td>
            <td><?=$c->country_code?></td>
            <td><?=$c->country_name?></td>
            <td>
              <button class="btn btn-sm btn-block btn-success" data-toggle="modal" data-target="#detailCountry<?=$c->id?>"><i class="fa fa-eye"></i> Detail</button>
            </td>
            <td class="text-center">
              <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editCountry<?=$c->id?>"><i class="fa fa-edit"></i> Edit</button>
              <a href="<?=base_url('dashboard/deleteCountry/'.$c->id)?>" onclick="return confirm('are you sure want to delete this country?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</section>
<div class="modal fade" id="addCountry" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        Add New Country Data
      </div>
      <form action="<?=base_url('dashboard/insertCountry')?>" method="post" onsubmit="return confirm('are you sure want add country?')">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-3">
              <label>Country Code</label>
            </div>
            <div class="col-md-9">
              <input type="text" class="form-control" name="country_code" required>
            </div>
          </div>
          <div class="row custom">
            <div class="col-md-3">
              <label>Country Name</label>
            </div>
            <div class="col-md-9">
              <input type="text" class="form-control" name="country_name" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add Country</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php foreach($country as $c): ?>
<div class="modal fade" id="editCountry<?=$c->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        Update Data <?=$c->country_name?>
      </div>
      <form action="<?=base_url('dashboard/editCountry')?>" method="post" onsubmit="return confirm('are you sure want Update country?')">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-3">
              <label>Country Code</label>
            </div>
            <div class="col-md-9">
              <input type="hidden" name="id" value="<?=$c->id?>">
              <input type="text" class="form-control" name="country_code" value="<?=$c->country_code?>" required>
            </div>
          </div>
          <div class="row custom">
            <div class="col-md-3">
              <label>Country Name</label>
            </div>
            <div class="col-md-9">
              <input type="text" class="form-control" name="country_name" value="<?=$c->country_name?>" required>
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
<?php foreach($country as $c): ?>
<div class="modal fade" id="detailCountry<?=$c->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <?=$c->country_name?>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-3">
            <label>Country Code</label>
          </div>
          <div class="col-md-9">
            <label><b>: <?=$c->country_code?></b></label>
          </div>
        </div>
        <div class="row custom">
          <div class="col-md-3">
            <label>Country Name</label>
          </div>
          <div class="col-md-9">
            <label><b>: <?=$c->country_name?></b></label>
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