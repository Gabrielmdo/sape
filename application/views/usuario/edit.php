<?php echo form_open('/sape/usuario/edit/'.$usuario['id'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="nome" class="col-md-4 control-label">Nome</label>
		<div class="col-md-8">
			<input type="text" name="nome" value="<?php echo ($this->input->post('nome') ? $this->input->post('nome') : $usuario['nome']); ?>" class="form-control" id="nome" />
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-md-4 control-label">Email</label>
		<div class="col-md-8">
			<input type="text" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $usuario['email']); ?>" class="form-control" id="email" />
		</div>
	</div>
	<div class="form-group">
		<label for="senha" class="col-md-4 control-label">Senha</label>
		<div class="col-md-8">
			<input type="text" name="senha" value="<?php echo ($this->input->post('senha') ? $this->input->post('senha') : $usuario['senha']); ?>" class="form-control" id="senha" />
		</div>
	</div>
	<div class="form-group">
		<label for="funcao" class="col-md-4 control-label">Funcao</label>
		<div class="col-md-8">
			<input type="text" name="funcao" value="<?php echo ($this->input->post('funcao') ? $this->input->post('funcao') : $usuario['funcao']); ?>" class="form-control" id="funcao" />
		</div>
	</div>
	<div class="form-group">
		<label for="cpf" class="col-md-4 control-label">Cpf</label>
		<div class="col-md-8">
			<input type="text" name="cpf" value="<?php echo ($this->input->post('cpf') ? $this->input->post('cpf') : $usuario['cpf']); ?>" class="form-control" id="cpf" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>