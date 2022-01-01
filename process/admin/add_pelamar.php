
    <div class="row">
        <div class="col-lg-8">
            <h3 class="page-header"><small>Registrasi Pelamar</small></h3>
        
        <div class="panel panel-default">
            <div class="panel-heading"></div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                    
          
                <form class="" role="form" style="margin-top: 10px;" action="?p=admin.action" id="defaultForm" method="post" enctype="multipart/form-data">              
                    <div class="form-group">
                    <label> Username</label>
                        <input type="text" class="form-control" name="uname" placeholder="Username" required/>
                    </div>
                    
                    <div class="form-group">
                    <label>Password</label>
                        <input type="password" class="form-control" name="pass" placeholder="Password" required/>
                    </div>

                    <div class="form-group">
                    <label>Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Email" required/>
                    </div>

                    <input type="hidden" name="uac" value="PELAMAR">
                    <div class="form-group">
                    <label></label>
                        <a class="btn btn-default" href="?p=admin.list_pelamar">Batal</a>
                        <input type="submit" name="save" value="Simpan" class="btn btn-primary">
                    </div>                   
                </form>
            </div>
        </div>
    </div>
</div>
</div>
