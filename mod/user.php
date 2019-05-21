<section class="content-header">
	<h1>Users<small></small></h1>
	<ol class="breadcrumb">
		<li><a href="principal.php?mod=well"><i class="fa fa-dashboard"></i>Home</a></li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-header">
                  <h3 class="box-title">Registration</h3>
                  <div class="pull-right box-tools">
					<img id="iconLoad" src="img/logo_ani.gif"  >
                    <button id="boPlus" class="btn btn-info btn-sm" ><i class="fa fa-plus"></i></button>
					<button id="boMinus" class="btn btn-info btn-sm" ><i class="fa fa-minus"></i></button>
                  </div>
                </div>
				<div id="form" >
					<div class="box-body pad">
						<input type="hidden" id="inRowno">
						<div class="col-md-6">
							<div class="form-group inName">
								<label for="inName">Name</label>
								<input type="text" class="form-control inputTxt" id="inName" placeholder="Enter Name">
							</div>
							<div class="form-group inLastname">
								<label for="inLastname">Last Name</label>
								<input type="text" class="form-control inputTxt" id="inLastname" placeholder="Enter Lastname">
							</div>
							<div class="form-group inUserid">
								<label for="inUserid">Userid</label>
								<input type="text" class="form-control inputTxt" id="inUserid" placeholder="Enter Userid">
							</div>
							<div class="form-group inPassword">
								<label for="inPassword">Password</label>
								<input type="text" class="form-control inputTxt" id="inPassword" placeholder="Enter Password">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group inAdress">
								<label for="inAdress">Adress</label>
								<input type="text" class="form-control inputTxt" id="inAdress" placeholder="Enter Adress">
							</div>
							<div class="form-group inPhone">
								<label for="inPhone">Phone</label>
								<input type="text" class="form-control inputTxt" id="inPhone" placeholder="Enter Phone">
							</div>
							<div class="form-group inEmail">
								<label for="inEmail">Email</label>
								<input type="text" class="form-control inputTxt" id="inEmail" placeholder="Enter Email">
							</div>
							<div class="form-group inStatus">
								<label>Status</label>
								<select id="inStatus" class="form-control inputSelect">
									<option value="active" >Active</option>
									<option value="pending" >Pending</option>
									<option value="cancelled" >Cancelled</option>
								</select>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<div id="msgData" class="callout"></div>
						<button type="submit" id="boSubmit" class="btn btn-primary pull-right">Submit</button>
						<button type="submit" id="boUpdate" class="btn btn-primary pull-right" style="margin-right:5px;">Update</button>
						<button type="submit" id="boClean"  class="btn btn-default pull-right" style="margin-right:5px;">Clean</button>
					</div>
				</div>
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div id="msgTable" class="callout">asd</div>
			<div id="table"></div>
		</div>
	</div>
</section>