<div class="quick-actions_homepage">
    <ul class="quick-actions">
        <li class="bg_lo span3"> <a href="<?php echo base_url() ?>index.php/mine/os"> <i class="fas fa-diagnoses" style="font-size:36px"></i>
                <div>Ordens de Serviço</div>
            </a></li>
        <li class="bg_ls span3"> <a href="<?php echo base_url() ?>index.php/mine/compras"><i class="fas fa-shopping-cart" style="font-size:36px"></i>
                <div>Compras</div>
            </a></li>
        <li class="bg_lg span3"> <a href="<?php echo base_url() ?>index.php/mine/conta"><i class="fas fa-user"  style="font-size:36px"></i>
                <div>Minha Conta</div>
            </a></li>
    </ul>
</div>


<div class="span12" style="margin-left: 0">

    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon"><i class="fas fa-diagnoses"></i></span>
                <h5>Últimas Ordens de Serviço</h5>
            </div>
            <div class="widget-content">
                <table class="table table-bordered">
                    <thead>
                       <tr style="backgroud-color: #2D335B">
                            <th>OS N°</th>
                            <th>Responsável</th>
                            <th>Data de Entrada</th>
                            <th>Data de Saida</th>
                            <th>Garantia até</th>
                            <th>Total</th>
                            <th>Faturado</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($os as $r) {
                                $dataInicial = date(('d/m/Y'), strtotime($r->dataInicial));
                                $dataFinal = date(('d/m/Y'), strtotime($r->dataFinal));
								$ValorTotal = number_format($r->totalProdutos + $r->totalServicos, 2, ',', '.');
                if ($r->status == "Orçamento") {$status = '<span class="label label-sonic01">Orçamento</span>';}
			elseif ($r->status == "Orçamento Concluido") {$status = '<span class="label label-sonic02">Orçamento Concluido</span>';}
			elseif ($r->status == "Orçamento Aprovado") {$status = '<span class="label label-sonic03">Orçamento Aprovado</span>';}
			elseif ($r->status == "Em Andamento") {$status = '<span class="label label-sonic04">Em Andamento</span>';}
			elseif ($r->status == "Aguardando Peças") {$status = '<span class="label label-sonic05">Aguardando Peças</span>';}
			elseif ($r->status == "Serviço Concluido") {$status = '<span class="label label-sonic06">Serviço Concluido</span>';}
			elseif ($r->status == "Sem Reparo") {$status = '<span class="label label-sonic07">Sem Reparo</span>';}
			elseif ($r->status == "Não Autorizado") {$status = '<span class="label label-sonic08">Não Autorizado</span>';}
			elseif ($r->status == "Contato sem Sucesso") {$status = '<span class="label label-sonic09">Contato sem Sucesso</span>';}
			elseif ($r->status == "Cancelado") {$status = '<span class="label label-sonic10">Cancelado</span>';}
			elseif ($r->status == "Pronto-Despachar") {$status = '<span class="label label-sonic11">Pronto-Despachar</span>';}
			elseif ($r->status == "Enviado") {$status = '<span class="label label-sonic12">Enviado</span>';}
			elseif ($r->status == "Aguardando Envio") {$status = '<span class="label label-sonic13">Aguardando Envio</span>';}
			elseif ($r->status == "Aguardando Entrega Correio") {$status = '<span class="label label-sonic14">Aguardando Entrega Correio</span>';}
			elseif ($r->status == "Entregue - A Receber") {$status = '<span class="label label-sonic15">Entregue - A Receber</span>';}
			elseif ($r->status == "Garantia") {$status = '<span class="label label-sonic16">Garantia</span>';}
			elseif ($r->status == "Abandonado") {$status = '<span class="label label-sonic17">Abandonado</span>';}
			elseif ($r->status == "Comprado pela Loja") {$status = '<span class="label label-sonic18">Comprado pela Loja</span>';}
			elseif ($r->status == "Entregue - Faturado") {$status = '<span class="label label-sonic19">Entregue - Faturado</span>';}
								
						echo '<tr>';
						echo '<td><div align="center">' . $r->idOs . '</div></td>';
						echo '<td>' . $r->nome . '</td>';
						echo '<td><div align="center">' . $dataInicial . '</div></td>';
						echo '<td><div align="center">' . $r->dataSaida . '</div></td>';
						echo '<td><div align="center">' . $r->garantia . '</div></td>';
						echo '<td><div align="center">R$: ' . $ValorTotal . '</div></td>';
						echo '<td><div align="center">R$: ' . number_format($r->valorTotal, 2, ',', '.') . '</div></td>';
						echo '<td><div align="center">' . $status . '</div></td>';
						echo '<td><div align="center"><a href="' . base_url() . 'index.php/mine/visualizarOs/' . $r->idOs . '" class="btn tip-top" title="Visualizar"><i class="fas fa-eye"></i></a>
                                  <a href="' . base_url() . 'index.php/mine/imprimirOs/' . $r->idOs . '" target="_blank" class="btn btn-inverse tip-top" title="Imprimir"><i class="fas fa-print"></i></a>
                                  <a href="' . base_url() . 'index.php/mine/detalhesOs/' . $r->idOs . '" class="btn btn-info tip-top" title="Visualizar mais detalhes"><i class="fas fa-bars"></i></a>  
                              </div></td>';
                                echo '</tr>';
                            } ?>
                        <tr>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="widget-box">
        <div class="widget-title"><span class="icon"><i class="fas fa-shopping-cart"></i></span>
            <h5>Últimas Compras</h5>
        </div>
        <div class="widget-content">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Data de Venda</th>
                        <th>Responsável</th>
                        <th>Faturado</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($compras != null) {
                        foreach ($compras as $p) {
                            if ($p->faturado == 1) {
                                $faturado = 'Sim';
                            } else {
                                $faturado = 'Não';
                            }
                            echo '<tr>';
                            echo '<td><div align="center">' . $p->idVendas . '</div></td>';
                            echo '<td><div align="center">' . date('d/m/Y', strtotime($p->dataVenda)) . '</div></td>';
                            echo '<td><div align="center">' . $p->nome . '</div></td>';
                            echo '<td><div align="center">' . $faturado . '</div></td>';
                            echo '<td><div align="center"><a href="' . base_url() . 'index.php/mine/visualizarCompra/' . $p->idVendas . '" class="btn"> <i class="fas fa-eye" ></i> </a></div></td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="5">Nenhum venda encontrada.</td></tr>';
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>

    </div>
</div>
