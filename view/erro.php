<?php $this->layout('shared/template', ['title' => "Erro ".$erro])?>

<?php $this->start('conteudo')?>
<h1>Erro <?= $erro?></h1>
<?php $this->end()?>
