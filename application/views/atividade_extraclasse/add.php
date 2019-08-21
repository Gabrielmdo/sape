<?php echo form_open('atividade_extraclasse/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="remuneracao" class="col-md-4 control-label">Remuneracao</label>
		<div class="col-md-8">
			<input type="checkbox" name="remuneracao" value="1" id="remuneracao" />
		</div>
	</div>
	<div class="form-group">
		<label for="titulo" class="col-md-4 control-label">Titulo</label>
		<div class="col-md-8">
			<input type="text" name="titulo" value="<?php echo $this->input->post('titulo'); ?>" class="form-control" id="titulo" />
		</div>
	</div>
	<div class="form-group">
		<label for="duracao" class="col-md-4 control-label">Duracao</label>
		<div class="col-md-8">
			<input type="text" name="duracao" value="<?php echo $this->input->post('duracao'); ?>" class="form-control" id="duracao" />
		</div>
	</div>
	<div class="form-group">
		<label for="area_conhecimento_id" class="col-md-4 control-label">Area Conhecimento Id</label>
		<div class="col-md-8">
			<input type="text" name="area_conhecimento_id" value="<?php echo $this->input->post('area_conhecimento_id'); ?>" class="form-control" id="area_conhecimento_id" />
		</div>
	</div>
	<div class="form-group">
		<label for="tipo_atividade_id" class="col-md-4 control-label">Tipo Atividade Id</label>
		<div class="col-md-8">
			<input type="text" name="tipo_atividade_id" value="<?php echo $this->input->post('tipo_atividade_id'); ?>" class="form-control" id="tipo_atividade_id" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>