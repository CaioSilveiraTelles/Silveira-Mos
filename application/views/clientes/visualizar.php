<div class="widget-box">
    <div class="widget-title">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab1">Dados do Cliente</a></li>
            <li><a data-toggle="tab" href="#tab2">Ordens de Serviço</a></li>
            <div class="buttons">
                <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eCliente')) {
                    echo '<a title="Icon Title" class="btn btn-mini btn-info" href="' . base_url() . 'index.php/clientes/editar/' . $result->idClientes . '"><i class="fas fa-edit"></i> Editar</a>';
                } ?>

            </div>
        </ul>
    </div>
    <div class="widget-content tab-content">
        <div id="tab1" class="tab-pane active" style="min-height: 300px">

            <div class="accordion" id="collapse-group">
                <div class="accordion-group widget-box">
                    <div class="accordion-heading">
                        <div class="widget-title">
                            <a data-parent="#collapse-group" href="#collapseGOne" data-toggle="collapse">
                                <span class="icon"><i class="fas fa-user"></i></span>
                                <h5>Dados Pessoais</h5>
                            </a>
                        </div>
                    </div>
                    <div class="collapse in accordion-body" id="collapseGOne">
                        <div class="widget-content">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td style="text-align: right; width: 30%"><strong>Foto</strong></td>
                                        <td><a href="<?= $result->foto_url ?>" target="_new"><img src="<?= $result->foto_url ?>" width="120" height="120" border="0" /></a></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right; width: 30%"><strong>Nome</strong></td>
                                        <td>
                                            <?php echo $result->nomeCliente ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right"><strong>Documento</strong></td>
                                        <td>
                                            <?php echo $result->documento ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right; width: 30%"><strong>Senha</strong></td>
                                        <td>
                                            <?php echo $result->senha ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right"><strong>Data de Cadastro</strong></td>
                                        <td>
                                            <?php echo date('d/m/Y', strtotime($result->dataCadastro)) ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="accordion-group widget-box">
                    <div class="accordion-heading">
                        <div class="widget-title">
                            <a data-parent="#collapse-group" href="#collapseGTwo" data-toggle="collapse">
                                <span class="icon"><i class="fas fa-phone-alt"></i></span>
                                <h5>Contatos</h5>
                            </a>
                        </div>
                    </div>
                    <div class="collapse accordion-body" id="collapseGTwo">
                        <div class="widget-content">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td style="text-align: right; width: 30%"><strong>Telefone</strong></td>
                                        <td>
						<?php echo $result->telefone ?></td>
                        			<td>
                        <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) {
												$zapnumber = preg_replace("/[^0-9]/", "", $result->telefone);
                        echo '<a title="Enviar Por WhatsApp" class="btn btn-mini btn btn-success" id="enviarWhatsApp" target="_blank" href="https://web.whatsapp.com/send?phone=55' . $zapnumber . '"><i class="fab fa-whatsapp"></i> WhatsApp</a>';} ?>
                                    </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right"><strong>Email</strong></td>
                                        <td>
                                            <?php echo $result->email ?><td></td>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="accordion-group widget-box">
                    <div class="accordion-heading">
                        <div class="widget-title">
                            <a data-parent="#collapse-group" href="#collapseGThree" data-toggle="collapse">
                                <span class="icon"><i class="fas fa-map-marked-alt"></i></span>
                                <h5>Endereço</h5>
                            </a>
                        </div>
                    </div>
                    <div class="collapse accordion-body" id="collapseGThree">
                        <div class="widget-content">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td style="text-align: right; width: 30%"><strong>Endereço</strong></td>
                                        <td>
                                            <?php echo $result->rua ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right"><strong>Número</strong></td>
                                        <td>
                                            <?php echo $result->numero ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right"><strong>Bairro</strong></td>
                                        <td>
                                            <?php echo $result->bairro ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right"><strong>Cidade</strong></td>
                                        <td>
                                            <?php echo $result->cidade ?> -
                                            <?php echo $result->estado ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right"><strong>CEP</strong></td>
                                        <td>
                                            <?php echo $result->cep ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>




        </div>


        <!--Tab 2-->
        <div id="tab2" class="tab-pane" style="min-height: 300px">
            <?php if (!$results) { ?>

                <table class="table table-bordered ">
                    <thead>
                        <tr style="backgroud-color: #2D335B">
                            <th>OS N°</th>
                            <th>Data de Entrada</th>
                            <th>Descricao</th>
                            <th>Problema Informado</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td colspan="6">Nenhuma OS Cadastrada</td>
                        </tr>
                    </tbody>
                </table>

            <?php
            } else { ?>




                <table class="table table-bordered ">
                    <thead>
                        <tr style="backgroud-color: #2D335B">
                            <th>OS N°</th>
                            <th>Data de Entrada</th>
                            <th>Descricao</th>
                            <th>Problema Informado</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($results as $r) {
                                $dataInicial = date(('d/m/Y'), strtotime($r->dataInicial));
                                $dataFinal = date(('d/m/Y'), strtotime($r->dataFinal));
                                echo '<tr>';
                                echo '<td>' . $r->idOs . '</td>';
                                echo '<td>' . $dataInicial . '</td>';
                                echo '<td>' . $dataFinal . '</td>';
                                echo '<td>' . $r->descricaoProduto . '</td>';
                                echo '<td>' . $r->defeito . '</td>';

                                echo '<td>';
                                if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
                                    echo '<a href="' . base_url() . 'index.php/os/visualizar/' . $r->idOs . '" style="margin-right: 1%" class="btn tip-top" title="Visualizar mais detalhes"><i class="fas fa-eye"></i></a>';
                                }
                                if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) {
                                    echo '<a href="' . base_url() . 'index.php/os/editar/' . $r->idOs . '" class="btn btn-info tip-top" title="Editar OS"><i class="fas fa-edit"></i></a>';
                                }

                                echo  '</td>';
                                echo '</tr>';
                            } ?>
                        <tr>

                        </tr>
                    </tbody>
                </table>


            <?php
            } ?>

        </div>
    </div>
</div>
