<script src="<?php echo base_url()?>assets/js/jquery.mask.min.js"></script>
<script src="<?php echo base_url()?>assets/js/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url()?>assets/js/funcoes.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/trumbowyg/ui/trumbowyg.css">
<script type="text/javascript" src="<?php echo base_url() ?>assets/trumbowyg/trumbowyg.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/trumbowyg/langs/pt_br.js"></script>
<div class="row-fluid" style="margin-top:0">
    <div class="span12">
      <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="fas fa-wrench"></i>
                </span>
                <h5>Configurações do Sistema</h5>
            </div>
            <div class="widget-content nopadding">
                <?php echo $custom_error; ?>
                <form action="<?php echo current_url(); ?>" id="formConfigurar" method="post" class="form-horizontal">
                <div class="control-group">
                        <label for="app_name" class="control-label">Nome do Sistema</label>
                        <div class="controls">
                            <input name="app_name" type="text" required value="<?= $configuration['app_name']?>" size="50">
                            <span class="help-inline">Nome do sistema</span>
                        </div>
                  </div>
                    <div class="control-group">
                        <label for="app_name" class="control-label">Termo de Uso OS</label>
                        <div class="span5">
<textarea name="termo_uso" class="editor"><?= $configuration['termo_uso']?></textarea>
                  </div></div>
                   <div class="control-group">
                        <label for="app_theme" class="control-label">Tema do Sistema</label>
                        <div class="controls">
                            <select name="app_theme" id="app_theme">
                                <option value="default">Padrão</option>
                                <option value="white" <?= $configuration['app_theme'] == 'white' ? 'selected' : ''; ?> >Neve</option>
                            </select>
                            <span class="help-inline">Selecione o tema que que deseja usar no sistema</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="per_page" class="control-label">Registros por Página</label>
                        <div class="controls">
                            <select name="per_page" id="theme">
                                <option value="10" <?= $configuration['per_page'] == '10' ? 'selected' : ''; ?> >10</option>
                                <option value="20" <?= $configuration['per_page'] == '20' ? 'selected' : ''; ?> >20</option>
                                <option value="50" <?= $configuration['per_page'] == '50' ? 'selected' : ''; ?> >50</option>
                                <option value="75" <?= $configuration['per_page'] == '75' ? 'selected' : ''; ?> >75</option>
                                <option value="100" <?= $configuration['per_page'] == '100' ? 'selected' : ''; ?> >100</option>
                                <option value="150" <?= $configuration['per_page'] == '150' ? 'selected' : ''; ?> >150</option>
                                <option value="200" <?= $configuration['per_page'] == '200' ? 'selected' : ''; ?> >200</option>
                                <option value="500">500</option>
                                <option value="1000" <?= $configuration['per_page'] == '1000' ? 'selected' : ''; ?> >1000</option>
                            </select>
                            <span class="help-inline">Selecione quantos registros deseja exibir nas listas</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="gerenciador_arquivos" class="control-label">Gerenciador de Arquivos</label>
                        <div class="controls">
                            <select name="gerenciador_arquivos" id="gerenciador_arquivos">
                                <option value="arquivos_old/arquivos" <?= $configuration['gerenciador_arquivos'] == 'arquivos_old/arquivos' ? 'selected' : ''; ?> >Classico</option>
                                <option value="arquivos/arquivos" <?= $configuration['gerenciador_arquivos'] == 'arquivos/arquivos' ? 'selected' : ''; ?> >Novo</option>
                            </select>
                            <span class="help-inline">Versão do Gerenciador de Arquivos.</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="control_estoque" class="control-label">Controlar Estoque</label>
                        <div class="controls">
                            <select name="control_estoque" id="control_estoque">
                                <option value="1">Sim</option>
                                <option value="0" <?= $configuration['control_estoque'] == '0' ? 'selected' : ''; ?> >Não</option>
                            </select>
                            <span class="help-inline">Ativar ou desativar o controle de estoque.</span>
                        </div>
                    </div><hr />
                    <div class="control-group">
                        <label for="app_name" class="control-label">Mensagem WhatsApp</label>
                        <div class="controls">
                            <textarea name="whats_app1" cols="50" rows="3" required="required"><?= $configuration['whats_app1']?>
                            </textarea>
                            <span class="help-inline">Mensagem</span>
                        </div>
                        <div class="controls">
                            <input type="text" required name="whats_app2" value="<?= $configuration['whats_app2']?>">
                            <span class="help-inline">Nome</span>
                        </div></div>
                        <div class="controls">
                            <input id="telefone" class="telefone1" type="text" name="whats_app3" value="<?= $configuration['whats_app3']?>" />
                            <span class="help-inline">Telefone</span>
                        </div>
                        <div class="controls">
                            <textarea name="whats_app4" widg="50" required="required"><?= $configuration['whats_app4']?>
                            </textarea>
                            <span class="help-inline">URL Area do Usuário</span>
                        </div><hr />
                        <div class="control-group">
                        <label for="app_name" class="control-label">Mensagem Rápida</label>
                        <div class="controls">
                        <input id="telefone" class="telefone1" type="text" name="masteros_1" value="" />
                            <span class="help-inline"><a href="https://web.whatsapp.com/send?phone=55<?= $configuration['masteros_1']?>" title="Enviar WhatsWapp" target="_new" class="btn btn-success"><i class="fab fa-whatsapp"></i> Enviar WhatsWapp</a></span>
                            <span class="help-inline"><input disabled="disabled" value=" <?= $configuration['masteros_1']?>" readonly="readonly" /></span>
                            </div></div><br />
	<div class="widget-content nopadding">
	<div class="span12" id="divProdutosServicos" style=" margin-left: 0">
	<div class="form-actions">
                            <div class="span6">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-sync-alt"></i> Salvar Configurações</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $('#update-database').click(function () {
        if (confirm('Confirma a atualização do banco de dados?')) {
            window.location = "<?= site_url('mapos/atualizarBanco') ?>"
        }
    });

    $('#update-mapos').click(function() {
        if (confirm('Confirma a atualização do mapos?')) {
            window.location = "<?= site_url('mapos/atualizarSistema') ?>"
        }
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.editor').trumbowyg({
            lang: 'pt_br'
        });
    });
</script>