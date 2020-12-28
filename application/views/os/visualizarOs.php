<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
<script src="<?php echo base_url() ?>assets/js/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/trumbowyg/ui/trumbowyg.css">
<script type="text/javascript" src="<?php echo base_url() ?>assets/trumbowyg/trumbowyg.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/trumbowyg/langs/pt_br.js"></script>
<link href="<?= base_url('assets/css/custom.css'); ?>" rel="stylesheet">
<?php $totalServico = 0;
$totalProdutos = 0; ?>
<div class="row-fluid" style="margin-top: 0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="fas fa-diagnoses"></i>
                </span>
                <h5>Ordem de Serviço</h5>
                <div class="buttons">
                    
					<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) {
                        echo '<a target="_new" title="Adicionar OS" class="btn btn-mini btn-success" href="' . base_url() . 'index.php/os/adicionar"><i class="fas fa-plus"></i> Adicionar OS</a>';
                    } ?>
                    <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) {
                        echo '<a title="Editar OS" class="btn btn-mini btn-info" href="' . base_url() . 'index.php/os/editar/' . $result->idOs . '"><i class="fas fa-edit"></i> Editar</a>';
                    } ?>
                    <a target="_blank" title="Imprimir OS" class="btn btn-mini btn-inverse" href="<?php echo site_url() ?>/os/imprimir/<?php echo $result->idOs; ?>"><i class="fas fa-print"></i> Imprimir A4</a>
                    

                    <a href="https://www.linkcorreios.com.br/<?php echo $result->rastreio ?>" title="Rastrear" target="_new" class="btn btn-mini btn-warning"><i class="fas fa-envelope"></i> Rastrear</a>
                    
                </div>
            </div>
            <div class="widget-content" id="printOs">
                <div class="invoice-content">
                    <div class="invoice-head" style="margin-bottom: 0">

                        <table class="table table-condensed">
                            <tbody>
                                <?php if ($emitente == null) { ?>

                                    <tr>
                                        <td colspan="3" class="alert">Você precisa configurar os dados do emitente. >>><a href="<?php echo base_url(); ?>index.php/mapos/emitente">Configurar</a>
                                            <<<</td> </tr> <?php } else { ?> <tr>
                                      <td style="width: 25%"><br><img src=" <?php echo $emitente[0]->url_logo; ?> " style="max-height: 100px"></td>
                                        <td> <span style="font-size: 20px; "> <?php echo $emitente[0]->nome; ?></span> </br><span><?php echo $emitente[0]->cnpj; ?> </br> <?php echo $emitente[0]->rua . ', ' . $emitente[0]->numero . ' - ' . $emitente[0]->bairro . ' - ' . $emitente[0]->cidade . ' - ' . $emitente[0]->uf; ?> </span> </br> <span> E-mail: <?php echo $emitente[0]->email . ' <br>Fone: ' . $emitente[0]->telefone; ?></span></td>
        
        <td style="width: 25%; text-align: center">
        <span style="font-size: 12px; "><b>OS N°: </b><span><?php echo $result->idOs ?></span></br>
        <span style="font-size: 12px; "><b>STATUS OS: </b><?php echo $result->status ?></span></br>
        <span style="font-size: 12px; "><b>Data de Entrada: </b><?php echo date('d/m/Y', strtotime($result->dataInicial)); ?></span></br>
        <?php if ($result->dataSaida != null) { ?>
        <span style="font-size: 12px; "><b>Data de Saida: </b><?php echo htmlspecialchars_decode($result->dataSaida) ?><?php } ?></span></br>
        <?php if ($result->garantia != null) { ?>
        <span style="font-size: 12px; "><b>Garantia até: </b><?php echo htmlspecialchars_decode($result->garantia) ?><?php } ?></span></br></td>
                                    </tr>

                                <?php } ?>
                            </tbody>
                        </table>

                        <table class="table table-condensend">
                      <tbody>
                        <tr>
                          <td padding-left: 0"><ul>
                            <li> <span>
                              <h5><b>Cliente</b></h5>
                              </span> <span><?php echo $result->nomeCliente ?></span><br />
                              <span><?php echo $result->rua ?>, <?php echo $result->numero ?>, <?php echo $result->bairro ?></span>, <span><?php echo $result->cidade ?> - <?php echo $result->estado ?></span><br>
                              <span>E-mail: <?php echo $result->email ?></span><br>
                              <span>Telefone: <?php echo $result->telefone ?></span><br>
                            </li>
                          </ul>
                          </td>
                          <td padding-left: 0"><ul>
                            <li> <span>
                              <h5><b>Responsável</b></h5>
                              </span> <span><?php echo $result->nome ?></span> <br />
                              <span>Email: <?php echo $result->email_responsavel ?></span><br />
                              <span>Telefone: <?php echo $result->telefone_usuario ?></span> </li>
                          </ul></td>
                        </tr>
                      </tbody>
                    </table>

                    </div>

                    <div style="margin-top: 0; padding-top: 0">

                        <table class="table table-condensed">
                            <tbody>
                            
                            <?php if ($result->rastreio != null) { ?>
                                    <tr>
                                        <td><span style="font-size: 13px; ">
                                            <b>Cod. de Rastreio:</b><br></span>
                                            <?php echo htmlspecialchars_decode($result->rastreio) ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            
							<?php if ($result->descricaoProduto != null) { ?>
                                    <tr>
                                        <td><span style="font-size: 14px; ">
                                            <b>Descrição Produto/Serviço:</b><br></span>
                                            <?php echo htmlspecialchars_decode($result->descricaoProduto) ?>
                                        </td>
                                    </tr>
                                <?php } ?>

                                <?php if ($result->defeito != null) { ?>
                                    <tr>
                                        <td><span style="font-size: 13px; ">
                                            <b>Problema Informado:</b><br></span>
                                            <?php echo htmlspecialchars_decode($result->defeito) ?>
                                        </td>
                                    </tr>
                                <?php } ?>

                                <?php if ($result->observacoes != null) { ?>
                                    <tr>
                                        <td><span style="font-size: 13px; ">
                                            <b>Observações:</b><br></span>
                                            <?php echo htmlspecialchars_decode($result->observacoes) ?>
                                        </td>
                                    </tr>
                                <?php } ?>

                                <?php if ($result->laudoTecnico != null) { ?>
                                    <tr>
                                        <td><span style="font-size: 13px; ">
                                            <b>Relatório Técnico:</b><br></span>
                                            <?php echo htmlspecialchars_decode($result->laudoTecnico) ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <td><span style="font-size: 13px"></td>
                            </tbody>
                        </table>
                        
						<?php if ($equipamento != null) { ?>
                            <table width="100%" class="table table-bordered table-condensed" id="tblEquipamento">
                                <thead>
                                    <tr>
                                        <th width="20%">Equipamento</th>
                                        <th width="20%">Modelo/Cor</th>
                                        <th width="15%">Nº Série</th>
                                        <th width="5%">Voltagem</th>
                                        <th width="40%">Observação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    foreach ($equipamento as $e) {

                                        		echo '<tr>';
                                                echo '<td><div align="center">' . $e->equipamento . '</div></td>';
                                                echo '<td><div align="center">' . $e->modelo . '</div></td>';
												echo '<td><div align="center">' . $e->num_serie . '</div></td>';
												echo '<td><div align="center">' . $e->voltagem . '</div></td>';
												echo '<td><div align="center">' . $e->observacao . '</div></td>';
                                                echo '</tr>';} ?>
    									</tbody>
                            </table>
                        <?php } ?>
						
						<?php if ($produtos != null) { ?>
                            <table width="100%" class="table table-bordered table-condensed" id="tblProdutos">
                                <thead>
                                    <tr>
                                        <th width="8%">SKU</th>
                                        <th width="10%">Cod. Barras</th>
                                        <th>Produto</th>
                                        <th width="10%">Quantidade</th>
                                        <th width="10%">Preço unit.</th>
                                        <th width="10%">Sub-total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    foreach ($produtos as $p) {

                                        $totalProdutos = $totalProdutos + $p->subTotal;
                                        echo '<tr>';
										echo '<td><div align="center">' . $p->idProdutos . '</div></td>';
                                        echo '<td><div align="center">' . $p->codDeBarra . '</div></td>';
										echo '<td>' . $p->descricao . '</td>';
                                        echo '<td><div align="center">' . $p->quantidade . '</div></td>';
                                        echo '<td><div align="center">R$ ' . $p->preco ?: $p->precoVenda . '</div></td>';
                                        echo '<td><div align="center">R$ ' . number_format($p->subTotal, 2, ',', '.') . '</div></td>';
                                        echo '</tr>';} ?>
    									<tr>
                                        <td colspan="6" style="text-align: right"><strong>Total:</strong></td>
                                        <td><strong><div align="center">R$ <?php echo number_format($totalProdutos, 2, ',', '.'); ?></div></strong></td>
                                    	</tr>
                                </tbody>
                            </table>
                        <?php } ?>

                        <?php if ($servicos != null) { ?>
                            <table width="100%" class="table table-bordered table-condensed">
                                <thead>
                                    <tr>
                                        <th>Serviço</th>
                                        <th width="10%">Quantidade</th>
                                        <th width="10%">Preço unit.</th>
                                        <th width="10%">Sub-total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    setlocale(LC_MONETARY, 'en_US');
                                    foreach ($servicos as $s) {
                                        $preco = $s->preco ?: $s->precoVenda;
                                        $subtotal = $preco * ($s->quantidade ?: 1);
                                        $totalServico = $totalServico + $subtotal;
                                        echo '<tr>';
                                        echo '<td>' . $s->nome . '</td>';
                                        echo '<td>' . ($s->quantidade ?: 1) . '</td>';
                                        echo '<td>R$ ' . $preco . '</td>';
                                        echo '<td>R$ ' . number_format($subtotal, 2, ',', '.') . '</td>';
                                        echo '</tr>';
                                    } ?>

                                    <tr>
                                        <td colspan="4" style="text-align: right"><strong>Total:</strong></td>
                                        <td><strong>R$ <?php echo number_format($totalServico, 2, ',', '.'); ?></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php } ?>
                        <?php
                        if ($totalProdutos != 0 || $totalServico != 0) {
                            echo "<h4 style='font-size: 15px; text-align: right'>Valor Total: R$" . number_format($totalProdutos + $totalServico, 2, ',', '.') . "</h4>";
                        }
                        ?>
                    </div>
                </div>
            </div>

        </div>

        <?php
        if($pagamento){

            if ($totalProdutos || $totalServico) {
                $preference = @$this->MercadoPago->getPreference($pagamento->access_token, $result->idOs, 'Pagamento da OS: ', ($totalProdutos + $totalServico));
                if ($pagamento->nome == 'MercadoPago' && isset($preference->id)) {
                    echo '<form action="'.site_url().'" method="POST">
                            <script src="https://www.mercadopago.com.br/integrations/v1/web-payment-checkout.js" data-preference-id="'.$preference->id.'" data-button-label="Gerar Pagamento">
                            </script>
                          </form>';
                }
            }
        } ?>

    </div>
</div>
</div>