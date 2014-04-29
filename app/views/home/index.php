					<div class="intro-content">
						<h1><span>UPLOAD</span></h1>
					</div>
					<div class="overlay"></div>
				</div>
				<div class="side side-right">
					<div class="intro-content">
						<h1><span>COPY/PASTE</span></h1>
					</div>
					<div class="overlay"></div>
				</div>
			</div><!-- /intro -->
			

			<div class="page page-right">
				<div class="page-inner">
					<div class="container">
						<textarea rows="10"  name="textbox" form="textform" placeholder="Enter code here" class="form-control" style= "background-color:#5ccdc9; border:3px solid black; color:white" ></textarea>
						<!--When user clicks submit, program calls the validateForm method-->
						<form name="textform" action="functions/getfile.php" id="textform" onsubmit="return validateForm()" method="post">
							<button class="btn btn-default btn-lg " type="submit"> Submit Code<span class="glyphicon glyphicon-thumbs-up"></span></button>
							<!--<input type="submit" value="Submit Code" class="btn btn-default btn-lg"/>-->
						</form>
					</div>
				</div><!-- /page-inner -->
			</div><!-- /page-right -->


				<div class="page page-left">
					<div class="page-inner">
						<div class="container">
							<form action="functions/getfile.php" method="post" 
							enctype="multipart/form-data"> 
							<div>
								<label id="upload"><span class="lead" >Select file to upload:</span> 
								<input type="file" id="upload" name="file" />
								</label>
							</div> 
								<div> 
									<input type="hidden" name="action" value="upload" class="btn btn-default"/> 
									<button class="btn btn-default btn-lg" type="submit">Submit File<span class="glyphicon glyphicon-thumbs-up"></span></button>
									<!--<input type="submit" value="Submit File"/>--> 
								</div> 
							</form>
						</div>
					</div><!-- /page-inner -->
				</div><!-- /page-left -->
				<a href="#" class="back back-right" title="back to intro">&rarr;</a>
				<a href="#" class="back back-left" title="back to intro">&larr;</a>
			</div><!-- /splitlayout -->
		</div><!-- /container -->