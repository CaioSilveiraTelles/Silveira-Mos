<?php $totalServico = 0;
$totalProdutos = 0; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>OS <?php echo $result->idOs ?> - <?php echo $result->nomeCliente ?></title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/matrix-style.css" />
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?= base_url('assets/css/custom.css'); ?>" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <style>
        .table {
            margin-bottom: 0px;
        }
    </style>
</head>
<body>

    <div class="invoice-content">
    <table width="100%" class="table table-condensed">
	<?php if ($emitente == null) { ?>
                                <tr>
                                <td colspan="3" class="alert">Você precisa configurar os dados do emitente. >>><a href="<?php echo base_url(); ?>index.php/mapos/emitente">Configurar</a>
                                            <<<</td> </tr> <?php } else { ?> <tr>
                                      <td style="width: 25%"><br><img src=" <?php echo $emitente[0]->url_logo; ?> " style="max-height: 100px"></td>
                                        <td> <span style="font-size: 15px"> <?php echo $emitente[0]->nome; ?></span> </br><span style="font-size: 12px"><?php echo $emitente[0]->cnpj; ?> </br> <?php echo $emitente[0]->rua . ', ' . $emitente[0]->numero . ' - ' . $emitente[0]->bairro . ' - ' . $emitente[0]->cidade . ' - ' . $emitente[0]->uf; ?> </span> </br> <span> E-mail: <?php echo $emitente[0]->email . ' <br>Fone: ' . $emitente[0]->telefone; ?></span></td>
        
        <td style="text-align: center">
        <span style="font-size: 10px"><b>OS N°: </b><span><?php echo $result->idOs ?></span></br>
        <span style="font-size: 10px"><b>Emissão:</b> <?php echo date('d/m/Y') ?></span></br>
        <span style="font-size: 10px"><b>STATUS OS: </b><?php echo $result->status ?></span></br>
        <span style="font-size: 10px"><b>Data de Entrada: </b><?php echo date('d/m/Y', strtotime($result->dataInicial)); ?></span></br>
        <?php if ($result->dataSaida != null) { ?>
        <span style="font-size: 10px"><b>Data de Saida: </b><?php echo htmlspecialchars_decode($result->dataSaida) ?><?php } ?></span></br>
        <?php if ($result->garantia != null) { ?>
        <span style="font-size: 10px"><b>Garantia até: </b><?php echo htmlspecialchars_decode($result->garantia) ?><?php } ?></span></br></td>
                                    </tr>

                                <?php } ?>
                                
                                <tr>
                                </table>
                                
                                <table width="100%" class="table table-condensend">
                                <td>
            <span style="font-size: 12px"><b>Cliente</b></span><br>
            <span style="font-size: 10px"><?php echo $result->nomeCliente ?></span><br>
            <span style="font-size: 10px"><?php echo $result->rua ?>, <?php echo $result->numero ?>, <?php echo $result->bairro ?></span>, 
            <span style="font-size: 10px"><?php echo $result->cidade ?> - <?php echo $result->estado ?></span><br>
            <span style="font-size: 10px">E-mail: <?php echo $result->email ?></span><br>
            <span style="font-size: 10px">Telefone: <?php echo $result->telefone ?></span>
                          </td>
                          <td>
			<span style="font-size: 12px"><b>Responsável</b></span><br>
            <span style="font-size: 10px"><?php echo $result->nome ?></span><br>
            <span style="font-size: 10px">Email: <?php echo $result->email_responsavel ?></span><br>
            <span style="font-size: 10px">Telefone: <?php echo $result->telefone_usuario ?></span>
            </td>
                        </tr>
                        </table>
                                
                                <table width="100%" class="table table-condensed">
                    <?php if ($result->rastreio != null) { ?>
                                    <tr>
                                        <td>
                                        <span style="font-size: 10px"><b>Cod. de Rastreio:</b><br></span>
                                        <span style="font-size: 10px"><?php echo htmlspecialchars_decode($result->rastreio) ?></span>
                                        </td>
                      </tr>
                                <?php } ?>

                                <?php if ($result->descricaoProduto != null) { ?>
                                    <tr>
                                        <td>
                                        <span style="font-size: 10px"><b>Descrição Produto/Serviço:</b><br></span>
                                        <span style="font-size: 10px"><?php echo htmlspecialchars_decode($result->descricaoProduto) ?></span>
                                        </td>
                                    </tr>
                                <?php } ?>

                                <?php if ($result->defeito != null) { ?>
                                    <tr>
                                        <td>
                                        <span style="font-size: 10px"><b>Problema Informado:</b><br></span>
                                        <span style="font-size: 10px"><?php echo htmlspecialchars_decode($result->defeito) ?></span>
                                        </td>
                                    </tr>
                                <?php } ?>

                                <?php if ($result->observacoes != null) { ?>
                                    <tr>
                                        <td>
                                        <span style="font-size: 10px"><b>Observações:</b><br></span>
                                        <span style="font-size: 10px"><?php echo htmlspecialchars_decode($result->observacoes) ?></span>
                                        </td>
                                    </tr>
                                <?php } ?>

                                <?php if ($result->laudoTecnico != null) { ?>
                                    <tr>
                                        <td>
                                        <span style="font-size: 10px"><b>Relatório Técnico:</b><br></span>
                                        <span style="font-size: 10px"><?php echo htmlspecialchars_decode($result->laudoTecnico) ?></span>
                                        </td>
                                    </tr>
                                <?php } ?>
                                
						<td><span style="font-size: 1px"></td>
      </table>
                        
                        <?php if ($equipamento != null) { ?>
                            <table width="100%" style="font-size: 10px" class="table table-bordered table-condensed" id="tblEquipamento">
                                <thead>
                                    <tr>
                                        <th>Equipamento</th>
                                        <th>Modelo/Cor</th>
                                        <th>Nº Série</th>
                                        <th>Voltagem</th>
                                        <th>Observação</th>
                                    </tr>
                                </thead>
                                    <?php

                                    foreach ($equipamento as $e) {

                                        echo '<tr>';
                                        echo '<td><div align="center">' . $e->equipamento . '</div></td>';
                                        echo '<td><div align="center">' . $e->modelo . '</div></td>';
										echo '<td><div align="center">' . $e->num_serie . '</div></td>';
										echo '<td><div align="center">' . $e->voltagem . '</div></td>';
										echo '<td><div align="center">' . $e->observacao . '</div></td>';
                                        echo '</tr>';} ?>
      </table>
                        <?php } ?>
                        
						<?php if ($produtos != null) { ?>
                            <br />
                            <table width="100%" style="font-size: 10px" class="table table-bordered table-condensed" id="tblProdutos">
                                <thead>
                                    <tr>
                                    	<th width="8%">SKU</th>
                                        <th width="10%">Cod. Barras</th>
                                        <th>Produto</th>
                                        <th width="8%">Quantidade</th>
                                        <th width="8%">Preço unit.</th>
                                        <th width="8%">Sub-total</th>
                                    </tr>
                                </thead>
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
                                        echo '</tr>';
                                    } ?>

                                    <tr>
                                        <td colspan="6" style="text-align: right"><strong>Total:</strong></td>
                                        <td><strong><div align="center">R$ <?php echo number_format($totalProdutos, 2, ',', '.'); ?></div></strong></td>
                                    </tr>
                            </table>
                        <?php } ?>
                        
						<?php if ($servicos != null) { ?>
                        <br/>
                      <table width="100%" style="font-size: 10px" class="table table-bordered table-condensed">
                                <thead>
                                    <tr>
                                        <th>Serviço</th>
                                        <th width="8%">Quantidade</th>
                                        <th width="8%">Preço unit.</th>
                                        <th width="8%">Sub-total</th>
                                        </tr>
                                </thead>
                                    <?php
                                    setlocale(LC_MONETARY, 'en_US');
                                    foreach ($servicos as $s) {
                                        $preco = $s->preco ?: $s->precoVenda;
                                        $subtotal = $preco * ($s->quantidade ?: 1);
                                        $totalServico = $totalServico + $subtotal;
                                        echo '<tr>';
                                        echo '<td>' . $s->nome . '</td>';
                                        echo '<td><div align="center">' . ($s->quantidade ?: 1) . '</div></td>';
                                        echo '<td><div align="center">R$ ' . $preco . '</div></td>';
                                        echo '<td><div align="center">R$ ' . number_format($subtotal, 2, ',', '.') . '</div></td>';
                                        echo '</tr>';
                                    } ?>

                                    <tr>
                                        <td colspan="4" style="text-align: right"><strong>Total:</strong></td>
                                        <td><strong><div align="center">R$ <?php echo number_format($totalServico, 2, ',', '.'); ?></div></strong></td>
                                    </tr>
      </table>
                        <?php } ?>
                        <?php
                        if ($totalProdutos != 0 || $totalServico != 0) {
                            echo "<h4 style='font-size: 12px; text-align: right'>Valor Total: R$" . number_format($totalProdutos + $totalServico, 2, ',', '.') . "</h4>";}?><br>

                            <table width="100%" class="table table-bordered table-condensed">
                            	<tr>
                                    <td>
                                    <div style="font-size: 10px" align="center"><b>Termo de Uso</b><br>
                                    <?= $configuration['termo_uso']?>
                                   </td>
                              </tr>
                             </table>
                             <table width="100%" class="table-condensed">
  <tr>
    <td><div style="font-size: 10px" align="center"><b>Assinatura do Tecnico</b></div>
                                    <div style="font-size: 11px" align="center"><?php echo $result->nome ?></div>
                                    <hr></td>
    <td><div style="font-size: 10px" align="center"><b>Assinatura do Cliente</b></div>
                                <div style="font-size: 11px" align="center"><?php echo $result->nomeCliente ?></div>
                                <hr></td>
  </tr>
</table>
                             </div>



<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/matrix.js"></script>

    <script>
        window.print();
    </script>

</body>

</html>