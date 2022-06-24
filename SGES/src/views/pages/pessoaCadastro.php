<?php 
    $render('header',[
                        'titulo' => $titulo,
                        'user'   => $user
                     ]); 
?>

<div class="section">
    
    <div class="card text-center">

        <div class="card-header <?= $user->card;?>">
            Dados Pessoais
        </div>

        <form action="<?= $base;?>/pessoa" method="POST">
    
            <div class="card-body">

                <?php if(!empty($notificacao)):?>
                    <div class="alert alert-<?= $notificacao['tipo'];?>">
                        <div class="alert1"><?= $notificacao['msg'];?></div>
                        <div class="alert2"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
                    </div>
                <?php endif;?>

                        
                <div class="row mb-3">
                    <div class="col-sm-2">
                        <input placeholder="ID" type="hidden" class="form-control" id="id" name="id" value="<?= (!empty($cadastro->id))? $cadastro->id : '';?>">
                    </div>

                    <div class="col-sm-2">
                        <input placeholder="ID USER" type="hidden" class="form-control" id="id_user" name="id_user" value="<?= $user->id;?>">
                    </div>
                </div>
                        
                <div class="row mb-3">
                    <div class="col-sm-12">
                        <input placeholder="Nome Completo" type="text" class="form-control" id="nome" name="nome" value="<?= (!empty($cadastro->nome))? $cadastro->nome : '';?>" required maxlength="200">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-6">
                        <input placeholder="Data Nascimento" type="text" class="form-control" id="data_nasc" name="data_nasc" value="<?= (!empty($cadastro->data_nasc))? date('d/m/Y',strtotime($cadastro->data_nasc)) : '';?>" required>
                    </div>

                    <div class="col-sm-6">
                        <input placeholder="Telefone" type="text" class="form-control" id="telefone" name="telefone" value="<?= (!empty($cadastro->telefone))? $cadastro->telefone : '';?>" required maxlength="15">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-12">
                        <input placeholder="Rua" type="text" class="form-control" id="rua" name="rua" value="<?= (!empty($cadastro->rua))? $cadastro->rua : '';?>" required maxlength="200">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-6">
                        <input placeholder="CEP" type="text" class="form-control" id="cep" name="cep" value="<?= (!empty($cadastro->cep))? $cadastro->cep : '';?>" required maxlength="10">
                    </div>

                    <div class="col-sm-2">
                        <input placeholder="Quadra" type="text" class="form-control" id="qd" name="qd" value="<?= (!empty($cadastro->qd))? $cadastro->qd : '';?>" required maxlength="5">
                    </div>

                    <div class="col-sm-2">
                        <input placeholder="Lote" type="text" class="form-control" id="lt" name="lt" value="<?= (!empty($cadastro->lt))? $cadastro->lt : '';?>" required maxlength="5">
                    </div>

                    <div class="col-sm-2">
                        <input placeholder="Nº" type="text" class="form-control" id="num" name="num" value="<?= (!empty($cadastro->num))? $cadastro->num : '';?>" maxlength="5">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-6">
                        <input placeholder="Bairro" type="text" class="form-control" id="bairro" name="bairro" value="<?= (!empty($cadastro->bairro))? $cadastro->bairro : '';?>" required maxlength="200">
                    </div>

                    <div class="col-sm-4">
                        <input placeholder="Cidade" type="text" class="form-control" id="cidade" name="cidade" required value="<?= (!empty($cadastro->cidade))? $cadastro->cidade : '';?>" maxlength="200">
                    </div>

                    <div class="col-sm-2">
                        <select class="form-select" id="estado" name="estado">
                            <option value="">SELECT</option>
                            <?= ($cadastro->estado === 'AC') ? '<option selected value="AC">Acre</option>'                :'<option value="AC">Acre</option>'?>
                            <?= ($cadastro->estado === 'AL') ? '<option selected value="AL">Alagoas</option>'             :'<option value="AL">Alagoas</option>'?>
                            <?= ($cadastro->estado === 'AP') ? '<option selected value="AP">Amapa</option>'               :'<option value="AP">Amapa</option>'?>
                            <?= ($cadastro->estado === 'AM') ? '<option selected value="AM">Amazonas</option>'            :'<option value="AM">Amazonas</option>'?>
                            <?= ($cadastro->estado === 'BA') ? '<option selected value="BA">Bahia</option>'               :'<option value="BA">Bahia</option>'?>
                            <?= ($cadastro->estado === 'DF') ? '<option selected value="DF">Distrito Federal</option>'    :'<option value="DF">Distrito Federal</option>'?>
                            <?= ($cadastro->estado === 'ES') ? '<option selected value="ES">Espirito Santo</option>'      :'<option value="ES">Espirito Santo</option>'?>
                            <?= ($cadastro->estado === 'GO') ? '<option selected value="GO">Goias</option>'               :'<option value="GO">Goias</option>'?>
                            <?= ($cadastro->estado === 'MA') ? '<option selected value="MA">Maranhão</option>'            :'<option value="MA">Maranhão</option>'?>
                            <?= ($cadastro->estado === 'MT') ? '<option selected value="MT">Mato Grosso</option>'         :'<option value="MT">Mato Grosso</option>'?>
                            <?= ($cadastro->estado === 'MS') ? '<option selected value="MS">Mato Grosso do Sul</option>'  :'<option value="MS">Mato Grosso do Sul</option>'?>
                            <?= ($cadastro->estado === 'MA') ? '<option selected value="MG">Minas Gerais</option>'        :'<option value="MG">Minas Gerais</option>'?>
                            <?= ($cadastro->estado === 'PA') ? '<option selected value="PA">Pará</option>'                :'<option value="PA">Pará</option>'?>
                            <?= ($cadastro->estado === 'PB') ? '<option selected value="PB">Pernambuco</option>'          :'<option value="PB">Pernambuco</option>'?>
                            <?= ($cadastro->estado === 'PR') ? '<option selected value="PR">Parana</option>'              :'<option value="PR">Parana</option>'?>
                            <?= ($cadastro->estado === 'PI') ? '<option selected value="PI">Piaui</option>'               :'<option value="PI">Piaui</option>'?>
                            <?= ($cadastro->estado === 'RJ') ? '<option selected value="RJ">Rio de Janeiro</option>'      :'<option value="RJ">Rio de Janeiro</option>'?>
                            <?= ($cadastro->estado === 'RN') ? '<option selected value="RN">Rio Grande do Norte</option>' :'<option value="RN">Rio Grande do Norte</option>'?>
                            <?= ($cadastro->estado === 'RS') ? '<option selected value="RS">Rio Grande do Sul</option>'   :'<option value="RS">Rio Grande do Sul</option>'?>
                            <?= ($cadastro->estado === 'RO') ? '<option selected value="RO">Rondonia</option>'            :'<option value="RO">Rondonia</option>'?>
                            <?= ($cadastro->estado === 'RR') ? '<option selected value="RR">Roraima</option>'             :'<option value="RR">Roraima</option>'?>
                            <?= ($cadastro->estado === 'SC') ? '<option selected value="SC">Santa Catarina</option>'      :'<option value="SC">Santa Catarina</option>'?>
                            <?= ($cadastro->estado === 'SP') ? '<option selected value="SP">São Paulo</option>'           :'<option value="SP">São Paulo</option>'?>
                            <?= ($cadastro->estado === 'SE') ? '<option selected value="SE">Sergipe</option>'             :'<option value="SC">Santa Catarina</option>'?>
                            <?= ($cadastro->estado === 'TO') ? '<option selected value="TO">Tocantins</option>'           :'<option value="TO">Tocantins</option>'?>
                        </select>
                    </div>
                </div>

            </div>

            <div class="card-footer text-muted <?= $user->card;?>">
                <input id="btn-login" class="btn btn-<?= $user->navBar;?>" type="submit" value="Salvar">
            </div>

        </form>

    </div>

</div>

<?php $render('footer');?>