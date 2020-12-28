<?php $totalServico = 0;
$totalProdutos = 0; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>OS <?php echo $result->idOs ?></title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/matrix-style.css" />
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?= base_url('assets/css/custom.css'); ?>" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <style>
        .table {

            width: 58mm;
            margin: auto;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">

                <div class="invoice-content">
                  <div class="invoice-head" style="margin-bottom: 0">

                        <table class="table table-condensed">
                            <tbody>
                                <?php if ($emitente == null) { ?>

                                    <tr>
                                        <td colspan="5" class="alert">Você precisa configurar os dados do emitente. >>><a href="<?php echo base_url(); ?>index.php/mapos/emitente">Configurar</a>
                                            <<<</td> </tr> <?php } else { ?> <tr>

                                        <td colspan="5" style="text-align: center"> <span style="font-size: 13px; "><img src=" <?php echo $emitente[0]->url_logo; ?> " width="150" style="max-height: 100px">
                                                <br>
                                                <?php echo $emitente[0]->nome; ?></span> </br>
                                            <span style="font-size: 8px; ">CNPJ: <?php echo $emitente[0]->cnpj; ?> </br>
                                                <?php echo $emitente[0]->rua . ', ' . $emitente[0]->numero . ' ' . $emitente[0]->bairro; ?></br><?php echo $emitente[0]->cidade . ' - ' . $emitente[0]->uf; ?></span> </br> <span style="font-size: 8px; ">Fone: <?php echo $emitente[0]->telefone; ?></span></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 100%; font-size: 8px;"><b>OS N°:</b> <span><?php echo $result->idOs ?></span><span style="padding-left: 5%;"><b>Emissão:</b> <?php echo date('d/m/Y') ?></span></td>
                                    </tr>

                                <?php } ?>
                            </tbody>
                        </table>
    
                        <table class="table table-condensend">
                            <tbody>
                                <tr>
                                    <td style="font-size: 8px"><b>Cliente: </b>
                                            <span><?php echo $result->nomeCliente ?></span><span style="padding-left: 4%;"><b><br>
                                            Telefone:</b> <?php echo $result->celular_cliente ?></span>
                                    </td>

                                </tr>
                            </tbody>
                        </table>

                    </div>

                    <div style="margin-top: 0; padding-top: 0">
                      <table class="table table-condensed">
                            <tbody>
                                <tr>
                                    <td>
                                        <div style="font-size: 8px"><b>Status da O.S.: </b>
                                          <?php echo $result->status ?>
                                    </div></td>
                                </tr>
                            </tbody>
                        </table>
                      <table class="table table-condensed">
                            <tbody>

                                
                                    <tr>

                                        <td>
                                            <div style="font-size: 8px"><b>Entrada: </b>
                                              <?php echo date('d/m/Y', strtotime($result->dataInicial)); ?>
                                        </div></td>
											<?php if ($result->dataSaida != null) { ?>
                                        <td>
                                            <div style="font-size: 8px"><b>Saida: </b>
                                              <?php echo $result->dataSaida ?>
                                        </div></td>

                                        <td>
                                            <div style="font-size: 8px">
                                              <?php if ($result->garantia != null) { ?>
                                              <b>Garantia até: </b>
                                              <?php echo $result->garantia ?><?php } ?>
                                        </div></td>


                                    <?php } ?>
                                    <?php if ($result->status) { ?>
                                        
										<?php if ($result->rastreio != null) { ?>
                                    <tr>
                                        <td colspan="5">
                                            <div style="font-size: 8px"><b>Cod. de Rastreio: </b><br>
                                              <?php echo htmlspecialchars_decode($result->rastreio) ?>
                                        </div></td>
                                    </tr>
                                <?php } ?>
                                
                                <?php if ($result->descricaoProduto != null) { ?>
                                    <tr>
                                        <td colspan="5">
                                            <div style="font-size: 8px"><b>Descrição: </b>
                                              <?php echo htmlspecialchars_decode($result->descricaoProduto) ?>
                                        </div></td>
                                    </tr>
                                <?php } ?>

                                <?php if ($result->defeito != null) { ?>
                                    <tr>
                                        <td colspan="5">
                                            <div style="font-size: 8px"><b>Problema Informado: </b>
                                              <?php echo htmlspecialchars_decode($result->defeito) ?>
                                        </div></td>
                                    </tr>
                                <?php } ?>

                                <?php if ($result->observacoes != null) { ?>
                                    <tr>
                                        <td colspan="5">
                                            <div style="font-size: 8px"><b>Observações: </b>
                                              <?php echo htmlspecialchars_decode($result->observacoes) ?>
                                        </div></td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                            <?php if ($result->status != 'Aberto') { ?>
                                <?php if ($result->laudoTecnico != null) { ?>
                                    <tr>
                                        <td colspan="5">
                                            <div style="font-size: 8px"><b>Relatório Técnico: </b><br>
                                              <?php echo htmlspecialchars_decode($result->laudoTecnico) ?>
                                        </div></td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>

                            </tbody>
                        </table>


                        <?php if ($produtos != null) { ?>
                            <br />
                            <table style='font-size: 8px;' class="table table-bordered table-condensed" id="tblProdutos">
                                <thead>
                                    <tr>
                                        <th><div style="font-size: 8px">Qtd.</div></th>
                                        <th><div style="font-size: 8px">Produto</div></th>
                                        <th><div style="font-size: 8px">Preço unit.</div></th>
                                        <th><div style="font-size: 8px">Sub-total</div></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    foreach ($produtos as $p) {
                                        $totalProdutos = $totalProdutos + $p->subTotal;
                                        echo '<tr>';
                                        echo '<td>' . $p->quantidade . '</td>';
                                        echo '<td>' . $p->descricao . '</td>';
                                        echo '<td>R$ ' . $p->preco ?: $p->precoVenda . '</td>';

                                        echo '<td>R$ ' . number_format($p->subTotal, 2, ',', '.') . '</td>';
                                        echo '</tr>';
                                    } ?>

                                    <tr>

                                        <td colspan="3" style="text-align: right"><div style="font-size: 8px"><strong>Total:</strong></div></td>
                                        <td><div style="font-size: 8px"><strong>R$ <?php echo number_format($totalProdutos, 2, ',', '.'); ?></strong></div></td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php } ?>

                        <?php if ($servicos != null) { ?>
                            <table style='font-size: 8px;' class="table table-bordered table-condensed">
                                <thead>
                                    <tr>
                                        <th><div style="font-size: 8px">Qtd.</div></th>
                                        <th><div style="font-size: 8px">Serviço</div></th>
                                        <th><div style="font-size: 8px">Preço unit.</div></th>
                                        <th><div style="font-size: 8px">Sub-total</div></th>
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
                                        echo '<td>' . ($s->quantidade ?: 1) . '</td>';
                                        echo '<td>' . $s->nome . '</td>';
                                        echo '<td>R$ ' . $preco . '</td>';
                                        echo '<td>R$ ' . number_format($subtotal, 2, ',', '.') . '</td>';
                                        echo '</tr>';
                                    } ?>

                                    <tr>
                                        <td colspan="3" style="text-align: right; font-size: 8px""><div style="font-size: 8px"><strong>Total:</strong></div></td>
                                        <td><strong>R$ <?php echo number_format($totalServico, 2, ',', '.'); ?></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php } ?>

                      <table class="table table-bordered table-condensed">
                            <tbody>
                                <tr>
                                    <td colspan="5"> <?php
                                                        if ($totalProdutos != 0 || $totalServico != 0) {
                                                            echo "<h4 style='text-align: right; font-size: 8px;'>Valor Total: R$" . number_format($totalProdutos + $totalServico, 2, ',', '.') . "</h4>";
                                                        }

                                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                      </table>
                      <table class="table table-bordered table-condensed">
                            <tbody>
                                <tr>

                                    <td><div align="center">Assinatura do Tecnico</div>
                                    <div align="center"><?php echo $result->nome ?></div>
                                    <br><hr>
                                    </td>
                                </tr>
                        <br>
                                <td><div align="center">Assinatura do Cliente</div>
                                <div align="center"><?php echo $result->nomeCliente ?></div>
                                <br><hr>
                                  </td>

                                </tr>
                            </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/matrix.js"></script>

    <script>
        window.print();
    </script>

</body>

</html>
