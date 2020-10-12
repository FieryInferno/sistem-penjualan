<div class="navbar-container slideDown">
  <div id="navbarSupportedContent" class="collapse navbar-collapse">
    <ul class="navbar-nav">
      <li class="nav-item d-none d-lg-block"><a id="navbar-fullscreen" href="javascript:;" class="nav-link apptogglefullscreen"><i class="ft-maximize font-medium-3 blue-grey darken-4"></i>
          <p class="d-none">fullscreen</p></a></li>  
       	<li class="dropdown nav-item"><a id="dropdownBasic3" href="#" data-toggle="dropdown" class="nav-link position-relative dropdown-toggle"><i class="ft-user font-medium-3 blue-grey darken-4"></i>
	        <p class="d-none">User Settings</p></a>
	      <div ngbdropdownmenu="" aria-labelledby="dropdownBasic3" class="dropdown-menu text-left dropdown-menu-right"><a href="javascript:;" class="dropdown-item py-1" data-toggle="modal" data-backdrop="false" data-target="#modal_edit_akun"><i class="ft-edit mr-2"></i><span>Edit Akun</span></a>
	        <div class="dropdown-divider"></div><a href="<?php echo base_url('Auth_c/logout'); ?>" class="dropdown-item"><i class="ft-power mr-2"></i><span>Logout</span></a>
	      </div>
	    </li> 
    </ul>
  </div>
</div>

<div class="modal fade text-left" id="modal_edit_akun" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title" id="myModalLabel4"><i class="fa fa-user"></i> Edit Akun</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	    <div class="modal-body">
	    	<form id="form_update_akun">
	    		<input type="hidden" name="id_user">
	    		<input type="hidden" name="level">
                <input type="hidden" name="username_awal"> 
	    		<div class="form-group">
	      			<label for="nama_lengkap">Nama Lengkap</label>
	      			<input type="text" name="nama_user" id="nama_user" class="form-control">
	    		</div> 
	    		<div class="form-group">
	      			<label for="email">Email: </label>
	      			<input type="email" name="email" id="email" class="form-control">
	    		</div>
	    		<div class="form-group">
	      			<label for="username">Username</label>
	      			<input type="text" name="username" id="username" class="form-control">
	    		</div>
	    		<div class="form-group">
	      			<label class="label-control" for="password">Password: </label>
	                <div>
	                    <input type="text" id="password" class="form-control" name="password" placeholder="Isi Password">
	                    <small><b>Informasi!</b> Jika tidak ingin mengubah password, abaikan isi password.</small>
	                </div>
	    		</div>
	    	</form> 
	    </div>
	    <div class="modal-footer">
	      <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
	      <button type="button" class="btn btn-outline-primary act-btn-akun">Simpan Perubahan</button>
	    </div>
	  </div>
	</div>
</div>
