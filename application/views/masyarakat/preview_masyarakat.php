<div class="container-fluid">
					<!-- DataTales Example -->
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary text-center">Data mayarakat</h6>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" >
									<thead>
										<tr>
											<th>NIK</th>
											<th>Nama</th>
											<th>Username</th>
											<th>Telephone</th>
											
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($masyarakat as $datap) {
										?>
										<tr>
											<th><?php echo $datap->nik?></th>
											<td><?php echo $datap->nama?></td>
											<td><?php echo $datap->username?></td>
											<td><?php echo $datap->telp?></td>
										
										</tr>
										<?php
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>

				</div>