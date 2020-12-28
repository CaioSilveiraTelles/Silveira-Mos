<link rel="stylesheet" href="<?php echo base_url() ?>assets/trumbowyg/ui/trumbowyg.css">
<script type="text/javascript" src="<?php echo base_url() ?>assets/trumbowyg/trumbowyg.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/trumbowyg/langs/pt_br.js"></script>

<style>
    .ui-datepicker {
        z-index: 9999 !important;
    }

    .trumbowyg-box {
        margin-top: 0;
        margin-bottom: 0;
    }
</style>

<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="fas fa-diagnoses"></i>
                </span>
                <h5>Detalhes OS</h5>
            </div>
            <div class="widget-content nopadding">


                <div class="span12" id="divProdutosServicos" style=" margin-left: 0">
                    <ul class="nav nav-tabs">
                        <li class="active" id="tabDetalhes"><a href="#tab1" data-toggle="tab">Detalhes da OS</a></li>
                        <li id="tabProdutos"><a href="#tab2" data-toggle="tab">Produtos</a></li>
                        <li id="tabServicos"><a href="#tab3" data-toggle="tab">Serviços</a></li>
                        <li id="tabAnexos"><a href="#tab4" data-toggle="tab">Anexos</a></li>
                        <li id="tabEquipamentos"><a href="#tab6" data-toggle="tab">Equipamentos</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">

                            <div class="span12" id="divCadastrarOs">


                                <div class="span12" style="padding: 1%; margin-left: 0">


                                    <div class="span6" style="margin-left: 0">
                                        <h3>OS N°:
                                            <?php echo $result->idOs ?>
                                        </h3>
                                        <input id="valorTotal" type="hidden" name="valorTotal" value="" />
                                    </div>
                                    <div class="span6">
                                        <label for="tecnico">Técnico / Responsável</label>
                                        <input name="tecnico" type="text" disabled="disabled" class="span12" id="tecnico" value="<?php echo $result->nome ?>" readonly="readonly" />

                                    </div>
                                </div>
                                <div class="span12" style="padding: 1%; margin-left: 0">
                                    <div class="span3">
                                        <label for="status">Status<span class="required"></span></label>
                                        <input name="status" type="text" disabled="disabled" id="status" value="<?php echo $result->status; ?>" readonly="readonly">

                                    </div>
                                    <div class="span3">
                                      <label for="dataInicial">Data de Entrtada<span class="required">*</span></label>
                                            <input name="dataInicial" type="text" disabled="disabled" class="span12 datepicker" id="dataInicial" autocomplete="off" value="<?php echo date('d/m/Y', strtotime($result->dataInicial)); ?>" readonly="readonly" /><label for="dataSaida">Data de Saida</label>
                                            <input name="dataSaida" type="text" disabled="disabled" class="span12 datepicker" id="dataSaida" autocomplete="off" value="<?php echo $result->dataSaida ?>" readonly="readonly" />
                                  </div>

                                    <div class="span3">
                                        <label for="garantia">Garantia até</label>
                                        <input name="garantia" type="text" disabled="disabled" class="span12" id="garantia" value="<?php echo $result->garantia ?>" readonly="readonly" />
                                    </div>
                                  
                                  <div class="span3">
                                    <label for="rastreio">Rastreio</label>
                                        <input name="rastreio" type="text" disabled="disabled" class="span12" id="rastreio" value="<?php echo $result->rastreio ?>" readonly="readonly" /><a href="https://www.linkcorreios.com.br/<?php echo $result->rastreio ?>" title="Rastrear" target="_new" class="btn btn-warning"><i class="fas fa-envelope"></i> Rastrear</a>
                                    </div>
                                </div>
                                
                              <div class="span6" style="padding: 1%; margin-left: 0">
                                        <label for="descricaoProduto">
                                  <h4>Descrição Produto/Serviço</h4>
                                      </label>
                                      <textarea name="descricaoProduto" cols="30" rows="5" disabled="disabled" readonly="readonly" class="span12 editor" id="descricaoProduto"><?php echo $result->descricaoProduto ?></textarea>
                              </div>
                                    <div class="span6" style="padding: 1%; margin-left: 0">
                                        <label for="defeito">
                                      <h4>Problema Informado</h4>
                                        </label>
                                        <textarea name="defeito" cols="30" rows="5" disabled="disabled" readonly="readonly" class="span12 editor" id="defeito"><?php echo $result->defeito ?></textarea>
                                    </div>
                                    <div class="span6" style="padding: 1%; margin-left: 0">
                                        <label for="observacoes">
                                      <h4>Observações</h4>
                                        </label>
                                        <textarea name="observacoes" cols="30" rows="5" disabled="disabled" readonly="readonly" class="span12 editor" id="observacoes"><?php echo $result->observacoes ?></textarea>
                                    </div>
                              <div class="span6" style="padding: 1%; margin-left: 0">
                                        <label for="laudoTecnico">
                                <h4>Relatório Técnico</h4>
                                  </label>
                                  <textarea name="laudoTecnico" cols="30" rows="5" disabled="disabled" readonly="readonly" class="span12 editor" id="laudoTecnico"><?php echo $result->laudoTecnico ?></textarea>
                                </div>

                            </div>

                        </div>


                        <!--Produtos-->
                        <div class="tab-pane" id="tab2">
                        <div class="span12" style="padding: 1%; margin-left: 0">
                        <div class="widget-box" id="divProdutos">
                        <div class="widget-content nopadding">
                                    <table  width="100%" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Produto</th>
                                            <th>Quantidade</th>
                                            <th>Sub-total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $total = 0;
                                        foreach ($produtos as $p) {

                                            $total = $total + $p->subTotal;
                                            echo '<tr>';
                                            echo '<td>' . $p->descricao . '</td>';
                                            echo '<td>' . $p->quantidade . '</td>';
                                            echo '<td>R$ ' . number_format($p->subTotal, 2, ',', '.') . '</td>';
                                            echo '</tr>';
                                        } ?>

                                        <tr>
                                            <td colspan="2" style="text-align: right"><strong>Total:</strong></td>
                                            <td><strong>R$
                                                    <?php echo number_format($total, 2, ',', '.'); ?><input type="hidden" id="total-venda" value="<?php echo number_format($total, 2); ?>"></strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                            </div>
                            </div>

                        <!--Serviços-->
                        	<div class="tab-pane" id="tab3">
                            <div class="span12" style="padding: 1%; margin-left: 0">
                        	<div class="widget-box" id="divServicos">
                        	<div class="widget-content nopadding">
                                    <table  width="100%" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Serviço</th>
                                                <th>Sub-total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $total = 0;
                                            foreach ($servicos as $s) {
                                                $preco = $s->preco;
                                                $total = $total + $preco;
                                                echo '<tr>';
                                                echo '<td>' . $s->nome . '</td>';
                                                echo '<td>R$ ' . number_format($s->preco, 2, ',', '.') . '</td>';
                                                echo '</tr>';
                                            } ?>

                                            <tr>
                                                <td colspan="1" style="text-align: right"><strong>Total:</strong></td>
                                                <td><strong>R$
                                                        <?php echo number_format($total, 2, ',', '.'); ?><input type="hidden" id="total-servico" value="<?php echo number_format($total, 2); ?>"></strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div></div></div></div>
                        
                        
                        
                        <!--Anexos-->
                        <div class="tab-pane" id="tab4">
                            <div class="span12" style="padding: 1%; margin-left: 0">

                                <?php if ($this->session->userdata('cliente_anexa')) { ?>
                                    <div class="span12 well" style="padding: 1%; margin-left: 0" id="form-anexos">
                                        <form id="formAnexos" enctype="multipart/form-data" action="javascript:;" accept-charset="utf-8" s method="post">
                                            <div class="span10">

                                                <input type="hidden" name="idOsServico" id="idOsServico" value="<?php echo $result->idOs ?>" />
                                                <label for="">Anexo</label>
                                                <input type="file" class="span12" name="userfile[]" multiple="multiple" size="20" />
                                            </div>
                                            <div class="span2">
                                                <label for="">.</label>
                                                <button class="btn btn-success span12"><i class="fas fa-paperclip"></i> Anexar</button>
                                            </div>
                                        </form>
                                    </div>
                                <?php
                                } ?>

<div class="span12" id="divAnexos" style="margin-left: 0">
                                    <?php
                                        foreach ($anexos as $a) {
                                            if ($a->thumb == null) {
                                                $thumb = base_url() . 'assets/img/icon-file.png';
                                                $link = base_url() . 'assets/img/icon-file.png';
                                            } else {
                                                $thumb = $a->url . '/thumbs/' . $a->thumb;
                                                $link = $a->url .'/'. $a->anexo;
                                            }
                                            echo '<div class="span3" style="min-height: 150px; margin-left: 0"><a style="min-height: 150px;" href="#modal-anexo" imagem="' . $a->idAnexos . '" link="' . $link . '" role="button" class="btn anexo span12" data-toggle="modal"><img src="' . $thumb . '" alt=""></a></div>';
                                        }
                                    ?>
                                </div>

                            </div>
                        </div>
                        
                        <!--Equipamentos-->
                       	<div class="tab-pane" id="tab6">
                        <div class="span12" style="padding: 1%; margin-left: 0">
                        <div class="widget-box" id="divEquipamento">
                        <div class="widget-content nopadding">
                                    <table  width="100%" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="15%">Equipamento</th>
                                                <th width="15%">Modelo/Cor</th>
                                                <th width="15%">Nº Série</th>
                                                <th width="5%">Voltagem</th>
                                                <th width="50%">Observação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($equipamento as $a) {
                                                echo '<tr>';
                                                echo '<td>' . $a->equipamento . '</td>';
                                                echo '<td>' . $a->modelo . '</td>';
												echo '<td>' . $a->num_serie . '</td>';
												echo '<td>' . $a->voltagem . '</td>';
												echo '<td>' . $a->observacao . '</td>';
                                                echo '</tr>';}?>
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                                </div>
                                </div>
                        
                        <!-- Fim tab Equipamentos -->
                        
                        </div>

                </div>


                .

            </div>

        </div>
    </div>
</div>





<!-- Modal visualizar anexo -->
<div id="modal-anexo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Visualizar Anexo</h3>
    </div>
    <div class="modal-body">
        <div class="span12" id="div-visualizar-anexo" style="text-align: center">
            <div class='progress progress-info progress-striped active'>
                <div class='bar' style='width: 100%'></div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
        <a href="" id-imagem="" class="btn btn-inverse" id="download">Download</a>
        <a href="" link="" class="btn btn-danger" id="excluir-anexo">Excluir Anexo</a>
    </div>
</div>





<!-- Modal Faturar-->
<div id="modal-faturar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form id="formFaturar" action="<?php echo current_url() ?>" method="post">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Faturar Venda</h3>
        </div>
        <div class="modal-body">

            <div class="span12 alert alert-info" style="margin-left: 0"> Obrigatório o preenchimento dos campos com asterisco.</div>
            <div class="span12" style="margin-left: 0">
                <label for="descricao">Descrição</label>
                <input class="span12" id="descricao" type="text" name="descricao" value="Fatura de OS Nº: <?php echo $result->idOs; ?> " />

            </div>
            <div class="span12" style="margin-left: 0">
                <div class="span12" style="margin-left: 0">
                    <label for="cliente">Cliente*</label>
                    <input class="span12" id="cliente" type="text" name="cliente" value="<?php echo $result->nomeCliente ?>" />
                    <input type="hidden" name="clientes_id" id="clientes_id" value="<?php echo $result->clientes_id ?>">
                    <input type="hidden" name="os_id" id="os_id" value="<?php echo $result->idOs; ?>">
                </div>


            </div>
            <div class="span12" style="margin-left: 0">
                <div class="span4" style="margin-left: 0">
                    <label for="valor">Valor*</label>
                    <input type="hidden" id="tipo" name="tipo" value="receita" />
                    <input class="span12 money" id="valor" type="text" name="valor" value="<?php echo number_format($total, 2); ?> " />
                </div>
                <div class="span4">
                    <label for="vencimento">Data Entrada*</label>
                    <input class="span12 datepicker" id="vencimento" type="text" name="vencimento" />
                </div>

            </div>

            <div class="span12" style="margin-left: 0">
                <div class="span4" style="margin-left: 0">
                    <label for="recebido">Recebido?</label>
                    &nbsp &nbsp &nbsp &nbsp <input id="recebido" type="checkbox" name="recebido" value="1" />
                </div>
                <div id="divRecebimento" class="span8" style=" display: none">
                    <div class="span6">
                        <label for="recebimento">Data Recebimento</label>
                        <input class="span12 datepicker" id="recebimento" type="text" name="recebimento" />
                    </div>
                    <div class="span6">
                        <label for="formaPgto">Forma Pgto</label>
                        <select name="formaPgto" id="formaPgto" class="span12">
                            <option value="Dinheiro">Dinheiro</option>
                            <option value="Cartão de Crédito">Cartão de Crédito</option>
                            <option value="Cheque">Cheque</option>
                            <option value="Boleto">Boleto</option>
                            <option value="Depósito">Depósito</option>
                            <option value="Débito">Débito</option>
                        </select>
                    </div>

                </div>


            </div>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true" id="btn-cancelar-faturar">Cancelar</button>
            <button class="btn btn-primary">Faturar</button>
        </div>
    </form>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('.editor').trumbowyg({
            lang: 'pt_br'
        });
    });

    $(document).on('click', '.anexo', function(event) {
        event.preventDefault();
        var link = $(this).attr('link');
        var id = $(this).attr('imagem');
        var url = '<?php echo base_url(); ?>index.php/os/excluirAnexo/';
        $("#div-visualizar-anexo").html('<img src="' + link + '" alt="">');
        $("#download").attr('href', "<?php echo base_url(); ?>index.php/os/downloadanexo/" + id);
    });
</script>